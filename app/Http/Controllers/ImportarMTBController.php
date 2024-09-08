<?php
 
namespace App\Http\Controllers;
use App\Imports\RankingMTBImport;
use App\Http\Requests\CreateRankingRequest;
use App\Http\Requests\UpdateRankingRequest;
use App\Repositories\RankingRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use Maatwebsite\Excel\Facades\Excel;
class ImportarMTBController extends Controller
{
      public function index()
    {
       return view('/importar_mtb');
    }
    public function store(request  $request) 
    {
      try {

      $file = $request->file('import_file');
        Excel::import(new RankingMTBImport,$file);
        Flash::success('Ranking importado correctamente.');
         return redirect(route('rankingMTBs.index'));  

       } catch (\Exception $e) {

      Flash::error('Error al importar, verifique si su documento tiene el formato correcto!.');
      return redirect(route('importar_mtb.index'));  
     }
        
    }

}
