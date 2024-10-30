<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FileRecord extends Model
{
    protected $fillable = [
        'RptDt',
        'TckrSymb',
        'MktNm',
        'SctyCtgyNm',
        'ISIN',
        'CrpnNm',
    ];
}