@extends('master.main')
@section('content')

<div class="container">
    @component('components.players.player-form-show', ['player'=>$player])
    @endcomponent
</div>

@endsection