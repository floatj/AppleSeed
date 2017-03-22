@extends('layout')


@section('content')
    <h1>Create from json format</h1>
    <form class="form-horizontal" action="{{action('DictController@store')}}" method="POST">
        <span id="helpBlock" class="help-block">請以 json 格式輸入欲新增的資料，
        格式： [ {"key":"關鍵字", "value":"值", "class":"分類", "state","開關狀態"} ]
        </span>
        範例：<br />
        <code>[{"key":"hello","value":"world","class":"1"},{"key":"您","value":"老師","class":"2"},{"key":"deja","value":"vu","class":"3"}]</code>
        <textarea id="json_data" name="json_data" class="form-control" rows="10"></textarea>

        <!--csrf token-->
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <!--submit button-->
        <br/>
        <input class="btn btn-danger" type="submit" value="Submit">
    </form>
@stop


