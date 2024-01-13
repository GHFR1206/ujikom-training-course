<x-app>
    <div class="container">
        <div class="row">
            <div class="col-6 mx-auto">
                <div class="text-center mb-3">
                    <h5><b>Terimakasih!</b></h5>
                    <h5><b>Pembayaran berhasil!</b></h5>
                </div>
                <div class="card">
                    <div class="card-body">
                        <table>
                            <tr>
                                <td colspan="2">Name </td>
                                <td></td>
                                <td><b>{{ $usercourse->name }}</b></td>
                            </tr>
                            <tr>
                                <td colspan="2">Instance </td>
                                <td></td>
                                <td><b>{{ $usercourse->instance }}</b></td>
                            </tr>
                            <tr>
                                <td colspan="2">Address </td>
                                <td></td>
                                <td><b>{{ $usercourse->address }}</b></td>
                            </tr>
                            <tr>
                                <td colspan="2">Course </td>
                                <td>
                                </td>
                                <td><b>
                                        {{ $usercourse->course->name }}
                                    </b>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">Type </td>
                                <td></td>
                                <td><b>
                                        @if ($usercourse->online)
                                            Online
                                        @else
                                            Offline
                                        @endif
                                    </b></td>
                            </tr>
                            <tr>
                                <td colspan="2">Start </td>
                                <td></td>
                                <td><b>
                                        @if ($usercourse->online)
                                            {{ $usercourse->course->online->start_date }}
                                        @else
                                            {{ $usercourse->course->offline->start_date }}
                                        @endif
                                    </b></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <a href="{{ route('index') }}" class="btn btn-primary btn-block mt-2 mb-4">Back to homepage </a>
        </div>
    </div>

    </div>
</x-app>
