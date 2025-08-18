@extends('layouts.guest')
@section('title', 'Đăng Ký')
@section('content')
<div class="authentication-inner row m-0">
    <!-- /Left Text -->
    <div class="d-none d-lg-flex col-lg-7 col-xl-8 align-items-center p-5">
        <div class="w-100 d-flex justify-content-center">
            <img src="{{ asset('assets/img/illustrations/girl-with-laptop-light.png') }}" class="img-fluid scaleX-n1-rtl" alt="Login image" width="700" data-app-dark-img="illustrations/girl-with-laptop-dark.png" data-app-light-img="illustrations/girl-with-laptop-light.png" />
        </div>
    </div>
    <!-- /Left Text -->

    <!-- Register -->
    <div class="d-flex col-12 col-lg-5 col-xl-4 align-items-center authentication-bg p-sm-12 p-6">
        <div class="w-px-400 mx-auto mt-sm-12 mt-8">
            <h4 class="mb-1">Hành trình bắt đầu từ đây 🚀</h4>
            <p class="mb-6">Quản lý ứng dụng của bạn dễ dàng và thú vị!</p>

            <form id="formAuthentication" class="mb-6" action="{{ route('register') }}" method="POST">
                @csrf
                <div class="mb-6 form-control-validation">
                    <label for="name" class="form-label">Tên đăng nhập</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" 
                           id="name" name="name" value="{{ old('name') }}"
                           placeholder="Nhập tên đăng nhập" autofocus />
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-6 form-control-validation">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" 
                           id="email" name="email" value="{{ old('email') }}"
                           placeholder="Nhập email của bạn" />
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-password-toggle form-control-validation">
                    <label class="form-label" for="password">Mật khẩu</label>
                    <div class="input-group input-group-merge">
                        <input type="password" id="password" 
                               class="form-control @error('password') is-invalid @enderror"
                               name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                        <span class="input-group-text cursor-pointer"><i class="icon-base bx bx-hide"></i></span>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-password-toggle form-control-validation mt-3">
                    <label class="form-label" for="password_confirmation">Xác nhận mật khẩu</label>
                    <div class="input-group input-group-merge">
                        <input type="password" id="password_confirmation"
                               class="form-control"
                               name="password_confirmation" 
                               placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                        <span class="input-group-text cursor-pointer"><i class="icon-base bx bx-hide"></i></span>
                    </div>
                </div>
                <div class="my-7 form-control-validation">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms" />
                        <label class="form-check-label" for="terms-conditions">
                            Tôi đồng ý với
                            <a href="javascript:void(0);">chính sách bảo mật & điều khoản</a>
                        </label>
                    </div>
                </div>
                <button class="btn btn-primary d-grid w-100">Đăng ký</button>
            </form>

            <p class="text-center">
                <span>Đã có tài khoản?</span>
                <a href="{{ route('login') }}">
                    <span>Đăng nhập ngay</span>
                </a>
            </p>

            <div class="divider my-6">
                <div class="divider-text">hoặc</div>
            </div>

            <div class="d-flex justify-content-center">
                <a href="javascript:;" class="btn btn-sm btn-icon rounded-circle btn-text-facebook me-1_5">
                    <i class="icon-base bx bxl-facebook-circle icon-20px"></i>
                </a>

                <a href="javascript:;" class="btn btn-sm btn-icon rounded-circle btn-text-twitter me-1_5">
                    <i class="icon-base bx bxl-twitter icon-20px"></i>
                </a>

                <a href="javascript:;" class="btn btn-sm btn-icon rounded-circle btn-text-github me-1_5">
                    <i class="icon-base bx bxl-github icon-20px"></i>
                </a>

                <a href="javascript:;" class="btn btn-sm btn-icon rounded-circle btn-text-google-plus">
                    <i class="icon-base bx bxl-google icon-20px"></i>
                </a>
            </div>
        </div>
    </div>
    <!-- /Register -->
</div>
@endsection