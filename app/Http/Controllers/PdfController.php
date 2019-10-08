<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Milon\Barcode\DNS1D;

class PdfController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function printVersion($size)
    {
        $customPaper = array(0,0,595.276,420.94);
        $pdf = PDF::loadView('page.pdf',[
            'patient' => $patient,
            'charges' => $charges,
            'others' => $others,
            'id' => $id
        ])
            ->setPaper($customPaper, 'portrait');


        return $pdf->stream('OPD-ChargeSlip-'.date('mdy-His').'.pdf');
    }
}
