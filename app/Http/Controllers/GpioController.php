<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Gpio;

class GpioController extends Controller
{
    // Create new gpio
    function create() {
        return view('gpio_create');
    }
    
    function store(Request $request) {
        
        print_r($request->all());
        
        $gpio = new Gpio();
        $gpio->name = $request->input('name');
        $gpio->pin = $request->input('pin');
        $gpio->type = $request->input('type');
        $gpio->cmd = $request->input('cmd');
        $gpio->save();
        
        return back();
    }
}
