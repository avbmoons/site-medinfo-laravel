<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Enums\PharmacyStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\Pharmacies\CreateRequest;
use App\Http\Requests\Pharmacies\EditRequest;
use App\Models\Subjects\Pharmacy;
use App\QueryBuilders\OrganizationTypesQueryBuilder;
use App\QueryBuilders\PharmaciesQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PharmacyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PharmaciesQueryBuilder $pharmaciesQueryBuilder): View
    {
        $pharmaciesList = $pharmaciesQueryBuilder->getPharmaciesWithPagination();
        return \view('admin.pharmacies.index', [
            'pharmaciesList' => $pharmaciesList
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(OrganizationTypesQueryBuilder $organizationTypesQueryBuilder): View
    {
        $statuses = PharmacyStatus::all();

        return \view('admin.pharmacies.create', [
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
        $pharmacies = Pharmacy::create($request->validated());

        if ($pharmacies->save()) {
            return redirect()->route('admin.pharmacies.index')
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
        $pharmacy = Pharmacy::findOrFail($id);
        return \view('admin.pharmacies.show', ['pharmacy' => $pharmacy]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pharmacy $pharmacy, OrganizationTypesQueryBuilder $organizationTypesQueryBuilder): View
    {
        $statuses = PharmacyStatus::all();
        return \view('admin.pharmacies.edit', [
            'pharmacy' => $pharmacy,
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
    public function update(EditRequest $request, Pharmacy $pharmacy): RedirectResponse
    {
        $pharmacy = $pharmacy->fill($request->validated());

        if ($pharmacy->update()) {
            return redirect()->route('admin.pharmacies.index')
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
    public function destroy(Pharmacy $pharmacy)
    {
        try {
            $pharmacy->delete();

            return \response()->json('ok');
        } catch (\Exception $exception) {

            return \response()->json('error', 400);
        }
    }
}
