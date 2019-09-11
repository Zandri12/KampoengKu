<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\User;
use PDF;
use Excel;
use App\JK;
use App\Hasil;
use App\Permohonan;
use App\Kandidat;
// use App\Exports\SembakoExport;

class VoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Permohonan :: all()->toArray();
        return view('pengguna.dashboard',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        

    }

    public function profiles()
    {
        $data =User::all()->toArray();
        return view('profile.profile',compact('data'));
    }

   
    public function terima()
    {
       
    }



    //cetak  



    // public function exportExcel()
    // {
    //     $nama_file = 'laporan_sembako_'.date('Y-m-d_H-i-s').'.xlsx';
    //     return Excel::download(new SembakoExport, $nama_file); 
    // }

    // public function generatePDF()
    // {
    //     $data = ['title' => 'Welcome to HDTuto.com'];
    //     $pdf = PDF::loadView('myPDF', $data);
  
    //     return $pdf->download('itsolutionstuff.pdf');
    // }

    public function cetak_pdf()
    {
    	$hasils = Hasil::all();
        $permoh = Permohonan::all()->toArray();
    	$pdf = PDF::loadView('panitia.cetak_pdf',compact('hasils','permoh'));
    	return $pdf->download('laporan-voting-pdf');
    }

    public function ct()
    {
        
        $data1 = Kandidat::all()->where('no',1)->count();
        $data2 = Kandidat::all()->where('no',2)->count();
        $data3 = Kandidat::all()->where('no',3)->count();

        // if($data1 > $data2){

        //        $data1;

        // }elseif($data1 > $data3){

        //     data1;
        // }elseif($data2 > $data1){

        //     $data2;

        // }elseif($data2 > $data3){

        //     data2;
        // }elseif($data3 > $data1){

        //     $data3;

        // }elseif($data3 > $data2){

        //     data3;
        // }
        $data = 
        $permoh = Permohonan::all()->toArray();
       
        $hasils = Hasil::all();
    	return view('panitia.cetak',compact('permoh','hasils'));
    }


    //hasil

    public function chart_hasil()
    {


        

        $data =Permohonan::all()->toArray();
        return view('pemilihan.grafik',compact('data'));
    }




    //pemilihan

    public function pilih_kandidat()
    {
        $data =Permohonan::all()->toArray();
        return view('pemilihan.evoting',compact('data'));
    }
    public function views_hasil_voting()
    {
        $data =Kandidat::all()->toArray();
        return view('pemilihan.data_pemilihan',compact('data'));
    }

    //hasil/panitia

    public function datakk()
    {


        $data3 = Kandidat::all()->where('no',3)->count();
        $data2 = Kandidat::all()->where('no',2)->count();



        $data1 = Kandidat::all()->where('no',1)->count();
        $data =Kandidat::all()->toArray();

        $datanya = Hasil :: all()->toArray();
        return view('panitia.data_evoting',compact('data','data1','data2','data3','datanya'));
    }

    //kartu suara
    public function pilihan(Request $request,$id)
        {
        if(Auth::User()->hak == 1){
                $kandidat = Permohonan::find($id);
                Kandidat::create([
                
                    'no' => $id,
                    'nama' => $kandidat->nama
                    
                ]);
                User::find(Auth::User()->id)->update(['hak' => 0 ]);
            }
            return redirect('/pemilihan/hasil');
        }



    //simpan jumlah kandidat
    public function simpan(Request $request)
    {
        $data = new JK();//model
        $data->jk =$request->get('jk');
        $data->save();
        return redirect('/kampoengku/pengguna/konfirmasi');
    }


    public function save(Request $request)
    {
        $data = new Hasil();//model
        $data->data1 =$request->get('data1');
        $data->data2 =$request->get('data2');
        $data->data3 =$request->get('data3');
        $data->save();
        return redirect('/pemilihan/data/evoting');
    }

    



    //hasil pilihan
    public function simpan_hasil_voting(Request $request,$id)
    {
      
            $kandidat = Permohonan::find($id);
            Kandidat::create([
            
                'no' => $id,
                'nama' => $kandidat->nama
                
            ]);
            
        return redirect('/pemilihan/hasil');
    }



    //konfirmasi (panitia Menu)
    public function data_kandidat_panitia()
    {
        $data =Permohonan::all()->where('status','diterima')->toArray();
        
        $del =JK::all()->toArray();

        $total = Permohonan::all()->toArray();

        $jumlah = Permohonan::all()->where('status','diterima')->count();
        return view('panitia.data_kandidat_panitia',compact('data','jumlah','total','del'));
    }
    

    //permohonan ke admin(admin Page)
    public function admin_permohonan()
    {
        $data =Permohonan::all()->toArray();
        return view('admin.permintaan',compact('data'));
        
       
       

        
    }

    public function data_kandidat()
    {
        return view('masyarakat.permohonan');
    }

    public function tambah_kandidat(Request $request)
    {
        $file = $request->file('foto');
        $nama_file = time()."_".$file->getClientOriginalName();
        $tujuan_upload = 'upload_gambar';
        $file->move($tujuan_upload,$nama_file);

        $q = DB::table('permohonans')->insert([
            'nama' => $request['nama'],
            'tgl_lahir' => $request['tgl_lahir'],
            'file_gambar' => $nama_file,
            'pekerjaan' => $request['pekerjaan'],
            'visimisi' => $request['visimisi'],
            'status' =>'proses'
        ]);
        if ($q) {
            $nama = $request['nama'];
            return redirect('/Kandidat/data/tambah')->with('permintaan', "Permohonan atas nama $nama sedang di proses");
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    public function data_pengguna()
    {
       
        $data =User::all()->where('id','!=',1)->toArray();
        return view('pengguna.add_user',compact('data'));
    }

    public function data_panitia()
    {
        $data =User::all()->where('role', 'Panitia')->toArray();
        return view('panitia.data_panitia',compact('data'));
    }

    public function data_masyarakat()
    {
        $data =User::all()->where('role', 'Masyarakat')->toArray();
        return view('masyarakat.data_masyarakat',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pengguna = User::find($id);
        return view('pengguna.edit_pengguna',compact('pengguna'));
    }
    public function edit_masyarakat($id)
    {
        $datam = User::find($id);
        return view('masyarakat.edit_masyarakat',compact('datam'));
    }

    public function edit_panitia($id)
    {
        $datap = User::find($id);
        return view('panitia.edit_panitia',compact('datap'));
    }

    //button terima atau tidaknya kandidat

    public function konfirmasi_kandidat(Request $request, $id)
    {
        $konfirmasi = Permohonan::find($id);
        $konfirmasi->status = "diterima";

    

        $konfirmasi->save();
    	return back();
    }

    public function konfirmasi_kandidat_tolak(Request $request, $id)
    {
        $tolaks = Permohonan::find($id);
        $tolaks->status = "ditolak";

        $tolaks->save();
    	return back();
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[

            'name'=> 'required',
            'email'=> 'required',
            'role'=> 'required'
        ]);
        
        $pengguna = User::find($id);//model
        $pengguna->name = $request->get('name');
        $pengguna->email =$request->get('email');
        $pengguna->role =$request->get('role');
        if($request->get('role') == 'Masyarakat'){
            $pengguna->hak = 1;
            
        }else{
            $pengguna->hak = 0;
        }
        $pengguna->save();
    	return redirect('/kampoengku/pengguna');
    
    }

   
    
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = User::find($id);
        $data->delete();

        return back();
    }
    public function destroy_masyarakat($id)
    {
        $deletem = User::find($id);
        $deletem->delete();

        return back();
    }
    public function destroy_panitia($id)
    {
        $deletep = User::find($id);
        $deletep->delete();

        return back();
    }
    public function hapustotal($id)
    {
        $deletej = JK::find($id);
        $deletej->delete();

        return back();
    }
    public function delete($id)
    {
        $deletets = Hasil::find($id);
        $deletets->delete();

        return back();
    }
}
