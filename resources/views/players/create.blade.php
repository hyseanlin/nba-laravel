@extends('app')

@section('title', '建立球員表單')

@section('nba_theme', '建立球員的表單')

@section('nba_contents')
球員編號：{{ $id }}<br/>
球員姓名：{{ $name }}<br/>
球隊編號：{{ $tid }}<br/>
球員位置：{{ $position }}<br/>
球員身高：{{ $height }}<br/>
球員體重：{{ $weight }}<br/>
球員年資：{{ $year }}<br/>
球員國籍：{{ $nationality }}<br/>

@endsection
