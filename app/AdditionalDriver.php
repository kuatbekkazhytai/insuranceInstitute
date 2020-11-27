<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdditionalDriver extends Model
{
    protected $fillable = [
         'name', 'iin', 'record_id',
    ];

    public function record() {
        return $this->belongsTo(Record::class);
    }
}
