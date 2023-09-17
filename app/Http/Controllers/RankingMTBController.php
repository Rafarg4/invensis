<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRankingMTBRequest;
use App\Http\Requests\UpdateRankingMTBRequest;
use App\Repositories\RankingMTBRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\RankingMTB;
use DB;
class RankingMTBController extends AppBaseController
{
    /** @var RankingMTBRepository $rankingMTBRepository*/
    private $rankingMTBRepository;

    public function __construct(RankingMTBRepository $rankingMTBRepo)
    {
        $this->rankingMTBRepository = $rankingMTBRepo;
    }

    /**
     * Display a listing of the RankingMTB.
     *
     * @param Request $request
     *
     * @return Response
     */
     public function consulta(Request $request)
    {
        $nombre_apellido = $request->get('buscar');
        $rankingmtbs = DB::table('ranking_m_t_bs')
        ->select('nombre_apellido', 'id', 'posicion', 'categoria', 'team', 'fecha_uno', 'fecha_dos', 'fecha_tres', 'fecha_cuatro', 'fecha_cinco', 'fecha_seis', DB::raw('fecha_uno + fecha_dos + fecha_tres + fecha_cuatro + fecha_cinco + fecha_seis AS totales'))
         ->where('ranking_m_t_bs.deleted_at', null)
         ->where('nombre_apellido','like',"%$nombre_apellido%")
         ->get();
        return view('ranking_m_t_bs.consulta',compact('rankingmtbs')); 
    }
    public function index(Request $request)
    {
        $nombre_apellido = $request->get('buscar');
        $rankingMTBs = DB::table('ranking_m_t_bs')
        ->select('nombre_apellido', 'id', 'posicion', 'categoria', 'team', 'fecha_uno', 'fecha_dos', 'fecha_tres', 'fecha_cuatro', 'fecha_cinco', 'fecha_seis', DB::raw('fecha_uno + fecha_dos + fecha_tres + fecha_cuatro + fecha_cinco + fecha_seis AS totales'))
         ->where('ranking_m_t_bs.deleted_at', null)
         ->where('nombre_apellido','like',"%$nombre_apellido%")
         ->get();
        return view('ranking_m_t_bs.index')
            ->with('rankingMTBs', $rankingMTBs);
    }

    /**
     * Show the form for creating a new RankingMTB.
     *
     * @return Response
     */
    public function create()
    {
        return view('ranking_m_t_bs.create');
    }

    /**
     * Store a newly created RankingMTB in storage.
     *
     * @param CreateRankingMTBRequest $request
     *
     * @return Response
     */
    public function store(CreateRankingMTBRequest $request)
    {
        $input = $request->all();

        $rankingMTB = $this->rankingMTBRepository->create($input);

        Flash::success('Ranking M T B saved successfully.');

        return redirect(route('rankingMTBs.index'));
    }

    /**
     * Display the specified RankingMTB.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $rankingMTB = $this->rankingMTBRepository->find($id);

        if (empty($rankingMTB)) {
            Flash::error('Ranking M T B not found');

            return redirect(route('rankingMTBs.index'));
        }

        return view('ranking_m_t_bs.show')->with('rankingMTB', $rankingMTB);
    }

    /**
     * Show the form for editing the specified RankingMTB.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $rankingMTB = $this->rankingMTBRepository->find($id);

        if (empty($rankingMTB)) {
            Flash::error('Ranking M T B not found');

            return redirect(route('rankingMTBs.index'));
        }

        return view('ranking_m_t_bs.edit')->with('rankingMTB', $rankingMTB);
    }

    /**
     * Update the specified RankingMTB in storage.
     *
     * @param int $id
     * @param UpdateRankingMTBRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRankingMTBRequest $request)
    {
        $rankingMTB = $this->rankingMTBRepository->find($id);

        if (empty($rankingMTB)) {
            Flash::error('Ranking M T B not found');

            return redirect(route('rankingMTBs.index'));
        }

        $rankingMTB = $this->rankingMTBRepository->update($request->all(), $id);

        Flash::success('Ranking M T B updated successfully.');

        return redirect(route('rankingMTBs.index'));
    }

    /**
     * Remove the specified RankingMTB from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $rankingMTB = $this->rankingMTBRepository->find($id);

        if (empty($rankingMTB)) {
            Flash::error('Ranking M T B not found');

            return redirect(route('rankingMTBs.index'));
        }

        $this->rankingMTBRepository->delete($id);

        Flash::success('Ranking M T B deleted successfully.');

        return redirect(route('rankingMTBs.index'));
    }
}
