<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Enums\DrugStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\Drugs\CreateRequest;
use App\Http\Requests\Drugs\EditRequest;
use App\Models\Drug;
use App\QueryBuilders\DrugsQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class DrugController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(DrugsQueryBuilder $drugsQueryBuilder): View
    {
        $drugsList = $drugsQueryBuilder->getDrugsWithPagination();
        return \view('admin.drugs.index', [
            'drugsList' => $drugsList
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        $statuses = DrugStatus::all();

        return \view('admin.drugs.create', [
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
        $drugs = Drug::create($request->validated());

        if ($drugs->save()) {
            return redirect()->route('admin.drugs.index')
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
        $drug = Drug::findOrFail($id);
        return \view('admin.drugs.show', ['drug' => $drug]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Drug $drug)
    {
        $statuses = DrugStatus::all();
        return \view('admin.drugs.edit', [
            'drug' => $drug,
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
    public function update(EditRequest $request, Drug $drug): RedirectResponse
    {
        $drug = $drug->fill($request->validated());

        if ($drug->update()) {
            return redirect()->route('admin.drugs.index')
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
    public function destroy(Drug $drug)
    {
        try {
            $drug->delete();

            return \response()->json('ok');
        } catch (\Exception $exception) {

            return \response()->json('error', 400);
        }
    }
}
