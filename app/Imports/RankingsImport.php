<?php

namespace App\Imports;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\Ranking;
use App\Models\Categoria;
use App\Models\Inscripcion;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithValidation;

class RankingsImport implements ToModel, WithHeadingRow, WithValidation
{
  private $categorias;
  private $inscripcions;

  public function __construct (){

    $this->categorias=Categoria::pluck('id','nombre');
    $this->inscripcions=Inscripcion::pluck('id','ci');
  }
  

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function rules(): array
    {
        return [
        'posicion' => 'required',
        'ci' => 'required',
        'nombre_apellido' => 'required|string',
        'categoria' => 'required|string',
        'club' => 'required|string',
        'sexo' => 'required|string',
        '1_fecha' => 'required',
        '2_fecha' => 'required',
        '3_fecha' => 'required',
        '4_fecha' => 'required',
        'total' => 'required',
        ];
    }
    public function model(array $row)
    {
        return new Ranking([
          'posicion'  => $row['posicion'],
          'id_inscripcion' => $this->inscripcions[$row['ci']],
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
