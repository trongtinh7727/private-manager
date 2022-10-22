<?php

namespace App\Http\Controllers;

use App\Models\machine;
use App\Http\Requests\StoremachineRequest;
use App\Http\Requests\UpdatemachineRequest;
use Illuminate\Http\Request;

class MachineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $machines = machine::get();

        return view('machines.index', [
            'machines' => $machines,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoremachineRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $keys =  ['_token'];
        $machine = new machine();
        $machine->fill($request->except($keys));
        $machine->save();
        return redirect()->route('machine.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\machine  $machine
     * @return \Illuminate\Http\Response
     */
    public function show(machine $machine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\machine  $machine
     * @return \Illuminate\Http\Response
     */
    public function edit(machine $machine)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatemachineRequest  $request
     * @param  \App\Models\machine  $machine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $machine)
    {
        $keys =  ['_token', '_method'];
        $user = machine::query()->where('machine', $machine)->update($request->except($keys));
        return redirect(route('machine.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\machine  $machine
     * @return \Illuminate\Http\Response
     */
    public function destroy($machine)
    {
        //
        machine::query()->where('machine', $machine)->delete();
        return redirect(route('machine.index'));
    }
}
