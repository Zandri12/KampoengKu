@extends('layouts.app')

@section('content')

<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Pengajuan Pencalonan Kandidat CAPIL') }}</div>
    
                        <div class="card-body">
    
                    @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                        {{ $error }} <br/>
                        @endforeach
                    </div>
                    @endif
    
                    <form action="/Kandidat/tambah" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @if(session('status') or session('permintaan'))
                        <div><font color="red">{{session('status')}}</font></div>
                    <div>{{session('permintaan')}}</div>
                    @endif

                        <div class="form-group row">
                                <label for="nama" class="col-md-4 col-form-label text-md-right">{{ __('Nama') }}</label>
    
                                <div class="col-md-6">
                                    <input id="nama" type="text" placeholder="Nama Anda" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}" required autocomplete="nama" autofocus>
    
                                    @error('nama')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="tgl_lahir" class="col-md-4 col-form-label text-md-right">{{ __('Tanggal Lahir') }}</label>
    
                                <div class="col-md-6">
                                    <input id="tgl_lahir" type="date" class="form-control @error('tgl_lahir') is-invalid @enderror" name="tgl_lahir" value="{{ old('tgl_lahir') }}" required autocomplete="tgl_lahir">
    
                                    @error('tgl_lahir')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                    <label for="foto" class="col-md-4 col-form-label text-md-right">{{ __('Foto') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="foto" type="file"  class="fa fa-upload" class="form-control @error('foto') is-invalid @enderror" name="foto" value="{{ old('foto') }}" required autocomplete="name" autofocus>
        
                                        @error('foto')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            
                            <div class="form-group row">
                                    <label for="pekerjaan" class="col-md-4 col-form-label text-md-right">{{ __('pekerjaan') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="pekerjaan" placeholder="Pekerjaan Anda" type="text" class="form-control @error('pekerjaan') is-invalid @enderror" name="pekerjaan" value="{{ old('pekerjaan') }}" required autocomplete="name" autofocus>
        
                                        @error('pekerjaan')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                        <label for="visimisi" class="col-md-4 col-form-label text-md-right">{{ __('Visi & Misi') }}</label>
            
                                        <div class="col-md-6">
                                            <textarea id="visimisi" placeholder="Visi & Misi Anda" type="text" class="form-control @error('visimisi') is-invalid @enderror" name="visimisi" value="{{ old('visimisi') }}" required autocomplete="name" autofocus cols="30" rows="10"></textarea>
                                            @error('visimisi')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                        <input type="submit" value="Ajukan" class="btn btn-warning">
                    </form>
                </div>
            </div>
        </div>
    </div>
    
@endsection