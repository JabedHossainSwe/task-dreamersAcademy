<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Show the admin dashboard.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function dashboard()
    {
        // Logic for the admin dashboard
        return view('admin.dashboard');
    }

    /**
     * Show the list of users.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function userList()
    {
        // Retrieve the list of users from the database
        $users = User::all();

        // Pass the users data to the view
        return view('admin.user_list', ['users' => $users]);
    }

    /**
     * Approve a user registration.
     *
     * @param  int  $userId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function approveRegistration($userId)
    {
        // Find the user by ID
        $user = User::findOrFail($userId);

        // Update the user's status to approved
        $user->approved = true;
        $user->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'User registration approved successfully.');
    }

    /**
     * Block a user.
     *
     * @param  int  $userId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function blockUser($userId)
    {
        // Find the user by ID
        $user = User::findOrFail($userId);


        $user->blocked = true;
        $user->save();
        return redirect()->back()->with('success', 'User blocked successfully.');
    }

}
