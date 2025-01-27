<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class System extends Model {
    use HasFactory;
    
    public $fillable = [
      'id', 'start', 'end'
    ];
}
