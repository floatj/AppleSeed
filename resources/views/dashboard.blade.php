@extends('layout')


@section('content')
    <h1>Dashboard</h1>
    nothing special.
    <hr>
    <h1>Query</h1>
    <form class="form-horizontal" action="{{action('DictController@search')}}" method="POST">
        <span id="helpBlock" class="help-block">請以 json 格式輸入欲查詢的字串陣列，
        格式： [ "查詢字串1", "查詢字串2", "查詢字串3" ... ]
        </span>
        範例：<br />
        <code>["這是範例1", "Hello, world!", "wtf5566"]</code>
        <textarea id="json_data" name="json_data" class="form-control" rows="2">

        </textarea>

        <!--csrf token-->
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <!--submit button-->
        <br/>
        <input class="btn btn-info" type="submit" value="Submit Query">
    </form>
@stop