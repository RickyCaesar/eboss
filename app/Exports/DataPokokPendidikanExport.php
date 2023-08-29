<?php

namespace App\Exports;

use App\Models\DataPokokPendidikan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class DataPokokPendidikanExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('exports.format', [
            'bos' => DataPokokPendidikan::all()
        ]);
    }
}
