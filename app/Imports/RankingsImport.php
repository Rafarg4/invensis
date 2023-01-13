<?php

namespace App\Imports;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\Ranking;
use App\Models\Categoria;
use Maatwebsite\Excel\Concerns\ToModel;

class RankingsImport implements ToModel, WithHeadingRow
{
  private $categorias;

  public function __construct (){

    $this->categorias=Categoria::pluck('id','nombre');
  }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Ranking([
          'posicion'  => $row['posicion'],
          'nombre_apellido' => $row['nombre_apellido'],
          'id_categoria' => $this->categorias[$row['categoria']],
          'club' => $row['club'],
          'sexo' => $row['sexo'],
          'primer_fecha' => $row['1_fecha'],
          'segundo_fecha' => $row['2_fecha'],
          'tercero_fecha' => $row['3_fecha'],
          'cuarto_fecha' => $row['4_fecha'],
          'total' => $row['total'],
        ]);
    }
}
