<x-app title="Register Course">


    <div class="container">

        <h5>Profile Detail</h5>

        <form action="{{ route('usercourse.store') }}" method="POST">
            @csrf

            <div class="row">
                <div class="col-12">
                    <div class="form-group mt-2">
                        <label for="course">Course</label>
                        <input type="text" name="course_name" id="course_name" class="form-control"
                            aria-describedby="helpId"
                            value="{{ $course->name }} @if (request()->routeIs('usercourse.online.create')) (Online) @else ()(Offline) @endif"
                            disabled>
                    </div>
                    <div class="form-group mt-2">
                        <label for="course">Cost</label>
                        <input type="text" name="course_cost" id="course_cost" class="form-control"
                            aria-describedby="helpId"
                            value="Rp. @if (request()->routeIs('usercourse.online.create')) {{ number_format($course->online->cost) }}@else{{ number_format($course->offline->cost) }} @endif
                            "
                            disabled>
                    </div>
                    @if (request()->routeIs('usercourse.online.create'))
                        <input type="hidden" name="online" value="1">
                    @else
                        <input type="hidden" name="offline" value="1">
                    @endif
                    <input type="hidden" name="course_id" value="{{ $course->id }}">
                    <input type="hidden" name="course_name"
                        value="{{ $course->name }} @if (request()->routeIs('usercourse.online.create')) (Online) @else ()(Offline) @endif">
                    @if (request()->routeIs('usercourse.online.create'))
                        <input type="hidden" name="course_cost" value="{{ $course->online->cost }}">
                    @else
                        <input type="hidden" name="course_cost" value="{{ $course->offline->cost }}">
                    @endif
                    <div class="form-group mt-4">
                        <label for="name">Fullname</label>
                        <input type="text" name="name" id="name"
                            class="form-control @error('name') is-invalid @enderror" placeholder="Insert your fullname"
                            aria-describedby="helpId" value="{{ old('name') ?? Auth::user()->name }}">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email"
                            class="form-control @error('email') is-invalid @enderror" placeholder="Insert your email"
                            aria-describedby="helpId" value="{{ old('email') ?? Auth::user()->email }}">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="phone">Phone</label>
                        <input type="number" name="phone" id="phone"
                            class="form-control @error('phone') is-invalid @enderror" placeholder="Insert your phone"
                            aria-describedby="helpId" value="{{ old('phone') ?? Auth::user()->phone }}">
                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="address">Address</label>
                        <input type="text" name="address" id="address"
                            class="form-control @error('address') is-invalid @enderror"
                            placeholder="Insert your address" aria-describedby="helpId" value="{{ old('address') }}">
                        @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group mt-2">
                        <label for="instance">Instance</label>
                        <input type="text" name="instance" id="instance"
                            class="form-control @error('instance') is-invalid @enderror"
                            placeholder="Insert your instance" aria-describedby="helpId" value="{{ old('instance') }}">
                        @error('instance')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            <button class="btn btn-primary">Submit</button>
        </form>
    </div>
</x-app>
