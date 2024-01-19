<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Export PDF</title>
</head>

<style>
    table,
    th,
    td {
        border: 1px solid black;
        border-collapse: collapse;
    }
</style>

<h2>{{ $now }} | Report</h2>

<body>
    <table>
        <tr>
            <th><b>Num</b></th>
            <th><b>Name</b></th>
            <th><b>Email</b></th>
            <th><b>Address</b></th>
            <th><b>Phone</b></th>
            <th><b>Instance</b></th>
            <th><b>Type</b></th>
            <th><b>Confirmed</b></th>
        </tr>
        @forelse ($usercourse as $uc)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $uc->name }}</td>
                <td>{{ $uc->email }}</td>
                <td>{{ $uc->phone }}</td>
                <td>{{ $uc->address }}</td>
                <td>{{ $uc->instance }}</td>
                <td>
                    @if ($uc->offline == 1)
                        Offline
                    @else
                        Online
                    @endif
                </td>
                <td>
                    @if ($uc->confirmed == 1)
                        Yes
                    @else
                        No
                    @endif
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="8">No one registered</td>
            </tr>
        @endforelse
    </table>
</body>

</html>
