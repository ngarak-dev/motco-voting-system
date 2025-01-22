<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;

class Vote extends Model {
    use HasUlids;

    protected $fillable = [
        'voter_id',
        'candidate_id'
    ];
}
