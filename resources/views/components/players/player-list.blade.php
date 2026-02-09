<h1>Players List</h1>
@if (session('status'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('status') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif
<table class="table table-striped table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Address</th>
      <th scope="col">Retired</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($players as $player)
        <tr>
            <th scope="row">{{ $player->id }}</th>
            <td>{{ $player->name }}</td>
            <td>{{ $player->address }}</td>
            <td class="text-center">
                <i
                    class="bi  {{ $player->retired ? 'bi-emoji-frown-fill text-danger' : 'bi-emoji-laughing-fill text-primary' }}"
                    title="{{ $player->retired ? 'Retired' : 'Active' }}"
                ></i>

            </td>
            <td class="row">
                <a class="btn btn-success col" href="{{ url('players', ['player' => $player]) }}">Show</a>
                <a class="btn btn-primary col" href="{{ url('players/' . $player->id . '/edit') }}">Edit</a>
                <form action="{{ url('players/' . $player->id) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  
                  <button type="submit" class="btn btn-danger col-auto">Delete</a>
                </form>
            </td>
        </tr>
        
    @endforeach
  </tbody>
</table>
