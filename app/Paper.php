<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paper extends Model
{
    protected $fillable = [
        'user_email','deadline', 'level', 'mcqno','essayno','section','subject','receiver_email',
    ];
    //
}
