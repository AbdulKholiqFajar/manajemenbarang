@extends('authentication.layouts.app')

@section('title', 'Masuk')

@section('content')
<div class="d-flex justify-content-center align-items-center min-vh-100" style="background-image: url('{{ asset('images/bapekomlogin2.jpeg') }}'); background-size: cover; background-position: center;">
  <div class="col-lg-3 col-10">
    <div id="auth-left" class="w-100 p-4 bg-white shadow rounded" style="background-color: rgba(255, 255, 255, 0.9); border: 1px solid #ddd;">
      <div class="text-center mb-4">
        <img src="{{ asset('images/bapekom.jpg') }}" alt="Logo" class="img-fluid" style="max-width: 100px;">
      </div>
      <h1 class="auth-title text-center" style="color: #333;">Login</h1>
      <p class="auth-subtitle text-center mb-4" style="color: #666;">
        Login untuk melanjutkan.
      </p>
      @include('utilities.alert')
      <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="form-group position-relative has-icon-left mb-3">
          <input type="email" name="email" class="form-control form-control-xl" placeholder="Email"
            value="{{ old('email') }}" autofocus required style="background-color: #fff; border: 1px solid #ccc; color: #333;" />
          <div class="form-control-icon">
            <i class="bi bi-person"></i>
          </div>
          @error('email', 'authentication')
          <div class="d-block invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="form-group position-relative has-icon-left mb-3">
          <input type="password" name="password" id="password" class="form-control form-control-xl" placeholder="Password" required style="background-color: #fff; border: 1px solid #ccc; color: #333;" />
          <div class="form-control-icon">
            <i class="bi bi-shield-lock"></i>
          </div>
          <div class="form-control-icon-right position-absolute end-0 top-50 translate-middle-y me-3" onclick="togglePassword()" style="cursor: pointer;">
            <i id="togglePasswordIcon" class="bi bi-eye"></i>
          </div>
          @error('password', 'authentication')
          <div class="d-block invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="form-check form-check-lg d-flex align-items-end">
          <input class="form-check-input me-2" type="checkbox" value="" id="flexCheckDefault" />
          <label class="form-check-label text-gray-600" for="flexCheckDefault" style="color: #666;">
            Keep me logged in
          </label>
        </div>
        <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-4" style="background-color: #007bff; border: none;">
          Login
        </button>
      </form>
    </div>
  </div>
</div>

<script>
function togglePassword() {
  const passwordField = document.getElementById('password');
  const togglePasswordIcon = document.getElementById('togglePasswordIcon');
  if (passwordField.type === 'password') {
    passwordField.type = 'text';
    togglePasswordIcon.classList.remove('bi-eye');
    togglePasswordIcon.classList.add('bi-eye-slash');
  } else {
    passwordField.type = 'password';
    togglePasswordIcon.classList.remove('bi-eye-slash');
    togglePasswordIcon.classList.add('bi-eye');
  }
}
</script>
@endsection