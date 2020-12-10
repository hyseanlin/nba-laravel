@extends('app')

@section('title', '所有球員')

@section('nba_theme', 'NBA 所有球員')

@section('nba_contents')
    <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l">
        <a href="{{ route('players.index') }} ">回到所有球員</a>
    </div>
    <table>
        <tr>
            <th>姓名</th>
            <th>所屬球隊</th>
            <th>位置</th>
            <th>身高</th>
            <th>體重</th>
            <th>年資</th>
            <th>國籍</th>
        </tr>
        @foreach($players as $player)
            <tr>
                <td>{{ $player->pname }}</td>
                <td>{{ $player->tname }}</td>
                <td>{{ $player->position }}</td>
                <td>{{ $player->height }}</td>
                <td>{{ $player->weight }}</td>
                <td>{{ $player->year }}</td>
                <td>{{ $player->nationality }}</td>
            </tr>
        @endforeach
    </table>

@endsection
