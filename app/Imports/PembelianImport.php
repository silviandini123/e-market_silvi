<?php

namespace App\Imports;

use App\Models\Pembelian;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PembelianImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Pembelian([
            'kode_masuk' => $row [1],
            'tanggal_masuk' => $row [2],
            'total' => $row [3],
            'pemasok_id' => $row [4],
            'user_id' => $row [5]
        ]);
    }

    public function headingRow(): int
    {
        return 3;
    }
}
