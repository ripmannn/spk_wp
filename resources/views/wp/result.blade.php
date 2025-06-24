@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Hasil Perhitungan WP</h1>

    @if(!empty($results))
    <div class="card mb-4">
        <div class="card-header bg-success text-white">
            <h2 class="mb-0">Kesimpulan</h2>
        </div>
        <div class="card-body">
            <p class="lead">
                Berdasarkan perhitungan, alternatif terbaik adalah <strong>{{ $results[0]['alternative']->name }}</strong>
                dengan nilai preferensi (V) sebesar <strong>{{ number_format($results[0]['vector_v'], 6) }}</strong>.
            </p>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h2>Hasil Perangkingan</h2>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>Ranking</th>
                        <th>Alternatif</th>
                        <th>Vektor S</th>
                        <th>Vektor V (Nilai Preferensi)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($results as $index => $result)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $result['alternative']->name }}</td>
                        <td>{{ number_format($result['vector_s'], 6) }}</td>
                        <td>{{ number_format($result['vector_v'], 6) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @else
    <div class="alert alert-warning">
        Tidak ada hasil untuk ditampilkan.
    </div>
    @endif

    <a href="{{ route('wp.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection