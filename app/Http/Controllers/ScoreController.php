<?php

namespace App\Http\Controllers;

use App\Models\Alternative;
use App\Models\Criteria;
use App\Models\Score;
use Illuminate\Http\Request;

class ScoreController extends Controller
{
    /**
     * Menampilkan daftar sumber daya dalam bentuk matriks.
     * Data disiapkan secara efisien untuk view.
     */
    public function index()
    {
        // Eager load relasi 'scores' untuk setiap alternatif
        $alternatives = Alternative::with('scores')->get();
        $criterias = Criteria::all();

        // Buat matriks skor untuk akses data yang cepat di view.
        // Strukturnya: [alternative_id][criteria_id] => Score Object
        $scoreMatrix = [];
        foreach ($alternatives as $alternative) {
            // Menggunakan keyBy untuk mengubah koleksi skor menjadi array asosiatif
            // dengan 'criteria_id' sebagai key.
            $scoreMatrix[$alternative->id] = $alternative->scores->keyBy('criteria_id');
        }

        return view('scores.index', compact('alternatives', 'criterias', 'scoreMatrix'));
    }

    /**
     * Menampilkan form untuk membuat entri nilai baru (opsional, jika diperlukan halaman khusus).
     */
    public function create()
    {
        $alternatives = Alternative::all();
        $criterias = Criteria::all();
        return view('scores.create', compact('alternatives', 'criterias'));
    }

    /**
     * Menyimpan skor baru atau memperbarui skor yang sudah ada.
     * Metode ini menangani permintaan dari matriks di halaman index.
     */
    public function store(Request $request)
    {
        $request->validate([
            'alternative_id' => 'required|exists:alternatives,id',
            'criteria_id' => 'required|exists:criterias,id',
            'value' => 'required|integer|min:1|max:5',
        ]);

        // Gunakan updateOrCreate untuk logika "update jika ada, atau buat jika tidak ada".
        // Ini secara efektif menangani pembuatan dan pembaruan dari satu metode.
        Score::updateOrCreate(
            [
                'alternative_id' => $request->alternative_id,
                'criteria_id'    => $request->criteria_id,
            ],
            [
                'value' => $request->value,
            ]
        );

        return redirect()->route('scores.index')->with('success', 'Nilai berhasil disimpan.');
    }

    /**
     * Menampilkan form untuk mengedit semua nilai dari sebuah alternatif spesifik.
     * Perhatikan perubahan parameter dari `Score $score` menjadi `Alternative $alternative`.
     */
    public function edit(Alternative $alternative)
    {
        $criterias = Criteria::all();
        
        // Buat array skor yang simpel (criteria_id => value) untuk form edit
        $scores = $alternative->scores->pluck('value', 'criteria_id');

        return view('scores.edit', compact('alternative', 'criterias', 'scores'));
    }

    /**
     * Memperbarui semua nilai untuk sebuah alternatif spesifik.
     * Biasanya dipanggil dari halaman edit.
     */
    public function update(Request $request, Alternative $alternative)
    {
        $request->validate([
            'scores' => 'required|array',
            'scores.*' => 'required|integer|min:1|max:5',
        ]);

        foreach ($request->scores as $criteria_id => $value) {
            Score::updateOrCreate(
                [
                    'alternative_id' => $alternative->id,
                    'criteria_id'    => $criteria_id,
                ],
                [
                    'value' => $value,
                ]
            );
        }

        return redirect()->route('scores.index')->with('success', 'Nilai untuk ' . $alternative->name . ' berhasil diperbarui.');
    }

    /**
     * Menghapus sebuah skor spesifik dari database.
     */
    public function destroy(Score $score)
    {
        $score->delete();
        return redirect()->route('scores.index')->with('success', 'Nilai berhasil dihapus.');
    }
}