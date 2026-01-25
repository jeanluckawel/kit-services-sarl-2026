<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Customer $customer)
    {
        return view('invoices.create', compact('customer'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Customer $customer)
    {
        $request->validate([
            'description.*' => 'required|string',
            'unite.*'       => 'nullable|string',
            'quantity.*'    => 'required|integer|min:1',
            'nb_jours.*'    => 'nullable|integer|min:1',
            'pu.*'          => 'required|numeric|min:0',
            'po'            => 'nullable|string',
        ]);

        DB::transaction(function () use ($request, $customer) {
            foreach ($request->description as $index => $description) {

                $quantity = $request->quantity[$index] ?? 1;
                $pu       = $request->pu[$index] ?? 0;
                $nbJours  = $request->nb_jours[$index] ?? 1;

                // Génération automatique du numero_invoice
                $numero_invoice = $request->numero_invoice ?? 'KIT' . str_pad($customer->id, 3, '0', STR_PAD_LEFT) . '_' . date('d_m_y');

                Invoice::create([
                    'customer_id'    => $customer->id,
                    'po'             => $request->po,
                    'numero_invoice' => $numero_invoice,
                    'description'    => $description,
                    'unite'          => $request->unite[$index] ?? null,
                    'quantity'       => $quantity,
                    'nb_jours'       => $nbJours,
                    'pu'             => $pu,
                    'pt_jours'       => $quantity * $pu,
                    'pt_mois'        => $quantity * $pu * $nbJours,
                ]);
            }
        });

        return redirect()
            ->route('invoices.show', $customer->id)
            ->with('success', 'Invoice saved successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Invoice $invoice)
    {

        $customer = $invoice->customer;


        $invoices = \App\Models\Invoice::where('numero_invoice', $invoice->numero_invoice)->get();

        return view('invoices.show', compact('invoice', 'customer', 'invoices'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invoice $invoice)
    {
        //
    }
}
