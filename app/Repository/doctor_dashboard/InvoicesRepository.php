<?php

namespace App\Repository\doctor_dashboard;

use App\Interface\doctor_dashboard\InvoicesRepositoryInterface;
use App\Models\Invoice;
use Illuminate\Support\Facades\Auth;

class InvoicesRepository implements InvoicesRepositoryInterface
{
    public function index()
    {
        // 
        $invoices = Invoice::where('doctor_id', Auth::user()->id)->where('invoice_status', 1)->get();
        return view('Dashboard.Doctor.invoices.index', compact('invoices'));
    }

    public function reviewInvoices()
    {
        $invoices = Invoice::where('doctor_id', Auth::user()->id)->where('invoice_status', 2)->get();
        return view('Dashboard.Doctor.invoices.review_invoices', compact('invoices'));
    }

    public function completedInvoices()
    {
        $invoices = Invoice::where('doctor_id', Auth::user()->id)->where('invoice_status', 3)->get();
        return view('Dashboard.Doctor.invoices.completed_invoices', compact('invoices'));
    }

    // public function show($id)
    // {
    //     $rays = Ray::findorFail($id);
    //     if ($rays->doctor_id != auth()->user()->id) {
    //         //abort(404);
    //         return redirect()->route('404');
    //     }
    //     return view('Dashboard.Doctor.invoices.view_rays', compact('rays'));
    // }

    // public function showLaboratorie($id)
    // {
    //     $laboratories = Laboratorie::findorFail($id);
    //     if ($laboratories->doctor_id != auth()->user()->id) {
    //         return redirect()->route('404');
    //     }
    //     return view('Dashboard.Doctor.invoices.view_laboratories', compact('laboratories'));
    // }
}