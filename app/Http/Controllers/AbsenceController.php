<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class AbsenceController extends Controller
{
    public function index()
    {
    	return view('absence.index');
    }
}
