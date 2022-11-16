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

        return view('details.index', [
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
        foreach ($machines as $machine) {
            $Detail = detail::query()->where('machine_id',  $machine->id)->where('created_at', $date)->first();
            if ($Detail == null) {
                continue;
            }
            $response .= '<tr>
                    <td>' . $id . '</td>
                    <td>' . $machine->id . '</td>
                    <td>' . $Detail->entry_point . '</td>
                    <td>' . $Detail->exit_point . '</td>
                    <td>' . $Detail->new_profit() . '</td>
                    <td>' . $Detail->old_profit() . '</td>
                    <td>' . $Detail->sumOf() . '</td>
                    <td>' . "price" . '</td>
                    <td class="td-actions text-right">
                        <button type="button" rel="tooltip" class="btn btn-info btn-round" data-original-title="" title="">
                            <i class="material-icons">person</i>
                        </button>
                        <button type="button" rel="tooltip" class="btn btn-success btn-round" data-original-title="" title="">
                            <i class="material-icons">edit</i>
                        </button>
                        <button type="button" rel="tooltip" class="btn btn-danger btn-round" data-original-title="" title="">
                            <i class="material-icons">close</i>
                        </button>
                    </td>
                    </tr>';
            // $prev = $Detail;
            $id += 1;
        }
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatedetailRequest  $request
     * @param  \App\Models\detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatedetailRequest $request, detail $detail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function destroy(detail $detail)
    {
        //
    }
}
