@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Input Nilai Alternatif</h1>

    {{-- Pesan Sukses dari Session --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- Peringatan jika belum ada kriteria atau alternatif --}}
    @if($criterias->isEmpty() || $alternatives->isEmpty())
        <div class="alert alert-warning">
            @if($criterias->isEmpty() && $alternatives->isEmpty())
                <p>Belum ada kriteria dan alternatif. Silakan tambahkan terlebih dahulu.</p>
            @elseif($criterias->isEmpty())
                <p>Belum ada kriteria. Silakan tambahkan kriteria terlebih dahulu.</p>
            @else
                <p>Belum ada alternatif. Silakan tambahkan alternatif terlebih dahulu.</p>
            @endif
            <div class="mt-2">
                @if($criterias->isEmpty())
                    <a href="{{ route('criterias.create') }}" class="btn btn-sm btn-primary me-2">Tambah Kriteria</a>
                @endif
                @if($alternatives->isEmpty())
                    <a href="{{ route('alternatives.create') }}" class="btn btn-sm btn-primary">Tambah Alternatif</a>
                @endif
            </div>
        </div>
    @endif

    {{-- Tabel Utama Penilaian --}}
    @if(!$criterias->isEmpty() && !$alternatives->isEmpty())
        <div class="card mb-4">
            <div class="card-header bg-light">
                <h5 class="mb-0">Tabel Penilaian</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="table-primary">
                            <tr>
                                <th>Alternatif</th>
                                @foreach($criterias as $criteria)
                                    <th>
                                        {{ $criteria->code }}
                                        <span class="d-block small text-muted">{{ $criteria->name }}</span>
                                    </th>
                                @endforeach
                             
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($alternatives as $alternative)
                                <tr>
                                    <td>
                                        <strong>{{ $alternative->name }}</strong>
                                    </td>
                                    @foreach($criterias as $criteria)
                                        <td>
                                            {{-- Ambil objek skor dari matriks, akan null jika tidak ada --}}
                                            @php
                                                $score = $scoreMatrix[$alternative->id][$criteria->id] ?? null;
                                            @endphp

                                            {{-- Form ini akan mengirim data ke `scores.store` yang sekarang bisa update/create --}}
                                            <form action="{{ route('scores.store') }}" method="POST" class="d-inline">
                                                @csrf
                                                <input type="hidden" name="alternative_id" value="{{ $alternative->id }}">
                                                <input type="hidden" name="criteria_id" value="{{ $criteria->id }}">
                                                <div class="input-group input-group-sm">
                                                    <select name="value" class="form-select" onchange="this.form.submit()">
                                                        {{-- Opsi placeholder jika tidak ada nilai --}}
                                                        <option value="" disabled {{ !$score ? 'selected' : '' }}>Pilih...</option>
                                                        @for($i = 1; $i <= 5; $i++)
                                                            <option value="{{ $i }}" {{ ($score && $score->value == $i) ? 'selected' : '' }}>
                                                                {{ $i }}
                                                            </option>
                                                        @endfor
                                                    </select>
                                                    
                                                    {{-- Tampilkan tombol hapus hanya jika skor sudah ada di database --}}
                                                    @if($score)
                                                        <button 
                                                            type="button" 
                                                            class="btn btn-outline-danger"
                                                            data-bs-toggle="tooltip" 
                                                            title="Hapus nilai"
                                                            onclick="deleteScore('{{ route('scores.destroy', $score) }}')"
                                                        >
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    @endif
                                                </div>
                                            </form>
                                        </td>
                                    @endforeach
                                        
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="{{ $criterias->count() + 2 }}" class="text-center">
                                        Tidak ada data alternatif.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif

    {{-- Tombol Aksi di Bawah Tabel --}}
    <div class="d-flex justify-content-between">
        <a href="{{ route('wp.index') }}" class="btn btn-primary">
            <i class="fas fa-calculator me-1"></i> Lihat Perhitungan WP
        </a>
        
        @if(!$criterias->isEmpty() && !$alternatives->isEmpty())
            <a href="{{ route('scores.create') }}" class="btn btn-success">
                <i class="fas fa-plus-circle me-1"></i> Tambah Entri Nilai
            </a>
        @endif
    </div>
</div>

{{-- Form tersembunyi untuk proses hapus --}}
<form id="delete-score-form" method="POST" class="d-none">
    @csrf
    @method('DELETE')
</form>
@endsection

@push('scripts')
<script>
    // Inisialisasi semua tooltip Bootstrap
    document.addEventListener('DOMContentLoaded', function () {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    });

    // Fungsi untuk menghapus skor
    function deleteScore(actionUrl) {
        if (confirm('Apakah Anda yakin ingin menghapus nilai ini?')) {
            const form = document.getElementById('delete-score-form');
            form.action = actionUrl;
            form.submit();
        }
    }
</script>
@endpush