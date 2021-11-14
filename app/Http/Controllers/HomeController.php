<?php

    namespace App\Http\Controllers;

    use App\Models\Slider;

    class HomeController extends Controller
    {
        public function index()
        {
            $sliders = Slider ::all() -> take(3);
            return view('theme.index', compact('sliders'));
        }
    }

