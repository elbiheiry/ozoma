<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TermsRequest;
use App\Models\TermsAndCondition;
use Illuminate\Http\Request;

class TermsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $terms = TermsAndCondition::firstOrFail();

        return view('admin.pages.terms.index' ,compact('terms'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  TermsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function update(TermsRequest $request)
    {
        try {
            $request->update();

            return update_response();
        } catch (\Throwable $th) {
            return error_response();
        }
    }
}
