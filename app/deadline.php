<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class deadline extends Model
{
    protected $fillable = [
        'useremail', 'paperid', 'date&time',
    ];//
}
