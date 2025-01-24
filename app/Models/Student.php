<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable {
    use HasUlids;
    use Notifiable;
    protected $fillable = [
        'admission_number',
        'first_name',
        'middle_name',
        'last_name',
        'sex',
        'program',
        'option',
        'year',
        'dob',
        'password'
    ];

    public function registeredVoter() {
        return $this->hasMany(RegisteredVoter::class);
    }

    public function candidates() {
        return $this->hasMany(Candidate::class);
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
