@extends('layouts.guest')
@section('title', 'Đặt lại mật khẩu')
@section('content')
<div class="authentication-inner row m-0">
    <!-- /Left Text -->
    <div class="d-none d-lg-flex col-lg-7 col-xl-8 align-items-center p-5">
        <div class="w-100 d-flex justify-content-center">
            <img src="{{ asset('assets/img/illustrations/reset-password-light.png') }}" class="img-fluid" alt="Reset password" width="700" />
        </div>
    </div>

    <!-- Reset Password -->
    <div class="d-flex col-12 col-lg-5 col-xl-4 align-items-center authentication-bg p-sm-12 p-6">
        <div class="w-px-400 mx-auto mt-sm-12 mt-8">
            <h4 class="mb-1">Đặt lại mật khẩu 🔒</h4>
            <p class="mb-6">Nhập mật khẩu mới của bạn</p>

            <form id="formAuthentication" method="POST" action="{{ route('password.store') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $request->route('token') }}">
                <div class="mb-6 form-control-validation">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                           id="email" name="email" value="{{ old('email', $request->email) }}" readonly />
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-6 form-password-toggle form-control-validation">
                    <label class="form-label" for="password">Mật khẩu mới</label>
                    <div class="input-group input-group-merge">
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                               id="password" name="password"
                               placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                        <span class="input-group-text cursor-pointer"><i class="icon-base bx bx-hide"></i></span>
                    </div>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-6 form-password-toggle form-control-validation">
                    <label class="form-label" for="password_confirmation">Xác nhận mật khẩu</label>
                    <div class="input-group input-group-merge">
                        <input type="password" class="form-control"
                               id="password_confirmation" name="password_confirmation"
                               placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                        <span class="input-group-text cursor-pointer"><i class="icon-base bx bx-hide"></i></span>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary d-grid w-100 mb-6">
                    Đặt lại mật khẩu
                </button>

                <div class="text-center">
                    <a href="{{ route('login') }}" class="d-flex align-items-center justify-content-center">
                        <i class="bx bx-chevron-left me-1_5 align-top"></i>
                        Quay lại đăng nhập
                    </a>
                </div>
            </form>
        </div>
    </div>
    <!-- /Reset Password -->
</div>
@endsection