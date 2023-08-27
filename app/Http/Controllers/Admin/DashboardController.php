<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Database\ExportRequest;
use App\Http\Requests\Admin\Database\ImportRequest;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function importDatabase()
    {
        return view('import');
    }

    public function import(ImportRequest $request)
    {
        //
    }

    public function exportDatabase()
    {
        return view('export');
    }

    public function export(ExportRequest $request)
    {
        //
    }
}
