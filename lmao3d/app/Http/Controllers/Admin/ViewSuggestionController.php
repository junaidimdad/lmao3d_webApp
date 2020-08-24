<?php

namespace App\Http\Controllers\Admin;

use App\ClientAdminSuggestion;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ViewSuggestionController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suggestions=ClientAdminSuggestion::all();
        return view('admin.viewsuggestions.index')->with('suggestion',  $suggestions);
    }
}
