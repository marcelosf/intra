<?php

namespace Intranet\Http\Controllers\Api;

use Intranet\Model\Local\Local;
use Illuminate\Http\Request;
use Intranet\Http\Controllers\Controller;

class LocalController extends Controller
{

    protected $local;


    public function __construct(Local $local)
    {

        $this->local = $local;

    }


    /**
     * Display a listing of the local.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $locals = $this->local->all();

        return compact('locals');

    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->local->create($request->all());

    }

    /**
     * Display the specified resource.
     *
     * @param  \Intranet\Model\Local\Local  $local
     * @return \Illuminate\Http\Response
     */
    public function show(Local $local)
    {

        return $this->local->find($local);

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Intranet\Model\Local\Local  $local
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Local $local)
    {

        return $this->local->find($local)->update($request->all());

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Intranet\Model\Local\Local  $local
     * @return \Illuminate\Http\Response
     */
    public function destroy(Local $local)
    {

        $this->local->find($local)->delete();

    }

}
