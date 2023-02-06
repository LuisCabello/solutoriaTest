<?php

namespace App\Models;

use CodeIgniter\Model;

class Indicadores extends Model
{
  protected $DBGroup          = 'default';
  protected $table            = 'indicadores';
  protected $primaryKey       = 'id';
  protected $allowedFields    = [
    'nombreIndicador', 'codigoIndicador', 'unidadMedidaIndicador', 'valorIndicador',
    'fechaIndicador', 'tiempoIndicador', 'origenIndicador'
  ];

  //Obtenemos data desde la tabla
  public function theTableIsEmpty()
  {
    $array = $this->first();

    if (empty($array)) {
      return true;
    }
    return false;
  }

  //Recibe varios datos y la guarda en la tabla indicadores
  public function insertData($data)
  {
    return $this->insertBatch($data);
  }

  public function getData()
  {
    return $this->findAll();
  }

  // Recibe las fechas desde el front y filtramos la data
  public function getDataFilter($startDate, $endDate)
  {
    $column = "fechaIndicador";
    return $this->where("$column BETWEEN '$startDate' AND '$endDate'")->findAll();
  }

  // Crud
  public function addData($data)
  {
    return $this->save($data);
  }
  public function updateData($id, $data)
  {
    return $this->update($id, $data);
  }
  public function deleteData($id)
  {
    return $this->delete($id);
  }

}
