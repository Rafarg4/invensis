<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCobroRequest;
use App\Http\Requests\UpdateCobroRequest;
use App\Repositories\CobroRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Models\Cliente; // Importar el modelo Cliente
use Illuminate\Support\Facades\Auth; // Importar Auth para obtener el usuario autenticado
use Flash;
use Response;

class CobroController extends AppBaseController
{
    /** @var CobroRepository $cobroRepository */
    private $cobroRepository;

    public function __construct(CobroRepository $cobroRepo)
    {
        $this->cobroRepository = $cobroRepo;
    }

    public function index(Request $request)
    {
        $cobros = $this->cobroRepository->all();

        return view('cobros.index')
            ->with('cobros', $cobros);
    }

    public function create()
    {
        // Obtener la lista de clientes
        $clientes = Cliente::pluck('nombre', 'id');

        return view('cobros.create', compact('clientes'));
    }

    public function store(CreateCobroRequest $request)
    {
        $input = $request->all();

        // Agregar el nombre del usuario autenticado al registro
        $input['usuario'] = Auth::user()->name;

        $cobro = $this->cobroRepository->create($input);

        Flash::success('Cobro guardado correctamente.');

        return redirect(route('cobros.index'));
    }

    public function show($id)
    {
        $cobro = $this->cobroRepository->find($id);

        if (empty($cobro)) {
            Flash::error('Cobro no encontrado.');

            return redirect(route('cobros.index'));
        }

        return view('cobros.show')->with('cobro', $cobro);
    }

    public function edit($id)
    {
        $cobro = $this->cobroRepository->find($id);

        if (empty($cobro)) {
            Flash::error('Cobro no encontrado.');

            return redirect(route('cobros.index'));
        }

        // Obtener la lista de clientes para la edición
        $clientes = Cliente::pluck('nombre', 'id');

        return view('cobros.edit', compact('cobro', 'clientes'));
    }

    public function update($id, UpdateCobroRequest $request)
    {
        $cobro = $this->cobroRepository->find($id);

        if (empty($cobro)) {
            Flash::error('Cobro no encontrado.');

            return redirect(route('cobros.index'));
        }

        // Agregar el nombre del usuario autenticado al registro
        $input = $request->all();
        $input['usuario'] = Auth::user()->name;

        $cobro = $this->cobroRepository->update($input, $id);

        Flash::success('Cobro actualizado correctamente.');

        return redirect(route('cobros.index'));
    }

    public function destroy($id)
    {
        $cobro = $this->cobroRepository->find($id);

        if (empty($cobro)) {
            Flash::error('Cobro no encontrado.');

            return redirect(route('cobros.index'));
        }

        $this->cobroRepository->delete($id);

        Flash::success('Cobro eliminado correctamente.');

        return redirect(route('cobros.index'));
    }
}


