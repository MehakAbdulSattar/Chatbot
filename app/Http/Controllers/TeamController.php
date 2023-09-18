<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Team;
use App\Models\Permission;
use Illuminate\Support\Facades\Validator;





class TeamController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }


    // index: Get a list of all teams.
    public function index()
    {
        $teams = Team::all();
        return response()->json(['data' => $teams]);
    }

    // store: Create a new team.



    public function store(Request $request)
    {
        $team = Team::create([
            'name' => $request->input('name'),
            'department_id' => $request->input('department_id'),
            'teamlead_id' => $request->input('teamlead_id'),
        ]);
        return $team;
        //$permissions = Permission::where('user_id',auth()->user()->id)->get();
        // if (Auth()->user()->hasPermissionTo('team_create')) {
        //     // User has permission to update the team
        //     return $team;
        // } else {
        //     // User does not have permission
        //     return response()->json(['message' => 'Permission denied'], 403);
        // }
    
        

        //return response()->json(['message' => 'Team created successfully', 'data' => $team], 201);
    }


    // show: Get a specific team by ID.

    // public function show($id)
    // {
    //     // return $Team=Team::all();
    //     $team = Team::find($id);
    //     if (!$team) {
    //         return response()->json(['error' => 'Team not found'], 404);
    //     }

    //     return response()->json(['data' => $team]);
    // }


    public function show($id)
    {
        // Find the Team by ID
        $team = Team::find($id);

        // Check if the Team exists
        if (!$team) {
            return response()->json(['error' => 'Team not found'], 404);
        }

        // Check if the user has permission to view this Team
        // if (Auth()->user()->hasPermission('view_team',$team))
        // {
        //     return response()->json(['error' => 'Unauthorized'], 403);
        // }

        // // If the user has the necessary permission, return the Team data
        return response()->json(['data' => $team]);
    }


    // update: Update a team's information.



    public function update(Request $request)
    {
        $team = Team::find($request->id);

        if (!$team) {
            return response()->json(['error' => 'Team not found'], 404);
        }
        
        $team->update([
            'name' => $request->input('name'),
            'department_id' => $request->input('department_id'),
            'teamlead_id' => $request->input('teamlead_id'),
        ]);
        return response()->json(['message' => 'Team updated successfully', 'data' => $team]);

    }


    // destroy: Delete a team.

    public function destroy($id)
    {
        $team = Team::find($id);

        if (!$team) {
            return response()->json(['error' => 'Team not found'], 404);
        }

        $team->delete();

        return response()->json(['message' => 'Team deleted successfully']);
    }
}