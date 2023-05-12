<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function main()
    {
        return view('admin.main');
    }

    public function drugs()
    {
        return view('admin.drugs');
    }

    public function messages()
    {
        return view('admin.messages');
    }

    public function clinics()
    {
        return view('admin.clinics');
    }

    public function doctors()
    {
        return view('admin.doctors');
    }

    public function doctor_reviews()
    {
        return view('admin.doctor_reviews');
    }

    public function meetings()
    {
        return view('admin.meetings');
    }

    public function organizations()
    {
        return view('admin.organizations');
    }

    public function patients()
    {
        return view('admin.patients');
    }

    public function pharmacies()
    {
        return view('admin.pharmacies');
    }

    public function receipts()
    {
        return view('admin.receipts');
    }

    public function services()
    {
        return view('admin.services');
    }

    public function specialities()
    {
        return view('admin.specialities');
    }

    public function users()
    {
        return view('admin.users');
    }
}
