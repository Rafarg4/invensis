<?php

namespace App\Http\Controllers;
use App\Imports\RankingsImport;
use App\Http\Requests\CreateRankingRequest;
use App\Http\Requests\UpdateRankingRequest;
use App\Repositories\RankingRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Categoria;
use App\Models\Inscripcion;
use App\Models\Ranking;
use DB;
class RankingController extends AppBaseController
{
    /** @var RankingRepository $rankingRepository*/
    private $rankingRepository;

    public function __construct(RankingRepository $rankingRepo)
    {
        $this->rankingRepository = $rankingRepo;
    }

    /**
     * Display a listing of the Ranking.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function consulta(Request $request)
    {
        $nombre_apellido = $request->get('buscar');
        $categoriaSeleccionada = $request->input('categoria_filtro');

        $rankings = DB::table('rankings')
            ->select('ci', 'nombre_apellido', 'id', 'posicion', 'categoria', 'team', 'fecha_uno', 'fecha_dos', 'fecha_tres', 'fecha_cuatro', 'fecha_cinco', 'fecha_seis', 'fecha_seis', 'fecha_ocho', 'fecha_nueve', 'fecha_dies',
            DB::raw('COALESCE(fecha_uno, 0) + COALESCE(fecha_dos, 0) + COALESCE(fecha_tres, 0) + COALESCE(fecha_cuatro, 0) + COALESCE(fecha_cinco, 0) + COALESCE(fecha_seis, 0) + COALESCE(fecha_siete, 0) + COALESCE(fecha_ocho, 0) + COALESCE(fecha_nueve, 0) + COALESCE(fecha_dies, 0) AS totales'))
            ->where('rankings.deleted_at', null)
                ->when($nombre_apellido, function ($query) use ($nombre_apellido) {
                return $query->where('nombre_apellido', 'like', "%$nombre_apellido%");
            })
            ->when(!empty($categoriaSeleccionada), function ($query) use ($categoriaSeleccionada) {
                return $query->where('categoria', $categoriaSeleccionada);
            })
            ->get();
            $categorias = Ranking::distinct()->pluck('categoria'); 

        return view('rankings.consulta',compact('rankings','categorias')); 
    }
    public function ver_ranking($id)
    {
        $rankings = $this->rankingRepository->find($id);
        // Sumar las fechas disponibles
             $totales = $rankings->fecha_uno +
             ($rankings->fecha_dos ?? 0) +
             ($rankings->fecha_tres ?? 0) +
             ($rankings->fecha_cuatro ?? 0) +
             ($rankings->fecha_cinco ?? 0) +
             ($rankings->fecha_seis ?? 0) +
             ($rankings->fecha_siete ?? 0) +
             ($rankings->fecha_ocho ?? 0) +
             ($rankings->fecha_nueve ?? 0) +
             ($rankings->fecha_dies ?? 0);


        if (empty($rankings)) {
            Flash::error('Ranking no encontrado');

            return redirect(route('rankings.ver_ranking'));
        }

        return view('rankings.ver_ranking',compact('rankings','totales'));
    }

    public function index(Request $request)
    {
        $nombre_apellido = $request->get('buscar');
        $rankings = DB::table('rankings')
        ->select('ci', 'nombre_apellido', 'id', 'posicion', 'categoria', 'team', 'fecha_uno', 'fecha_dos', 'fecha_tres', 'fecha_cuatro', 'fecha_cinco', 'fecha_seis', 'fecha_seis', 'fecha_ocho', 'fecha_nueve', 'fecha_dies',
            DB::raw('COALESCE(fecha_uno, 0) + COALESCE(fecha_dos, 0) + COALESCE(fecha_tres, 0) + COALESCE(fecha_cuatro, 0) + COALESCE(fecha_cinco, 0) + COALESCE(fecha_seis, 0) + COALESCE(fecha_siete, 0) + COALESCE(fecha_ocho, 0) + COALESCE(fecha_nueve, 0) + COALESCE(fecha_dies, 0) AS totales'))
         ->where('rankings.deleted_at', null)
         ->where('nombre_apellido','like',"%$nombre_apellido%")
         ->get();
         $inscripcion =Inscripcion::pluck('ci');
        return view('rankings.index',compact('rankings','inscripcion'));
    }

    /**
     * Show the form for creating a new Ranking.
     *
     * @return Response
     */
    public function create()
    {
        $categoria = Categoria::pluck('nombre','id');
        $inscripcion = Inscripcion::pluck('ci','id');
        return view('rankings.create', compact('categoria','inscripcion'));
        

    }

    /**
     * Store a newly created Ranking in storage.
     *
     * @param CreateRankingRequest $request
     *
     * @return Response
     */
    public function store(CreateRankingRequest $request)
    {
        $input = $request->all();

        $ranking = $this->rankingRepository->create($input);

        Flash::success('Ranking creado.');

        return redirect(route('rankings.index'));
    }

    /**
     * Display the specified Ranking.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $ranking = $this->rankingRepository->find($id);
        $totales = $ranking->fecha_uno +
             ($ranking->fecha_dos ?? 0) +
             ($ranking->fecha_tres ?? 0) +
             ($ranking->fecha_cuatro ?? 0) +
             ($ranking->fecha_cinco ?? 0) +
             ($ranking->fecha_seis ?? 0) +
             ($ranking->fecha_siete ?? 0) +
             ($ranking->fecha_ocho ?? 0) +
             ($ranking->fecha_nueve ?? 0) +
             ($ranking->fecha_dies ?? 0);

        if (empty($ranking)) {
            Flash::error('Ranking no encontrado');

            return redirect(route('rankings.index'));
        }

        return view('rankings.show')->with('ranking', $ranking)->with('totales', $totales);
    }

    /**
     * Show the form for editing the specified Ranking.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
         $categoria = Categoria::pluck('nombre','id');
        $inscripcion = Inscripcion::pluck('ci','id');
        $ranking = $this->rankingRepository->find($id);

        if (empty($ranking)) {
            Flash::error('Ranking no encontrado');

            return redirect(route('rankings.index'));
        }

        return view('rankings.edit',compact('ranking','categoria','inscripcion'));
    }

    /**
     * Update the specified Ranking in storage.
     *
     * @param int $id
     * @param UpdateRankingRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRankingRequest $request)
    {
        $ranking = $this->rankingRepository->find($id);

        if (empty($ranking)) {
            Flash::error('Ranking no encontrado');

            return redirect(route('rankings.index'));
        }

        $ranking = $this->rankingRepository->update($request->all(), $id);

        Flash::success('Ranking actualizado.');

        return redirect(route('rankings.index'));
    }

    /**
     * Remove the specified Ranking from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $ranking = $this->rankingRepository->find($id);

        if (empty($ranking)) {
            Flash::error('Ranking no encontrado');

            return redirect(route('rankings.index'));
        }

        $this->rankingRepository->delete($id);

        Flash::success('Ranking eliminado.');

        return redirect(route('rankings.index'));
    }
    public function eliminar_todo()
   {
    // Código para eliminar todos los datos de la tabla
    Ranking::truncate(); // Asumiendo que "Tabla" es el nombre de tu modelo de Eloquent
     Flash::success('Ranking eliminado.');
    return redirect(route('rankings.index'));
}

}
