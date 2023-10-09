<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Exports\ExportUsers;
use App\Imports\ImportBranch;
use Maatwebsite\Excel\Facades\Excel;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ImportExportController extends Controller
{

    public function welcome()
    {
        $branches = Branch::all();

        return view('welcome',compact('branches'));
    }
    public function importExport()
    {
        $branches = Branch::all();
        return view('import');
    }

//    public function export()
//    {
//        return Excel::download(new ExportUsers, 'users.xlsx');
//    }

    public function import()
    {
        Excel::import(new ImportBranch, request()->file('file'));

        return back();
    }

    

}
