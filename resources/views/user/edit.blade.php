<x-app>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="mt-1 mb-4 text-center">
                    <h5><b>Profile</b></h5>
                </div>
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('user.update', $user->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">{{ __('Name') }}</label>
                                <input id="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ old('name') ?? $user->name }}" autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mt-1">
                                <label for="email">{{ __('Email Address') }}</label>
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') ?? $user->email }}" autocomplete="email">

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
                                    value="{{ old('phone') ?? $user->phone }}" autocomplete="phone" autofocus>

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            @if (Auth::user()->role == 0)
                                <div class="form-group mt-n1">
                                    <label for="phone">{{ __('Role') }}</label>
                                    <select class="custom-select" id="inputGroupSelect01" name="role">
                                        <option value="0" @if ($user->role == 0) selected @endif>Admin
                                        </option>
                                        <option value="1" @if ($user->role == 1) selected @endif>User
                                        </option>
                                    </select>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            @endif
                    </div>
                </div>
                <div class="mb-2 mt-3">
                    <button type="submit" class="btn btn-primary btn-block">
                        Update
                    </button>
                </div>
                </form>
            </div>
        </div>
    </div>
</x-app>
