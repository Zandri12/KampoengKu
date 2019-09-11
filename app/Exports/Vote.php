<?php

namespace App\Exports;

use App\Hasil;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class Vote implements FromView
{
    public function view(): View
    {
        return view('panitia', [
            'datas' => Hasil::all()
        ]);
    }
}