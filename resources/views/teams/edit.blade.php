@extends('app')

@section('title', '編輯特定球隊')

@section('nba_theme', '編輯中的球隊')

@section('nba_contents')
球隊編號：{{ $id }}<br/>
球隊名字：{{ $name }}<br/>
球隊所在城市：{{ $city }}<br/>
球隊分區：{{ $zone }}<br/>
球隊主場：{{ $home }}<br/>
@endsection
