@extends('layouts.app')
@section('content')



{{-- Halaman Pemilihan --}}



div class="col-lg-12">
<div class="card">
    <div class="card-header">
        <strong class="card-title">Rincian akun Masyarakat</strong>
    </div>
    <div class="table-stats order-table ov-h">
        <table class="table ">
            <thead>
                <tr>
                   
                    <th>Nama</th>
                    <th>Tanggal Lahir</th>
                    <th>Foto</th>
                    <th>Pekerjaan</th>
                    <th>Visi & Misi</th>
                    <th>Status</th>
                    <th>Action</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $kandidat)
                    
               
                <tr>
                    <td>{{$kandidat['nama']}}</td>
                    <td>{{$kandidat['tgl_lahir']}}</td>
                    <td><img src="{{ asset('upload_gambar/' . $kandidat['file_gambar']) }}" /></td>
                    <td>{{$kandidat['pekerjaan']}}</td>
                    <td>{{$kandidat['visimisi']}}</td>
                    <td>{{$kandidat['status']}}</td>
                    <td> 
                        
                            @if( $kandidat['status'] == "diterima" )
                            <a href="#" class="btn btn-primary disabled"><i class="glyphicon glyphicon-edit fa fa-check"></i> </a></td>
                              @else
                              <a href="/kampoengku/admin/konfirmasi/{{ $kandidat['id'] }}{{session()->forget('status')}}" class="btn btn-primary"><i class="glyphicon glyphicon-edit fa fa-check"></i> Terima </a>
                              <a href="#" class="btn btn-danger"><i class="glyphicon glyphicon-edit fa fa-times"></i> Tolak </a></td>
                              @endif

                         
                    {{-- <td> <a href="/kampoengku/pengguna/edit/{{$masyarakat['id']}}" class="btn btn-warning"><i class="glyphicon glyphicon-edit fa fa-edit"></i> Edit</a> <a href="/kampoengku/pengguna/delete/{{$db['id']}}" class="btn btn-danger"><i class="glyphicon glyphicon-edit fa fa-trash"></i> Hapus </a></td> --}}
                </tr>
                @endforeach
            </tbody>
        </table>
    </div> <!-- /.table-stats -->
</div>
</div>
    
@endsection