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
    	return "0";
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
	    	// if ($pickets==null) {
	    	// 	// Login First time
	    	// 	$picket = $cavis->pickets()->create([
	    	// 		'random_text' => str_random()
	    	// 	]);
	    	// 	$response['status'] = 'success';
	    	// 	$response['message'] = '1. Logged In at ' . $picket->updated_at;
	    	// }
	    	// else{}
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
		    		$response['message'] = '2. Logged In at ' . $picket->updated_at;
	    		} else {
	    			// Logout current cavis
	    			$picket->random_text = str_random();
	    			// die("here");
	    			$cavis->pickets()->save($picket);
	    			// $cavis->save();
	    			$response['status'] = 'success';
	    			$response['message'] = 'Logged Out at ' . $picket->updated_at;
	    		}
	    		
	    	// }
    		
    	} else {
    		$response['message'] = 'cavis not found';
    	}
    	

    	return response($response, 200);
    }
}

