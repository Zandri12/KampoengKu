@extends('layouts.app')

@section('content')

<div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Rincian Pengguna</strong>
            </div>
            <div class="table-stats order-table ov-h">
                <table class="table ">
                    <thead>
                        <tr>
                           
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $panitia)
                            
                       
                        <tr>
                            <td>{{$panitia['name']}}</td>
                            <td>{{$panitia['email']}}</td>
                            <td>{{$panitia['role']}}</td>
                            <td></td>
                           
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div> <!-- /.table-stats -->
        </div>
    </div>
    
@endsection