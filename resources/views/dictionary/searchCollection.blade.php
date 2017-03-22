@extends('layout')


@section('content')
    <h1>Search from Collection</h1>
    <p class="text-info">輸入一 json格式 字串陣列，回傳該字串陣列當中符合任一筆資料的 原始字串， key, value, class 及過濾掉該 key 的字串</p>
    {{--錯誤訊息--}}
    @if(!empty($err))
        <div class="alert alert-danger" role="alert">json_decode 解析失敗，請檢查輸入格式是否有誤</div>
    @endif
    <form class="form-horizontal" action="{{action('DictController@searchCollection')}}" method="POST">
        <span id="helpBlock" class="help-block">請以 json 格式輸入欲查詢的資料，
        格式： [ "查詢字串1", "查詢字串2", "查詢字串3" ... ]
        </span>
        範例：<br />
        <code>["hello, world!", "您老師", "how are you?", "WORK FOR FUN zzz"]</code>
        <textarea id="json_data" name="json_data" class="form-control" rows="2">@if(!empty($json_data)){{$json_data}}@endif</textarea>
        <!--csrf token-->
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <!--submit button-->
        <br/>
        <input class="btn btn-info" type="submit" value="Search">
    </form>
    @if(!empty($results))
        <h1>Results:</h1>
        @foreach($results as $item)
            {{ $item->key }} -> {{ $item->value }}<br/>
        @endforeach
    @endif
@stop


