<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Enums\OrganizationTypeStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\OrganizationTypes\CreateRequest;
use App\Http\Requests\OrganizationTypes\EditRequest;
use App\Models\OrganizationType;
use App\QueryBuilders\OrganizationTypesQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class OrganizationTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(OrganizationTypesQueryBuilder $organizationTypesQueryBuilder): View
    {
        $organizationTypesList = $organizationTypesQueryBuilder->getOrganizationTypesWithPagination();

        return \view('admin.organization_types.index', [
            'organizationTypesList' => $organizationTypesList
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(OrganizationTypesQueryBuilder $organizationTypesQueryBuilder): View
    {
        $statuses = OrganizationTypeStatus::all();

        return \view('admin.organization_types.create', [
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
        $organizationType = OrganizationType::create($request->validated());

        if ($organizationType->save()) {
            return redirect()->route('admin.organization_types.index')
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
        $organizationType = OrganizationType::findOrFail($id);
        return \view('admin.organization_types.show', ['organizationType' => $organizationType]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(OrganizationType $organization_type)
    {
        $statuses = OrganizationTypeStatus::all();
        return \view('admin.organization_types.edit', [
            'organization_type' => $organization_type,
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
    public function update(EditRequest $request, OrganizationType $organizationType): RedirectResponse
    {
        $organizationType = $organizationType->fill($request->validated());

        if ($organizationType->update()) {
            return redirect()->route('admin.organization_types.index')
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
    public function destroy(OrganizationType $organizationType)
    {
        try {
            $organizationType->delete();

            return \response()->json('ok');
        } catch (\Exception $exception) {

            return \response()->json('error', 400);
        }
    }
}
