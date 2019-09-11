@extends('layouts.app')

@section('content')

<style>

#ininama {
    border-width:0px;
    border:none;
}

</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header row justify-content-center">{{ __('hasil') }}</div>

                    <div class="card-body">
                           
                        <table class="table row justify-content-center ">
                            <thead>
                                
                            </thead>
                            <tbody>
                                @foreach ($data as $kandidat)
                                    
                               
                                <tr>
                                    <td><img height="400px" src="{{ asset('upload_gambar/presiden.jpg') }}" /></td><br>
                                    
                                </tr>
                                <tr class="row justify-content-center">
                                    <td>
                                        <b>No          : </b><input type="text" name="no" id="ininama" readonly value="{{$kandidat['id']}}">
                                        <b>Nama        : </b><input type="text" name="nama" id="ininama" readonly value="{{$kandidat['nama']}}">
                                        <b>Hasil       : </b>{{$kandidat['visimisi']}}
                                    </td>
                                        <td>
                                        <br>
                                        </td>
                                </tr>
                               
                                
                                @endforeach

                             <div>
                                <a class="btn btn-primary" href="/pemilihan/simpan{{$kandidat['id']}}">Simpan</a>
                             </div>

                    
                            </tbody>
                        </table>

                

                    </div>
            </div>
        </div>
    </div>
</div>
@endsection