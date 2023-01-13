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
      
        return redirect(route('importar'));
    }

}
