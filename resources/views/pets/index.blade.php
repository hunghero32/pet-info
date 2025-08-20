@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Danh sách thú cưng</h1>

    {{-- Nút thêm thú cưng --}}
    @can('create', App\Models\Pet::class)
        <a href="{{ route('pets.create') }}" class="btn btn-primary mb-3">+ Thêm thú cưng</a>
    @endcan

    <table class="table table-bordered align-middle">
        <thead>
            <tr>
                <th>Tên</th>
                <th>Loài</th>
                <th>Tuổi</th>
                <th>Chủ sở hữu</th>
                <th>QR & Hồ sơ công khai</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pets as $pet)
                <tr>
                    <td>{{ $pet->name }}</td>
                    <td>{{ $pet->species }}</td>
                    <td>{{ $pet->age }}</td>
                    <td>{{ $pet->user->name ?? 'Chưa rõ' }}</td>
                    <td>
                        {{-- Link hồ sơ công khai --}}
                        <a href="{{ route('pets.public', $pet->public_id) }}" target="_blank" class="btn btn-outline-info btn-sm">
                            Xem hồ sơ
                        </a>
                        {{-- Tải QR --}}
                        <a href="{{ route('pets.qr.download', $pet->public_id) }}" class="btn btn-outline-secondary btn-sm">
                            Tải QR
                        </a>
                    </td>
                    <td>
                        @if($pet->is_lost)
                            <span class="badge bg-danger">Thất lạc</span>
                        @else
                            <span class="badge bg-success">An toàn</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('pets.show', $pet) }}" class="btn btn-info btn-sm">Xem</a>

                        @can('update', $pet)
                            <a href="{{ route('pets.edit', $pet) }}" class="btn btn-warning btn-sm">Sửa</a>

                            {{-- Toggle trạng thái thất lạc --}}
                            <form action="{{ route('pets.reportLost', $pet) }}" method="POST" style="display:inline">
                                @csrf
                                <button type="submit" class="btn btn-outline-danger btn-sm">
                                    {{ $pet->is_lost ? 'Bỏ thất lạc' : 'Báo thất lạc' }}
                                </button>
                            </form>
                        @endcan

                        @can('delete', $pet)
                            <form action="{{ route('pets.destroy', $pet) }}" method="POST" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Xóa thú cưng này?')">Xóa</button>
                            </form>
                        @endcan
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">Chưa có thú cưng nào.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
