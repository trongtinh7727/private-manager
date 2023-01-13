<?php

namespace App\Http\Controllers;

use App\Models\machine;
use App\Http\Requests\StoremachineRequest;
use App\Http\Requests\UpdatemachineRequest;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MachineController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $machines = machine::get();
        $stores = Store::get();

        if (Auth::user()->hasRole("Admin")) {
            $machines = Auth::user()->employee->store->machines;
        }
        return view('Machines.index', [
            'machines' => $machines,
            'stores' => $stores
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
        return redirect()->route('machine.index')->with('message', 'Lưu thành công');
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
        // $machine = machine::query()->where('id', $machine)->first();
        return $machine->getAttributes();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatemachineRequest  $request
     * @param  \App\Models\machine  $machine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, machine $machine)
    {
        $keys =  ['_token', '_method'];
        $machine->update(
            $request->except($keys)
        );
        return redirect(route('machine.index'))->with('message', 'Lưu thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\machine  $machine
     * @return \Illuminate\Http\Response
     */
    public function destroy(machine $machine)
    {
        $machine->delete();
        return redirect(route('machine.index'))->with('message', 'Xóa thành công');
    }
}
