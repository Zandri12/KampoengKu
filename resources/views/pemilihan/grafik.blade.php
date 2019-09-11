@extends('layouts.app')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

<div class="row justify-content-center">
       
  <div class="box-body">
    <div class="row">
        <div class="row">
            <div class="col-md-12">
              <div class="card ">
                <div class="card-header ">
                  <h5 class="card-title"></h5>
                  <p class="card-category row justify-content-center" style="margin:3%;"> Hasil Sementara </p>
                  <a href="/voting/cetak_pdf" class="btn btn-primary" target="_blank">CETAK</a>
                </div>
                <!-- /.table-stats -->
                <div class="card-body ">
                  <div style="width: 800px;margin: 0px auto;">
                    <canvas id="myChart"></canvas>
                  </div>



                </div>
                <div class="card-body ">
                    <div style="width: 800px;margin: 0px auto;">
                      <canvas id="myChart1"></canvas>
                      <table class="table ">
                       <b>Keterangan : </b>
                          <thead>
                              <tr>
                                  <th>NO</th>
                                  <th>Nama Cakades</th>
                                
      
                              </tr>
                          </thead>
                          <tbody>
                              @foreach ($data as $datas)
                                  
                             
                              <tr>
                                  <td>{{$datas['id']}}</td>
                                  <td>{{$datas['nama']}}</td>
                                  
                                  
                              </tr>
                              @endforeach
                          </tbody>
                      </table>
                    </div>



                  </div>
                 

                  
                
              </div>
            </div>
          </div>
      
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>


              
</div>
@endsection
@section('js')
<script>
    var ctx = document.getElementById("myChart").getContext('2d');
               var myChart = new Chart(ctx, {
                 type: 'pie',
                 data: {
                   labels: ["1", "2",'3'],
                   datasets: [{
                     label: '',
                     data: [
                     <?php 
                     $a = DB::table('kandidats')
                     ->where('no',"1")->count();
                     echo $a;
                     ?>, 
                     <?php 
                     $b = DB::table('kandidats')
                     ->where('no',"2")->count();
                     echo $b;
                     ?>, 
                     <?php 
                     $c = DB::table('kandidats')
                     ->where('no',"3")->count();
                     echo $c;
                     ?>
                     
                   



                     ],
                     backgroundColor: [
                     "#00BFFF",
                     "#f17e5d",
                     "#fcc468",
                     "#cccccc"
                     ],
                     borderColor: [
                     "#6bd098",
                     "#f17e5d",
                     "#fcc468",
                     "#cccccc"
                     ],
                     borderWidth: 1
                   }]
                 },
                 options: {
                   scales: {
                     yAxes: [{
                       ticks: {
                         beginAtZero:true
                       }
                     }]
                   }
                 }
               });


</script>
    
@endsection
