<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\BinaryFileResponse;


class ResponseController extends Controller
{
    //
    public function response(Request $request):Response {

        return \response("Hello Response", 200);
    }

    public function header(Request $request):Response {
        $body = [
            "firstName" => "Adi",
            "lastName" => "Santoso"
        ];
        return \response(json_encode($body), 200)
        ->header("Content-Type", "application/json")
        ->withHeaders([
            "Author" => "adisalafudin",
            "App" => "Belajar Laravel"
        ]);
    }

    public function responseView(Request $request){
        return \response()
        ->view("hello", ["name" => "Adi"]);
    }

    public function responseJson(Request $request): JsonResponse{
        $body = [
            "firstName" => "Adi",
            "lastName" => "Santoso"
        ];
        return response() 
            ->json($body);
    }

    public function responseFile(Request $request):BinaryFileResponse {
        return response()
        ->file(storage_path("app/public/pictures/448370655_1876164399521433_7688111721485699649_n.jpg"));
    }

    public function responseDownload(Request $request):BinaryFileResponse {
        return response()
        ->download(storage_path("app/public/pictures/448370655_1876164399521433_7688111721485699649_n.jpg"));
    }
}
