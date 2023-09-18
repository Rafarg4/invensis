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
        $rankings = DB::table('rankings')
        ->select('ci','nombre_apellido', 'id', 'posicion', 'categoria', 'team', 'fecha_uno', 'fecha_dos', 'fecha_tres', 'fecha_cuatro', 'fecha_cinco', 'fecha_seis','fecha_siete','fecha_ocho','fecha_nueve','fecha_dies', DB::raw('fecha_uno + fecha_dos + fecha_tres + fecha_cuatro + fecha_cinco + fecha_seis + fecha_seis + fecha_ocho + fecha_nueve + fecha_dies AS totales'))
         ->where('rankings.deleted_at', null)
         ->where('nombre_apellido','like',"%$nombre_apellido%")
         ->get();

         $categorias = Ranking::distinct()->pluck('categoria'); 
         $categoriaSeleccionada = $request->input('categoria_filtros');
         $query = Ranking::query();
         if (!empty($categoriaSeleccionada)) {
            $query->where('categoria', $categoriaSeleccionada);
         }
         $rankingmtbs = $query->get();
        return view('rankings.consulta',compact('rankings','categorias')); 
    }
    public function ver_ranking($id)
    {
        $rankings = $this->rankingRepository->find($id);

        // Calcula la suma de las fechas
        $totales = $rankings->fecha_uno + $rankings->fecha_dos + $rankings->fecha_tres + $rankings->fecha_cuatro + $rankings->fecha_cinco + $rankings->fecha_seis + $rankings->fecha_seis + $rankings->fecha_ocho + $rankings->fecha_nueve + $rankings->fecha_dies;


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
        ->select('ci','nombre_apellido', 'id', 'posicion', 'categoria', 'team', 'fecha_uno', 'fecha_dos', 'fecha_tres', 'fecha_cuatro', 'fecha_cinco', 'fecha_seis','fecha_siete','fecha_ocho','fecha_nueve','fecha_dies', DB::raw('fecha_uno + fecha_dos + fecha_tres + fecha_cuatro + fecha_cinco + fecha_seis + fecha_seis + fecha_ocho + fecha_nueve + fecha_dies AS totales'))
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

        if (empty($ranking)) {
            Flash::error('Ranking no encontrado');

            return redirect(route('rankings.index'));
        }

        return view('rankings.show')->with('ranking', $ranking);
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

}
