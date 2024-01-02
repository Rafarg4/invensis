<?php

namespace App\Imports;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Collection;
use App\Imports\RankingsImport;
use App\Models\Ranking;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\RankingMTB;

class RankingMTBImport  implements ToModel, WithHeadingRow
{
  public function model(array $row)
    {
        $existingRanking = RankingMTB::where('ci', $row['ci'])->first();

        if ($existingRanking) {
            $existingRanking->update([
            // Actualiza las columnas necesarias en el registro existente
                'fecha_uno' => $row['fecha_uno'],
                'fecha_dos' => $row['fecha_dos'],
                'fecha_tres' => $row['fecha_tres'],
                'fecha_cuatro' => $row['fecha_cuatro'],
                'fecha_cinco' => $row['fecha_cinco'],
                'fecha_seis' => $row['fecha_seis'],
                'fecha_siete' => $row['fecha_siete'],
                'fecha_ocho' => $row['fecha_ocho'],
                'fecha_nueve' => $row['fecha_nueve'],
                'fecha_dies' => $row['fecha_dies'],
                'fecha_once' => $row['fecha_once'],
                // Agrega otras columnas que deseas actualizar aquí
            ]);
        } else {
                // Si no existe un registro, crea uno nuevo
                RankingMTB::create([
                    'ci' => $row['ci'],
                    'posicion'  => $row['pos'],
                    'nombre_apellido' => $row['nombre_apellido'],
                    'categoria' => $row['categoria'],
                    'team' => $row['team'],
                    'fecha_uno' => $row['fecha_uno'],
                    'fecha_dos' => $row['fecha_dos'],
                    'fecha_tres' => $row['fecha_tres'],
                    'fecha_cuatro' => $row['fecha_cuatro'],
                    'fecha_cinco' => $row['fecha_cinco'],
                    'fecha_seis' => $row['fecha_seis'],
                    'fecha_siete' => $row['fecha_siete'],
                    'fecha_ocho' => $row['fecha_ocho'],
                    'fecha_nueve' => $row['fecha_nueve'],
                    'fecha_dies' => $row['fecha_dies'],
                    'fecha_once' => $row['fecha_once'],
                    
                ]);
        }
    }
}

