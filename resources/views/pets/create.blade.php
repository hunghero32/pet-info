@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Thêm thú cưng</h1>

    <form action="{{ route('pets.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Tên thú cưng</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Loài</label>
            <input type="text" name="species" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Tuổi</label>
            <input type="number" name="age" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Lưu</button>
        <a href="{{ route('pets.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
@endsection
