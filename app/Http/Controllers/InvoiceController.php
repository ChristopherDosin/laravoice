<?php

namespace App\Http\Controllers;

use App\Invoice;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Mpociot\VatCalculator\Facades\VatCalculator;

class InvoiceController extends Controller
{
    public function index(Invoice $invoices)
    {
        $invoices = $invoices->all();
        return view('app.invoices.index', compact('invoices'));
    }

    public function create()
    {
        return view('app.invoices.create');
    }
}
