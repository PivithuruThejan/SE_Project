<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class question extends Model
{
    protected $fillable = [
        'type', 'question', 'answer','marks','section','levelofHardness','questionbankemail','subjectname',
    ];
    //
}
