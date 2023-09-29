<?php

namespace App\Http\Controllers;

class WelcomeController
{
    public function __invoke() {
        return view('welcome', ['img' => fake()->imageUrl()]);
    }
}
