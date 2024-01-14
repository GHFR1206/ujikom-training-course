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
                                    Location : <b>{{ $course->location }}</b>
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

    <footer style="margin-top:200px">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-6 align-bottom">
                    <img src="{{ asset('images/smart-logo.jpg') }}" width="180px" alt="" srcset="">
                    <p class="mt-2" style="margin-bottom:-1px"><i class="fab fa-whatsapp"></i> <a
                            class="text-decoration-none text-secondary"
                            href="https://api.whatsapp.com/send?phone=6289513117552" target="_blank">(+62) 895 1311
                            7552</a></p>
                    <p><i class="fas fa-envelope"></i> <a class="text-decoration-none text-secondary"
                            href="mailto:smartinsightid@gmail.com" target="_blank">smartinsightid@gmail.com</a></p>
                </div>
                <div class="col-6 d-flex justify-content-end">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.5225628008643!2d106.8129577!3d-6.5817704!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c56361b38397%3A0xbdba4d9367f2ae2a!2sReaksi%20Coworking%20Space!5e0!3m2!1sid!2sid!4v1705229819376!5m2!1sid!2sid"
                        width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </footer>
</x-app>

<x-footer-component></x-footer-component>
