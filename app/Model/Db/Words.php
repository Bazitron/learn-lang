<?php

namespace App\Model\Db;

use Illuminate\Database\Eloquent\Model;

class Words extends Model
{
    protected $table = 'words';

    protected $fillable = [
        'word', 'created_at',
    ];
}
