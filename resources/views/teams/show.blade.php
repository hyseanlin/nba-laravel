@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    球隊編號：{{ $team->id }}<br />
                    球隊名字：{{ $team->name }}<br />
                    球隊所在城市：{{ $team->city }}<br />
                    球隊分區：{{ $team->zone }}<br />
                    球隊主場：{{ $team->home }}<br />

                    <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l">
                        {{ $team->name }}所有球員
                    </div>
                    <table>
                        <tr>
                            <th>球員編號</th>
                            <th>姓名</th>
                            <th>生日</th>
                            <th>到職日</th>
                            <th>位置</th>
                            <th>身高</th>
                            <th>體重</th>
                            <th>年資</th>
                            <th>國籍</th>
                        </tr>
                        @foreach($players as $player)
                        <tr>
                            <td>{{ $player->id }}</td>
                            <td>{{ $player->name }}</td>
                            <td>{{ $player->birthdate }}</td>
                            <td>{{ $player->onboarddate }}</td>
                            <td>{{ $player->position }}</td>
                            <td>{{ $player->height }}</td>
                            <td>{{ $player->weight }}</td>
                            <td>{{ $player->year }}</td>
                            <td>{{ $player->nationality }}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection