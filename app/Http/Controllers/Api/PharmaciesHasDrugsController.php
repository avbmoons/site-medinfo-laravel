<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PharmaciesHasDrugsController extends Controller
{
    public function getPharmaciesHasDrugs() 
    {   
        $pharmacies = DB::table('pharmacies')
            ->leftjoin('pharmacies_has_drugs', 'pharmacies_has_drugs.pharmacy_id', '=', 'pharmacies.id')
            ->leftjoin('drugs', 'drugs.id', '=', 'pharmacies_has_drugs.drugs_id')
            ->select('pharmacies.*', 'drugs.name as caption_drug', 'pharmacies_has_drugs.count')
            ->get();

            return \response()->json($pharmacies);
        
    }
}
