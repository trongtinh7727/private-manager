<?php

namespace App\Http\Controllers;

use App\Models\detail;
use App\Http\Requests\StoredetailRequest;
use App\Http\Requests\UpdatedetailRequest;
use App\Models\machine;
use App\Models\Store;
use Illuminate\Http\Request;

class DetailController extends Controller
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
        $details = detail::get();
        $stores = Store::get();
        $machines = machine::get();

        return view('Details.index', [
            'details' => $details,
            'stores' => $stores,
            'machines' => $machines,
        ]);
    }
    public function getDetail(Request $request)
    {

        $store = Store::query()->where('id', $request->store)->first();
        $date = $request->date;
        $machines = $store->machines;
        $response = '';
        $id = 1;
        $total = 0;
        foreach ($machines as $machine) {
            $Detail = detail::query()->where('machine_id',  $machine->id)->where('date', $date)->first();
            if ($Detail == null) {
                continue;
            }
            $response .= '<tr>
                    <td>' . $id . '</td>
                    <td>' . $machine->name . '</td>
                    <td class="text-success">' . $Detail->entry_point . '</td>
                    <td class="text-danger">' . $Detail->exit_point . '</td>
                    <td >' . $Detail->new_profit() . '</td>
                    <td >' . $Detail->old_profit() . '</td>
                    <td >' . $Detail->sumOf() . '</td>
                    <td>' . $Detail->note . '</td>
                    <td class="td-actions text-right">
                        <button data-toggle="modal" value="' . $Detail->id . '"  data-target="#ModalEdit" type="button" rel="tooltip" class="btn btn-success btn-round open_modal" data-original-title="" title="">
                            <i class="material-icons">edit</i>
                        </button>
                      
                        <button data-toggle="confirmation" 
                        data-btn-ok-label="Delete" data-btn-ok-icon="fa fa-remove"
                        type="button" rel="tooltip" value="' . $Detail->id . '" class="btn btn-danger btn-round delete_e" >
                            <i class="material-icons">close</i>
                        </button>
                    </td>
                    </tr>';
            $id += 1;
            $total += $Detail->sumOf();
        }
        $response .=
            '<tr>
                    <td class="font-weight-bold">' . "Tổng" . '</td>
                    <td>'  . '</td>
                    <td>'  . '</td>
                    <td>'  . '</td>
                    <td>'  . '</td>
                    <td>'  . '</td>
                    <td class="text-success font-weight-bold">' . $total . '</td>
                    <td>' . '</td>
                    <td class="td-actions text-right">
                    </td>
                    </tr>';
        return Response($response);
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
     * @param  \App\Http\Requests\StoredetailRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $keys =  ['_token'];
        detail::create($request->except($keys));
        return redirect()->route('detail.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function show(detail $detail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function edit(detail $detail)
    {
        return $detail->getAttributes();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatedetailRequest  $request
     * @param  \App\Models\detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, detail $detail)
    {
        $keys =  ['_token', '_method', 'machine_id'];
        // dd($request->all());
        $detail->update(
            $request->except($keys)
        );
        return redirect(route('detail.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $detail = detail::find($request->detail_id);
        $detail->delete();
        return redirect(route('detail.index'));
    }
}
