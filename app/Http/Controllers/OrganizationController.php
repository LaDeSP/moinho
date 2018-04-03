<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Organization;
use App\Address;
use App\Contact;
use App\Person;
use App\Document;

class OrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $organizations = Organization::all();
        
        return view('organizations.index', compact('organizations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('organizations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $address = new Address;
        $organization = new Organization;
        $contato = new Contact;
        $pessoa = new Person;

        $address->street = $request->street;
        $address->neighborhood = $request->neighborhood;
        $address->complement = $request->complement;
        $address->zip_code = $request->zip_code;
        $address->city = $request->city;
        $address->state = $request->state;
        $address->country = $request->country;

        $address->save();

        $organization->name = $request->name;
        $organization->fantasy_name = $request->fantasy_name;
        $organization->social_reason = $request->social_reason;
        $organization->cnpj = $request->cnpj;
        $organization->state_inscription = $request->state_inscription;
        $organization->last_visit_date = $request->last_visit_date;

        $organization->address()->associate($address);
        $organization->save();

        $pessoa->name = $request->name;
        $pessoa->cpf= $request->cpf;
        $pessoa->rg = $request->rg;
        $pessoa->organization()->associate($organization);
        $pessoa->save();

        $contato->phone = $request->phone;
        $contato->cel_phone = $request->cel_phone;
        $contato->email = $request->email;
        $contato->owner_type = 'Organization';
        $contato->owner()->associate($organization);

        $contato->save();

        return view('welcome');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $documents = Document::where('organization_id', $id)->get();
        return view('organizations.show', compact('documents'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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

    public function list_documents()
    {
        $documents = Documents::where('organization');
    }
}
