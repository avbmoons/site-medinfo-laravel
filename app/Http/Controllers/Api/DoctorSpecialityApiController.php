<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\DoctorResource;
use App\Models\Subjects\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DoctorSpecialityApiController extends Controller
{
    public function index()
    {
        $doctors = Doctor::all();
        return DoctorResource::collection($doctors);
    }

    public function getDoctorsWithSpeciality()
    {
        $doctors = DB::table('doctors')
            ->leftjoin('specialities', 'specialities.id', '=', 'doctors.speciality_id')
            ->select('doctors.*', 'specialities.name as caption', 'specialities.description')
            ->get();

        return \response()->json($doctors);
    }
}
