<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FileRecord;

class SearchController extends Controller
{
    public function Search(Request $request){
        $request->validate([
            'RptDt' => 'date|nullable',
            'TckrSymb' => 'string|nullable',
        ]);

        $queryFilter = FileRecord::query();

        if ($request->filled('RptDt')) {
            $queryFilter->whereDate('RptDt', $request->RptDt);
        }

        if ($request->filled('TckrSymb')) {            
            $queryFilter->where('TckrSymb', 'like', '%' . $request->TckrSymb . '%');
        }

        $uploads = $queryFilter->paginate(10);

        return response()->json($uploads);
    }
}
