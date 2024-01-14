<x-app title="Registered User">
    <div class="container">
        <h3>Registered User</h3>

        <div id="export" class="mt-5">
            @if ($count > 0)
                <a type="button" class="btn btn-primary " data-toggle="modal" data-target="#exampleModal">
                    Export
                </a>
            @endif
        </div>

        <table class="table mt-3">
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
                                <button type="submit" class="btn btn-xs btn-danger btn-flat show_confirm_user_admin"
                                    data-toggle="tooltip" title='Delete' data-name="{{ $usercourse->name }}"><i
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

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Export</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('usercourse.export') }}" method="get">
                    <input type="hidden" name="name" value="{{ $course->name }}">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Confirmed</label>
                            <select class="form-control custom-select" id="" aria-describedby="emailHelp"
                                name="confirmed">
                                <option value="confirmed_all" selected>All</option>
                                <option value="confirmed_yes">Confirmed</option>
                                <option value="confirmed_no">Not Confirmed</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Type</label>
                            <select class="form-control custom-select" id="" aria-describedby="emailHelp"
                                name="type">
                                <option value="type_all" selected>All</option>
                                <option value="type_offline">Offline</option>
                                <option value="type_online">Online</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">File</label>
                            <select class="form-control custom-select" id="" aria-describedby="emailHelp"
                                name="file">
                                <option value="pdf">PDF</option>
                                <option value="excel">Excel</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Export</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app>
