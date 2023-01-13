<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class StoreController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private Builder $model;


    public function __construct()
    {
        $this->model = (new Store())->query();
        $this->middleware('auth');
    }
    public function index()
    {
        $stores = $this->model->get();
        return view('Stores.index', [
            'stores' => $stores,
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
     * @param  \App\Http\Requests\StoreStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $keys =  ['_token'];
        $Store = new Store();
        $Store->fill($request->except($keys));
        $Store->save();
        return redirect()->route('store.index')->with('message', 'Lưu thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function show(Store $store)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function edit(Store $store)
    {
        return $store->getAttributes();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStoreRequest  $request
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Store $store)
    {
        $store->update(
            $request->except(
                '_token',
                '_method'
            )
        );
        return redirect(route('store.index'))->with('message', 'Lưu thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function destroy(Store $store)
    {
        $store->delete();
        return redirect(route('store.index'))->with('message', 'Xóa thành công');
    }
}
