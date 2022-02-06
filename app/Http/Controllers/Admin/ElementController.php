<?php

namespace App\Http\Controllers\Admin;

use App\Models\Element;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ElementRequest;

class ElementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $element = Element::all();
        return view('admin.pages.element.data',compact('element'));
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
    public function store(ElementRequest $request)
    {
        $data = $request->all();

        Element::create($data);

        return redirect()->route('element.index')->with('success', 'Data Berhasil Ditambah !');

        
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
        $item = Element::findOrFail($id);

        return view('admin.pages.element.edit', [
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ElementRequest $request, $id)
    {
        $data = $request->all();

        $item = Element::findOrFail($id);

        $item->update($data);

        return redirect()->route('element.index')->with('success', 'Data Berhasil Diubah !');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Element::findOrFail($id);
        $item->delete();

        return redirect()->route('element.index')->with('success','Data berhasil dihapus !');
    }
}

