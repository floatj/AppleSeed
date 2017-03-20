@extends('layout')

@section('head-required')
    <!-- Bootstrap toggle switch 開關 -->
    <script type="text/javascript" src="{{ asset('js/bootstrap-toggle.min.js') }}"></script>
    <link href="{{ asset('css/bootstrap-toggle.min.css') }}" rel="stylesheet">
@stop


@section('content')
    <button  name="add_button" value="0" class="btn btn-primary">Create</button><br /><br />
    <table class="table table-striped table-hover ">
        <thead>
        <tr class="info">
            <th>id</th>
            <th>keyword</th>
            <th>result</th>
            <th>locale</th>
            <th>state</th>
            <th>created_at</th>
            <th>updated_at</th>
            <th>Switch</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($dict as $word)
            <tr>
                <td>{{ $word->id }}</td>
                <td>{{ $word->keyword }}</td>
                <td>{{ $word->result }}</td>
                <td>{{ $word->locale }}</td>
                <td>{{ $word->state }}</td>
                <td>
                    {{ date('Y-m-d H:i:s', $word->created_at) }}
                </td>
                <td>
                    {{ date('Y-m-d H:i:s', $word->updated_at) }}
                </td>
                <td>
                    @if($word->state)   {{--開關--}}
                        <input type="checkbox" checked data-toggle="toggle">
                    @else
                        <input type="checkbox" data-toggle="toggle">
                    @endif
                </td>
                <td>
                    <button  name="edit_button" value="0" class="btn btn-warning">編輯</button>
                    <button  name="del_button" value="0" class="btn btn-danger">刪除</button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@stop


