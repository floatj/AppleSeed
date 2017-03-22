@extends('layout')


@section('content')
    <h1>Search</h1>
    <form class="form-horizontal" action="{{action('DictController@search')}}" method="POST">
        <span id="helpBlock" class="help-block">請以 json 格式輸入欲查詢的資料，
        格式： [ "查詢字串1", "查詢字串2", "查詢字串3" ... ]
        </span>
        範例：<br />
        <!--<code>["今天你好嗎？", "呷飽未" , "how are you", "my #$%&^*(teacher 3$#$ is_very $#_ $nice", "work for fun"]</code>-->
        <code>["您"]</code>
        <textarea id="json_data" name="json_data" class="form-control" rows="2">@if(!empty($json_data)){{$json_data}}@endif</textarea>

        <!--csrf token-->
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <!--submit button-->
        <br/>
        <input class="btn btn-info" type="submit" value="Search">
    </form>
    @if(!empty($results))
        <h1>Results:</h1>
        @foreach($results as $result)
            @foreach($result as $item)
                {{ $item['value'] }}<br/>
            @endforeach
        @endforeach
    @endif
@stop


