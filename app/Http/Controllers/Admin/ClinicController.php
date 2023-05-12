<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Enums\ClinicStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\Clinics\CreateRequest;
use App\Http\Requests\Clinics\EditRequest;
use App\Models\OrganizationType;
use App\Models\Subjects\Clinic;
use App\QueryBuilders\ClinicsQueryBuilder;
use App\QueryBuilders\OrganizationTypesQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ClinicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ClinicsQueryBuilder $clinicsQueryBuilder): View
    {
        $clinicsList = $clinicsQueryBuilder->getClinicsWithPagination();
        return \view('admin.clinics.index', [
            'clinicsList' => $clinicsList
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(OrganizationTypesQueryBuilder $organizationTypesQueryBuilder): View
    {
        $statuses = ClinicStatus::all();
        return \view('admin.clinics.create', [
            'organization_types' => $organizationTypesQueryBuilder->getAll(),
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
        $clinics = Clinic::create($request->validated());

        if ($clinics->save()) {
            return redirect()->route('admin.clinics.index')
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
        $clinic = Clinic::findOrFail($id);
        return \view('admin.clinics.show', ['clinic' => $clinic]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Clinic $clinic, OrganizationTypesQueryBuilder $organizationTypesQueryBuilder)
    {
        $statuses = ClinicStatus::all();
        return \view('admin.clinics.edit', [
            'clinic' => $clinic,
            'organization_types' => $organizationTypesQueryBuilder->getAll(),
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
    public function update(EditRequest $request, Clinic $clinic): RedirectResponse
    {
        $clinic = $clinic->fill($request->validated());

        if ($clinic->update()) {
            return redirect()->route('admin.clinics.index')
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
    public function destroy(Clinic $clinic)
    {
        try {
            $clinic->delete();

            return \response()->json('ok');
        } catch (\Exception $exception) {

            return \response()->json('error', 400);
        }
    }
}
