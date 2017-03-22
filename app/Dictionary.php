<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dictionary extends Model
{
    //DB Table 設定為 "dictionary"
    protected $table = 'dictionary';

    //搜尋 key->value
    public function getResult($search_array)
    {
        $selectColumn = array("key", "value");
        $ret = array();

        foreach ($search_array as $search_key)
        {
            $value = self::select($selectColumn)
                //->Where('key', $search_key)               // =
                ->Where('key', "LIKE", "%$search_key%" )    //wildcard search
                ->OrderBy('id', 'ASC')
                ->get()
                ->toArray();
            array_push($ret, $value);
        }

        return $ret;
    }

    //取出所有 key-value 資料
    public function getAllData()
    {
        $selectColumn = array("key", "value");
        $ret = self::select($selectColumn)
            ->get()
            ->toArray();
        return $ret;
    }

}
