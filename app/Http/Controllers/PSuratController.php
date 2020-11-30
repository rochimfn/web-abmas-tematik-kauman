<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PSurat;

class PSuratController extends Controller
{
    
    public function index()
    {
        $psurats = PSurat::paginate(10);
        return view('psurat.index', compact('psurats'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
}
