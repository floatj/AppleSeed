<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    //
    public function search(Request $request, $parm = null)
    {

        //資料為空
        if($parm == null){
            //400 bad request

            $ret = array("ret" => array("status" => "400", "msg" => "Bad Request", "error" => "No input value, or input value is invalid, please check your request parm !!!"));
            $ret = json_encode($ret);
            echo $ret;
            exit;
        }


        //input parm ok!

        //debug
        //dd($ret);
        //$input_data = $request->input('parm');

        //$ret = array("ret" => array("status" => "200", "msg" => "OK", "result"=> $parm));
        //$ret = json_encode($ret);
        //echo $ret;
        //exit;

        //解析輸入資料
        $search_array = json_decode($parm, true);
        /*
        if (empty($search_array)) {
            //json 解析失敗
            return view('dictionary/searchCollection', array('json_data' => $input_data, 'err' => -1));
        }*/

        //@TODO: 逐條比對抽出成為獨立 function
        $results = $this->searchArrayKeyword($parm);

        //無結果
        if($results==null) {
            $ret = array("ret" => array("status" => "200", "msg" => "OK", "info" => "No results found in dictionary"));
            $ret = json_encode($ret);
            echo $ret;
            exit;
        }

        //有結果，返回 json
        $ret = array("ret" => array("status" => "200", "msg" => "OK", "result" => $results));
        $ret = json_encode($ret);
        echo $ret;

        //return view('dictionary/searchCollection', array('json_data' => $input_data ,'results' => $results));
    }

    //逐條比對並回傳陣列(含原始字串, key, value, class 及 過濾後字串)
    public function searchArrayKeyword($search_array)
    {


        //取得DB內所有 key-value 資料
        $dict = \App\Dictionary::all();
        $results = array();

        //逐條比對每一筆輸入資料
        //foreach ($search_array as $item) {
            foreach ($dict as $word) {
                //搜尋 pattern 為字典每一筆資料的 key
                $pattern = $word->key;
                if (preg_match("/$pattern/i", $search_array)) {
                    //有找到資料

                    //原始$item, key, value, class
                    $ret = array("origin"=> $search_array ,"key" => $word->key, "value" => $word->value, "class" => $word->class);
                    array_push($results, $ret);

                    //繼續找下一筆輸入資料
                    //continue 2;
                    break;
                }
            }
        //}

        return $results;
    }


}
