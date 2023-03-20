<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSeguroRequest;
use App\Http\Requests\UpdateSeguroRequest;
use App\Repositories\SeguroRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use Auth;
use App\Models\Inscripcion;
use App\Models\Seguro;
class SeguroController extends AppBaseController
{
    /** @var SeguroRepository $seguroRepository*/
    private $seguroRepository;

    public function __construct(SeguroRepository $seguroRepo)
    {
        $this->seguroRepository = $seguroRepo;
    }

    /**
     * Display a listing of the Seguro.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if(Auth::user()->hasRole('super_admin')) {
       $seguros = $this->seguroRepository->all();
        return view('seguros.index')
            ->with('seguros', $seguros);
        }else{ 
         $seguros= Seguro::where('id_user', auth()->user()->id)->get();  
         return view('seguros.index')
            ->with('seguros', $seguros)->with('user', Auth::user());
     }
    }

    /**
     * Show the form for creating a new Seguro.
     *
     * @return Response
     */
    public function create()
    {
     if(Auth::user()->hasRole('super_admin')) {
         $inscripcions = Inscripcion::pluck('primer_y_segundo_nombre','id');
        return view('seguros.create', compact('inscripcions'));
         }else{
        $inscripcions = Inscripcion::where('id_user', auth()->user()->id)->pluck('primer_y_segundo_nombre','id');
        return view('seguros.create')->with('inscripcions', $inscripcions)->with('user', Auth::user());
     }
     }

    /**
     * Store a newly created Seguro in storage.
     *
     * @param CreateSeguroRequest $request
     *
     * @return Response
     */
    public function store(CreateSeguroRequest $request)
    {
        $input = $request->all();

        $seguro = $this->seguroRepository->create($input);

        Flash::success('Seguro saved successfully.');

        return redirect(route('seguros.index'));
    }

    /**
     * Display the specified Seguro.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $seguro = $this->seguroRepository->find($id);
       // $inscripcion = Inscripcion::where('id',$id)->get();

        if (empty($seguro)) {
            Flash::error('Seguro not found');

            return redirect(route('seguros.index'));
        }

        return view('seguros.show',compact('seguro'));
    }

    /**
     * Show the form for editing the specified Seguro.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $seguro = $this->seguroRepository->find($id);
        $inscripcions = Inscripcion::pluck('primer_y_segundo_nombre','id');

        if (empty($seguro)) {
            Flash::error('Seguro not found');

            return redirect(route('seguros.index'));
        }

        return view('seguros.edit',compact('seguro','inscripcions'));
    }

    /**
     * Update the specified Seguro in storage.
     *
     * @param int $id
     * @param UpdateSeguroRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSeguroRequest $request)
    {
        $seguro = $this->seguroRepository->find($id);

        if (empty($seguro)) {
            Flash::error('Seguro not found');

            return redirect(route('seguros.index'));
        }

        $seguro = $this->seguroRepository->update($request->all(), $id);

        Flash::success('Seguro updated successfully.');

        return redirect(route('seguros.index'));
    }

    /**
     * Remove the specified Seguro from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $seguro = $this->seguroRepository->find($id);

        if (empty($seguro)) {
            Flash::error('Seguro not found');

            return redirect(route('seguros.index'));
        }

        $this->seguroRepository->delete($id);

        Flash::success('Seguro deleted successfully.');

        return redirect(route('seguros.index'));
    }
    
}
