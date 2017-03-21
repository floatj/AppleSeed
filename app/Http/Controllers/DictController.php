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
    public function search()
    {
        //搜尋頁面
        return view('dictionary/search');

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
        $dict::insert($input_array);

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
        //ㄑ
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
}
