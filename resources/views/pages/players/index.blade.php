@extends('master.main')
@section('content')
<div class="container">
    <div class="row mb-2 mt-2">
        <h1 class="col">Players List</h1>
        <div class="col-3">
            @component('components.players.player-import-export')
            @endcomponent
        </div>
        
    </div>
    @component('components.players.player-list',['players' => $players])
    @endcomponent
</div>

@endsection