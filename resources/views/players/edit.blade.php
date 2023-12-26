@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @include('message.list')
                    {!! Form::model($player, ['method'=>'PATCH', 'action'=>['\App\Http\Controllers\PlayersController@update', $player->id]]) !!}
                    @include('players.form', ['submitButtonText'=>"更新球員資料"])
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection