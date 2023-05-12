<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PatientResource;
use App\Models\Subjects\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PatientApiController extends Controller
{
    public function index()
    {
        $patient = Patient::all();
        return PatientResource::collection($patient);
    }

    public function getReceiptsWithPatient($id)
    {
        $receipts = DB::table('receipts')
            ->leftJoin('patients', 'patients.id', '=', 'receipts.patient_id')
            ->select('receipts.*')
            ->where('patients.id', '=', $id)
            ->get();

        return \response()->json($receipts);
    }


    public function getPharmaciesWithReceipt($id)
    {
        $pharmacies = DB::table('pharmacies')
            ->leftJoin('pharmacies_has_drugs', 'pharmacies_has_drugs.pharmacy_id', '=', 'pharmacies.id')
            ->leftJoin('receipts', 'receipts.drug_id', '=', 'pharmacies_has_drugs.drugs_id')
            ->select('pharmacies.*')
            ->where('receipts.drug_id', '=', $id)
            ->get();

        return \response()->json($pharmacies);
    }
}

