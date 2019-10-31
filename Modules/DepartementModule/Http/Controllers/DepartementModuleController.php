<?php

namespace Modules\DepartementModule\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\DepartementModule\Entities\Departement;
use Modules\DepartementModule\Repository\DepartementRepository;
class DepartementModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */

    protected $DepReps;
    public function __construct(DepartementRepository $DepReps )
    {
        $this->DepReps=$DepReps;
    }


    public function index()
    {

        $Deps=Departement::all();
        return view('departementmodule::index',compact('Deps'));



    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('departementmodule::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',


        ]);

        Departement::create($request->all());

        return redirect('/departementmodule');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('departementmodule::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $Deps =Departement::find($id);
        return view('departementmodule::edit',compact('Deps'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $Deps = Departement::find($id);
        $Deps->name = request('name');
        $Deps->save();
                $request->validate([
                'name' => 'required',

         ]);
        $Deps->update($request->all());

        return redirect('/departementmodule');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $Deps = Departement::find($id);
        $Deps->delete();
        return redirect('/departementmodule');
    }
}
