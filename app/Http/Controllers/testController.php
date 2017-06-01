<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class testController extends Controller
{
    public function pesanSurat(Request $request)
    {
        return $request->input['nama_pemohon'];
    
    }
    
    public function pesanInven(Request $request)
    {
        return $request->input['nama_pemohon'];
    
    }
}
