<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PatternController extends Controller
{
    public function index() {
        for ($i = 1; $i <= 5; $i++) {
            for ($j = 1; $j <= 5; $j++) {
                echo $i * $j . " ";
            }
            echo "\n </br>";
        }
    }
}
