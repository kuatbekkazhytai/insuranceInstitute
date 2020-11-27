<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    protected $fillable = [
        'phone', 'name', 'iin', 'start_date', 'finish_date', 'gos_number'
    ];

    public function additionalDrivers() {
        return $this->hasMany(AdditionalDriver::class);
    }
}
