<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class frequenciaController extends Controller
{
    public function index() {

    	return view('frequencias.index');
    }

    public function create(Request $request) {
    	// pass
    }


}
