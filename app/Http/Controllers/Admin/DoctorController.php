<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Enums\DoctorStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\Doctors\CreateRequest;
use App\Http\Requests\Doctors\EditRequest;
use App\Models\Subjects\Doctor;
use App\QueryBuilders\DoctorsQueryBuilder;
use App\QueryBuilders\SpecialitiesQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(DoctorsQueryBuilder $doctorsQueryBuilder): View
    {
        $doctorsList = $doctorsQueryBuilder->getDoctorsWithPagination();

        return \view('admin.doctors.index', [
            'doctorsList' => $doctorsList,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(SpecialitiesQueryBuilder $specialitiesQueryBuilder): View
    {
        $statuses = DoctorStatus::all();

        return \view('admin.doctors.create', [
            'specialities' => $specialitiesQueryBuilder->getAll(),
            'statuses' => $statuses,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request): RedirectResponse
    {
        $doctors = Doctor::create($request->validated());

        if ($doctors->save()) {
            return redirect()->route('admin.doctors.index')
                ->with('success', 'Запись успешно добавлена');
        }
        return \back()->with('error', 'Не удалось сохранить запись');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $doctor = Doctor::findOrFail($id);
        return \view('admin.doctors.show', ['doctor' => $doctor]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor, SpecialitiesQueryBuilder $specialitiesQueryBuilder)
    {
        $statuses = DoctorStatus::all();
        return \view('admin.doctors.edit', [
            'doctor' => $doctor,
            'specialities' => $specialitiesQueryBuilder->getAll(),
            'statuses' => $statuses,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditRequest $request, Doctor $doctor): RedirectResponse
    {
        $doctor = $doctor->fill($request->validated());

        if ($doctor->update()) {
            return redirect()->route('admin.doctors.index')
                ->with('success', 'Запись успешно обновлена');
        }
        return \back()->with('error', 'Не удалось сохранить обновление');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {
        try {
            $doctor->delete();

            return \response()->json('ok');
        } catch (\Exception $exception) {

            return \response()->json('error', 400);
        }
    }
}
