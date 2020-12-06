<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        if (Auth::user()->type !== "admin") {
            return back();
        }
        $users = User::all();
        foreach ($users as $user) {
            $countRegisteredUsers = User::whereBetween('created_at', [Carbon::now()->subDays(7), Carbon::now()])->count();
        }


        return view('admin.index');
    }
}
