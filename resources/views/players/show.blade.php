@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    球員編號：{{ $player->id }}<br />
                    球員姓名：{{ $player->name }}<br />
                    所屬球隊：{{ $player->team->name }}<br />
                    球員生日：{{ $player->birthdate }}<br />
                    球員到職日：{{ $player->onboarddate }}<br />
                    球員位置：{{ $player->position }}<br />
                    球員身高：{{ $player->height }}<br />
                    球員體重：{{ $player->weight }}<br />
                    球員年資：{{ $player->year }}<br />
                    球員國籍：{{ $player->nationality }}<br />
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection