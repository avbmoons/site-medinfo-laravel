<?php

namespace App\Http\Controllers;

use App\QueryBuilders\DrugsQueryBuilder;
use Illuminate\Http\Request;

class DrugController extends Controller
{

    public function index()
    {
        return (\view('drugs.index'));
    }
}
