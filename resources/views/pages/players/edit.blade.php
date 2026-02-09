@extends('master.main')
@section('content')

<div class="container">
    @component('components.players.player-form-edit', ['player' => $player])
    @endcomponent
</div>

@endsection