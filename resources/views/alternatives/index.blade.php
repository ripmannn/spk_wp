@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Kelola Alternatif</h1>
    <a href="{{ route('alternatives.create') }}" class="btn btn-primary mb-3">Tambah Alternatif</a>
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($alternatives as $alternative)
            <tr>
                <td>{{ $alternative->name }}</td>
                <td>
                    <a href="{{ route('alternatives.edit', $alternative) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('alternatives.destroy', $alternative) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Hapus alternatif?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
            @if($alternatives->isEmpty())
            <tr>
                <td colspan="2" class="text-center">Belum ada alternatif</td>
            </tr>
            @endif
        </tbody>
    </table>
</div>
@endsection