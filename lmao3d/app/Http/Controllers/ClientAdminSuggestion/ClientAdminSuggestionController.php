<?php

namespace App\Http\Controllers\ClientAdminSuggestion;

use App\ClientAdminSuggestion;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientAdminSuggestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clientadminsuggestion.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'subject' => ['required', 'string', 'max:255'],
            'suggestion' => ['required', 'string', 'max:255'],
        ]);
        

        $suggestion=new ClientAdminSuggestion([
            'name'  =>  $request->get('name'),
            'email' => $request->get('email'),
            'subject' => $request->get('subject'),
            'suggestion' => $request->get('suggestion'),
        ]);
        $suggestion->save();
        return view('clientadminsuggestion.create')->with('success', 'Suggestion Submitted Successfully');
    }
   
    /**
     * Display the specified resource.
     *
     * @param  \App\ClientAdminSuggestion  $clientAdminSuggestion
     * @return \Illuminate\Http\Response
     */
    public function show(ClientAdminSuggestion $clientAdminSuggestion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ClientAdminSuggestion  $clientAdminSuggestion
     * @return \Illuminate\Http\Response
     */
    public function edit(ClientAdminSuggestion $clientAdminSuggestion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ClientAdminSuggestion  $clientAdminSuggestion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClientAdminSuggestion $clientAdminSuggestion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ClientAdminSuggestion  $clientAdminSuggestion
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClientAdminSuggestion $clientAdminSuggestion)
    {
        //
    }
}
