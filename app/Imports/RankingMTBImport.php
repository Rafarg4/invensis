<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\RankingMTB;

class RankingMTBImport implements ToModel
{
  

  public function __construct (){

    
  }
  

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
  
        
    public function model(array $row)
    {
        return new RankingMTB([
          'posicion'  => $row[0],
          'nombre_apellido' => $row[1],
          'categoria' => $row[2],
          'team' => $row[3],
          'fecha_uno' => $row[4],
          'fecha_dos' => $row[5],
          'fecha_tres' => $row[6],
          'fecha_cuatro' => $row[7],
          'fecha_cinco' => $row[8],
          'fecha_seis' => $row[9],
          'total' => $row[10],
        ]);
    
    }
}
