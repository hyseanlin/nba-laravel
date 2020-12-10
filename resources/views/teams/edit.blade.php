@extends('app')

@section('title', '編輯特定球隊')

@section('nba_theme', '編輯中的球隊')

@section('nba_contents')
    {!! Form::model($team, ['method'=>'PATCH', 'action'=>['\App\Http\Controllers\TeamsController@update', $team->id]]) !!}
    @include('teams.form', ['submitButtonText'=>'更新球隊資料'])
    {!! Form::close() !!}
@endsection
