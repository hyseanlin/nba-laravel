@extends('app')

@section('title', '建立球隊表單')

@section('nba_theme', '建立球隊的表單')

@section('nba_contents')

    {!! Form::open() !!}
        球隊編號：{{ $id }}<br/>
        球隊名字：{{ $name }}<br/>
        球隊所在城市：{{ $city }}<br/>
        球隊分區：{{ $zone }}<br/>
        球隊主場：{{ $home }}<br/>
    {!! Form::close() !!}
@endsection
