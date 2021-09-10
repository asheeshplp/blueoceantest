<?php

namespace App\Http\Controllers;
use App\View3d;

use App\Http\Controllers\Controller;

class View3dController extends Controller
{
    /**
     * Fetch the records from View3d table
     * @param  int  $id
     * @return View
     */
    public function show()
    {
        $data = View3d::all();
		return view('view3d')->with('data',$data);
    }
}