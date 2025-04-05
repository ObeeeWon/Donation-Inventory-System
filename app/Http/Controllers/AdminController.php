<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{

    public function viewUsers()
{
    $users = User::all();

    return view('admin.view-users', compact('users'));
}

    public function createUserForm()
    {
        $roles = ['Admin', 'Manager', 'User'];
        $locations = ['Warehouse 1', 'Warehouse 2', 'Headquarters'];

        return view('admin.create-user', compact('roles', 'locations'));
    }

    // Handle the user creation
    public function createUser(Request $request)
    {
        // Validate the input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|string', 
            'location' => 'required|string',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => $validated['role'],
            'location' => $validated['location'],
        ]);

        return redirect()->route('admin.viewUsers')->with('success', 'User created successfully!');
    }

    public function editUser($UserID)
    {
        // Find the user by ID
        $user = User::where('UserID', $UserID)->firstOrFail();

    // Define hardcoded roles and locations (or fetch from the database)
        $roles = ['Admin', 'Manager', 'User']; // Example roles
        $locations = ['Warehouse 1', 'Warehouse 2', 'Headquarters']; // Example locations

    // Pass the user, roles, and locations to the view
        return view('admin.edit-user', compact('user', 'roles', 'locations'));
    }

    public function updateUser(Request $request, $UserID)
    {   
    // Find the user by ID
        $user = User::findOrFail($UserID);

    // Validate the input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'string', 'email', 'max:255', \Illuminate\Validation\Rule::unique('users', 'email')->ignore($user->UserID, 'UserID'),],
            'password' => 'nullable|string|min:8|confirmed', // Password is optional
            'role' => 'required|string',
            'location' => 'required|string',
        ]);

        // Update the user fields
        $user->name = $validated['name'];
        $user->email = $validated['email'];

        if ($request->filled('password')) {
            $user->password = Hash::make($validated['password']);
        }

        // Update the role and location
        $user->role = $validated['role'];
        $user->location = $validated['location'];

        // Save the updated user
        $user->save();

        // Redirect with a success message
        return redirect()->route('admin.viewUsers')->with('success', 'User updated successfully!');
    }

    public function deleteUser($UserID)
    {
        // Find the user by ID
        $user = User::findOrFail($UserID);

        // Delete the user
        $user->delete();

        // Redirect with a success message
        return redirect()->route('admin.viewUsers')->with('success', 'User deleted successfully!');
    }
}

