<?php namespace Quinella\Http\Controllers;

use Illuminate\Http\Request;
use Quinella\Http\Requests;
use Quinella\Equipo;

class EquipoController extends Controller
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
        return Equipo::all();
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
        $equipo = new Equipo($input);
        if (!$equipo->save()) {
            abort(500, "Saving failed.");
        }
        return $equipo;
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        return Equipo::find($id);
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
        $equipo = Equipo::find($id);
        $equipo->body = $this->request->input('body');
        if (!$equipo->save()) {
            abort(500, "Saving failed");
        }
        return $equipo;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        return Equipo::destroy($id);
    }

}
