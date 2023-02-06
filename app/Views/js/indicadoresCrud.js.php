<script>
  $(document).ready(function() {

    $('#tableData').DataTable({
      ajax: {
        url: "indicadores/getIndicadores",
        dataSrc: function(json) {
          return json
        }
      },
      columns: [{
          data: 'nombreIndicador'
        },
        {
          data: 'codigoIndicador'
        },
        {
          data: 'unidadMedidaIndicador'
        },
        {
          data: 'valorIndicador'
        },
        {
          data: 'fechaIndicador'
        },
        {
          data: 'tiempoIndicador'
        },
        {
          data: 'origenIndicador'
        },
        {
          defaultContent: '<button type="button" class="botonModificar btn btn-warning btn-sm m-1" >Modificar</button> <button type="button" class="botonEliminar btn btn-danger btn-sm m-1">Eliminar</button>'
        },
      ]
    });

    // Modificar Data
    $('#tableData tbody').on('click', 'button.botonModificar', function() {
      var table = $('#tableData').DataTable();
      var data = table.row($(this).parents('tr')).data();


      // Luego del click el modal se abre con la información actual
      $('#edit_post_modal').modal("show");

      $("#addIdIndicador").val(data.id);
      $("#editIndicador").val(data.nombreIndicador);
      $("#editCodigo").val(data.codigoIndicador);
      $("#editUnidadM").val(data.unidadMedidaIndicador);
      $("#editValor").val(data.valorIndicador);
      $("#editFecha").val(data.fechaIndicador);
      $("#editTiempo").val(data.tiempoIndicador);
      $("#editOrigen").val(data.origenIndicador);
    });

    $(document).on('submit', '#edit_post_form', function(event) {

      var table = $('#tableData').DataTable();

      var formData = {
        id: $("#addIdIndicador").val(),
        indicador: $("#editIndicador").val(),
        codigo: $("#editCodigo").val(),
        unidadMedida: $("#editUnidadM").val(),
        valor: $("#editValor").val(),
        fecha: $("#editFecha").val(),
        tiempo: $("#editTiempo").val(),
        origen: $("#editOrigen").val()
      };

      $.ajax({
        type: "POST",
        url: "indicadores/updateIndicadores",
        data: formData,
        dataType: "json",
        encode: true,
        success: function(response) {
          if (response.error) {
            // Hubo un error
            Swal.fire({
              title: 'Error',
              text: response.error,
              icon: 'error'
            });
          } else {
            // No hubo un error
            Swal.fire({
              position: 'top-end',
              icon: 'success',
              title: 'Se modifico de forma correcta',
              showConfirmButton: false,
              timer: 1500
            })
            $('#edit_post_modal').modal("hide");
            // Luego de que la data se modifica, cerramos el modal y cargamos la dataTable
            table.ajax.reload();
          }
        },
        error: function(xhr, status, error) {
          Swal.fire({
            title: 'Error',
            text: "Error al hacer la petición: " + error,
            icon: 'error'
          });
        }
      });
    });

    // Eliminar Data
    $('#tableData tbody').on('click', 'button.botonEliminar', function(e) {

      var table = $('#tableData').DataTable();
      var data = table.row($(this).parents('tr')).data();

      var formData = {
        id: data.id,
      };

      Swal.fire({
        title: 'Estás seguro?',
        text: "No podrás revertir esto!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Si, eliminalo!',
        cancelButtonText: 'No, cancelar!',
        reverseButtons: true
      }).then((result) => {
        if (result.value) {
          // Si el usuario confirma la eliminación
          $.ajax({
            type: 'POST',
            url: ' indicadores/delete',
            data: formData,
            success: function(response) {
              if (response.error) {
                // Hubo un error
                Swal.fire({
                  title: 'Error',
                  text: response.error,
                  icon: 'error'
                });
              } else {
                // No hubo un error
                Swal.fire({
                  title: 'Exito',
                  text: 'Elemento eliminado exitosamente',
                  icon: 'success'
                });
                table.ajax.reload();
              }
            },
            error: function(xhr, status, error) {
              Swal.fire({
                title: 'Error',
                text: "Error al hacer la petición: " + error,
                icon: 'error'
              });
            }
          });
        } else(
          result.dismiss === Swal.DismissReason.cancel
        )
      })
    });
  });

  // Agregar Data
  $(document).on('click', 'button.botonAgregar', function(event) {
    $('#add_post_modal').modal("show");
  });

  // add SUBMIT
  $(document).on('submit', '#add_post_form', function(event) {
    
    var table = $('#tableData').DataTable();

    var formData = {
      indicador: $("#addIndicador").val(),
      codigo: $("#addCodigo").val(),
      unidadMedida: $("#addUnidadM").val(),
      valor: $("#addValor").val(),
      fecha: $("#addFecha").val(),
      tiempo: $("#addTiempo").val(),
      origen: $("#addOrigen").val()
    };

    $.ajax({
      type: "POST",
      url: "indicadores/addIndicadores",
      data: formData,
      dataType: "json",
      success: function(response) {
        if (response.error) {
          // Hubo un error
          Swal.fire({
            title: 'Error',
            text: response.error,
            icon: 'error'
          });
        } else {
          // No hubo un error
          Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Your work has been saved',
            showConfirmButton: false,
            timer: 1500
          });
          // Luego de que la data se modifica, cerramos el modal y cargamos la dataTable
          table.ajax.reload();
          $('#add_post_modal').modal("hide");
        }
      },
      error: function(xhr, status, error) {
        Swal.fire({
          title: 'Error',
          text: "Error al hacer la petición: " + error,
          icon: 'error'
        });
      }
    });
  });
</script>