@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Metode Weighted Product</h1>

    {{-- Notifikasi jika ada error dari redirect --}}
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    {{-- Notifikasi jika data tidak lengkap --}}
    @if($isIncomplete)
        <div class="alert alert-warning">
            Beberapa alternatif belum memiliki nilai lengkap.
            Silakan lengkapi nilai di <a href="{{ route('scores.index') }}" class="alert-link">halaman nilai</a> sebelum melanjutkan.
        </div>
    @endif

    <div class="card mb-4">
        <div class="card-header">
            <h2>Kriteria</h2>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Nama Kriteria</th>
                        <th>Bobot</th>
                        <th>Jenis</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($criterias as $criteria)
                    <tr>
                        <td>{{ $criteria->code }}</td>
                        <td>{{ $criteria->name }}</td>
                        <td>{{ $criteria->weight }}</td>
                        <td>{{ $criteria->type === 'benefit' ? 'Benefit' : 'Cost' }}</td>
                    </tr>
                    @endforeach
                    <tr class="table-primary">
                        <td colspan="2" class="text-end"><strong>Total Bobot</strong></td>
                        <td><strong>{{ $criterias->sum('weight') }}</strong></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header">
            <h2>Alternatif dan Nilai</h2>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Alternatif</th>
                        @foreach($criterias as $criteria)
                        <th>{{ $criteria->code }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach($alternatives as $alternative)
                    <tr>
                        <td>{{ $alternative->name }}</td>
                        @foreach($criterias as $criteria)
                        <td>
                            {{-- Mengambil nilai dari matriks yang sudah disiapkan di controller --}}
                            {{ $scoresMatrix[$alternative->id][$criteria->id] ?? '-' }}
                        </td>
                        @endforeach
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- Tombol Hitung hanya aktif jika data sudah lengkap --}}
    <form action="{{ route('wp.calculate') }}" method="GET">
        <button type="submit" class="btn btn-primary" @if($isIncomplete) disabled @endif>
            Hitung WP
        </button>
    </form>
</div>
@endsection