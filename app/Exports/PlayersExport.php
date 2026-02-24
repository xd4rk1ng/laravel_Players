<?php

namespace App\Exports;

use App\Player;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;

class PlayersExport implements FromCollection, WithHeadings, WithMapping, WithStrictNullComparison, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Player::all();
    }

    public function map($player): array
    {
        return [
            $player->id,
            $player->name,
            $player->address,
            $player->description,
            $player->retired,
        ];
    }
    public function headings(): array
    {
        return [
            '#',
            'Name',
            'Address',
            'Description',
            'Retired',
        ];
    }
}
