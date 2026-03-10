<?php

namespace App\Imports;

use App\Player;
use App\Role;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PlayersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Player([
            'name' => $row['name'],
            'address' => $row['address'],
            'description' => $row['description'],
            'retired' => $row['retired'],
        ]);
    }
}
