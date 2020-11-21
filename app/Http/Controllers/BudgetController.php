<?php

namespace App\Http\Controllers;

use App\Budget;
use App\Budgettype;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Traits\FlashAlert;

class BudgetController extends Controller
{
    use FlashAlert;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('budget.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $budgettypes = Budgettype::orderBy('name')->get();

        return view('budget.create', compact('budgettypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'date'          => ['required'],
            'budgettype_id' => ['required'],
            'project_code'  => ['required'],
            'amount'        => ['required'],
            'remarks'       => '',
        ]);

        Budget::create($data);

        return redirect()->route('budgets.index')->with($this->alertCreated());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $budget = Budget::findOrFail($id);
            $budgettypes = Budgettype::orderBy('name')->get();

            return view('budget.edit', compact('budget', 'budgettypes'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('budgets.index')->with($this->alertNotFound());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $budget = Budget::findOrFail($id);

            $data = $this->validate($request, [
                'date'          => ['required'],
                'budgettype_id' => ['required'],
                'project_code'  => ['required'],
                'amount'        => ['required'],
                'remarks'       => '',
            ]);

            $budget->update($data);

            return redirect()->route('budgets.index')->with($this->alertUpdated());
        } catch (ModelNotFoundException $e) {
            return redirect()->route('budgets.index')->with($this->alertNotFound());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $budget = Budget::findOrFail($id);

            $budget->delete();

            return redirect()->route('budgets.index')->with($this->alertDeleted());
        } catch (ModelNotFoundException $e) {
            return redirect()->route('budgets.index')->with($this->alertNotFound());
        }
    }
}
