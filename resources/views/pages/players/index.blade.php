@extends('master.main')
@section('content')
    @component('components.players.player-list',['players' => $players])
    @endcomponent

@endsection