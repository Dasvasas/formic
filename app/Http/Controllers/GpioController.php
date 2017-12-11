<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Router;

use App\Gpio;

class GpioController extends Controller
{

    function create() {
        return view('gpio_create');
    }
    
    function store(Request $request) {
        Gpio::create($request->all());
        
        return redirect()->route('gpio.index');
    }
    
    function index() {
        return view('gpio_index', [
            'gpios' => Gpio::all()
        ]);
    }
    
    function edit(Router $router) {
        return view('gpio_edit', [
            'gpio' => Gpio::find($router->input('gpio'))
        ]);        
    }
    
    function update(Router $router, Request $request) {
        Gpio::find($router->input('gpio'))->update($request->all());
        
        return redirect()->route('gpio.index');
    }
}
