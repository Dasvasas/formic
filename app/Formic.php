<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Formic extends Model
{
    use SoftDeletes;
    
    protected $dates = ['deleted_at'];
    
    protected $fillable = [
        'name', 'desc'
    ];
    
    public function gpios() {
        return $this->belongsToMany('App\Gpio', 'gpios_formics');
    }
}
