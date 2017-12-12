<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Metric extends Model
{
    use SoftDeletes;
    
    protected $dates = ['deleted_at'];
    
    protected $fillable = [
        'gpios_id', 'temperature', 'humidity'
    ];
    
    protected $primaryKey = null;
    
    public $incrementing = false;
}
