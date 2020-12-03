@extends('app')

@section('title', '編輯特定球隊')

@section('nba_theme', '編輯中的球隊')

@section('nba_contents')
    球隊編號：{{ $id }}<br/>
    {!! Form::open(['url' => 'teams/update/' . $id, 'method' => 'patch']) !!}
    <div class="form-group">
        {!! Form::label('name', '球隊名字：') !!}
        {!! Form::text('name', $name, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('city', '城市：') !!}
        {!! Form::text('city', $city, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('zone', '分區：') !!}
        {!! Form::text('zone', $zone, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('home', '主場：') !!}
        {!! Form::text('home', $home, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('更新球隊', ['class'=>'btn btn-primary form-control']) !!}
    </div>
    {!! Form::close() !!}
@endsection
