<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEventoRequest;
use App\Http\Requests\UpdateEventoRequest;
use App\Repositories\EventoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\Atleta;
use App\Models\Evento;
use App\Models\Inscripcion;

class EventoController extends AppBaseController
{
    /** @var EventoRepository $eventoRepository*/
    private $eventoRepository;

    public function __construct(EventoRepository $eventoRepo)
    {
        $this->eventoRepository = $eventoRepo;
    }

    /**
     * Display a listing of the Evento.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function ver_evento() {
   $eventos = Evento::paginate(3); 
    return view('eventos.ver_eventos',compact('eventos'));
    }
    public function index(Request $request)
    {
        $eventos = $this->eventoRepository->all();

        return view('eventos.index')
            ->with('eventos', $eventos);
    }

    /**
     * Show the form for creating a new Evento.
     *
     * @return Response
     */
    public function create()
    {
        return view('eventos.create');
    }

    /**
     * Store a newly created Evento in storage.
     *
     * @param CreateEventoRequest $request
     *
     * @return Response
     */
    public function store(CreateEventoRequest $request)
    {
        $input = $request->all();

        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $nombreimagen = $imagen->getClientOriginalName(); // Obtiene el nombre original del archivo
            $imagen->storeAs('public/uploads', $nombreimagen);
            $input['imagen'] = $nombreimagen;
        }

        $evento = $this->eventoRepository->create($input);

        Flash::success('Evento creado correctamente.');

        return redirect(route('eventos.index'));
    }

    /**
     * Display the specified Evento.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $evento = $this->eventoRepository->find($id);
        $atletas = Atleta::where('id_evento',$id)->get();
        if (empty($evento)) {
            Flash::error('Evento not found');

            return redirect(route('eventos.index'));
        }

        return view('eventos.show',compact('evento','atletas'));
    }

    /**
     * Show the form for editing the specified Evento.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $evento = $this->eventoRepository->find($id);

        if (empty($evento)) {
            Flash::error('Evento not found');

            return redirect(route('eventos.index'));
        }

        return view('eventos.edit')->with('evento', $evento);
    }

    /**
     * Update the specified Evento in storage.
     *
     * @param int $id
     * @param UpdateEventoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEventoRequest $request)
    {
        $evento = $this->eventoRepository->find($id);
         if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $nombreOriginal = $imagen->getClientOriginalName(); // Obtiene el nombre original del archivo

            // Elimina el archivo anterior
            $archivoAnterior = 'public/uploads/' . $evento->imagen;
            if (Storage::exists($archivoAnterior)) {
                Storage::delete($archivoAnterior);
            }

            // Almacena el nuevo archivo en la ubicación con el nombre original
            $imagen->storeAs('public/uploads', $nombreOriginal);

            // Actualiza el nombre del archivo en los datos de entrada
            $datos['imagen'] = $nombreOriginal;
        }

        if (empty($evento)) {
            Flash::error('Evento not found');

            return redirect(route('eventos.index'));
        }

        $evento = $this->eventoRepository->update($request->all(), $id);

        Flash::success('Evento actualizado correctamente.');

        return redirect(route('eventos.index'));
    }

    /**
     * Remove the specified Evento from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $evento = $this->eventoRepository->find($id);

        if (empty($evento)) {
            Flash::error('Evento not found');

            return redirect(route('eventos.index'));
        }

        $this->eventoRepository->delete($id);

        Flash::success('Evento eliminado correctamente.');

        return redirect(route('eventos.index'));
    }

    public function ver_eventos_detalles($id)
        {
            $evento = $this->eventoRepository->find($id);
            if (empty($evento)) {
                Flash::error('Evento not found');

                return redirect(route('eventos.index'));
            }

            return view('eventos.ver_eventos_detalles',compact('evento'));
        }
    public function buscar(Request $request)
    {
        $ci = $request->input('ci');

        // Realiza la búsqueda en la tabla 'inscripcions' por el campo 'ci'
        $inscripcion = Inscripcion::where('ci', $ci)->first();

        if ($inscripcion) {
            // Devuelve los datos encontrados en formato JSON
            return response()->json(['success' => true, 'data' => $inscripcion]);
        } else {
            // Devuelve un mensaje si no se encuentran datos
            return response()->json(['success' => false]);
        }
    }
}
