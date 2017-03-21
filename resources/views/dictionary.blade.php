@extends('layout')

@section('head-required')
    <!-- Bootstrap toggle switch 開關 -->
    <script type="text/javascript" src="{{ asset('js/bootstrap-toggle.min.js') }}"></script>
    <link href="{{ asset('css/bootstrap-toggle.min.css') }}" rel="stylesheet">
@stop


@section('content')
    <div style="padding:20px; margin-bottom:20px; background-color:#ffebe2; color:#FFF;">
        <a href="{{ action('DictController@create') }}">
            <button name="create_button" id="create_button" class="btn btn-primary">Create</button>
        </a>
        <a href="{{ action('DictController@create_from_json') }}">
            <button name="create_from_json_button" id="create_from_json_button" class="btn btn-warning">Create from json</button>
        </a>
    </div>

    <table class="table table-striped table-hover ">
        <thead>
        <tr class="info">
            <th></th>
            <th>id</th>
            <th>keyword</th>
            <th>result</th>
            <th>classes</th>
            <th>created_at</th>
            <th>updated_at</th>
            <th>Switch</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($dict as $word)
            <tr>
                <td><input type="checkbox" /></td>
                <td>{{ $word->id }}</td>
                <td>{{ $word->key }}</td>
                <td>{{ $word->value }}</td>
                <td>{{ $word->class }}</td>
                <td>
                    {{$word->created_at}}
                </td>
                <td>
                    {{$word->updated_at}}
                </td>
                <td>
                    @if($word->state)   {{--開關--}}
                        <input type="checkbox" checked data-toggle="toggle">
                    @else
                        <input type="checkbox" data-toggle="toggle">
                    @endif
                </td>
                <td>
                    <button  name="edit_button" value="0" class="btn btn-warning">Modify</button>
                    <button  name="del_button" value="0" class="btn btn-danger">Delete</button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@stop


