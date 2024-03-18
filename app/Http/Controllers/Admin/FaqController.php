<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FaqRequest;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faqs = Faq::all()->sortByDesc('id');

        return view('admin.pages.faqs.index' ,compact('faqs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  FaqRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FaqRequest $request)
    {
        try {
            $request->store();

            return add_response();
        } catch (\Throwable $e) {
            return error_response();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $faq = Faq::findOrFail($id);

        return view('admin.pages.faqs.edit' ,compact('faq'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  FaqRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FaqRequest $request, $id)
    {
        try {
            $request->update($id);

            return update_response();
        } catch (\Throwable $e) {
            return error_response();
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
        Faq::findOrFail($id)->delete();

        return redirect()->back();
    }
}
