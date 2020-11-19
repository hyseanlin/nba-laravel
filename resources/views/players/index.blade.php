@extends('app')

@section('title', '所有球員')

@section('nba_theme', 'NBA 目前有的球員')

@section('nba_contents')
    <table>
        <tr>
            <th>球員編號</th>
            <th>姓名</th>
            <th>球隊編號</th>
            <th>位置</th>
            <th>身高</th>
            <th>體重</th>
            <th>年資</th>
            <th>國籍</th>
            <th>操作1</th>
            <th>操作2</th>
        </tr>
        @foreach($players as $player)
            <tr>
                <td>{{ $player->id }}</td>
                <td>{{ $player->name }}</td>
                <td>{{ $player->tid }}</td>
                <td>{{ $player->position }}</td>
                <td>{{ $player->height }}</td>
                <td>{{ $player->weight }}</td>
                <td>{{ $player->year }}</td>
                <td>{{ $player->nationality }}</td>
                <td><a href="<?php echo route('players.show', ['id'=>$player->id]);?>">顯示</a></td>
                <td><a href="<?php echo route('players.edit', ['id'=>$player->id]);?>">修改</a></td>
            </tr>
        @endforeach
    </table>

@endsection
