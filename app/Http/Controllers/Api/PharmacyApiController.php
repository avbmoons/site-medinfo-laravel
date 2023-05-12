<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\DoctorResource;
use App\Http\Resources\PharmacyResource;
use App\Models\Subjects\Doctor;
use App\Models\Subjects\Pharmacy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PharmacyApiController extends Controller
{
    public function index()
    {
        $pharmacies = Pharmacy::all();
        return PharmacyResource::collection($pharmacies);
    }

    public function getDrugsWithPharmacy($id)
    {
        $drugs = DB::table('drugs')
            ->leftJoin('pharmacies_has_drugs', 'pharmacies_has_drugs.drugs_id', '=', 'drugs.id')
            ->leftjoin('pharmacies', 'pharmacies.id', '=', 'pharmacies_has_drugs.pharmacy_id')
            ->select('drugs.*')
            ->where('pharmacy_id', '=', $id)
            ->get();

        return \response()->json($drugs);
    }

    public function getPharmaciesWithDrugs($id)
    {
        $pharmacies = DB::table('pharmacies')
            ->leftJoin('pharmacies_has_drugs', 'pharmacies_has_drugs.pharmacy_id', '=', 'pharmacies.id')
            ->leftjoin('drugs', 'drugs.id', '=', 'pharmacies_has_drugs.drugs_id')
            ->select('pharmacies.*')
            ->where('drugs_id', '=', $id)
            ->get();

        return \response()->json($pharmacies);
    }
}

