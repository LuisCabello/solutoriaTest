<!doctype html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <title>Solutoria Test</title>

  <link href="<?php echo base_url('assets/dist/css/bootstrap.min.css'); ?>" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="<?php echo base_url('assets/dist/css/navbars.css'); ?>" rel="stylesheet">
</head>

<body>
  <main>
    <nav class="navbar navbar-expand-lg bg-dark" aria-label="Thirteenth navbar example" data-bs-theme="dark">
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse d-lg-flex" id="navbarsExample11">
          <a class="navbar-brand col-lg-3 me-0" href="/">Solutoria Test</a>
          <ul class="navbar-nav col-lg-6 justify-content-lg-center">
            <li class="nav-item">
              <div class="form-group" style="display:flex; flex-direction: row; justify-content: center; align-items: center">
                <label class="nav-link active" for="startDate">Desde</label>
                <input id="startDate" class="form-control" type="date" />
              </div>
            </li>
            <li class="nav-item">
              <div class="form-group" style="display:flex; flex-direction: row; justify-content: center; align-items: center">
                <label class="nav-link active" for="endDate">Hasta</label>
                <input id="endDate" class="form-control" type="date" />
                <div class="d-lg-flex col-lg-3 justify-content-lg-end">
                  <button class="btn btn-success" id="filterButton">Filtrar</button>
                </div>
              </div>
            </li>
          </ul>
          <div class="d-lg-flex col-lg-3 justify-content-lg-end">
            <button class="btn btn-primary" id="crudButton">Crud</button>
          </div>
        </div>
      </div>
    </nav>
    <div>
      <div class="p-5 rounded">
        <div class="col-sm-8 mx-auto">
          <!-- Chart -->
          <div style="width: 100%; overflow-x: auto; overflow-y: hidden">
            <div style="width: 3000px; height: 700px">
              <canvas id="myChart" height="300" width="0"></canvas>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <script src="<?= base_url('/assets/dist/js/bootstrap.bundle.min.js'); ?>"></script>
  <script src="<?= base_url('/assets/dist/js/jquery-3.6.3.min.js'); ?>"></script>
  <!-- Grafico -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js@4.1.1/dist/chart.umd.min.js"></script>
  <?= $this->include("js/chart.js.php"); ?>

</body>

</html>