<?php namespace Quinella\Http\Controllers;

use Illuminate\Http\Request;
use Quinella\Http\Requests;
use Quinella\Partido;

class PartidoController extends Controller
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
        return Partido::all();
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
        $partido = new Partido($input);
        if (!$partido->save()) {
            abort(500, "Saving failed.");
        }
        return $partido;
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        return Partido::find($id);
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
        $partido = Partido::find($id);
        $partido->body = $this->request->input('body');
        if (!$partido->save()) {
            abort(500, "Saving failed");
        }
        return $partido;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        return Partido::destroy($id);
    }

}
