<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InputController extends Controller
{
    function hello(Request $request):string{
        $name = $request->input("name");
        return "Hello $name";
    }

    function helloFirst(Request $request):string{
        $firstname = $request->input("name.first");
        return "Hello $firstname";
    }

    function helloInput(Request $request):string{
        $input = $request->input();
        return json_encode($input);
    }

    function arrayInput(Request $request):string{
        $arrayInput = $request->input("product.*.name");
        return json_encode($arrayInput);
    }
}
