<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class RedirectController extends Controller
{
    //
    public function redirectTo():string {
        return "got redirected";
    }

    public function redirectFrom():RedirectResponse {
        return redirect("/redirect/to");
    }

    public function redirectHello(string $name):string {
        return "Hello, $name";
    } 

    public function redirectName():RedirectResponse{
        return redirect()->route("redirect-hello", [
            "name" => "adi"
        ]);
    } 

    public function redirectAction() {
        return redirect()->action([RedirectController::class, "redirectHello"], [
            "name" => "adi"
        ]);
    }

    public function redirectAway() {
        return redirect()->away("https://www.youtube.com/");
    }

}
