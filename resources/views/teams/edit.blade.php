@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @include('message.list')
                    {!! Form::model($team, ['method'=>'PATCH', 'action'=>['\App\Http\Controllers\TeamsController@update', $team->id]]) !!}
                    @include('teams.form', ['submitButtonText'=>'更新球隊資料'])
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection