<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\DoctorResource;
use App\Models\Subjects\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DoctorApiController extends Controller
{
    public function index()
    {
        $doctors = Doctor::all();
        return DoctorResource::collection($doctors);
    }

    public function getDoctorsWithSpeciality($id)
    {
        $doctors = DB::table('doctors')
            ->leftjoin('specialities', 'specialities.id', '=', 'doctors.speciality_id')
            ->where('specialities.id', '=', $id)
            ->select('doctors.*', 'specialities.name as caption', 'specialities.description')
            ->get();

        return \response()->json($doctors);
    }

    public function getDoctorWithReceipts($id)
    {
        $receipts = DB::table('receipts')
            ->leftjoin('doctors', 'doctors.id', '=', 'receipts.doctor_id')
            ->select('receipts.*', 'receipts.name as caption', 'receipts.barcode')
            ->where('doctor_id', '=', $id)
            ->get();

        return \response()->json($receipts);
    }

    public function getDoctorWithPatientsWithReceipts($id)
    {
        $receipts = DB::table('patients')
            ->leftJoin('receipts', 'receipts.patient_id', '=', 'patients.id')
            ->leftjoin('doctors', 'doctors.id', '=', 'receipts.doctor_id')
            ->select('patients.*', 'patients.name', 'patients.surname', 'patients.barcode')
            ->where('doctor_id', '=', $id)
            ->get();

        return \response()->json($receipts);
    }
}
