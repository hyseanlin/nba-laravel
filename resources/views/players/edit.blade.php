@extends('app')

@section('title', '編輯特定球員')

@section('nba_theme', '編輯中的球員')

@section('nba_contents')
    球員編號：{{ $id }}<br/>
    {!! Form::open(['url' => 'players/update/' . $id, 'method' => 'patch']) !!}
    <div class="form-group">
        {!! Form::label('name', '球員姓名：') !!}
        {!! Form::text('name', $name, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('tid', '球隊編號：') !!}
        {!! Form::text('tid', $tid, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('position', '球員位置：') !!}
        {!! Form::text('position', $position, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('height', '球員身高：') !!}
        {!! Form::text('height', $height, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('weight', '球員體重：') !!}
        {!! Form::text('weight', $weight, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('year', '球員年資：') !!}
        {!! Form::text('year', $year, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('nationality', '球員國籍：') !!}
        {!! Form::text('nationality', $nationality, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('更新球員', ['class'=>'btn btn-primary form-control']) !!}
    </div>
    {!! Form::close() !!}
@endsection
