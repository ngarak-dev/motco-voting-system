<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;

class RegisteredVoter extends Model {
    use HasUlids;

    protected $fillable = [
        'student_id',
        'voted'
    ];

    public function student() {
        return $this->belongsTo(Student::class);
    }

     /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'voted' => 'boolean'
        ];
    }
}
