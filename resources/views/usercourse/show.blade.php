<x-app title="Registered User">
    <div class="container">
        <h3>Registered User</h3>

        <table class="table mt-5">
            <thead>
                <tr class="text-center">
                    <th>No</th>
                    <th>Type</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Instance</th>
                    <th>Confirmed</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($usercourses as $index => $usercourse)
                    <tr class="text-center">
                        <td>{{ $index + $usercourses->firstItem() }}</td>
                        <td>
                            @if ($usercourse->online == 1)
                                Online
                            @else
                                Offline
                            @endif
                        </td>
                        <td>{{ $usercourse->name }}</td>
                        <td>{{ $usercourse->email }}</td>
                        <td>{{ $usercourse->phone }}</td>
                        <td>{{ $usercourse->address }}</td>
                        <td>{{ $usercourse->instance }}</td>
                        <td>
                            @if ($usercourse->confirmed == 1)
                                <i class="fa fa-check" aria-hidden="true"></i>
                            @else
                                <i class="fas fa-x" aria-hidden="true"></i>
                            @endif
                        </td>
                        <td class="d-flex justify-content-center">
                            <form method="POST" class="mr-1"
                                action="{{ route('usercourse.destroy', $usercourse->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-xs btn-danger btn-flat show_confirm"
                                    data-toggle="tooltip" title='Delete' data-name="{{ $usercourse->course->name }}"><i
                                        class="fa fa-trash" aria-hidden="true"></i></button>
                            </form>
                            @if ($usercourse->confirmed == 0)
                                <form method="POST" class="mr-1"
                                    action="{{ route('usercourse.update', $usercourse->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-xs btn-success btn-flat"><i
                                            class="fa fa-check" aria-hidden="true"></i></button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr class="text-center">
                        <td colspan="9">There is no one registered yet</td>
                    </tr>
                @endforelse

            </tbody>
        </table>
        {{ $usercourses->links() }}
    </div>
</x-app>
