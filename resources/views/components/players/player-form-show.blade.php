<form method="" action="{{ url("players") }}" >
    <div class="form-group">
        <label for="name">Name</label>
        <input
            disabled
            type="text"
            id="name"
            name="name"
            autocomplete="name"
            placeholder="Type your name"
            class="form-control"
            value="{{ $player->name }}"
            aria-describedby="nameHelp"
        >

    </div>
    <div class="form-group">
        <label for="address">Address</label>
        <input
            disabled
            type="text"
            id="address"
            name="address"
            autocomplete="address"
            placeholder="Type your address"
            class="form-control
            @error('address') is-invalid @enderror"
            value="{{ $player->address }}"
            aria-describedby="addressHelp"
        >
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea
            disabled
            id="description"
            name="description"
            rows="5"
            placeholder="Type your description"
            class="form-control"
        >{{ $player->description }}</textarea>
    </div>
    <div class="form-group">
        <label for="retired">Retired?</label>
        <div class="mb-4">
            <input
                disabled
                type="radio" 
                class="form-check form-check-inline" 
                name="retired" 
                id="retired_yes" 
                value="1" 
                {{ $player->retired ? 'checked' : '' }}>
            <label for="retired_yes"> Yes</label>
            <input
                disabled
                type="radio" 
                class="form-check form-check-inline" 
                name="retired" 
                id="retired_no" 
                value="0" 
                {{ !$player->retired ? 'checked' : '' }}>
            <label for="retired_no"> No</label>
        </div>
    </div>
    <button type="back" class="mt-2 mb-5 btn btn-primary">Back</a>
</form>