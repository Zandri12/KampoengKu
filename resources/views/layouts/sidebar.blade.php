<aside id="left-panel" class="left-panel">
    @guest
    @else
    
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="/dashboard"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                </li>
                @if(Auth:: user()->id == 1)
                <li class="menu-title">Admin</li><!-- /.menu-title -->
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-cogs"></i> Halaman Admin</a>


                    @php
                         $data =App\User::where([['role',null],['id','!=',1]])->get()->count();
                    @endphp
                <ul class="sub-menu children dropdown-menu"><li><i class="fa fa-bookmark"></i><a href="{{route('pengguna')}}"> <span class="count bg-danger">{{$data}}</span>Rincian Pengguna</a></li>
               

                     
                        <li><i class="fa fa-spinner"></i><a href="{{Route('admin_permohonan')}}">Permohonan</a></li>
                    </ul>
                </li>
                @endif

                @if(Auth:: user()->id != 1 && Auth:: user()->role == 'Panitia'  )
                <li class="menu-title">Halaman Panitia</li><!-- /.menu-title -->
                <li class="menu-item-has-children dropdown">
                    <a href="/pemilihan/data/evoting" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-cogs"></i>Data Pemilihan</a>
                    <ul class="sub-menu children dropdown-menu">                            <li><i class="fa fa-sitemap"></i><a href="{{route('confirmations')}}">Kandidat</a></li>
                        <li><i class="fa fa-id-badge"></i><a href="/pemilihan/data/evoting">Data Hasil Pemungutan</a></li>
                        <li><i class="fa fa-id-card-o"></i><a href="/cetak">Laporan</a></li>
                    </ul>
                </li>
              

               @endif
               @if (Auth :: user()->id != 1 AND Auth :: user()->role == 'Masyarakat')
                   
              
               <li class="menu-title">Halaman Masyarakat</li><!-- /.menu-title -->
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-cogs"></i>Pemilihan</a>
                    <ul class="sub-menu children dropdown-menu">
                        @if (Auth :: user()->hak == 1)
                        <li><i class="fa fa-id-badge"></i><a href="{{route('pemungutan')}}">E-voting</a></li>
                        @endif
                   
 
                        

    
                       

                        
                            <li><i class="fa fa-id-card-o"></i><a href="{{route('datas_kandidat')}}">Permohonan</a></li>
                       

                     

                           
                       
                    </ul>
                </li>
                @endif
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
    @endguest
</aside>