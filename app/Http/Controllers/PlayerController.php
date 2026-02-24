<?php

namespace App\Http\Controllers;

use App\Player;
use Illuminate\Http\Request;
use App\Exports\PlayersExport;
use App\Imports\PlayersImport;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
class PlayerController extends Controller
{
    /**
     * Export the resource
     * 
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function export()
    {
        return Excel::download(new PlayersExport, 'players.xlsx');
    }

    /**
     * Import the resource
     * 
     * @return \Illuminate\Http\Response
     */
    public function import()
    {
        request()->validate([
            'import_file' => 'required|file|mimes:xlsx',
        ]);

        Excel::import(new PlayersImport, request()->file('import_file'));

        return redirect('/')->with('status', 'File imported successfully.');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $players = Player::orderBy('id', 'desc')->take(10)->get();
        return view('pages.players.index', ['players' => $players]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.players.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'address' => 'required',
            'description' => 'required',
            'retired' => 'required',
            'image' => 'required|image|max:2048',
        ]);

        $player = Player::create([
            'name' => $request->name,
            'address' => $request->address,
            'description' => $request->description,
            'retired' => $request->retired
        ]);

        if ($request->file('image')) {
            $image = $request->file('image');
            $imageName = $player->id . '_' . time() . '_' . $image->getClientOriginalName();

            $path = $image
                ->storeAs(
                    "images/players/{$player->id}",
                    $imageName,
                    'public'
                );

            $player->update([
                'image_path' => $path
            ]);
        }

        return redirect('players')->with('status', 'Item created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function show(Player $player)
    {
        return view('pages.players.show', ['player' => $player]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function edit(Player $player)
    {
        return view('pages.players.edit', ['player' => $player]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Player $player)
    {
        $this->validate($request, [
            'name' => 'required',
            'address' => 'required',
            'description' => 'required',
            'retired' => 'required',
            'image' => 'image|max:2048',
        ]);

        $newImage = $request->file('image');
        if ($newImage) {
            $newImagePath = $newImage->storeAs($player->image_path, '', 'public');
        } else
            $newImagePath = $player->image_path;

        $request->image_path = $newImagePath;
        $player->update($request->all());

        return redirect('players')->with('status', 'Player updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function destroy(Player $player)
    {
        Storage::deleteDirectory('public/images/players/' . $player->id);
        $player->delete();
        return redirect('players')->with('status', 'Player deleted successfully.');
    }
}
