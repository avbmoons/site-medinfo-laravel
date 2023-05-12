<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Diagnosis\CreateRequest;
use App\Http\Requests\Diagnosis\EditRequest;
use App\Models\Diagnosis;
use App\QueryBuilders\DiagnosisQueryBuilder;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class DiagnosisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(DiagnosisQueryBuilder $diagnosisQueryBuilder): View
    {
        $diagnosisList = $diagnosisQueryBuilder->getDiagnosisWithPagination();

        return (\view('admin.diagnoses.index', [
            'diagnosisList' => $diagnosisList
        ]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        return \view('admin.diagnoses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request): RedirectResponse
    {
        $diagnosis = Diagnosis::create($request->validated());

        if ($diagnosis->save()) {
            return redirect()->route('admin.diagnoses.index')
                ->with('success', 'Специальность успешно добавлена');
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
        $diagnosis = Diagnosis::findOrFail($id);
        return \view('admin.diagnoses.show', ['diagnosis' => $diagnosis]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Diagnosis $diagnosis): View
    {
        return \view('admin.diagnoses.edit', [
            'diagnosis' => $diagnosis,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditRequest $request, Diagnosis $diagnosis): RedirectResponse
    {
        $diagnosis = $diagnosis->fill($request->validated());

        if ($diagnosis->update()) {
            return redirect()->route('admin.diagnoses.index')
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
    public function destroy(Diagnosis $diagnosis)
    {
        try {
            $diagnosis->delete();

            return \response()->json('ok');
        } catch (\Exception $exception) {

            return \response()->json('error', 400);
        }
    }
}
