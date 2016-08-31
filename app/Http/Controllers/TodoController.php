<?php namespace Quinella\Http\Controllers;

use Illuminate\Http\Request;
use Quinella\Http\Requests;
use Quinella\Quinella;

class QuinellaController extends Controller
{

    private $request;

    function __construct(Request $request)
    {
        $this->request = $request;
    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return Quinella::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = $this->request->all();
        $quinella = new Quinella($input);
        if (!$quinella->save()) {
            abort(500, "Saving failed.");
        }
        return $quinella;
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        return Quinella::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        $quinella = Quinella::find($id);
        $quinella->body = $this->request->input('body');
        if (!$quinella->save()) {
            abort(500, "Saving failed");
        }
        return $quinella;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        return Quinella::destroy($id);
    }

}
