@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center">
    <div class="card shadow-lg p-4 position-relative"
         style="width: 600px; border-radius: 16px; 
                background: linear-gradient(135deg, #e0f7fa, #ffffff); 
                border: 2px solid #009688;
                overflow: hidden;">
        
        {{-- Watermark hoa văn 🐾 --}}
        <div class="position-absolute top-0 start-0 w-100 h-100" 
             style="background-image: url('data:image/svg+xml;utf8,
             <svg xmlns=\'http://www.w3.org/2000/svg\' width=\'100\' height=\'100\' fill=\'%23b2dfdb\' opacity=\'0.2\'>
                <text x=\'10\' y=\'60\' font-size=\'60\'>🐾</text>
             </svg>');
             background-repeat: repeat; background-size: 120px;
             z-index: 0; opacity: 0.15;">
        </div>

        {{-- Nội dung thẻ --}}
        <div class="position-relative" style="z-index: 1;">
            {{-- Header giống CCCD --}}
            <div class="text-center mb-3">
                <h5 class="fw-bold text-uppercase mb-0" style="color: #00695c;">CỘNG HÒA XÃ HỘI CHỦ NHÂN PET</h5>
                <small class="text-muted">HỒ SƠ THÚ CƯNG</small>
            </div>

            <div class="row">
                {{-- Ảnh thú cưng --}}
                <div class="col-4 text-center">
                    @if($pet->photo)
                        <img src="{{ asset('storage/' . $pet->photo) }}" 
                             alt="{{ $pet->name }}" 
                             class="img-thumbnail mb-2" 
                             style="height: 150px; width: 120px; object-fit: cover; border-radius: 8px;">
                    @else
                        <img src="https://placehold.co/120x150?text=No+Image" 
                             alt="No photo" 
                             class="img-thumbnail mb-2" 
                             style="border-radius: 8px;">
                    @endif
                    <p class="fw-bold text-primary">{{ strtoupper($pet->name) }}</p>
                </div>

                {{-- Thông tin chính --}}
                <div class="col-8">
                    <p><strong>Tên thú cưng:</strong> {{ $pet->name }}</p>
                    <p><strong>Loài:</strong> {{ $pet->species }}</p>
                    <p><strong>Tuổi:</strong> {{ $pet->age }} tuổi</p>
                    <p><strong>Chủ sở hữu:</strong> {{ $pet->user->name ?? 'Chưa rõ' }}</p>

                    @if($pet->user && $pet->user->phone)
                        <p><strong>SĐT:</strong> {{ $pet->user->phone }}</p>
                    @endif
                    @if($pet->user && $pet->user->email)
                        <p><strong>Email:</strong> {{ $pet->user->email }}</p>
                    @endif

                    {{-- Trạng thái --}}
                    @if($pet->is_lost)
                        <p><strong>Trạng thái:</strong> <span class="text-danger">🚨 Thất lạc</span></p>
                    @else
                        <p><strong>Trạng thái:</strong> <span class="text-success">✅ An toàn</span></p>
                    @endif
                </div>
            </div>

            <hr>

            {{-- QR Code giống chip CCCD --}}
            <div class="text-center">
                <h6 class="mb-2">📱 Quét QR để xem hồ sơ online</h6>
                <img src="{{ route('pets.qr.show', $pet->public_id) }}" alt="QR Code" style="height: 120px;">
            </div>
        </div>
    </div>
</div>
@endsection
