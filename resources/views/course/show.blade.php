<x-app title="Detail">
    <div class="container mt-4">
        <div class="row">
            <div class="col-10">
                <h2>{{ $course->name }}</h2>
                <div style="border-bottom: 2px black solid"></div>
                <div class="row mt-4">
                    <div class="col-4"><img src="{{ asset('storage/images/' . $course->image) }}" class="mr-3"
                            style="width: 300px" alt=""></div>
                    <div class="col-8">
                        <p>{{ $course->desc }}</p>
                    </div>


                </div>
            </div>
            <div class="col-2">
                <div class="head">
                    <h4>COURSE FEATURES</h4>
                </div>
                <div style="border-bottom: 2px black solid"></div>
                <div class="body">
                    <div class="course-features mt-3">
                        <div class="row">
                            <div class="col-6">
                                Lectures
                            </div>
                            <div class="col-6 mb-3">
                                {{ $course->lecture }}
                            </div>

                            <div class="col-6">
                                Quizzes
                            </div>
                            <div class="col-6 mb-3">
                                {{ $course->quiz }}
                            </div>

                            <div class="col-6">
                                Duration
                            </div>
                            <div class="col-6 mb-3">
                                {{ $course->duration }} Hours
                            </div>

                            <div class="col-6">
                                Language
                            </div>
                            <div class="col-6 mb-3">
                                {{ $language }}
                            </div>

                            <div class="col-6">
                                Certificate
                            </div>
                            <div class="col-6 mb-3">
                                {{ $certificate }}
                            </div>

                            @if ($course->online_id != null)
                                <h4 class="mt-4">ONLINE</h4>
                                <div style="border-bottom: 2px black solid" class="mb-3"></div>

                                <div class="col-6">
                                    Start Date
                                </div>
                                <div class="col-6 mb-3">
                                    {{ $course->online->start_date }}
                                </div>

                                <div class="col-6">
                                    End Date
                                </div>
                                <div class="col-6 mb-3">
                                    {{ $course->online->end_date }}
                                </div>

                                <div class="col-6">
                                    Cost
                                </div>
                                <div class="col-6 mb-3">
                                    Rp.{{ number_format($course->online->cost) }}
                                </div>

                                <div class="col-6">
                                    Registered
                                </div>
                                <div class="col-6 mb-3">
                                    {{ $online_registered }}
                                </div>

                                <div class="col-6">
                                    Confirmed
                                </div>
                                <div class="col-6 mb-3">
                                    {{ $online_confirmed }}
                                </div>
                                <a href="{{ route('usercourse.online.create', $course->id) }}"
                                    class="btn btn-primary mb-3">Register</a>
                            @endif

                            @if ($course->offline_id != null)
                                <h4 class="mt-4">OFFLINE</h4>
                                <div style="border-bottom: 2px black solid" class="mb-3"></div>

                                <div class="col-6">
                                    Start Date
                                </div>
                                <div class="col-6 mb-3">
                                    {{ $course->offline->start_date }}
                                </div>

                                <div class="col-6">
                                    End Date
                                </div>
                                <div class="col-6 mb-3">
                                    {{ $course->offline->end_date }}
                                </div>

                                <div class="col-6">
                                    Cost
                                </div>
                                <div class="col-6 mb-3">
                                    Rp.{{ number_format($course->offline->cost) }}
                                </div>

                                <div class="col-6">
                                    Registered
                                </div>
                                <div class="col-6 mb-3">
                                    {{ $offline_registered }}
                                </div>

                                <div class="col-6">
                                    Confirmed
                                </div>
                                <div class="col-6 mb-3">
                                    {{ $offline_confirmed }}
                                </div>
                                <a href="{{ route('usercourse.offline.create', $course->id) }}"
                                    class="btn btn-primary mb-3">Register</a>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app>
