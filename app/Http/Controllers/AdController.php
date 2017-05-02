<?php

namespace App\Http\Controllers;

use View, Redirect;
use Illuminate\Support\Facades\DB;
use App\Ad as ad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class AdController extends Controller
{
    //
	public function index() {
		$data=ad::all()->sortByDesc("id");
		return View::make('home')->with('ads',$data);
	}
	public function store() {
		$ad=new ad;
		$ad->co_name=Input::get('co_name');
		$ad->job_description=Input::get('job_description');	
		$ad->rate=Input::get('rate');
		$ad->OIB=Input::get('OIB');
		$ad->user='admin';
		$ad->save();
		return Redirect::to('/');
	}
}
