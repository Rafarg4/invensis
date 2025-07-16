<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCompraRequest;
use App\Http\Requests\UpdateCompraRequest;
use App\Repositories\CompraRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\Proveedor;
use DB;
class CompraController extends AppBaseController
{
    /** @var CompraRepository $compraRepository*/
    private $compraRepository;

    public function __construct(CompraRepository $compraRepo)
    {
        $this->compraRepository = $compraRepo;
    }

    /**
     * Display a listing of the Compra.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $compras = $this->compraRepository->all();

        return view('compras.index')
            ->with('compras', $compras);
    }

    /**
     * Show the form for creating a new Compra.
     *
     * @return Response
     */
    public function create()
    {

        $pedidos = DB::table('pedidos')->select('id')
        ->where('estado','=','Pendiente')
        ->get();

         $productos = DB::table('productos')->select('id', 'nombre','precio_venta','cantidad')->get();
        return view('compras.create',compact('pedidos','productos'));
    }

    /**
     * Store a newly created Compra in storage.
     *
     * @param CreateCompraRequest $request
     *
     * @return Response
     */
    public function store(CreateCompraRequest $request)
    {
        $input = $request->all();

        $input['estado'] = $input['estado'] ?? 'Activo';

        $compra = $this->compraRepository->create($input);

         // 2. Obtener detalles del pedido
        $detalles = DB::table('pedido_detalles')
            ->where('id_pedido', $request->id_pedido)
            ->get();

        foreach ($detalles as $detalle) {
            // 3. Actualizar stock y precio del producto
            DB::table('productos')
                ->where('id', $detalle->id_producto)
                ->update([
                    'cantidad' => DB::raw("cantidad + $detalle->cantidad"),
                    'precio_compra' => $detalle->precio_unitario,
                ]);
        }
        // 4. Marcar el pedido como aplicado
        $pedidos =DB::table('pedidos')
            ->where('id', $request->id_pedido)
            ->update(['estado' => 'Aplicado']);

        //return $pedidos;
        Flash::success('Compra saved successfully.');

        return redirect(route('compras.index'));
    }

    /**
     * Display the specified Compra.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $compra = $this->compraRepository->find($id);

        if (empty($compra)) {
            Flash::error('Compra not found');

            return redirect(route('compras.index'));
        }

        return view('compras.show')->with('compra', $compra);
    }

    /**
     * Show the form for editing the specified Compra.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $compra = $this->compraRepository->find($id);

        if (empty($compra)) {
            Flash::error('Compra not found');

            return redirect(route('compras.index'));
        }

        return view('compras.edit')->with('compra', $compra);
    }

    /**
     * Update the specified Compra in storage.
     *
     * @param int $id
     * @param UpdateCompraRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCompraRequest $request)
    {
        $compra = $this->compraRepository->find($id);

        if (empty($compra)) {
            Flash::error('Compra not found');

            return redirect(route('compras.index'));
        }

        $compra = $this->compraRepository->update($request->all(), $id);

        Flash::success('Compra updated successfully.');

        return redirect(route('compras.index'));
    }

    /**
     * Remove the specified Compra from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $compra = $this->compraRepository->find($id);

        if (empty($compra)) {
            Flash::error('Compra not found');

            return redirect(route('compras.index'));
        }

        $this->compraRepository->delete($id);

        Flash::success('Compra deleted successfully.');

        return redirect(route('compras.index'));
    }
}
