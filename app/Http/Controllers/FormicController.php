<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Router;

use App\Gpio;
use App\Formic;

class FormicController extends Controller
{
    function create() {
        return view('formic_create', [
            'gpios'     => Gpio::pluck('name','id')
        ]);
    }
    
    function store(Request $request) {
        
        $formic = Formic::create($request->all());
        
        foreach ($request->input('gpios') as $gpio) {
            $formic->gpios()->attach($gpio);
        }
        
        return redirect()->route('formic.index');
    }
    
    function index() {
        return view('formic_index', [
            'formics' => Formic::all()
        ]);
    }
    
    function edit(Router $router) {
        return view('formic_edit', [
            'formic' => Formic::find($router->input('formic')),
            'gpios'  => Gpio::pluck('name','id')
        ]);
    }
    
    function update(Router $router, Request $request) {
        $formic = Formic::find($router->input('formic'));
        $formic->update($request->all());
        $formic->gpios()->sync($request->input('gpios'));
        
        return redirect()->route('formic.index');
    }
    
    function destroy(Router $router) {        
        Formic::destroy($router->input('formic'));

        return redirect()->route('formic.index');
    }
      
}
