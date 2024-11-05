<x-app-layouts>
    <div class="container-fluid d-flex min-vh-100">
        <div class="col-lg-6 d-flex flex-column justify-content-center align-items-center">
            <div class="mb-4 text-center">
                <img src="{{ asset('assets/image/logo.svg') }}" alt="Logo" class="logo-img">
            </div>
            <div class="p-4 shadow-lg card" style="width: 500px; border-radius: 10px;">
                <div class="card-body">
                    <h3 class="mb-4 text-center" style="font-weight: bold;">Login</h3>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('Email Address') }}</label>
                            <input id="email" type="email"
                                class="form-control @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">{{ __('Password') }}</label>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3 d-flex justify-content-between align-items-center">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>

                            @if (Route::has('password.request'))
                                <a class="text-decoration-none" href="{{ route('password.request') }}">
                                    Lupa Password
                                </a>
                            @endif
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-block" style="font-weight: bold;">
                                {{ __('Login') }}
                            </button>
                        </div>
                        @if (Route::has('register'))
                            <div class="mt-3 text-center">
                                <span>{{ __("Don't have an account?") }}</span>
                                <a class="text-decoration-none" href="{{ route('register') }}">
                                    {{ __('Register') }}
                                </a>
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>

        <div class="bg-white col-lg-6 d-flex align-items-center justify-content-center">
            <div class="text-center">
                <div class="mb-4 text-center">
                    <img src="{{ asset('assets/image/logo.svg') }}" alt="Logo" class="logo-img">
                </div>
                <div class="w-100">
                    <img src="{{ asset('assets/image/foto-login.png') }}" alt="Gambar Ilustrasi"
                        class="rounded img-fluid" style="width: 100%; height: auto; object-fit: cover;">
                </div>

            </div>
        </div>
    </div>
</x-app-layouts>
