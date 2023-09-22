<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
// use App\Http\Controllers\Controller;

class DepartmentController extends Controller
{  
    
    public function __construct()
    {
        $this->middleware('auth:api');
    }


    public function adding(Request $request)
    {
        $department = Department::create([
            'name'=>$request->input('name'),
        ]) ;

        return $department;

    }
    public function updating(Request $request,$id)
    {
        $items= Department::find($id);
        $items->name=$request->name;
        $items->update();
        return response()->json('Department Updated Succesfully');
    }

    public function delete(Request $request)
    {
        $items= Department::findorfail($request->id)->delete();
        
        return response()->json('Department deleted Succesfully');
    }
    public function getData()
    {
        $items= Department::all();
        return response()->json($items);
    }
}