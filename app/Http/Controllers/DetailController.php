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

        return view('details.index', [
            'details' => $details,
            'stores' => $stores,
        ]);
    }

    public function getDeta($date)
    {
        $Details = detail::orderby('machine', 'asc')->select('machine', 'entry_point', 'exit_point')
            ->where('created_at', '=', $date)
            ->get();
    }

    public function getDetail(Request $request)
    {
        $store = $request->store;
        $date = $request->date;

        $machine = machine::find('CH01')->machine;
        dd($machine);
        $Details = detail::orderby('machine', 'asc')->select('machine', 'entry_point', 'exit_point')
            ->where('created_at', '=', $date)
            ->get();

        // if ($store == '') {
        //     $Details = detail::orderby('machine', 'asc')->select('machine', 'entry_point', 'exit_point')->limit(5)->get();
        // } else {
        //     $Details = detail::orderby('machine', 'asc')->select('machine', 'entry_point', 'exit_point')
        //         ->where('created_at', '=', $date)
        //         ->get();
        // }
        $response = '';
        $id = 1;
        $prev = null;
        foreach ($Details as $Detail) {
            $response .= '<tr>
                    <td>' . $id . '</td>
                    <td>' . $Detail->machine . '</td>
                    <td>' . $Detail->entry_point . '</td>
                    <td>' . $Detail->exit_point . '</td>
                    <td>' . $Detail->new_profit() . '</td>';

            if ($prev) {
                $response .=  '<td>' . $prev->new_profit() . '</td>';
            } else {
                $response .=  '<td>' . " " . '</td>';
            }
            $response .=
                '<td>' . $Detail->sumOf() . '</td>
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
