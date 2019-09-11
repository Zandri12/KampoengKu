@extends('layouts.app')

@section('content')

<div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>Edit Data</strong>
                        </div>
                        <div class="card-body card-block">
                            <form action="/kampoengku/pengguna/update/{{ $pengguna->id }}" method="post" class="form-horizontal" >
                                    {{ csrf_field() }}
                                    {{ method_field('PUT') }}
                                <div class="row form-group">
                                    <div class="col col-md-9">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                            <input type="text" id="name" name="name" placeholder="Username" class="form-control" value=" {{ $pengguna->name }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-9">
                                        <div class="input-group">
                                            <input type="email" id="email" name="email" placeholder="Email" class="form-control" value=" {{ $pengguna->email }}">
                                            <div class="input-group-addon"><i class="fa fa-envelope-o"></i></div>
                                        </div>
                                    </div>
                                </div>
                               
                                <div class="row form-group">
                                <div class="col col-md-9">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-sun-o"></i></div>
                                            <select name="role" id="role"class="form-control">
                                                    <option value="Masyarakat" @if ( $pengguna->role == 'Masyarakat' )selected='selected' @endif>Masyarakat</option>
                                                    <option value="Panitia" @if ( $pengguna->role == 'Panitia' )selected='selected' @endif>Panitia</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="wrap-input validate-input">
                                        <a href="/dashboard" class="btn btn-primary">Back</a>
                                    <input type="submit" class="btn btn-success float-right" value="Save">
                                    
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

@endsection