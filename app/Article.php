<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'user_email','deadline', 'level', 'mcqno','essayno','section','subject','receiver_email',
    ];//
}
