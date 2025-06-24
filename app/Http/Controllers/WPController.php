<?php

namespace App\Http\Controllers;

use App\Models\Alternative;
use App\Models\Criteria;
use App\Models\Score;
use Illuminate\Http\Request;

class WpController extends Controller
{
    /**
     * Menampilkan halaman awal dengan matriks keputusan.
     */
    public function index()
    {
        $criterias = Criteria::all();
        $alternatives = Alternative::with('scores')->get();
        
        // Membuat matriks nilai untuk kemudahan akses di view
        // Key: alternative_id, Value: [criteria_id => value]
        $scoresMatrix = [];
        foreach ($alternatives as $alternative) {
            $scoresMatrix[$alternative->id] = $alternative->scores->pluck('value', 'criteria_id');
        }


        // Validasi kelengkapan data
        $isIncomplete = $alternatives->contains(function ($alternative) use ($criterias) {
            return $alternative->scores->count() < $criterias->count();
        });

        return view('wp.index', compact('criterias', 'alternatives', 'scoresMatrix', 'isIncomplete'));
    }

    /**
     * Menghitung dan menampilkan hasil perhitungan Weighted Product.
     */
    public function calculate()
    {
        $criterias = Criteria::all();
        $alternatives = Alternative::with('scores')->get();

        // Validasi: Pastikan semua data lengkap sebelum menghitung
        $isIncomplete = $alternatives->contains(function ($alternative) use ($criterias) {
            return $alternative->scores->count() < $criterias->count();
        });

        if ($isIncomplete) {
            return redirect()->route('wp.index')
                             ->with('error', 'Perhitungan tidak dapat dilanjutkan. Pastikan semua alternatif memiliki nilai untuk setiap kriteria.');
        }

        // 1. Hitung total bobot
        $totalWeight = $criterias->sum('weight');

        // 2. Normalisasi bobot (Wj)
        // Key: criteria_id, Value: normalized_weight
        $normalizedWeights = [];
        foreach ($criterias as $criteria) {
            $weight = $criteria->weight / $totalWeight;
            // Jika tipe 'cost', bobotnya menjadi negatif
            $normalizedWeights[$criteria->id] = ($criteria->type === 'cost') ? -$weight : $weight;
        }

        // 3. Hitung Vektor S (Si) untuk setiap alternatif
        // Key: alternative_id, Value: vector_s
        $vectorS = [];
        foreach ($alternatives as $alternative) {
            $s = 1;
            foreach ($alternative->scores as $score) {
                $s *= pow($score->value, $normalizedWeights[$score->criteria_id]);
            }
            $vectorS[$alternative->id] = $s;
        }

        // 4. Hitung total Vektor S
        $totalVectorS = array_sum($vectorS);

        // 5. Hitung Vektor V (nilai preferensi) dan siapkan hasil
        $results = [];
        foreach ($alternatives as $alternative) {
            // Hindari pembagian dengan nol jika totalVectorS adalah 0
            $v = ($totalVectorS > 0) ? $vectorS[$alternative->id] / $totalVectorS : 0;
            
            $results[] = [
                'alternative' => $alternative,
                'vector_s' => $vectorS[$alternative->id],
                'vector_v' => $v
            ];
        }

        // Urutkan hasil berdasarkan Vektor V secara menurun
        usort($results, function ($a, $b) {
            return $b['vector_v'] <=> $a['vector_v'];
        });

        return view('wp.result', compact('results'));
    }
}