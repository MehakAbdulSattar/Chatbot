<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Permission;

class PermissionController extends Controller
{
    // app/Http/Controllers/PermissionController.php

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string',
            'model_type' => 'required|string',
            'model_id' => 'required|integer',
            'user_id' => 'required|integer|exists:users,id', // Validate user existence
        ]);

        // Create a new permission associated with the specified user
        $user = User::findOrFail($request->input('user_id')); // Fetch the user
        
        $permission = new Permission([
            'name' => $request->input('name'),
            'model_type' => $request->input('model_type'),
            'model_id' => $request->input('model_id'),
        ]);

        // Associate the permission with the specified user
        $user->permissions()->save($permission);

        return response()->json(['message' => 'Permission assigned successfully']);
    }
}

