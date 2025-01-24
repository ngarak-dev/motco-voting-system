<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;

class Candidate extends Model {
    use HasUlids;

    protected $fillable = [
        'president_id',
        'president_img',
        'vice_id',
        'vice_img',
    ];

    public function registeredVoter() {
        return $this->belongsTo(RegisteredVoter::class);
    }

    public function student() {
        return $this->belongsTo(Student::class);
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }
}
