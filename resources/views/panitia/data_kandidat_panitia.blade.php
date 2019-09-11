@extends('layouts.app')
@section('content')

<div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Rincian Calon Kades</strong>
            </div>
            <div class="table-stats order-table ov-h">
                <table class="table ">
                    <thead>
                        <tr>
                           
                            <th>Nama</th>
                            <th>Tanggal Lahir</th>
                            <th>Foto</th>
                            <th>Pekerjaan</th>
                            <th>Visi & Misi </th>
                            <th>Status</th>
    
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $data_kandidat)
                            
                       
                        <tr>
                            <td>{{$data_kandidat['nama']}}</td>
                            <td>{{$data_kandidat['tgl_lahir']}}</td>
                            <td><img src="{{ asset('upload_gambar/' . $data_kandidat['file_gambar']) }}" /></td>
                            <td>{{$data_kandidat['pekerjaan']}}</td>
                            <td>{{$data_kandidat['visimisi']}}</td>
                            <td>@if( $data_kandidat['status'] == "diterima" )
                                <font color="green"><b><i>{{$data_kandidat['status']}}</i></b></font>
                                @endif
                            </td>

                                 
                            {{-- <td> <a href="/kampoengku/pengguna/edit/{{$masyarakat['id']}}" class="btn btn-warning"><i class="glyphicon glyphicon-edit fa fa-edit"></i> Edit</a> <a href="/kampoengku/pengguna/delete/{{$db['id']}}" class="btn btn-danger"><i class="glyphicon glyphicon-edit fa fa-trash"></i> Hapus </a></td> --}}
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <table class="table ">
                        <thead>
                            <tr>
                               
                               
                                <th>Jumlah Kandidat </th>
                                <th>Action</th>
        
                            </tr>
                        </thead>
                        <tbody>
                                @foreach ($del as $item)
                                
                           
                            <tr>
                                <td>{{$item['jk']}}</td>
                                <td> <a href="/pemilihan/kandidat/delete/{{$item['id']}}" class="btn btn-danger"><i class="glyphicon glyphicon-edit fa fa-trash"></i> Hapus </a></td>
                                
    
                                     
                                {{-- <td> <a href="/kampoengku/pengguna/edit/{{$masyarakat['id']}}" class="btn btn-warning"><i class="glyphicon glyphicon-edit fa fa-edit"></i> Edit</a> <a href="/kampoengku/pengguna/delete/{{$db['id']}}" class="btn btn-danger"><i class="glyphicon glyphicon-edit fa fa-trash"></i> Hapus </a></td> --}}
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                {{-- <div>
                    <form action="/pemilihan/save" method="post"></form>
                    
                    Jumlah Kandidat :
                   <input type="text" name="jk" id="jk" value="{{$jumlah}}">
                   <button class="btn btn-success" type="submit">Add</button> 
                </form>
                </div> --}}

                @php
                     $total = App\JK::all()->where('jk','!=', null)->toArray();
                @endphp
                
                <form action="/pemilihan/save" method="post">
                    @csrf
                    
                


                    Jumlah Kandidat :
                    <input type="text" name="jk" readonly id="jk" value="{{$jumlah}}">

                    @if ($total)
                
                    @else
                    <button class="btn btn-primary"  type="submit" >Add</button> 
                    @endif
                    <button class="btn btn-success" onClick="refreshPage()" >refresh</button>
                </form>


               
            </div> <!-- /.table-stats -->
        </div>
    </div>

    <script>
    
    function refreshPage(){
    window.location.reload();
} 
    </script>


    
    
@endsection