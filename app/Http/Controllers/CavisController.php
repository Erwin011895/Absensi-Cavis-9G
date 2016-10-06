<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Cavis;

class CavisController extends Controller
{
    public function index()
    {
    	$cavis = Cavis::all();
    	return view('admin.cavis.index', ['cavis' => $cavis]);
    }

    public function create()
    {
    	return view('admin.cavis.create');
    }

    public function store(Request $request)
    {
    	$input = $request->all();
    	Cavis::create([
    		'nim' => $input['nim'],
    		'name' => $input['name']
    	]);
    	return redirect('admin/cavis');
    }

    public function edit($id)
    {
    	$cavis = Cavis::find($id);
    	return view('admin.cavis.edit', ['cavis' => $cavis]);
    }

    public function update(Request $request, $id)
    {
    	$input = $request->all();
    	Cavis::where('id', $id)->update([
    		'nim' => $input['nim'],
    		'name' => $input['name']
    	]);
    	return redirect('admin/cavis');
    }

    public function destroy($id)
    {
    	Cavis::find($id)->delete();

    	return redirect('admin/cavis');
    }
}
