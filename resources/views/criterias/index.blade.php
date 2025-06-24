@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Kelola Kriteria</h1>
    <a href="{{ route('criterias.create') }}" class="btn btn-primary mb-3">Tambah Kriteria</a>
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Kode</th>
                <th>Nama</th>
                <th>Bobot</th>
                <th>Jenis</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($criterias as $criteria)
            <tr>
                <td>{{ $criteria->code }}</td>
                <td>{{ $criteria->name }}</td>
                <td>{{ $criteria->weight }}</td>
                <td>{{ $criteria->type === 'benefit' ? 'Benefit' : 'Cost' }}</td>
                <td>
                    <a href="{{ route('criterias.edit', $criteria) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('criterias.destroy', $criteria) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Hapus kriteria?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
            @if($criterias->isEmpty())
            <tr>
                <td colspan="5" class="text-center">Belum ada kriteria</td>
            </tr>
            @endif
        </tbody>
    </table>
</div>
@endsection