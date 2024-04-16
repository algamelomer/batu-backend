<?php

namespace App\Http\Controllers\Users;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Traits\CrudOperationsTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    use CrudOperationsTrait;

    const ROLES = ['admin', 'superAdmin', 'publisher', 'editor'];

    /*
    |--------------------------------------------------------------------------
    | Index Function
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        return $this->getRecord(new User, 'id', 'name', 'email', 'role');
    }

    /*
    |--------------------------------------------------------------------------
    | Show Function
    |--------------------------------------------------------------------------
    */
    public function show($id)
    {
        return $this->findById(new User, $id);
    }

    /*
    |--------------------------------------------------------------------------
    | Store Function
    |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8',
            'role' => 'required|in:' . implode(',', self::ROLES),
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        // Check if user has permission to create a user
        $currentUser = auth()->user();
        if (!in_array($currentUser->role, ['superAdmin', 'admin'])) {
            return response(['message' => "You don't have permission to perform this action."], 403);
        }

        // Check if user is trying to create a superAdmin
        // if ($request->input('role') === 'superAdmin' && $currentUser->role !== 'superAdmin')
        if ($request->input('role') === 'superAdmin') {
            return response()->json(['error' => 'You do not have the permission to add a superAdmin.'], 403);
        }

        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'role' => $request->input('role'),
        ];

        return $this->createRecord(new User, $data);
    }

    /*
    |--------------------------------------------------------------------------
    | Update Function
    |--------------------------------------------------------------------------
    */
    public function update(Request $request, $id)
    {
        $userToUpdate = User::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'string',
            'email' => 'email|unique:users,email,' . $id,
            'password' => 'string|min:8',
            'role' => 'in:' . implode(',', array_diff(self::ROLES, ['superAdmin'])),
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        // Check user has permission to update a user
        $currentUser = auth()->user();

        // SuperAdmin can update any user's role
        if ($currentUser->role === 'superAdmin') {
            // SuperAdmin can't demote another SuperAdmin
            if ($userToUpdate->role === 'superAdmin' ||  $request->input('role') === 'superAdmin') {
                return response()->json(['error' => 'You do not have the permission to demote another SuperAdmin.'], 403);
            }
        } elseif ($currentUser->role === 'admin') {
            // Admin can't promote another user to SuperAdmin
            if ($request->input('role') === 'superAdmin') {
                return response()->json(['error' => 'You do not have the permission to promote a user to SuperAdmin.'], 403);
            }
        } elseif (!in_array($currentUser->role, ['superAdmin', 'admin'])) {
            return response()->json(['error' => 'You do not have the permission to perform this action.'], 403);
        }

        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->filled('password') ? Hash::make($request->input('password')) : null,
            'role' => $request->input('role'),
        ];

        return $this->updateRecord(new User, $id, $data);
    }

    /*
    |--------------------------------------------------------------------------
    | Destroy Function
    |--------------------------------------------------------------------------
    */
    public function destroy($id)
    {
        $user = $this->findById(new User, $id);

        // Check permission of user
        $currentUser = auth()->user();
        if (!in_array($currentUser->role, ['superAdmin', 'admin'])) {
            return response()->json(['error' => 'You do not have the permission to delete this user.'], 403);
        }

        // Check if trying to delete a superAdmin
        if ($user->role === 'superAdmin') {
            return response()->json(['error' => 'You do not have the permission to delete the superAdmin.'], 403);
        }

        return $this->deleteRecord($user);
    }
}
