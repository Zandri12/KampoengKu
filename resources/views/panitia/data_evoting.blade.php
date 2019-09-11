@extends('layouts.app')

@section('content')

<style>

input {
    border: none;
    background: transparent;
}
</style>

<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header row justify-content-center"></div>
    
                        <div class="card-body">
                               
                            <table class="table row justify-content-center ">
                                <thead>
                                    
                                </thead>
                                <tbody>
                                  
                                       
                                        
                                <form action="/save" method="post">
                                    @csrf
                                   
                                    <tr class="row justify-content-center">
                                        
                                        <input type="text" name="kandidat1" id="kandidat1" readonly value="Kandidat1 : "><br>
                                        <input type="text" name="data1" id="data1" readonly value="{{$data1}}"><br>
                                           
                                    </tr>
                                    <tr class="row justify-content-center">
                                            <input type="text" name="kandidat2" id="kandidat2" readonly value="Kandidat2 : "><br>
                                            <input type="text" name="data2" id="data2" readonly value="{{$data2}}"><br>
                                               
                                    </tr>
                                    <tr class="row justify-content-center">
                                            <input type="text" name="kandidat3" id="kandidat3" readonly value="Kandidat3 : "><br>
                                            <input type="text" name="data3" id="data3" readonly value="{{$data3}}"><br>
                                               
                                    </tr>

                                    @php
                                         $da = App\Hasil::all()->where('data1','!=', null)->toArray();
                                    @endphp
                                    @if ($da)

                                    @else
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    @endif
                                   
                                </form>  
                                
                                    
                                   
    
                                 
    
                        
                                </tbody>
                            </table>

                            <div class="card-body ">
                                    <div style="width: 800px;margin: 0px auto;">
                                      <canvas id="myChart1"></canvas>
                                      <table class="table ">
                                       <b>Hasil Pemungutan Akhir: </b>
                                          <thead>
                                              <tr>
                                                    <th>Data1</th>
                                                    <th>Data2</th>
                                                    <th>Data3</th>
                                                    <th>Action</th>
                                                
                      
                                              </tr>
                                          </thead>
                                          <tbody>
                                              @foreach ($datanya as $datass)
                                                  
                                             
                                              <tr>
                                                    <td>{{$datass['data1']}}</td>
                                                    <td>{{$datass['data2']}}</td>
                                                    <td>{{$datass['data3']}}</td>
                                                    <td> <a href="/delete/{{$datass['id']}}" class="btn btn-danger"><i class="glyphicon glyphicon-edit fa fa-trash"></i> Hapus </a></td>
                                                  
                                                  
                                              </tr>
                                              @endforeach
                                          </tbody>
                                      </table>
                                    </div>
                
                
                
                                  </div>

                          
    
                    
    
                        </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection