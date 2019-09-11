@extends('layouts.app')

@section('content')

<div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Data Pengguna</strong>
            </div>
            <div class="table-stats order-table ov-h">
                <table class="table ">
                    <thead>
                        <tr>
                           
                            <th>No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $db)
                            
                       
                        <tr>
                            <td>{{$db['id']}}</td>
                            <td>{{$db['name']}}</td>
                            <td>{{$db['email']}}</td>
                            <td>{{$db['role']}}</td>
                            <td></td>
                            <td> <a href="/kampoengku/pengguna/edit/{{$db['id']}}" class="btn btn-warning"><i class="glyphicon glyphicon-edit fa fa-edit"></i> Edit</a> <a href="/kampoengku/pengguna/delete/{{$db['id']}}" class="btn btn-danger"><i class="glyphicon glyphicon-edit fa fa-trash"></i> Hapus </a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                
            </div> 
           
        </div>
    </div>
    
@endsection