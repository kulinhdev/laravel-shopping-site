<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\StoreSizeRequest;
use App\Http\Requests\Backend\UpdateSizeRequest;
use App\Models\Backend\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = 'Size Management';
        $sizes = Size::latest()->paginate(3);
        return view('backend.sizes.index', compact('page', 'sizes'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSizeRequest $request)
    {

        $result = Size::create($request->all());

        return alertInsert($result, 'sizes.index');
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
        $page = 'Edit Size';
        $sizeUpdate = Size::find($id);

        $sizes = Size::latest()->paginate(3);

        return view('backend.sizes.edit', compact('page', 'sizeUpdate', 'sizes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSizeRequest $request, $id)
    {

        $result = Size::find($id)->update($request->all());

        return alertUpdate($result, 'sizes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $size = Size::find($id);

        if ($size->productOfSizes()->get()->count() > 0) {
            $message = 'You cannot delete this size. Because it belongs to a certain product !';
            return redirect()->back()->with('error', $message);
        };

        $result = $size->delete();

        return alertDelete($result, 'sizes.index');
    }
}
