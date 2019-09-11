<html>
<head>
    <title>KampoengKu</title>
    <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h1>Hasil Pemungutan Suara berbasis Elektronik(E-voting)</h1>
		<h2><a target="_blank" href="#">KampoengKu</a></h2>
	</center>
 
    <h4>Ass.Wr.Wb</h4>
    <br>
    <div >
    <b><p>    KAMI SELAKU PANITIA PEMILIHAN KEPALA DESA DAN PANITIA PEMUNGUTAN SUARA(PPS) TERPILIH BERDASARKAN HASIL PENILAIAN EVALUASI KINERJA UNTUK PENYELENGGARAAN PILKADES</p>  </b>
    </div>
    <div>
        <p>Berdasarkan hasil pemungutan suara yang diselenggarakan pada <i>2019-08-13</i>.Kami menyatakan hasilnya sebagai berikut : </p>
    </div>
	<table class='table table-bordered'>
		<thead>
			<tr>
                <th>No</th>
                <th>Kandidat 1</th>
                <th>Kandidat 2</th>
                <th>Kandidat 3</th>
			</tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
			@foreach($hasils as $p)
			<tr>
                <td>{{ $i++ }}</td>
                <td>{{$p['data1']}}</td>
                <td>{{$p['data2']}}</td>
                <td>{{$p['data2']}}</td>
			</tr>
			@endforeach
		</tbody>
    </table>
	<div>
        <p>Untuk itu sebagai detailnya: </p>
	</div>
	<table class='table table-bordered'>
		<thead>
			<tr>
                <th>Kandidat</th>
                <th>Nama</th>
                
			</tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
			@foreach($permoh as $n)
			<tr>
                <td>{{ $i++ }}</td>
                <td>{{$n['nama']}}</td>
                
			</tr>
			@endforeach
		</tbody>
    </table>
    
 
</body>
</html>