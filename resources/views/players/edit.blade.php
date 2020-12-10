@extends('app')

@section('title', '編輯特定球員')

@section('nba_theme', '編輯中的球員')

@section('nba_contents')
    {!! Form::model($player, ['method'=>'PATCH', 'action'=>['\App\Http\Controllers\PlayersController@update', $player->id]]) !!}
    @include('players.form', ['submitButtonText'=>"更新球員資料"])
    {!! Form::close() !!}
@endsection
