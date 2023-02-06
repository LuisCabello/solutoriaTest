<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CRUD Indicadores</title>

  <link href="<?php echo base_url('assets/dist/css/bootstrap.min.css'); ?>" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/dist/css/datatables.min.css'); ?>" rel="stylesheet">
</head>

<body>
  <div class="container-fluid p-3">
    <div class="card w-100">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title">Crud Indicadores</h3>
        <button type="button" class="botonAgregar btn btn-primary btn-sm m-1">Agregar Indicador</button>
      </div>
      <div class="card-body">
        <table id="tableData" class="table table-striped" style="width:100%">
          <thead>
            <tr>
              <th>Nombre Indicador</th>
              <th>Codigo</th>
              <th>Unidad de Medida</th>
              <th>Valor</th>
              <th>Fecha</th>
              <th>Tiempo</th>
              <th>Origen</th>
              <th>Opciones</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>Nombre Indicador</th>
              <th>Codigo</th>
              <th>Unidad de Medida</th>
              <th>Valor</th>
              <th>Fecha</th>
              <th>Tiempo</th>
              <th>Origen</th>
              <th>Opciones</th>
            </tr>
          </tfoot>
        </table>
      </div>
      <div class="card-footer text-left">
        <a href="/" class="btn btn btn-dark">Atras</a>
      </div>
    </div>
  </div>
  <!-- Modal para crear un nuevo dato -->
  <div class="modal fade" id="add_post_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Agregar Nuevo Indicador</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <?= form_open(site_url("#"), ['id' => 'add_post_form', 'method' => 'post', 'onsubmit' => 'return false;']); ?>
        <div class="modal-body p-5">
          <div class="mb-3">
            <input type="hidden" value="" name="addIdIndicador" id="addIdIndicador" class="form-control" placeholder="Ingrese Indicador" required>
          </div>

          <div class="mb-3">
            <label>Nombre Indicador</label>
            <input type="text" name="addIndicador" id="addIndicador" class="form-control" placeholder="Ingrese Indicador" maxlength="20" required>
          </div>

          <div class="mb-3">
            <label>Codigo</label>
            <input type="text" name="addCodigo" id="addCodigo" class="form-control" placeholder="Ingrese Codigo" maxlength="20" required>
          </div>

          <div class="mb-3">
            <label>Unidad de Medida</label>
            <input type="text" name="addUnidadM" id="addUnidadM" class="form-control" placeholder="Ingrese Unidad" maxlength="20" required>

          </div>

          <div class="mb-3">
            <label>Valor</label>
            <input input type="number" step="any" name="addValor" id="addValor" class="form-control" placeholder="Ingrese Valor" required>
          </div>

          <div class="mb-3">
            <label>Fecha</label>
            <input id="addFecha" class="form-control" type="date" required>
          </div>

          <div class="mb-3">
            <label>Tiempo</label>
            <input type="text" name="addTiempo" id="addTiempo" class="form-control" placeholder="Ingrese Tiempo" maxlength="20">
          </div>

          <div class="mb-3">
            <label>Origen</label>
            <input type="text" name="addOrigen" id="addOrigen" class="form-control" placeholder="Ingrese Origen" maxlength="50" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" id="add_post_btn">Update Post</button>
        </div>
        <?= form_close() ?>
      </div>
    </div>
  </div>
  <!-- Modal para crear un nuevo dato end -->

  <!-- edit post modal start -->
  <div class="modal fade" id="edit_post_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Editar</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <?= form_open(site_url("#"), ['id' => 'edit_post_form',  'onsubmit' => 'return false;']); ?>
        <div class="modal-body p-5">
          <div class="mb-3">
            <label>Nombre Indicador</label>
            <input type="text" name="editIndicador" id="editIndicador" class="form-control" placeholder="Ingrese Indicador" maxlength="20" required>
          </div>

          <div class="mb-3">
            <label>Codigo</label>
            <input type="text" name="editCodigo" id="editCodigo" class="form-control" placeholder="Ingrese Codigo" maxlength="20" required>
          </div>

          <div class="mb-3">
            <label>Unidad de Medida</label>
            <input type="text" name="editUnidadM" id="editUnidadM" class="form-control" placeholder="Ingrese Unidad" maxlength="20" required>
          </div>

          <div class="mb-3">
            <label>Valor</label>
            <input input type="number" step="any" name="editValor" id="editValor" class="form-control" placeholder="Ingrese Valor" required>
          </div>

          <div class="mb-3">
            <label>Fecha</label>
            <input id="editFecha" name="editFecha" class="form-control" type="date" required>
          </div>

          <div class="mb-3">
            <label>Tiempo</label>
            <input type="text" name="editTiempo" id="editTiempo" class="form-control" placeholder="Ingrese Tiempo" maxlength="20">
          </div>

          <div class="mb-3">
            <label>Origen</label>
            <input type="text" name="editOrigen" id="editOrigen" class="form-control" placeholder="Ingrese Origen" maxlength="50" required>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" id="edit_post_btn">Update Post</button>
        </div>
        <?= form_close() ?>
      </div>
    </div>
  </div>
  <!-- edit post modal end -->

  <script src="<?= base_url('/assets/dist/js/bootstrap.bundle.min.js'); ?>"></script>
  <script src="<?= base_url('/assets/dist/js/jquery-3.6.3.min.js'); ?>"></script>
  <script src="<?= base_url('/assets/dist/js/sweetalert2.all.min.js'); ?>"></script>
  <script type="text/javascript" src="<?= base_url('/assets/dist/js/datatables.min.js'); ?>"></script>
  <?= $this->include("js/indicadoresCrud.js.php"); ?>
</body>

</html>