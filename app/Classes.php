<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    protected $table = "classes";

    //

    //取得語系
    function getAllClass() {

        return self::where('state', 1)->get()->toArray();

    }
}
