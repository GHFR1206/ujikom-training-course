<x-app title="Login">
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="mt-1 mb-4 text-center">
                    <h5><b>Sign in to your account</b></h5>
                </div>
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <label for="email">{{ __('Email Address') }}</label>
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mt-n1">
                                <label for="password">{{ __('Password') }}</label>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    name="password"autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                    </div>
                </div>
                <div class="mb-n3 mt-3">
                    <button type="submit" class="btn btn-primary btn-block">
                        {{ __('Sign In') }}
                    </button>
                    <p class="mt-2">Don't have an account?
                        <a class="text-decoration-none" href="{{ route('register') }}">
                            {{ __('Sign Up') }}
                        </a>
                    </p>
                </div>
                </form>
            </div>
        </div>
    </div>
</x-app>
