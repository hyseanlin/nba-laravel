
@extends('app')

@section('title', '顯示特定球員')

@section('nba_theme', '您所選取的球員資料')

@section('nba_contents')
球員編號：{{ $player->id }}<br/>
球員姓名：{{ $player->name }}<br/>
所屬球隊：{{ $player->team->name }}<br/>
球員生日：{{ $player->birthdate }}<br/>
球員到職日：{{ $player->onboarddate }}<br/>
球員位置：{{ $player->position }}<br/>
球員身高：{{ $player->height }}<br/>
球員體重：{{ $player->weight }}<br/>
球員年資：{{ $player->year }}<br/>
球員國籍：{{ $player->nationality }}<br/>
@endsection
