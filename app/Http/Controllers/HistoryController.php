<?php

namespace App\Http\Controllers;

use App\History;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Traits\FlashAlert;

class HistoryController extends Controller
{
    use FlashAlert;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('history.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('history.create');
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
            'periode'       => ['required'],
            'gs_type'       => ['required'],
            'project_code'  => ['required'],
            'amount'        => ['required'],
            'remarks'       => '',
        ]);

        History::create($data);

        return redirect()->route('history.index')->with($this->alertCreated());
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
            $history = History::findOrFail($id);

            return view('history.edit', compact('history'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('history.index')->with($this->alertNotFound());
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
            $history = History::findOrFail($id);

            $data = $this->validate($request, [
                'date'          => ['required'],
                'periode'       => ['required'],
                'gs_type'       => ['required'],
                'project_code'  => ['required'],
                'amount'        => ['required'],
                'remarks'       => '',
            ]);

            $history->update($data);

            return redirect()->route('history.index')->with($this->alertUpdated());
            
        } catch (ModelNotFoundException $e) {
            return redirect()->route('history.index')->with($this->alertNotFound());
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
            $history = History::findOrFail($id);

            $history->delete();

            return redirect()->route('history.index')->with($this->alertDeleted());
        } catch (ModelNotFoundException $e) {
            return redirect()->route('history.index')->with($this->alertNotFound());
        }
    }
}
