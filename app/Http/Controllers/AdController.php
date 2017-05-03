<?php

namespace App\Http\Controllers;
use Auth;
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
	public function logout() {
		Auth::logout();
		return Redirect::to('/');
	}
	public function store() {
		$ad=new ad;
		$ad->co_name=Input::get('co_name');
		$ad->job_description=Input::get('job_description');	
		$ad->rate=Input::get('rate');
		$ad->OIB=Input::get('OIB');
		$ad->user=Auth::user()->name;
		$ad->save();
		return Redirect::to('/');
	}
	public function edit() {
		if(Auth::user()->name=='admin')
			$data=ad::all()->sortByDesc("id");
		else{			
			$data=ad::where('user', '=', Auth::user()->name)
			->orderBy('id', 'desc')
			->get();
		}
		return View::make('edit')->with('ads',$data);
	}
	public function delete($id) {
		$data=ad::where('id', '=', $id)
			->delete();
		return Redirect::to('/edit');
	}
	public function update() {
		$ad= ad::find(Input::get('id'));
		$ad->co_name=Input::get('co_name');
		$ad->job_description=Input::get('job_description');	
		$ad->rate=Input::get('rate');
		$ad->OIB=Input::get('OIB');
		$ad->save();
		return Redirect::to('/edit');
	}
}
