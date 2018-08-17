<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Role;
use Auth;
use App\RoleUser;
use App\Colaborador;
use App\Pessoa;
use App\Endereco;
use App\Contato;



use Zizaco\Entrust\EntrustFacade as Entrust;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user = User::all();
        $role = Role::all();
        return view('auth.passwords.reset', compact('user', 'role'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        # Caso o usuário logado não tenha acesso a essa página, retorna um erro
        $user = User::all();
        $role = Role::all();

        $role_user = RoleUser::where('user_id', Auth::user()->id )->first();
        $usuario = Role::find($role_user->role_id);

        $id = Auth::user()->id;

        $colaborador = Colaborador::where('user_id',$id)->first();
        $pessoa = Pessoa::find($colaborador->pessoa_id);
        $endereco = Endereco::find($pessoa->endereco_id);
        $contato = Contato::find($pessoa->contato_id);
        $user = User::find($colaborador->user_id);
        $tipo = Role::all();

        
        return view('auth.passwords.reset', compact('user', 'role','usuario', 'tipo', 'colaborador', 'pessoa', 'endereco', 'contato', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::where('email', $request->email)->firstOrFail();

        $user->password = bcrypt($request->password);

        $user->save();

        return view('auth.passwords.reset', [
            'message' => 'Senha alterada com sucesso'
        ]);
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = User::where('email', $request->email)->firstOrFail();

        $user->password = bcrypt($request->password);

        $user->save();

        return $user;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
