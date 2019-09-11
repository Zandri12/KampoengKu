@extends('layouts.app')

@section('content')

<div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Rincian akun Masyarakat</strong>
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
                        @foreach ($data as $masyarakat)
                            
                       
                        <tr>
                            <td>{{$masyarakat['name']}}</td>
                            <td>{{$masyarakat['email']}}</td>
                            <td>{{$masyarakat['role']}}</td>
                            <td></td>
                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div> <!-- /.table-stats -->
        </div>
    </div>
    
@endsection