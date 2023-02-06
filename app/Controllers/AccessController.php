<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Indicadores as ModelsIndicadores;

class AccessController extends BaseController
{
  public function getAcces()
  {
    // Comprobamos si hay data en la base de datos
    $indicadores = new ModelsIndicadores();
    $isEmpty = $indicadores->theTableIsEmpty();

    // Si esta vacio agrega data
    if ($isEmpty) {
      /* Endpoint */
      $url = 'https://postulaciones.solutoria.cl/api/acceso';

      /* eCurl */
      $curl = curl_init($url);

      $data = '{
      "userName": "luis.cabello.a@mail.pucv.cl",
      "flagJson": true
      }';

      curl_setopt($curl, CURLOPT_POST, true);
      /* Set JSON data to POST */
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

      /* Define content type */
      curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

      /* Return json */
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

      /* make request */
      $result = curl_exec($curl);

      /* close curl */
      curl_close($curl);

      $this->getData(json_decode($result));
    } else {
      echo "La base de datos ya esta llena";
    }
  }

  public function getData($token)
  {
    $curl = curl_init();

    curl_setopt_array($curl, [
      CURLOPT_URL => "https://postulaciones.solutoria.cl/api/indicadores",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_HTTPHEADER => [
        'Content-Type: application/json',
        'Accept: application/json',
        'Authorization: Bearer ' . $token->token
      ],
      CURLOPT_SSL_VERIFYPEER => false,
    ]);

    $response = curl_exec($curl);
    $error = curl_error($curl);

    curl_close($curl);

    if ($error) {
      echo "cURL Error #:" . $error;
    } else {
      // Si la respuesta es correcta, se guarda la data en la base de datos
      $indicadores = new ModelsIndicadores();
      $indicadores->insertData(json_decode($response, true));
    }
  }
}
