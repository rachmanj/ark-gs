<?php

namespace App\Http\Controllers;

use App\Budgettype;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Traits\FlashAlert;

class BudgettypeController extends Controller
{
    use FlashAlert;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $budgettypes = Budgettype::orderBy('name')->paginate(5);

        return view('budgettype.index', compact('budgettypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('budgettype.create');
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
            'name'  => ['required'],
            'display_name'  => ['required']
        ]);

        Budgettype::create($data);

        return redirect()->route('budgettypes.index')->with($this->alertCreated());
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
            $budgettype = Budgettype::findOrFail($id);

            return view('budgettype.edit', compact('budgettype'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('budgettypes.index')->with($this->alertNotFound());
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
            $budgettype = Budgettype::findOrFail($id);

            $data = $this->validate($request, [
                'name'  => ['required'],
                'display_name'  => ['required']
            ]);

            $budgettype->update($data);

            return redirect()->route('budgettypes.index')->with($this->alertUpdated());
        } catch (ModelNotFoundException $e) {
            return redirect()->route('budgettypes.index')->with($this->alertNotFound());
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
            $budgettype = Budgettype::findOrFail($id);

            $budgettype->delete();

            return redirect()->route('budgettypes.index')->with($this->alertDeleted());
        } catch (ModelNotFoundException $e) {
            return redirect()->route('budgettypes.index')->with($this->alertNotFound());
        }
    }
}
