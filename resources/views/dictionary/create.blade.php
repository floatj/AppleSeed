@extends('layout')


@section('content')
    <h1>Create word</h1>
    <form class="form-horizontal" action="{{action('DictController@store')}}" method="POST">
        <!--key-->
        <label for="key">Key: </label>
        <input id="key" name="key"/><br/>
        <!--value-->
        <label for="value">Value: </label>
        <input id="value" name="value"/><br/>
        <!--class-->
        <label for="class">Class: </label>
        <input id="class" name="class"/><br/>
        <!--state-->
        <label for="state">State: </label>
        <input type="radio" name="state" value="1">Enable&nbsp;&nbsp;&nbsp;
        <input type="radio" name="state" value="0">Disable<br />
        <!--csrf token-->
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <!--submit button-->
        <input type="submit" value="Create"/>
    </form>
@stop


