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
    public function index(Request $request)
    {
        $rankings = $this->rankingRepository->all();

        return view('rankings.index')
            ->with('rankings', $rankings);
    }

    /**
     * Show the form for creating a new Ranking.
     *
     * @return Response
     */
    public function create()
    {
        return view('rankings.create');
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
        $file = $request->file('import_file');
        Excel::import(new RankingsImport,$file);
        $ranking = $this->rankingRepository->create($input);

        Flash::success('Ranking saved successfully.');

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
            Flash::error('Ranking not found');

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
        $ranking = $this->rankingRepository->find($id);

        if (empty($ranking)) {
            Flash::error('Ranking not found');

            return redirect(route('rankings.index'));
        }

        return view('rankings.edit')->with('ranking', $ranking);
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
            Flash::error('Ranking not found');

            return redirect(route('rankings.index'));
        }

        $ranking = $this->rankingRepository->update($request->all(), $id);

        Flash::success('Ranking updated successfully.');

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
            Flash::error('Ranking not found');

            return redirect(route('rankings.index'));
        }

        $this->rankingRepository->delete($id);

        Flash::success('Ranking deleted successfully.');

        return redirect(route('rankings.index'));
    }

}
