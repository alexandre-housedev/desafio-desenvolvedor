<?php

namespace App\Imports;

use App\Models\FileRecord;
use Maatwebsite\Excel\Concerns\ToModel;
use Carbon\Carbon;

class YourCustomImport implements ToModel
{
    public function model(array $row)
    {

        try {
            $rptDt = isset($row[0]) ? Carbon::createFromFormat('d/m/Y', $row[0]) : null;
        } catch (\Exception $e) {            
            $rptDt = null;
        }

        return new FileRecord([
            'RptDt' => $rptDt ?? null,
            'TckrSymb' => $row[1] ?? '',
            'MktNm' => $row[5] ?? '',
            'SctyCtgyNm' => $row[6] ?? '',
            'ISIN' => $row[15] ?? '',
            'CrpnNm' => $row[48] ?? '',
        ]);
    }
}
