<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dictionary extends Model
{
    //DB Table 設定為 "dictionary"
    protected $table = 'dictionary';

    //搜尋
    public function getResult($search_array)
    {
        //搜尋欄位
        $selectColumn = array("value");

        //回傳陣列
        $ret = array();

        //query builder
        foreach ($search_array as $search_key)
        {
            $value = self::select($selectColumn)
                //->Where('key', $search_key)
                ->Where('key', "LIKE", "%$search_key%" )    //wildcard search
                ->OrderBy('id', 'ASC')
                ->get()
                ->toArray();
            array_push($ret, $value);
        }

        return $ret;
    }

}
