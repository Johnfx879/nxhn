<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(20);
        return view('users.index', compact('users'));
    }
    public function destroy(User $user)
    {
    // Check if the user is attempting to delete themselves
    if ($user->id === auth()->user()->id) {
        return redirect()->route('users.index')->with('error', 'You cannot delete yourself');
    }

    // Take Deletion Action Here
    $user->delete();

    return redirect()->route('users.index')->with('success', 'User deleted successfully');
    }

}