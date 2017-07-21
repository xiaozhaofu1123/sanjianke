<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TempEmail extends Model
{
    protected $table = 'email';
    protected $primaryKey = 'id';

    public $timestamps = false;
}
