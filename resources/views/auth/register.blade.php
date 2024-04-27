@php
$customizerHidden = 'customizer-hide';
$configData = Helper::appClasses();
@endphp

@extends('layouts/blankLayout')

@section('title', 'Register Page')

@section('page-style')
<!-- Page -->
@vite('resources/assets/vendor/scss/pages/page-auth.scss')
@endsection

@section('content')
<div class="authentication-wrapper authentication-cover authentication-bg">
  <div class="authentication-inner row">
    <!-- /Left Text -->
    <div class="d-none d-lg-flex col-lg-7 p-0">
      <div class="auth-cover-bg auth-cover-bg-color d-flex justify-content-center align-items-center">
        <img src="{{ asset('assets/img/logo/bg-create.jpg') }}" alt="auth-register-cover" class="img-fluid my-5 auth-illustration" >

        <img src="{{ asset('assets/img/illustrations/bg-shape-image-'.$configData['style'].'.png') }}" alt="auth-register-cover" class="platform-bg" data-app-light-img="illustrations/bg-shape-image-light.png" data-app-dark-img="illustrations/bg-shape-image-dark.png">
      </div>
    </div>
    <!-- /Left Text -->

    <!-- Register -->
    <div class="d-flex col-12 col-lg-5 align-items-center p-sm-5 p-4">
      <div class="w-px-400 mx-auto">
        <!-- Logo -->
        <div class="app-brand mb-3">
          <a href="{{ url('/') }}" class="app-brand-link gap-2">
            <span class="mt-4"><img src="{{ asset('assets\img\logo\bbox-express-logo.png') }}"
                    alt="logo" width="45" height="45"
                    style="margin-top: -25px;" /></span>
            <span
                class="app-brand-text demo text-body fw-bold ms-1">{{ config('variables.templateName') }}</span>
        </a>
        </div>
        <!-- /Logo -->
        <h5 class="mb-1">Adventure starts here 🚀</h5>
        <p class="mb-4">Make your app management easy and fun!</p>
        {{-- alerts --}}
      @if (session()->has('success'))
      <div id="alertDiv" class="alert alert-success d-flex align-items-center" role="alert">
        <span class="alert-icon text-success me-2">
          <i class="ti ti-user ti-xs"></i>
        </span>
        {{session('success')}}
      </div>
      @endif
      
        <form id="formAuthentication" class="mb-3" action="/verification" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="mb-3">
            <label for="Name" class="form-label">Full Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="johndoe" autofocus value="{{ old('name') }}" />
            <input type="text" class="form-control d-none" id="role" name="role" value="Vendor" />
            <input type="text" class="form-control d-none" id="time" name="time" value="{{time()}}" />
            <input type="text" class="form-control d-none" id="status" name="status" value="None-verified" />
            @error('name')
            <span class="invalid-feedback" role="alert">
              <span class="fw-medium">{{ $message }}</span>
            </span>
            @enderror
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="john@example.com" value="{{ old('email') }}" />
            @error('email')
            <span class="invalid-feedback" role="alert">
              <span class="fw-medium">{{ $message }}</span>
            </span>
            @enderror
          </div>
          <div class="mb-3">
            <label for="company" class="form-label">Company</label>
            <input type="text" class="form-control @error('company') is-invalid @enderror" id="company" name="company" placeholder="Example Company" value="{{ old('company') }}" />
            @error('company')
            <span class="invalid-feedback" role="alert">
              <span class="fw-medium">{{ $message }}</span>
            </span>
            @enderror
          </div>
          <div class="mb-3">
            <label for="company" class="form-label">Documents: Business Registration, Tax Registration, Financial Documents, Compliance Certificates, Product Certification</label>
            <input type="file" multiple class="form-control @error('files') is-invalid @enderror" id="files" name="upload" />
            @error('files')
            <span class="invalid-feedback" role="alert">
              <span class="fw-medium">{{ $message }}</span>
            </span>
            @enderror
          </div>
          <div class="mb-3 form-password-toggle">
            <label class="form-label" for="password">Password</label>
            <div class="input-group input-group-merge @error('password') is-invalid @enderror">
              <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
              <span class="input-group-text cursor-pointer">
                <i class="ti ti-eye-off"></i>
              </span>
            </div>
            @error('password')
            <span class="invalid-feedback" role="alert">
              <span class="fw-medium">{{ $message }}</span>
            </span>
            @enderror
          </div>

          <div class="mb-3 form-password-toggle">
            <label class="form-label" for="password-confirm">Confirm Password</label>
            <div class="input-group input-group-merge">
              <input type="password" id="password-confirm" class="form-control" name="password_confirmation" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
              <span class="input-group-text cursor-pointer">
                <i class="ti ti-eye-off"></i>
              </span>
            </div>
          </div>
          @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
            <div class="mb-3">
              <div class="form-check @error('terms') is-invalid @enderror">
                <input class="form-check-input @error('terms') is-invalid @enderror" type="checkbox" id="terms" name="terms" />
                <label class="form-check-label" for="terms">
                  I agree to the
                  <a href="{{ route('policy.show') }}" target="_blank">privacy policy</a> &
                  <a href="{{ route('terms.show') }}" target="_blank">terms</a>
                </label>
              </div>
              @error('terms')
                <div class="invalid-feedback" role="alert">
                    <span class="fw-medium">{{ $message }}</span>
                </div>
              @enderror
            </div>
          @endif
          <button type="submit" class="btn btn-primary d-grid w-100">Sign up</button>
        </form>

        <p class="text-center mt-2">
          <span>Already have an account?</span>
          @if (Route::has('login'))
          <a href="{{ route('login') }}">
            <span>Sign in instead</span>
          </a>
          @endif
        </p>

      </div>
    </div>
    <!-- /Register -->
  </div>
</div>
<script>
	setTimeout(function () {
    document.getElementById('alertDiv').remove();
}, 3000);
</script>
@endsection