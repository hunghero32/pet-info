@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Sửa thú cưng</h1>

    <form action="{{ route('pets.update', $pet) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Tên thú cưng</label>
            <input type="text" name="name" class="form-control" value="{{ $pet->name }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Loài</label>
            <input type="text" name="species" class="form-control" value="{{ $pet->species }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Tuổi</label>
            <input type="number" name="age" class="form-control" value="{{ $pet->age }}">
        </div>

        <button type="submit" class="btn btn-success">Cập nhật</button>
        <a href="{{ route('pets.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
@endsection
