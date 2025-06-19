<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class testing extends Controller
{
    public function apa(){
$data = 'cipun';
    return view('testing' ,['nama' => $data]);
    }
    
}
