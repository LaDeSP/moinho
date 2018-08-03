<?php

namespace App\Http\Controllers\Manager;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Zizaco\Entrust\EntrustFacade as Entrust;

use App\User;


class managerController extends Controller
{
    public function login(Request $request){
        $query = DB::table('users')
            ->where('email', $request->email)
            ->first();
        if( Hash::check($request->password, $query->password) ){
            $resp = [ 'resp' => true ];
            return response()->json( $resp );
        } else {
            $resp = [ 'resp' => false ];
            return response()->json( $resp );
        }
        return response()->json($query);
    }

    public function showTables(){
        $query = DB::select('show tables');
        return response()->json($query);
    }

    public function descTable( $table ){
        $query = DB::select('desc '.$table);
        return response()->json($query);
    }


}
