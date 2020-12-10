@extends('app')

@section('title', '所有球隊')

@section('nba_theme', 'NBA 所有球隊')

@section('nba_contents')
    <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l">
        <a href="{{ route('teams.create') }} ">新增球隊</a>
    </div>
    <table>
        <tr>
            <th>編號</th>
            <th>名稱</th>
            <th>分區</th>
            <th>所在城市</th>
            <th>主場</th>
            <th>操作1</th>
            <th>操作2</th>
            <th>操作3</th>
        </tr>
        @foreach($teams as $team)
            @if ($team->zone == '西區')
                <tr style="color:red;">
                    <td>{{ $team->id }}</td>
                    <td>{{ $team->name }}</td>
                    <td>{{ $team->zone }}</td>
                    <td>{{ $team->city }}</td>
                    <td>{{ $team->home }}</td>
                    <td><a href="{{ route('teams.show', ['id' => $team->id]) }}">顯示</a></td>
                    <td><a href="{{ route('teams.edit', ['id' => $team->id]) }}">修改</a></td>
                    <td>
                        <form action="{{ url('/teams/delete', ['id' => $team->id]) }}" method="post">
                            <input class="btn btn-default" type="submit" value="刪除" />
                            @method('delete')
                            @csrf
                        </form>
                    </td>
                </tr>
            @else
                <tr style="color:blue;">
                    <td>{{ $team->id }}</td>
                    <td>{{ $team->name }}</td>
                    <td>{{ $team->zone }}</td>
                    <td>{{ $team->city }}</td>
                    <td>{{ $team->home }}</td>
                    <td><a href="{{ route('teams.show', ['id' => $team->id]) }}">顯示</a></td>
                    <td><a href="{{ route('teams.edit', ['id' => $team->id]) }}">修改</a></td>
                    <td>
                        <form action="{{ url('/teams/delete', ['id' => $team->id]) }}" method="post">
                            <input class="btn btn-default" type="submit" value="刪除" />
                            @method('delete')
                            @csrf
                        </form>
                    </td>
                </tr>
            @endif
        @endforeach
    </table>
@endsection
