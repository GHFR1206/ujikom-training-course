<x-app>
    <div class="container">
        <div class="row justify-content-center">
            @foreach ($courses as $course)
                <div class="col-10 mt-5">
                    <div class="card">
                        <div class="card-header text-center mt-1">
                            <a href="{{ route('course.show', $course->id) }}" class="text-decoration-none text-secondary">
                                <h5><b>{{ $course->name }}</b></h5>
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-3"><a href="{{ route('course.show', $course->id) }}"><img
                                            src="{{ asset('storage/images/' . $course->image) }}" style="width:100%"
                                            alt="" srcset=""></a></div>
                                <div class="col-9">
                                    <p>{{ Str::words($course->desc, 4, '...') }}</p>
                                    <div class="mt-n2 mb-2" style="border-top: 2px black solid"></div>
                                    Lokasi : <b>{{ $course->location }}</b>
                                    <table class="table table-borderless mb-5">
                                        <thead class="thead">
                                            <tr>
                                                <th scope="col">Type</th>
                                                <th scope="col">Cost</th>
                                                <th scope="col">Start Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($course->online_id)
                                                <tr>
                                                    <th>Online</th>
                                                    <td>Rp. {{ number_format($course->online->cost) }}</td>
                                                    <td>{{ $course->online->start_date }}</td>
                                                </tr>
                                            @endif

                                            @if ($course->offline_id)
                                                <tr>
                                                    <th>Offline</th>
                                                    <td>Rp. {{ number_format($course->offline->cost) }}</td>
                                                    <td>{{ $course->offline->start_date }}</td>
                                                </tr>
                                            @endif

                                        </tbody>
                                    </table>
                                    <div class="align-bottom">
                                        <a href="{{ route('course.show', $course->id) }}"
                                            class="btn btn-secondary btn-block align-bottom">More
                                            info..</a>
                                        @auth
                                            @if (Auth::user()->role == 0)
                                                <div class="d-flex mt-1">
                                                    <a class="btn btn-xs btn-warning btn-flat text-white mr-1"
                                                        href="{{ route('course.edit', $course->id) }}"><i
                                                            class="fa fa-pencil-square" aria-hidden="true"></i></a>
                                                    <form method="POST"
                                                        action="{{ route('course.destroy', $course->id) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="btn btn-xs btn-danger btn-flat show_confirm mr-1"
                                                            data-toggle="tooltip" data-name="{{ $course->name }}"><i
                                                                class="fa fa-trash" aria-hidden="true"></i></button>
                                                    </form>
                                                    <a href="{{ route('usercourse.show', $course->id) }}"
                                                        class="btn btn-primary">Show
                                                        registered user</a>
                                                </div>
                                            @endif
                                        @endauth
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mt-3">
            {{ $courses->links() }}
        </div>
    </div>
</x-app>
