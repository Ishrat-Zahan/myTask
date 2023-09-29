<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Organization;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;



class OrganizationController extends Controller{


	public function index(){

		$org = Organization::all();
		return view("organization.index",["org"=>$org]);
	}


	public function create(){

		return view("organization.create");
	}


	public function store(Request $request){

		Organization::create($request->all());

		return redirect()->route("organization.index")->with("success", "organization created successfully.");
	}


	public function show($id){
		$org = Organization::find($id);
		return view("organization.show",["org"=>$org]);
	}


	public function edit(Organization $organization){
		return view("organization.edit",["organization"=>$organization,]);
	}


	public function update(Request $request,Organization $organization){
		$organization->name = $request->name;
        $organization->description = $request->description;

        $organization->save();
		

		return redirect()->route("organization.index")->with('success','Updated Successfully.');
	}


	public function destroy(Organization $organization){

		$organization->delete();
		return redirect()->route("organization.index")->with('success', 'Deleted Successfully.');
	}
}
