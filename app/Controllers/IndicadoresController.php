<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Indicadores as ModelsIndicadores;

class IndicadoresController extends BaseController
{
  public function index()
  {
    return view('home/home.php');
  }

  public function crud()
  {
    return view('crud/crud.php');
  }

  // Consigue toda la data de la tabla indicadores
  public function getData()
  {
    $indicadoresData = new ModelsIndicadores();
    // Devuelve los datos en formato JSON
    return json_encode($indicadoresData->getData());
  }

  // filtra la informacion del grafico indicadores
  public function getDataFilter()
  {
    $indicadoresData = new ModelsIndicadores();

    $startDate = $this->request->getPost("startDate");
    $endDate = $this->request->getPost("endDate");

    $data = $indicadoresData->getDataFilter($startDate, $endDate);

    return json_encode($data);
  }

  // Metodos del crud

  // handle add post ajax request
  public function add()
  {
    $data = [
      'nombreIndicador' => $this->request->getPost('indicador'), //String
      'codigoIndicador' => $this->request->getPost('codigo'), //String
      'unidadMedidaIndicador' => $this->request->getPost('unidadMedida'), //String
      'valorIndicador' => $this->request->getPost('valor'), //Double
      'fechaIndicador' => $this->request->getPost('fecha'), //Date
      'tiempoIndicador' => $this->request->getPost('tiempo'), //Strign
      'origenIndicador' => $this->request->getPost('origen'), //String
      'updated_at' => date('Y-m-d H:i:s')
    ];

    $postModel = new ModelsIndicadores();
    $response = $postModel->addData($data);
    if ($response) {
      // Si la eliminación fue exitosa, retorna una respuesta correcta
      http_response_code(200);
      echo json_encode(array("message" => "Registro agregado con éxito"));
    } else {
      // Si la eliminación falló, retorna un error
      http_response_code(503);
      echo json_encode(array("message" => "Error al agregar el registro"));
    }
  }

  // handle update post ajax request
  public function update()
  {
    $id = $this->request->getPost('id');

    $data = [
      'nombreIndicador' => $this->request->getPost('indicador'), //String
      'codigoIndicador' => $this->request->getPost('codigo'), //String
      'unidadMedidaIndicador' => $this->request->getPost('unidadMedida'), //String
      'valorIndicador' => $this->request->getPost('valor'), //Double
      'fechaIndicador' => $this->request->getPost('fecha'), //Date
      'tiempoIndicador' => $this->request->getPost('tiempo'), //Strign
      'origenIndicador' => $this->request->getPost('origen'), //String
      'updated_at' => date('Y-m-d H:i:s')
    ];

    $postModel = new ModelsIndicadores();
    $response = $postModel->updateData($id, $data);
    if ($response) {
      // Si la eliminación fue exitosa, retorna una respuesta correcta
      http_response_code(200);
      echo json_encode(array("message" => "Registro agregado con éxito"));
    } else {
      // Si la eliminación falló, retorna un error
      http_response_code(503);
      echo json_encode(array("message" => "Error al agregar el registro"));
    }
  }

  // handle delete post ajax request
  public function delete()
  {
    $id = $this->request->getPost('id');
    $id = intval($id);

    if (is_int($id)) {

      // Validamos que el id este correcto
      $postModel = new ModelsIndicadores();
      $response = $postModel->delete($id);

      if ($response) {
        // Si la eliminación fue exitosa, retorna una respuesta correcta
        http_response_code(200);
        echo json_encode(array("message" => "Registro eliminado con éxito"));
      } else {
        // Si la eliminación falló, retorna un error
        http_response_code(503);
        echo json_encode(array("message" => "Error al eliminar el registro"));
      }
    } else {
      // Si el ID no es un número entero, retorna un error
      http_response_code(400);
      echo json_encode(array("message" => "El ID proporcionado no es un número entero"));
    }
  }
}
