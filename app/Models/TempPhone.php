<?php

/**
 * @Author: anchen
 * @Date:   2017-07-20 18:36:31
 * @Last Modified by:   anchen
 * @Last Modified time: 2017-07-20 18:37:45
 */


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TempPhone extends Model
{
    protected $table = 'phone';
    protected $primaryKey = 'id';

    public $timestamps = false;
}
