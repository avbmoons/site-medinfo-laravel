<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Enums\DrugStatus;
use App\Enums\ReceiptStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\Receipts\CreateRequest;
use App\Http\Requests\Receipts\EditRequest;
use App\Models\Documents\Receipt;
use App\QueryBuilders\DoctorsQueryBuilder;
use App\QueryBuilders\DrugsQueryBuilder;
use App\QueryBuilders\PatientsQueryBuilder;
use App\QueryBuilders\ReceiptsQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ReceiptController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ReceiptsQueryBuilder $receiptsQueryBuilder): View
    {
        $receiptsList = $receiptsQueryBuilder->getReceiptsWithPagination();
        return \view('admin.receipts.index', [
            'receiptsList' => $receiptsList
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(
        PatientsQueryBuilder $patientsQueryBuilder,
        DoctorsQueryBuilder $doctorsQueryBuilder,
        DrugsQueryBuilder $drugsQueryBuilder
    ): View {
        $statuses = DrugStatus::all();
        return \view('admin.receipts.create', [
            'patients' => $patientsQueryBuilder->getAll(),
            'doctors' => $doctorsQueryBuilder->getAll(),
            'drugs' => $drugsQueryBuilder->getAll(),
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
        $receipts = Receipt::create($request->validated());

        if ($receipts->save()) {
            return redirect()->route('admin.receipts.index')
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
        $receipt = Receipt::findOrFail($id);
        return \view('admin.receipts.show', ['receipt' => $receipt]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(
        Receipt $receipt,
        PatientsQueryBuilder $patientsQueryBuilder,
        DoctorsQueryBuilder $doctorsQueryBuilder,
        DrugsQueryBuilder $drugsQueryBuilder
    ): View {
        $statuses = ReceiptStatus::all();
        return \view('admin.receipts.edit', [
            'receipt' => $receipt,
            'patients' => $patientsQueryBuilder->getAll(),
            'doctors' => $doctorsQueryBuilder->getAll(),
            'drugs' => $drugsQueryBuilder->getAll(),
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
    public function update(EditRequest $request, Receipt $receipt): RedirectResponse
    {
        $receipt = $receipt->fill($request->validated());

        if ($receipt->update()) {
            return redirect()->route('admin.receipts.index')
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
    public function destroy(Receipt $receipt)
    {
        try {
            $receipt->delete();

            return \response()->json('ok');
        } catch (\Exception $exception) {

            return \response()->json('error', 400);
        }
    }
}
