@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Chi tiết thú cưng</h1>

    <ul class="list-group">
        <li class="list-group-item"><strong>Tên:</strong> {{ $pet->name }}</li>
        <li class="list-group-item"><strong>Loài:</strong> {{ $pet->species }}</li>
        <li class="list-group-item"><strong>Tuổi:</strong> {{ $pet->age }}</li>
        <li class="list-group-item"><strong>Chủ sở hữu:</strong> {{ $pet->user->name ?? 'Chưa rõ' }}</li>
    </ul>

    <div class="mt-3">
        <a href="{{ route('pets.index') }}" class="btn btn-secondary">Quay lại</a>

        @can('update', $pet)
            <a href="{{ route('pets.edit', $pet) }}" class="btn btn-warning">Sửa</a>
        @endcan

        @can('delete', $pet)
            <form action="{{ route('pets.destroy', $pet) }}" method="POST" style="display:inline">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" onclick="return confirm('Xóa thú cưng này?')">Xóa</button>
            </form>
        @endcan
    </div>
</div>
@endsection
