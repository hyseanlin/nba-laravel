@extends('app')

@section('title', 'NBA 球員')

@section('nba_theme', 'NBA 球員')

@section('nba_contents')

    <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l">
        <a href="{{ route('players.create') }} ">新增球員</a>
        <a href="{{ route('players.index') }} ">所有球員</a>
        <a href="{{ route('players.senior') }} ">資深球員</a>
        <form action="{{ url('players/position') }}" method='POST'>
            {!! Form::label('pos', '選取位置：') !!}
            {!! Form::select('pos', $positions, ['class' => 'form-control']) !!}
            <input class="btn btn-default" type="submit" value="查詢" />
            @csrf
        </form>
    </div>
    <table>
        <tr>
            <th>球員編號</th>
            <th>姓名</th>
            <th>所屬球隊</th>
            <th>生日</th>
            <th>到職日</th>
            <th>位置</th>
            <th>身高</th>
            <th>體重</th>
            <th>年資</th>
            <th>國籍</th>
            <th>操作1</th>
            <th>操作2</th>
            <th>操作3</th>
        </tr>
        @foreach($players as $player)
            <tr>
                <td>{{ $player->id }}</td>
                <td>{{ $player->name }}</td>
                <td>{{ $player->team->name }}</td>
                <td>{{ $player->birthdate }}</td>
                <td>{{ $player->onboarddate }}</td>
                <td>{{ $player->position }}</td>
                <td>{{ $player->height }}</td>
                <td>{{ $player->weight }}</td>
                <td>{{ $player->year }}</td>
                <td>{{ $player->nationality }}</td>
                <td><a href="{{ route('players.show', ['id'=>$player->id]) }}">顯示</a></td>
                <td><a href="{{ route('players.edit', ['id'=>$player->id]) }}">修改</a></td>
                <td>
                    <form action="{{ url('/players/delete', ['id' => $player->id]) }}" method="post">
                        <input class="btn btn-default" type="submit" value="刪除" />
                        @method('delete')
                        @csrf
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    @if ($players == null)
        {{ $players->links() }}
    @endif
@endsection
