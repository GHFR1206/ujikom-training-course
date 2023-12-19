<p>Halo <b>{{ $request['name'] }}</b>,</p>
Anda telah melakukan registrasi atas Training Course: <b>{{ $request['course_name'] }}</b> <br>
Silahkan lakukan pembayaran dengan transfer ke: <br>
<p><b>BSI No rekening: 552-4140-480 (Aam Slamet Rusydiana)</b></p>
<br> Dengan jumlah: <b>Rp. {{ number_format($request['course_cost']) }}</b> <br>
Lalu segera kirim bukti transfer ke Email atau telepon ini: <br>
Email: <b>smartinsight.id@gmail.com</b> <br>
Telepon: <b>0895-1311-7552</b> <br>
<p>Pendaftaran akan lengkap setelah kami menerima bukti transfer.</p>
<p>Terimakasih!</p>
