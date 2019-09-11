@extends('layouts.app')

@section('content')

<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header row justify-content-center">{{ __('Profile') }}</div>
    
                        <div class="card-body">
    
                    @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                        {{ $error }} <br/>
                        @endforeach
                    </div>
                    @endif
                   
                    <div class="row justify-content-center"><img height="200px" src="{{ asset('profile/avatar1.png') }}" /></div>
                   <div class="row justify-content-center">
                       <p><b>@if (Auth :: user()->id == 1)
                            <p>Anda adalah <b><i style="color:lightcoral;">Adminnya </i></b>  </p> <br>
                           
                       @endif</b></p><br>
                      <p>{{Auth ::user()->name}}</p><br></div>
                      <div class="row justify-content-center"><p><b> Email  :</b></p> {{Auth ::user()->email}}
                   </div>
                  
                </div>
            </div>
        </div>
    </div>
    
@endsection