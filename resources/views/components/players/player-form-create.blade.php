<form method="POST" action="{{ url("players") }}" >
    @csrf
    <div class="form-group">
        <label for="name">Name</label>
        <input 
            type="text"
            id="name"
            name="name"
            autocomplete="name"
            placeholder="Type your name"
            class="form-control
            @error('name') is-invalid @enderror"
            value="{{ old('name') }}"
            required
            aria-describedby="nameHelp"
        >
        <small id="nameHelp" class="form-text text-muted">
            We'll never share your data with anyone else.
        </small>

        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="address">Address</label>
        <input 
            type="text"
            id="address"
            name="address"
            autocomplete="address"
            placeholder="Type your address"
            class="form-control
            @error('address') is-invalid @enderror"
            value="{{ old('address') }}"
            required
            aria-describedby="addressHelp"
        >

        @error('address')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea 
            id="description"
            name="description"
            rows="5"
            placeholder="Type your description"
            class="form-control
            @error('description') is-invalid @enderror"
        >{{ old('description') }}</textarea>

        @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="retired">Retired?</label>
        <div class="mb-4">
            <input 
                type="radio" 
                class="form-check form-check-inline" 
                name="retired" 
                id="retired_yes" 
                value="1" 
                {{ old('retired') === "1" ? 'checked' : '' }}>
            <label for="retired_yes"> Yes</label>
            <input 
                type="radio" 
                class="form-check form-check-inline" 
                name="retired" 
                id="retired_no" 
                value="0" 
                {{ old('retired') === "0" ? 'checked' : '' }}>
            <label for="retired_no"> No</label>
        </div>
    </div>

    <button type="submit" class="mt-2 mb-5 btn btn-primary">Submit</button>
</form>