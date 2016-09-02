<?php namespace Quinella\Http\Controllers;

use Illuminate\Http\Request;
use Quinella\Http\Requests;
use Quinella\Prediccion;

class PrediccionController extends Controller
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
        return Prediccion::all();
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
        $prediccion = new Prediccion($input);
        if (!$prediccion->save()) {
            abort(500, "Saving failed.");
        }
        return $prediccion;
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        return Prediccion::find($id);
    }
    
    
    public function getUserPredicciones($id)
    {
        $group = Prediccion::where('IdUser', $id)->get();
        
        return $group;
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
        $prediccion = Prediccion::find($id);
        $prediccion->body = $this->request->input('body');
        if (!$prediccion->save()) {
            abort(500, "Saving failed");
        }
        return $prediccion;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        return Prediccion::destroy($id);
    }

}
