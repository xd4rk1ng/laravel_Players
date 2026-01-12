<div class="container">
    <h1>Players List</h1>
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
                        class="bi  {{ $player->retired ? 'bi-emoji-laughing-fill text-primary' : 'bi-emoji-frown-fill text-danger' }}"
                        title="{{ $player->retired ? 'Retired' : 'Active' }}"
                    ></i>

                </td>
                {{-- <td>{{ $player->retired}}</td> --}}
                <td>
                    <button class="btn btn-success">Show</button>
                    <button class="btn btn-primary">Edit</button>
                    <button class="btn btn-danger">Delete</button>
                </td>
            </tr>
            
        @endforeach
      </tbody>
    </table>

</div>
