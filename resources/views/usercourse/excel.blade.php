<style>
    table,
    th,
    td {
        border: 1px solid black;
        border-collapse: collapse;
    }
</style>

<table>
    <thead>
        <tr>
            <th><b>Num</b></th>
            <th><b>Name</b></th>
            <th><b>Email</b></th>
            <th><b>Address</b></th>
            <th><b>Phone</b></th>
            <th><b>Instance</b></th>
            <th><b>Course</b></th>
            <th><b>Type</b></th>
            <th><b>Confirmed</b></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($usercourse as $sc)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $sc->name }}</td>
                <td>{{ $sc->email }}</td>
                <td>{{ $sc->address }}</td>
                <td>{{ $sc->phone }}</td>
                <td>{{ $sc->instance }}</td>
                <td>{{ $sc->course->name }}</td>
                <td>
                    @if ($sc->online)
                        Online
                    @else
                        Offline
                    @endif
                </td>
                <td>
                    @if ($sc->confirmed)
                        Yes
                    @else
                        No
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
