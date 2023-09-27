<?php

namespace App\Http\Livewire;

use App\Models\Doctor;
use App\Models\FundAccount;
use App\Models\Groups;
use App\Models\group_invoice;
use App\Models\patient;
use App\Models\PatientAccount;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;

class GroupInvoices extends Component
{
    public $InvoiceSaved = false;
    public $InvoiceUpdated = false;
    public $show_table = true;
    public $updateMode = false;
    public $group_invoice_id;
    public $Group_id;
    public $catchError;
    public $price = 0;
    public $patient_id, $doctor_id, $section_id, $type;
    public $discount_value = 0;
    public $tax_rate = 0;

    public function render()
    {
        return view('livewire.group_invoices.group-invoices', [
            'group_invoices' => group_invoice::all(),
            'Patients' => patient::all(),
            'Doctors' => Doctor::all(),
            'Groups' => Groups::all(),
            'subtotal' => $Total_after_discount = ((is_numeric($this->price) ? $this->price : 0)) - ((is_numeric($this->discount_value) ? $this->discount_value : 0)),
            'tax_value' => $Total_after_discount * ((is_numeric($this->tax_rate) ? $this->tax_rate : 0) / 100),
        ])->extends('Dashboard.layouts');
    }

    public function show_form_add()
    {
        $this->show_table = false;
    }

    public function get_section()
    {
        $doctor_id = Doctor::with('section')->where('id', $this->doctor_id)->first();
        $this->section_id = $doctor_id->section->name;
    }

    public function get_price()
    {
        $this->price = Groups::where('id', $this->Group_id)->first()->Total_before_discount;
        $this->discount_value = Groups::where('id', $this->Group_id)->first()->discount_value;
        $this->tax_rate = Groups::where('id', $this->Group_id)->first()->tax_rate;
    }

