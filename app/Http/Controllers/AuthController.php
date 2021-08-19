<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {
        return [
            "NIS" => 3103119025,
            "Name" => "Anila Dwi Lestari",
            "Gender" => "Perempuan",
            "Phone" => 6287888156767,
            "Class" => "XII RPL 1"
        ];
    }
}