@extends('layouts.guest')
@section('title', 'Xác thực email')
@section('content')
<div class="authentication-inner row m-0">
            <!-- /Left Text -->
            <div class="d-none d-lg-flex col-lg-7 col-xl-8 align-items-center p-5">
                <div class="w-100 d-flex justify-content-center">
                    <img src="../../assets/img/illustrations/boy-verify-email-light.png" class="img-fluid" alt="Login image" width="700" data-app-dark-img="illustrations/boy-verify-email-dark.png" data-app-light-img="illustrations/boy-verify-email-light.png" />
                </div>
            </div>
            <!-- /Left Text -->

            <!--  Verify email -->
            <div class="d-flex col-12 col-lg-5 col-xl-4 align-items-center authentication-bg p-sm-12 p-6">
                <div class="w-px-400 mx-auto mt-sm-12 mt-8">
                    <h4 class="mb-1">Xác thực email của bạn ✉️</h4>
                    <p class="text-start mb-0">Liên kết kích hoạt tài khoản đã được gửi đến email: <span class="fw-medium text-heading">{{ auth()->user()->email }}</span> Vui lòng kiểm tra email và làm theo hướng dẫn để tiếp tục.</p>
                    <a class="btn btn-primary w-100 my-6" href="{{ route('dashboard') }}">Bỏ qua</a>
                    <p class="text-center mb-0">
                        Không nhận được email?
                        <form class="d-inline" method="POST" action="{{ route('verification.send') }}">
                            @csrf
                            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">Gửi lại</button>.
                        </form>
                    </p>
                </div>
            </div>
            <!-- / Verify email -->
        </div>
@endsection
