<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            background: linear-gradient(135deg, #e0f7fa, #ffffff);
            border: 2px solid #009688;
            border-radius: 12px;
            padding: 10px;
            position: relative;
            overflow: hidden;
        }
        .watermark {
            position: absolute;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='100' height='100' fill='%23b2dfdb' opacity='0.1'%3E%3Ctext x='10' y='60' font-size='60'%3E🐾%3C/text%3E%3C/svg%3E");
            background-repeat: repeat;
            background-size: 100px;
            z-index: 0;
        }
        .content { position: relative; z-index: 1; }
        .header { text-align: center; margin-bottom: 5px; }
        .header h4 { margin: 0; color: #00695c; font-size: 14px; }
        .header small { color: #555; }
        .row { display: flex; }
        .col-left { width: 35%; text-align: center; }
        .col-right { width: 65%; padding-left: 10px; font-size: 12px; }
        img.photo { width: 100px; height: 120px; object-fit: cover; border-radius: 6px; }
        img.qr { width: 80px; margin-top: 5px; }
    </style>
</head>
<body>
    <div class="watermark"></div>
    <div class="content">
        <div class="header">
            <h4>CỘNG HÒA XÃ HỘI CHỦ NHÂN PET</h4>
            <small>THẺ CĂN CƯỚC THÚ CƯNG</small>
        </div>

        <div class="row">
            <div class="col-left">
                @if($pet->photo)
                    <img src="{{ public_path('storage/' . $pet->photo) }}" class="photo">
                @else
                    <img src="{{ public_path('no-image.png') }}" class="photo">
                @endif
                <p><strong>{{ strtoupper($pet->name) }}</strong></p>
            </div>
            <div class="col-right">
                <p><b>Tên thú cưng:</b> {{ $pet->name }}</p>
                <p><b>Loài:</b> {{ $pet->species }}</p>
                <p><b>Tuổi:</b> {{ $pet->age }}</p>
                <p><b>Chủ:</b> {{ $pet->user->name ?? 'Chưa rõ' }}</p>
                <p><b>SĐT:</b> {{ $pet->user->phone ?? '-' }}</p>
                <p><b>Email:</b> {{ $pet->user->email ?? '-' }}</p>
                <p><b>Trạng thái:</b>
                    @if($pet->is_lost)
                        🚨 Thất lạc
                    @else
                        ✅ An toàn
                    @endif
                </p>
            </div>
        </div>

        <div style="text-align: center; margin-top: 5px;">
            <small>Quét mã để xem hồ sơ online</small><br>
            <img src="{{ public_path('qrcodes/'.$pet->public_id.'.png') }}" class="qr">
        </div>
    </div>
</body>
</html>
