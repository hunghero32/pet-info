@extends('layouts.guest')
@section('title', 'Tài Khoản Bị Khóa')
@section('content')
<div class="authentication-inner row m-0">
    <div class="d-none d-lg-flex col-lg-7 col-xl-8 align-items-center p-5">
        <div class="w-100 d-flex justify-content-center">
            <img src="../../assets/img/illustrations/boy-with-rocket-light.png" class="img-fluid" alt="Login image" width="700" data-app-dark-img="illustrations/boy-with-rocket-dark.png" data-app-light-img="illustrations/boy-with-rocket-light.png" />
        </div>
    </div>
    <div class="d-flex col-12 col-lg-5 col-xl-4 align-items-center authentication-bg p-sm-12 p-6">
        <div class="w-px-400 mx-auto">
            <div class="card shadow-none bg-transparent mb-4">
                <div class="card-body text-center p-5">
                    <div class="avatar avatar-xl mx-auto mb-4">
                        <span class="avatar-initial rounded-circle bg-label-danger">
                            <i class="bx bx-lock fs-1"></i>
                        </span>
                    </div>

                    <h4 class="mb-3 text-danger">Tài Khoản Đã Bị Khóa</h4>
                    <div class="alert alert-danger d-flex align-items-center mb-4" role="alert">
                        <i class="bx bx-info-circle me-2"></i>
                        <div>Tài khoản của bạn đã bị vô hiệu hóa.</div>
                    </div>

                    <div class="mb-4">
                        <p class="mb-2"><strong>Thông tin tài khoản:</strong></p>
                        <ul class="list-unstyled">
                            <li><i class="bx bx-user me-2"></i>{{ Auth::user()->name }}</li>
                            <li><i class="bx bx-envelope me-2"></i>{{ Auth::user()->email }}</li>
                            <li>
                                <i class="bx bx-time-five me-2"></i>
                                Thời gian khóa: {{ Auth::user()->updated_at->format('H:i:s d/m/Y') }}
                            </li>
                        </ul>
                    </div>

                    <div class="alert alert-secondary bg-label-secondary mb-4" role="alert">
                        <h6 class="alert-heading fw-bold mb-1">Cần hỗ trợ?</h6>
                        <p class="mb-0">Vui lòng liên hệ quản trị viên qua:</p>
                        <div class="mt-2">
                            <i class="bx bx-envelope me-1"></i> admin@tdz.com
                            <br>
                            <i class="bx bx-phone me-1"></i> 0123456789
                        </div>
                    </div>

                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger d-grid w-100">
                             Đăng Xuất
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection