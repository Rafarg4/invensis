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
class ImportarController extends Controller
{
     public function index()
    {
       return view('/importar');
    }
    public function store(request  $request) 
    {
    
        $request->validate([
            'file' => 'required|file|mimes:xlsx,xls',
        ]);

      
        $file = $request->file('file');

        try {
          
            Excel::import(new RankingsImport, $file);

        
            Flash::success('Ranking importado correctamente.');
            return redirect(route('rankings.index'));
        } catch (\Exception $e) {
          
            Flash::error('Error al importar, verifique que el formato sea el correcto.');
            return redirect(route('importar.index'));
        }
    }
}






