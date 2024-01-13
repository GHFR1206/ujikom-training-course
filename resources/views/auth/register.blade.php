<x-app title="Register">
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="mt-1 mb-4 text-center">
                    <h5><b>Create an account</b></h5>
                </div>
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group">
                                <label for="name">{{ __('Name') }}</label>
                                <input id="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ old('name') }}" autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mt-n1">
                                <label for="email">{{ __('Email Address') }}</label>
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mt-n1">
                                <label for="phone">{{ __('Phone') }}</label>
                                <input id="phone" type="number"
                                    class="form-control @error('phone') is-invalid @enderror" name="phone"
                                    value="{{ old('phone') }}" autocomplete="phone" autofocus>

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            @auth
                                @if (Auth::user()->role == 0)
                                    <div class="form-group mt-n1">
                                        <label for="role">{{ __('Roles') }}</label>
                                        <select class="custom-select" id="inputGroupSelect01" name="role">
                                            <option selected disabled>Choose...</option>
                                            <option value="0">Admin</option>
                                            <option value="1">Employee</option>
                                            <option value="2">User</option>
                                        </select>

                                        @error('role')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                @endif
                            @endauth

                            <div class="form-group mt-n1">
                                <label for="password">{{ __('Password') }}</label>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mt-n1">
                                <label for="password-confirm">{{ __('Confirm Password') }}</label>
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" autocomplete="new-password">
                            </div>
                    </div>
                </div>
                <div class="mb-n3 mt-3">
                    <button type="submit" class="btn btn-primary btn-block">
                        {{ __('Sign Up') }}
                    </button>
                    <p class="mt-2">Already have an account?
                        <a class="text-decoration-none" href="{{ route('login') }}">
                            {{ __('Sign In') }}
                        </a>
                    </p>
                </div>
                </form>
            </div>
        </div>
    </div>
</x-app>