    public function store()
    {

        // في حالة كانت الفاتورة نقدي
        if ($this->type == 1) {
            try {
                // في حالة التعديل
                if ($this->updateMode) {
                    $group_invoices = group_invoice::findorfail($this->group_invoice_id);
                    $group_invoices->invoice_date = date('Y-m-d');
                    $group_invoices->patient_id = $this->patient_id;
                    $group_invoices->doctor_id = $this->doctor_id;
                    $group_invoices->section_id = 3;
                    // $group_invoices->section_id = DB::table('sections')->where('name_en', $this->section_id)->first()->section_id;
                    // $group_invoices->section_id = DB::table('section_translations')->where('name', $this->section_id)->first()->section_id;
                    $group_invoices->Group_id = $this->Group_id;
                    $group_invoices->price = $this->price;
                    $group_invoices->discount_value = $this->discount_value;
                    $group_invoices->tax_rate = $this->tax_rate;
                    $group_invoices->tax_value = ($this->price - $this->discount_value) * ((is_numeric($this->tax_rate) ? $this->tax_rate : 0) / 100);
                    $group_invoices->total_with_tax = $group_invoices->price - $group_invoices->discount_value + $group_invoices->tax_value;
                    $group_invoices->type = $this->type;
                    $group_invoices->save();

                    $fund_accounts = FundAccount::where('group_invoice_id', $this->group_invoice_id)->first();
                    $fund_accounts->date = date('Y-m-d');
                    $fund_accounts->group_invoice_id = $group_invoices->id;
                    $fund_accounts->Debit = $group_invoices->total_with_tax;
                    $fund_accounts->credit = 0.00;
                    $fund_accounts->save();
                    $this->InvoiceUpdated = true;
                    $this->show_table = true;

                }

                // في حالة الاضافة
                else {

                    $group_invoices = new group_invoice();
                    // $group_invoices->invoice_type = 2;
                    $group_invoices->invoice_date = date('Y-m-d');
                    $group_invoices->patient_id = $this->patient_id;
                    $group_invoices->doctor_id = $this->doctor_id;
                    $group_invoices->section_id = 3;
                    // $group_invoices->section_id = DB::table('sections')->where('name_en', $this->section_id)->first()->section_id;
                    // $group_invoices->section_id = DB::table('section_translations')->where('name', $this->section_id)->first()->section_id;
                    $group_invoices->Group_id = $this->Group_id;
                    $group_invoices->price = $this->price;
                    $group_invoices->discount_value = $this->discount_value;
                    $group_invoices->tax_rate = $this->tax_rate;
                    $group_invoices->tax_value = ($this->price - $this->discount_value) * ((is_numeric($this->tax_rate) ? $this->tax_rate : 0) / 100);
                    $group_invoices->total_with_tax = $group_invoices->price - $group_invoices->discount_value + $group_invoices->tax_value;
                    $group_invoices->type = $this->type;
                    $group_invoices->save();

                    $fund_accounts = new FundAccount();
                    $fund_accounts->date = date('Y-m-d');
                    $fund_accounts->group_invoice_id = $group_invoices->id;
                    $fund_accounts->Debit = $group_invoices->total_with_tax;
                    $fund_accounts->credit = 0.00;
                    $fund_accounts->save();
                    $this->InvoiceSaved = true;
                    $this->show_table = true;
                    $this->rest();

                }
                DB::commit();
                session()->flash('add');

            } catch (\Exception $e) {
                DB::rollback();
                $this->catchError = $e->getMessage();
            }

        }

        //------------------------------------------------------------------------

        else {

            try {
                // في حالة التعديل
                if ($this->updateMode) {
                    $group_invoices = group_invoice::findorfail($this->group_invoice_id);
                    $group_invoices->invoice_date = date('Y-m-d');
                    $group_invoices->patient_id = $this->patient_id;
                    $group_invoices->doctor_id = $this->doctor_id;
                    $group_invoices->section_id = 3;
                    // $group_invoices->section_id = DB::table('sections')->where('name_en', $this->section_id)->first()->section_id;
                    // $group_invoices->section_id = DB::table('section_translations')->where('name', $this->section_id)->first()->section_id;
                    $group_invoices->Group_id = $this->Group_id;
                    $group_invoices->price = $this->price;
                    $group_invoices->discount_value = $this->discount_value;
                    $group_invoices->tax_rate = $this->tax_rate;
                    $group_invoices->tax_value = ($this->price - $this->discount_value) * ((is_numeric($this->tax_rate) ? $this->tax_rate : 0) / 100);
                    $group_invoices->total_with_tax = $group_invoices->price - $group_invoices->discount_value + $group_invoices->tax_value;
                    $group_invoices->type = $this->type;
                    $group_invoices->save();

                    $fund_accounts = FundAccount::where('group_invoice_id', $this->group_invoice_id)->first();
                    $fund_accounts->date = date('Y-m-d');
                    $fund_accounts->group_invoice_id = $group_invoices->id;
                    $fund_accounts->Debit = $group_invoices->total_with_tax;
                    $fund_accounts->credit = 0.00;
                    $fund_accounts->save();
                    $this->InvoiceUpdated = true;
                    $this->show_table = true;

                }

                // في حالة الاضافة
                else {

                    $group_invoices = new group_invoice();
                    // $group_invoices->invoice_type = 2;
                    $group_invoices->invoice_date = date('Y-m-d');
                    $group_invoices->patient_id = $this->patient_id;
                    $group_invoices->doctor_id = $this->doctor_id;
                    $group_invoices->section_id = 3;
                    // $group_invoices->section_id = DB::table('sections')->where('name_en', $this->section_id)->first()->section_id;
                    // $group_invoices->section_id = DB::table('section_translations')->where('name', $this->section_id)->first()->section_id;
                    $group_invoices->Group_id = $this->Group_id;
                    $group_invoices->price = $this->price;
                    $group_invoices->discount_value = $this->discount_value;
                    $group_invoices->tax_rate = $this->tax_rate;
                    $group_invoices->tax_value = ($this->price - $this->discount_value) * ((is_numeric($this->tax_rate) ? $this->tax_rate : 0) / 100);
                    $group_invoices->total_with_tax = $group_invoices->price - $group_invoices->discount_value + $group_invoices->tax_value;
                    $group_invoices->type = $this->type;
                    $group_invoices->save();

                    $patient_accounts = new PatientAccount();
                    $patient_accounts->date = date('Y-m-d');
                    $patient_accounts->group_invoice_id = $group_invoices->id;
                    $patient_accounts->patient_id = $group_invoices->patient_id;
                    $patient_accounts->Debit = $group_invoices->total_with_tax;
                    $patient_accounts->credit = 0.00;
                    $patient_accounts->save();
                    $this->InvoiceSaved = true;
                    $this->show_table = true;

                }
                DB::commit();
                session()->flash('add');

            } catch (\Exception $e) {
                DB::rollback();
                $this->catchError = $e->getMessage();
            }

        }
    }

    public function edit($id)
    {

        $this->show_table = false;
        $this->updateMode = true;
        $group_invoices = group_invoice::findorfail($id);
        $this->group_invoice_id = $group_invoices->id;
        $this->patient_id = $group_invoices->patient_id;
        $this->doctor_id = $group_invoices->doctor_id;
        $this->section_id = DB::table('sections')->where('id', $group_invoices->section_id)->first()->name_en;
        $this->Group_id = $group_invoices->Group_id;
        $this->price = $group_invoices->price;
        $this->discount_value = $group_invoices->discount_value;
        $this->tax_rate = $group_invoices->tax_rate;
        $this->tax_value = $group_invoices->tax_value;
        $this->type = $group_invoices->type;

    }

    public function delete($id)
    {
        $this->group_invoice_id = $id;
    }

    public function destroy()
    {
        group_invoice::destroy($this->group_invoice_id);
        return redirect()->to('/group_invoices');
    }

    public function print($id)
    {
        $single_invoice = group_invoice::findorfail($id);
        return Redirect::route('group_Print_single_invoices', [
            'invoice_date' => $single_invoice->invoice_date,
            'doctor_id' => $single_invoice->Doctor->namelang,
            'section_id' => $single_invoice->Section->namelang,
            'Group_id' => $single_invoice->Group->namelang,
            'type' => $single_invoice->type,
            'price' => $single_invoice->price,
            'discount_value' => $single_invoice->discount_value,
            'tax_rate' => $single_invoice->tax_rate,
            'total_with_tax' => $single_invoice->total_with_tax,
        ]);

    }

}