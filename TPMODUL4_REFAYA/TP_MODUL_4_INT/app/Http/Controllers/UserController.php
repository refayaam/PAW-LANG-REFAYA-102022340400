<?php

// HINT: Add the index, create, store, edit, update, and destroy methods to the UserController

namespace App\Http\Controllers;

// 1. Import the User model


use Illuminate\Http\Request;

class UserController extends Controller
{
    // 2. Display the list of all users from the users table using compact
    public function index() {
        // fill in here
        return view('users.index', );
    }

    // 3. Display the form to add a new user
    public function create() {
        // fill in here
    }

    // 4. Save the new user to the users table
    public function store(Request $request) {
        $request->validate([
            // fill in here
            
            
        ]);

        User::create($request->all());
        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    // 5. Display the form to edit an existing user
    public function edit($id) {
        // fill in here
    }

    // 6. Save the user's changes to the users table
    public function update(Request $request, $id) {
        $user = User::findOrFail($id);
        $request->validate([
            // fill in here
            
            
        ]);

        $user->update($request->all());
        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    // 7. Delete the user from the users table
    public function destroy($id) {
        // fill in here

        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
