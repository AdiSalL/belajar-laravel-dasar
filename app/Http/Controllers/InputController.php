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

    public function inputType(Request $request) {
        $name = $request->input("name");
        $married = $request->boolean("married");
        $birthDate = $request->date("birth_date", "Y-m-d");

        return json_encode([
            "name" => $name,
            "married" => $married,
            "birth_date" => $birthDate->format("Y-m-d")
        ]);
    }

    public function filterOnly(Request $request) {
        $name = $request->only(["name.first", "name.last"]);
        return json_encode($name);
    }

    public function filterExcept(Request $request){
        $user = $request->except("admin");
        return json_encode($user);
    }

    public function filterMerge(Request $request){
        $request->merge([
            "admin" => false,
        ]);
        $user = $request->input();
        return json_encode($user);
    }


}
 