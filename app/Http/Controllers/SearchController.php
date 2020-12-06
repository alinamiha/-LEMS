<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $text_input = $request->input('text_input');
        $users = User::all()->where('fio', 'like', '%' . $text_input . '%');
        return response()->json($users);
    }

    public function searh()
    {

    }
}
