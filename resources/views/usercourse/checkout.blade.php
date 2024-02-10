<x-app>
    <div class="container">
        <div class="row">
            <div class="col-5 mx-auto">
                <div class="text-center">
                    <h5><b>Checkout</b></h5>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <p>Course</p>
                                <p>Type</p>
                                <p>Cost</p>
                            </div>
                            <div class="col-6">
                                <p><b>{{ $usercourse->course->name }}</b></p>
                                <p><b>
                                        @if ($usercourse->online)
                                            Online
                                        @else
                                            Offline
                                        @endif
                                    </b></p>
                                <p><b>Rp. {{ number_format($cost) }}</b></p>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary btn-block mt-2 mb-4" id="pay-button">Pay Now</button>
            </div>
        </div>

    </div>

    @section('scripts')
        <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
            data-client-key="{{ config('midtrans.client_key') }}"></script>

        <script type="text/javascript">
            // For example trigger on button clicked, or any time you need
            var payButton = document.getElementById('pay-button');
            payButton.addEventListener('click', function() {
                // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
                window.snap.pay("{{ $snapToken }}", {
                    onSuccess: function(result) {
                        /* You may add your own implementation here */
                        // alert("payment success!");
                        dd('ok');
                        window.location.href = "{{ route('usercourse.invoice', $usercourse->id) }}";
                        console.log(result);
                    },
                    onPending: function(result) {
                        /* You may add your own implementation here */
                        alert("wating your payment!");
                        console.log(result);
                    },
                    onError: function(result) {
                        /* You may add your own implementation here */
                        alert("payment failed!");
                        console.log(result);
                    },
                    onClose: function() {
                        /* You may add your own implementation here */
                        alert('you closed the popup without finishing the payment');
                    }
                })
            });
        </script>
    @endsection
</x-app>
