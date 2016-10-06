<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Cavis;
use App\Picket;

class PicketController extends Controller
{
    public function index()
    {
    	$data = [];
    	$data['cavis'] = Cavis::all();
    	$data['menit'] = [];
    	foreach ($data['cavis'] as $c) {
    		$pickets = $c->pickets;
    		$total = 0;
    		foreach ($pickets as $p) {
    			$total += date_diff($p->created_at, $p->updated_at, true)->i;
    		}
    		$data['menit'][] = $total;
    	}
    	return view('admin.picket.index', [
    		'data' => $data
    	]);
    }

    // API
    public function logging(Request $request)
    {
    	$response = [];
    	$response['status'] = 'error';

    	$input = $request->all();
    	$nim = $input['nim'];

    	$cavis = Cavis::where('nim', $nim)->first();

    	if ($cavis != null) {
	    	$pickets = $cavis->pickets()->where('created_at', 'LIKE', date('Y-m-d').'%')->get();
	    	$picket = null;
	    		foreach ($pickets as $p) {
	    			if ($p->created_at == $p->updated_at) {
	    				$picket = $p;
	    				break;
	    			}
	    		}
	    		
	    		if ($picket == null) {
	    			// 2nd Login or more
	    			$picket = $cavis->pickets()->create([
		    			'random_text' => str_random()
		    		]);
		    		$response['status'] = 'success';
		    		$response['message'] = $cavis->name.'<br>Logged In at ' . $picket->updated_at;
	    		} else {
	    			// Logout current cavis
	    			$picket->random_text = str_random();
	    			// die("here");
	    			$cavis->pickets()->save($picket);
	    			// $cavis->save();
	    			$response['status'] = 'success';
	    			$response['message'] = $cavis->name.'<br>Logged Out at ' . $picket->updated_at;
	    		}
	    		
	    	// }
    		
    	} else {
    		$response['message'] = 'cavis not found';
    	}
    	
    	return response($response, 200);
    }

    public function getLoginList()
    {
    	$response = [];
    	$cavisName = [];
    	$todayPickets = Picket::where('created_at', "LIKE", date('Y-m-d').'%')->get();
    	if ($todayPickets != null) {
    		foreach ($todayPickets as $tp) {
    			if ($tp->created_at == $tp->updated_at) {
    				$cavisName[] = $tp->cavis->name;
    			}
    		}
    		$response['cavisName'] = $cavisName;
    	}
    	return $response;
    }
}

