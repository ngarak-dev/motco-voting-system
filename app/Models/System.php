<?php

namespace App\Models;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class System extends Model {
    use HasFactory;

    public $fillable = [
      'id', 'start', 'end'
    ];

    public function isOpen(): bool {
        $now = Carbon::now();
        return $now->between($this->start, $this->end);
    }
}
