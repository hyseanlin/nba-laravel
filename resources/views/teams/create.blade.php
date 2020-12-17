@extends('app')

@section('title', '建立球隊表單')

@section('nba_theme', '建立球隊的表單')

@section('nba_contents')
    @include('message.list')
    {!! Form::open(['url' => 'teams/store']) !!}
    @include('teams.form', ['submitButtonText'=>'新增球隊資料'])
    {!! Form::close() !!}
@endsection
