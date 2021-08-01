<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
  public function me() {
    return ['NIS' => 3103119025,
        'Name' => 'Anila Dwi Lestari',
        'Gender' => 'Female',
        'Phone' => '087727508274',
        'Class' => 'XII RPL 1'];
  }
}