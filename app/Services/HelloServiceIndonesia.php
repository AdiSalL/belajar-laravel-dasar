<?php

namespace App\Services;


class HelloServiceIndonesia implements HelloServices {
    public function hello(string $name):string {
        return "Halo, Bagaimana Kabar ? " . $name;
    }
}