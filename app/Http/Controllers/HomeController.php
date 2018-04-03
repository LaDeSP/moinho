<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       /* $busca = DB::table('organizations')
        ->select(DB::raw('organizations.name, documents.expiration_date, verify_documents.*, DATEDIFF(documents.expiration_date, CURDATE()) as Dias_para_expirar, adresses.street as street, adresses.neighborhood as rua'))
        ->join('documents', 'organizations.id', '=', 'documents.organization_id')
        ->join('verify_documents', 'organizations.id', '=', 'verify_documents.organization_id')
        ->join('adresses', 'organizations.address_id', '=', 'adresses.id')
        ->where(DB::raw('documents.document_type_id = 1'))
        ->orderBy('Dias_para_expirar')
        ->get();*/
     
        return view('home');
        
    }
}
