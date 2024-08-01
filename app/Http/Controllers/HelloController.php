<?php

namespace App\Http\Controllers;

use App\Services\HelloServices;
use Illuminate\Http\Request;

class HelloController extends Controller
{
    private HelloServices $helloServices; 

    public function __construct(HelloServices $helloServices ) {
        $this->helloServices = $helloServices;
    }

    //function hello
    public function hello(Request $request, string $name):string {
        return $this->helloServices->hello($name);
    }

    public function request(Request $request){
        return $request->path() . PHP_EOL .
        $request->url() . PHP_EOL .
        $request->fullUrl() . PHP_EOL .
        $request->header("accept") . PHP_EOL
        ;
    }
}
