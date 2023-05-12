<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DoctorSpecialityController extends Controller
{
    public function getDoctorsWithSpeciality()
    {
        $doctors = DB::table('doctors')
            ->leftjoin('specialities', 'specialities.id', '=', 'doctors.speciality_id')
            ->select('doctors.*', 'specialities.name as caption', 'specialities.description')
            ->get();

            return \response()->json($doctors);

    }
}
