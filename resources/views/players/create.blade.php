@extends('app')

@section('title', '建立球員表單')

@section('nba_theme', '建立球員的表單')

@section('nba_contents')
    @include('message.list')
    {!! Form::open(['url' => 'players/store']) !!}
    @include('players.form', ['submitButtonText'=>"新增球員資料"])
    {!! Form::close() !!}
@endsection
