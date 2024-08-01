<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InputController extends Controller
{
    //
    public function hello(Request $request):string {
        // $name = $request->input("name");
         $name = $request->query("name");
        
        if(isset($name)) {
            return "Hello ". $name;
        }else {
            return "Hello There";
        }
    }

    public function helloFirstName(Request $request){
        $firstName = $request->input("name.first");
        return "Hello, $firstName";
    }

    public function helloInput(Request $request) {
        $request = $request->input();
        return json_encode($request);
    }

    public function arrayInput(Request $request) {
        $request = $request->input("products.*.name");
        return json_encode($request);
    }

}
