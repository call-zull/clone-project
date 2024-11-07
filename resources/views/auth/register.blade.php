<x-app-layouts>
    <div class="min-h-screen container-fluid d-flex">
        <div class="col-md-6 d-flex flex-column justify-content-center align-items-center">
            <div class="mb-4 text-center">
                <img src="{{ asset('assets/image/logo.svg') }}" alt="Logo" class="logo-img">
            </div>
            <div class="p-4 shadow-lg card" style="width: 500px; border-radius: 10px;">
                <div class="card-body">
                    <h3 class="mb-4 text-center" style="font-weight: bold;">Register</h3>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">{{ __('Name') }}</label>
                            <input id="name" type="text"
                                class="form-control @error('name') is-invalid @enderror" name="name"
                                value="{{ old('name') }}" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="nim" class="form-label">NIM</label>
                            <input id="nim" type="text" class="form-control @error('nim') is-invalid @enderror"
                                name="nim" value="{{ old('nim') }}">
                            @error('nim')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">No HP</label>
                            <input id="phone" type="text"
                                class="form-control @error('phone') is-invalid @enderror" name="phone"
                                value="{{ old('phone') }}">
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="position" class="form-label">Position</label>
                            <select id="position" name="position_id"
                                class="form-select @error('position_id') is-invalid @enderror">
                                <option value="">Select Position</option>
                                @foreach ($positions as $position)
                                    <option value="{{ $position->id }}"
                                        {{ old('position_id') == $position->id ? 'selected' : '' }}>
                                        {{ $position->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('position_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="major" class="form-label">Major</label>
                            <select id="major" name="major_id"
                                class="form-select @error('major_id') is-invalid @enderror">
                                <option value="">Select Major</option>
                                @foreach ($majors as $major)
                                    <option value="{{ $major->id }}"
                                        {{ old('major_id') == $major->id ? 'selected' : '' }}>
                                        {{ $major->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('major_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="batch" class="form-label">Batch</label>
                            <select id="batch" name="batch_id"
                                class="form-select @error('batch_id') is-invalid @enderror">
                                <option value="">Select Batch</option>
                                @foreach ($batches as $batch)
                                    <option value="{{ $batch->id }}"
                                        {{ old('batch_id') == $batch->id ? 'selected' : '' }}>
                                        {{ $batch->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('batch_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('Email Address') }}</label>
                            <input id="email" type="email"
                                class="form-control @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">{{ __('Password') }}</label>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password" class="form-control"
                                name="password_confirmation">
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-block" style="font-weight: bold;">
                                {{ __('Register') }}
                            </button>
                        </div>

                        <div class="mt-3 text-center">
                            <span>Already have an account? </span>
                            <a class="text-decoration-none" href="{{ route('login') }}">
                                login
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="bg-white col-md-6 d-flex align-items-center justify-content-center">
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
