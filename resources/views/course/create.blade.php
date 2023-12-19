<x-app>
    <div class="container">


        <form action="{{ route('course.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-6">
                    <h5>Course Setting</h5>
                    <div class="form-group mt-2">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name"
                            class="form-control @error('name') is-invalid @enderror" placeholder="Insert course's name"
                            aria-describedby="helpId" value="{{ old('name') }}">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="desc">Description</label>
                        <textarea name="desc" id="desc" class="form-control @error('desc') is-invalid @enderror"
                            placeholder="Insert course's description" aria-describedby="helpId" value="{{ old('desc') }}"></textarea>
                        @error('desc')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="image">Image</label>
                        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                        @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="lecture">Lecture</label>
                        <input type="number" name="lecture" id="lecture"
                            class="form-control @error('lecture') is-invalid @enderror"
                            placeholder="Insert course's lecture" aria-describedby="helpId"
                            value="{{ old('lecture') }}">
                        @error('lecture')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="quiz">Quiz</label>
                        <input type="number" name="quiz" id="quiz"
                            class="form-control @error('quiz') is-invalid @enderror" placeholder="Insert course's quiz"
                            aria-describedby="helpId" value="{{ old('quiz') }}">
                        @error('quiz')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="duration">Duration</label>
                        <input type="number" name="duration" id="duration"
                            class="form-control @error('duration') is-invalid @enderror"
                            placeholder="Insert course's duration" aria-describedby="helpId"
                            value="{{ old('duration') }}">

                        @error('duration')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="location">Location</label>
                        <input type="text" name="location" id="location"
                            class="form-control @error('location') is-invalid @enderror"
                            placeholder="Insert course's location" aria-describedby="helpId"
                            value="{{ old('location') }}">
                        @error('location')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="language">Language</label>
                        <div class="input-group mb-3">
                            <select class="custom-select" id="inputGroupSelect01" name="language">
                                <option selected disabled>Choose...</option>
                                <option value="english">English</option>
                                <option value="indonesia">Bahasa Indonesia</option>
                            </select>
                        </div>

                        @error('language')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="certificate">Certificate</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="certificate" value="1" checked>
                            <label class="form-check-label">
                                Yes
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="certificate" value="0">
                            <label class="form-check-label">
                                No
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <h5>Online Course</h5>
                    <div class="form-group mt-2">
                        <label for="cost">Cost</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                Rp.
                            </div>
                            <input type="number" name="online_cost" id="cost"
                                class="form-control @error('online_cost') is-invalid @enderror"
                                placeholder="Insert course's cost" aria-describedby="helpId"
                                value="{{ old('online_cost') }}">
                            @error('online_cost')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                    </div>
                    <div class="form-group mt-2">
                        <label for="start_date">Start Date</label>
                        <input type="date" name="online_start_date" id="start_date"
                            class="form-control @error('online_start_date') is-invalid @enderror"
                            placeholder="Insert course's start_date" aria-describedby="helpId"
                            value="{{ old('online_start_date') }}">
                        @error('online_start_date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="end-date">End Date</label>
                        <input type="date" name="online_end_date" id="end-date"
                            class="form-control @error('online_end-date') is-invalid @enderror"
                            placeholder="Insert course's end-date" aria-describedby="helpId"
                            value="{{ old('online_end') }}">
                        @error('online_end-date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <h5 class="mt-5">Offline Course</h5>
                    <div class="form-group mt-2">
                        <label for="cost">Cost</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                Rp.
                            </div>
                            <input type="number" name="offline_cost" id="cost"
                                class="form-control @error('offline_cost') is-invalid @enderror"
                                placeholder="Insert course's cost" aria-describedby="helpId"
                                value="{{ old('offline_cost') }}">
                            @error('offline_cost')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                    </div>
                    <div class="form-group mt-2">
                        <label for="start_date">Start Date</label>
                        <input type="date" name="offline_start_date" id="start_date"
                            class="form-control @error('offline_start_date') is-invalid @enderror"
                            placeholder="Insert course's start_date" aria-describedby="helpId"
                            value="{{ old('offline_start_date') }}">
                        @error('offline_start_date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="end-date">End Date</label>
                        <input type="date" name="offline_end_date" id="end-date"
                            class="form-control @error('offline_end_date') is-invalid @enderror"
                            placeholder="Insert course's end-date" aria-describedby="helpId"
                            value="{{ old('offline_end_date') }}">
                        @error('offline_end_date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            <button class="btn btn-primary" type="submit">Submit</button>
        </form>

    </div>
</x-app>
