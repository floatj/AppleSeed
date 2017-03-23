<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dictionary;

class DictController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $dict = \App\Dictionary::all();

        //var_dump($dict);
        //$dict = array(1,2,3,4,5,);

        return view('dictionary', ["dict"=>$dict]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //新增資料頁面
        return view('dictionary/create');

    }

    /**
     * 搜尋資料
     *
     * @return \Illuminate\Http\Response
     */
    //顯示搜尋單詞
    public function showSearch()
    {
        return view('dictionary/search');

    }

    //執行搜尋單詞
    public function search(Request $request)
    {
        $input_data = $request->input('json_data');
        $results = array();

        if(!empty($input_data)) {
            $search_array = json_decode($input_data, true);

            if(empty($search_array)) {
                //json 解析失敗
                return view('dictionary/search', array('json_data' => $input_data ,'results' => -1));
            }

            //搜尋Key
            $dict = new Dictionary();
            $results = $dict->getResult($search_array);
        }

        //回搜尋頁面
        return view('dictionary/search', array('json_data' => $input_data ,'results' => $results));
    }

    //顯示搜尋集合
    public function showSearchCollection()
    {
        return view('dictionary/searchCollection');

    }
    //執行搜尋集合
    public function searchCollection(Request $request)
    {
        $input_data = $request->input('json_data');

        //資料為空
        if (empty($input_data)) return view('dictionary/searchCollection', array('json_data' => $input_data));

        //解析輸入資料
        $search_array = json_decode($input_data, true);
        if (empty($search_array)) {
            //json 解析失敗
            return view('dictionary/searchCollection', array('json_data' => $input_data, 'err' => -1));
        }

        //@TODO: 逐條比對抽出成為獨立 function
        $results = $this->searchArrayKeyword($search_array);

        return view('dictionary/searchCollection', array('json_data' => $input_data ,'results' => $results));
    }

    /**
     * 產生新資料（json格式）
     *
     * @return \Illuminate\Http\Response
     */
    public function create_from_json()
    {
        //新增資料 (from json) 頁面
        return view('dictionary/create_json');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //儲存資料

        //判斷是否為 json 或單筆新增
        $json_data = $request->input('json_data');
        if(!empty($json_data)){
            //多筆新增，從json匯入
            $input_array= json_decode($json_data, true);

        }else{
            //單筆新增
            $input_array = array();
            $ret['key'] = $request->input('key');
            $ret['value'] = $request->input('value');
            $ret['class'] = $request->input('class');
            array_push($input_array, $ret);

        }

        //@todo: 網路資料上面寫說大量新增資料時，由於效能考量，不應該使用 EloquentORM = =
        //ref: http://stackoverflow.com/questions/12702812/bulk-insertion-in-laravel-using-eloquent-orm

        //model 操作
        $dict = new Dictionary();
        $dict::insert($input_array);    //用 insert 的話不會新增 timestamp

        /*
        foreach($input_array as $input) {
            print_r($input);

            $dict->key = $input['key'];
            $dict->value = $input['value'];
            $dict->class = $input['class'];
            $dict->save();
        }
        */

        //回到顯示頁面
        return redirect()->action('DictController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    //逐條比對並回傳陣列(含原始字串, key, value, class 及 過濾後字串)
    public function searchArrayKeyword($search_array)
    {
        //取得DB內所有 key-value 資料
        $dict = \App\Dictionary::all();
        $results = array();

        //逐條比對每一筆輸入資料
        foreach ($search_array as $item) {
            foreach ($dict as $word) {
                //搜尋 pattern 為字典每一筆資料的 key
                $pattern = $word->key;
                if (preg_match("/$pattern/i", $item)) {
                    //有找到資料，進行取代
                    //@todo: 取代的方式可改成可選擇的參數之類的
                    $item_replaced = preg_replace("/$pattern/i", "<<關鍵字已被過濾>>",$item);

                    //原始$item, key, value, class, 取代過的 $item
                    $ret = array("origin"=> $item ,"key" => $word->key, "value" => $word->value, "class" => $word->class, "filter" => $item_replaced);
                    array_push($results, $ret);

                    //繼續找下一筆輸入資料
                    continue 2;
                }
            }
        }

        //debug
        /*
        echo "<pre>";
        print_r($results);
        echo "</pre>";
        exit;
        */
        return $results;
    }

    //...
}
