@extends('master.main')
@section('content')
<div class="container">
    @component('components.players.player-list',['players' => $players])
    @endcomponent
</div>

@endsection