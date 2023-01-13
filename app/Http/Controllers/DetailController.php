<?php

namespace App\Http\Controllers;


use App\Exports\DetailExport;

use App\Models\detail;
use App\Http\Requests\StoredetailRequest;
use App\Http\Requests\UpdatedetailRequest;
use App\Models\machine;
use App\Models\Store;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

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
                    <td>
                        <ul class="text-nowrap">
                            <li> Nhân viên:' . $Detail->user->name . '</li>
                            <li>updated_at: ' . date_format($Detail->updated_at, "d/m/Y")  . '</li>
                            <li>created_at:' . date_format($Detail->created_at, "d/m/Y") . '</li>
                        </ul>
                    </td>
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
                    <td>' . '</td>
                    <td class="td-actions text-right">
                    </td>
                    </tr>';
        $labels = [];
        $datasets = [];

        $machines = $store->machines;
        foreach ($machines as $machine) {
            $label = $machine->name;
            $datas = [];
            $labels = [];
            $details = $machine->details;
            foreach ($details as $detail) {
                $datas[] = $detail->entry_point;
                $labels[] = $detail->date;
            }
            $datasets[] = [$label, $datas];
        }
         return Response([
            'datasets' => $datasets,
            'labels' => $labels,
            'trans' => $response
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
     * @param  \App\Http\Requests\StoredetailRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $keys =  ['_token'];
        detail::create($request->except($keys));
        return redirect()->route('detail.index')->with('message', 'Lưu thành công');
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
        return redirect(route('detail.index'))->with('message', 'Lưu thành công');
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
        return redirect(route('detail.index'))->with('message', 'Xóa thành công');
    }
    public function export(Request $request)
    {
        $store = Store::query()->where('id', $request->store)->first();
        $date = $request->date;
        $machines = $store->machines;
        $response = array();
        $id = 1;
        $total = 0;
        foreach ($machines as $machine) {
            $Detail = detail::query()->where('machine_id',  $machine->id)->where('date', $date)->first();
            if ($Detail == null) {
                continue;
            }
            $row = array(
                $id, $machine->name, $Detail->entry_point, $Detail->exit_point,
                $Detail->new_profit(), $Detail->old_profit(), $Detail->sumOf(), $Detail->note
            );
            $response[] = $row;
            $id += 1;
            $total += $Detail->sumOf();
        }
        $export = new DetailExport($response);
        return Excel::download($export, 'detail.xlsx');
    }
}
