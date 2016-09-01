<?php namespace Quinella\Http\Controllers;

use Illuminate\Http\Request;
use Quinella\Http\Requests;
use Quinella\UserHasTorneo;

class UserHasTorneoController extends Controller
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
        return UserHasTorneo::all();
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
        $userHasTorneo = new UserHasTorneo($input);
        if (!$userHasTorneo->save()) {
            abort(500, "Saving failed.");
        }
        return $userHasTorneo;
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        return UserHasTorneo::find($id);
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
        $userHasTorneo = UserHasTorneo::find($id);
        $userHasTorneo->body = $this->request->input('body');
        if (!$userHasTorneo->save()) {
            abort(500, "Saving failed");
        }
        return $userHasTorneo;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        return UserHasTorneo::destroy($id);
    }

}
