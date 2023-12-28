<x-app title="Registered Course">
    <div class="container">
        <h3 class="mb-5">Registered Course</h3>
        <table class="table">
            <thead>
                <tr class="text-center">
                    <th>No</th>
                    <th colspan="2">Product</th>
                    <th>Type</th>
                    <th>Confirmed</th>
                    <th>Subtotal</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($usercourses as $index => $usercourse)
                    @if ($usercourse->course_id == null)
                        <tr class="text-center">
                            <td>{{ $index + $usercourses->firstItem() }}</td>
                            <td colspan="5">Course is either closed or deleted</td>
                            <td>
                                <a href="#" class="btn btn-danger mt-1 align-bottom"
                                    onclick="event.preventDefault();
                                                document.getElementById('delete-form').submit();"><i
                                        class="fas fa-trash-can"></i></a>
                                <form action="{{ route('usercourse.destroy', $usercourse->id) }}" id="delete-form"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                    @else
                        <tr class="text-center">
                            <td>{{ $index + $usercourses->firstItem() }}</td>
                            <td><img src="{{ asset('storage/images/' . $usercourse->course->image) }}"
                                    style="width: 200px" alt="" srcset="">
                            </td>
                            <td>{{ $usercourse->course->name }}</td>
                            <td>
                                @if ($usercourse->online == 1 && $usercourse->offline == 0)
                                    Online
                                @elseif($usercourse->online == 0 && $usercourse->offline == 1)
                                    Offline
                                @else
                                    Online & Offline
                                @endif
                            </td>
                            <td>
                                @if ($usercourse->confirmed == 1)
                                    <i class="fas fa-check"></i>
                                @else
                                    <i class="fas fa-xmark"></i>
                                @endif
                            </td>
                            <td>
                                @if ($usercourse->online == 1 && $usercourse->offline == 0)
                                    Rp. {{ number_format($usercourse->course->online->cost) }}
                                @elseif($usercourse->online == 0 && $usercourse->offline == 1)
                                    Rp. {{ number_format($usercourse->course->offline->cost) }}
                                @else
                                    Rp.
                                    {{ number_format($usercourse->course->online->cost + $usercourse->course->offline->cost) }}
                                @endif
                            </td>
                            @if ($usercourse->confirmed == 0)
                                <td>
                                    <form method="POST" action="{{ route('usercourse.destroy', $usercourse->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-xs btn-danger btn-flat show_confirm_user"
                                            data-toggle="tooltip" title='Delete'
                                            data-name="{{ $usercourse->course->name }}"><i class="fa fa-trash"
                                                aria-hidden="true"></i></button>
                                    </form>
                                </td>
                            @else
                                <td>
                                    <p>Please <a class="text-decoration-none"
                                            href="https://api.whatsapp.com/send?phone=6289513117552"
                                            target="_blank">contact our
                                            admin</a> to cancel this course</p>
                                </td>
                            @endif
                        </tr>
                    @endif
                @empty
                    <tr class="text-center">
                        <td colspan="7">You havent registered to any courses</td>
                    </tr>
                @endforelse

            </tbody>
        </table>
        {{ $usercourses->links() }}
    </div>
</x-app>
