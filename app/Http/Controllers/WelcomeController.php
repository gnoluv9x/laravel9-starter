<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index($slug)
    {
        return view("welcome", [
            "data" => $slug
        ]);
    }

    public function create()
    {
        return view("form");
    }

    public function post(Request $request)
    {
        $name = $request->get("name");

        echo "My name is $name";
    }
}
