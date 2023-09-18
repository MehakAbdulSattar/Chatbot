<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TeamMember;
use Illuminate\Support\Facades\Validator;

class TeamMemberController extends Controller
{

    // index: Get a list of all team members.

    public function index()
    {
        $teamMembers = TeamMember::all();
        return response()->json (['data' => $teamMembers]);
    }

    // store: Create a new team member.

    public function store(Request $request)
    {
        
        return response()->json([TeamMember::create([
            'team_id' => $request->team_id,
            'user_id' => $request->user_id,
        ])]);

        // if ($validator->fails()) {
        //     return response()->json(['error' => $validator->errors()], 400);
        // }

        //$teamMember = TeamMember::create($request->all());

        //return response()->json(['message' => 'Team member created successfully', 'data' => $teamMember], 201);
    }


    // destroy: Delete a team member.

    public function destroy($id)
    {
        $teamMember = TeamMember::find($id);

        if (!$teamMember) {
            return response()->json(['error' => 'Team member not found'], 404);
        }

        $teamMember->delete();

        return response()->json(['message' => 'Team member deleted successfully']);
    }
}