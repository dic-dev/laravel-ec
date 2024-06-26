<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bill;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->is('admin/*')) {
            $bills = Bill::paginate('20');
            $data = ['bills' => $bills];

            return view('admin.bills.index', $data);
        }

        $user_id = $request->user()->id;
        $bills = Bill::where('user_id', $user_id)
            ->paginate('20');

        $data = ['bills' => $bills];

        return view('bills.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Bill $bill)
    {
        $data = ['bill' => $bill];

        if ($request->is('admin/*')) {
            return view('admin.bills.show', $data);
        }

        return view('bills.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
