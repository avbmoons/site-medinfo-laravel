<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Enums\PatientStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\Patients\CreateRequest;
use App\Http\Requests\Patients\EditRequest;
use App\Models\Subjects\Patient;
use App\QueryBuilders\PatientsQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PatientsQueryBuilder $patientsQueryBuilder): View
    {
        $patientsList = $patientsQueryBuilder->getPatientsWithPagination();
        return \view('admin.patients.index', [
            'patientsList' => $patientsList
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        $statuses = PatientStatus::all();

        return \view('admin.patients.create', [
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
        $patients = Patient::create($request->validated());

        if ($patients->save()) {
            return redirect()->route('admin.patients.index')
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
        $patient = Patient::findOrFail($id);
        return \view('admin.patients.show', ['patient' => $patient]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Patient $patient)
    {
        $statuses = PatientStatus::all();
        return \view('admin.patients.edit', [
            'patient' => $patient,
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
    public function update(EditRequest $request, Patient $patient): RedirectResponse
    {
        $patient = $patient->fill($request->validated());

        if ($patient->update()) {
            return redirect()->route('admin.patients.index')
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
    public function destroy(Patient $patient)
    {
        try {
            $patient->delete();

            return \response()->json('ok');
        } catch (\Exception $exception) {

            return \response()->json('error', 400);
        }
    }
}
