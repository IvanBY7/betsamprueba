<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Listado de Invitados</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Swiper CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
  <!-- Favicon -->
  <link rel="icon" href="source/icons/anillos.ico" type="image/x-icon">
  <!-- Animate.css -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <!-- DataTables CSS -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css" />

  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f8f9fa;
    }

    h3 {
      text-align: center;
      margin-bottom: 20px;
      font-weight: 600;
    }

    .container {
      background-color: #ffffff;
      border-radius: 10px;
      padding: 20px;
      box-shadow: 0 0 15px rgba(0,0,0,0.1);
    }

    .table thead {
      background-color: #f1f1f1;
      font-weight: bold;
      color: #495057;
    }

    .dt-button.buttons-excel {
      background-color: #28a745 !important;
      color: white !important;
      border: none;
      border-radius: 5px;
      padding: 6px 12px;
      margin-right: 5px;
    }

    .dt-button.buttons-pdf {
      background-color: #dc3545 !important;
      color: white !important;
      border: none;
      border-radius: 5px;
      padding: 6px 12px;
    }

    .tab-content {
      margin-top: 20px;
    }

    td {
      word-break: break-word;
    }

    td:nth-child(7) {
      word-break: break-all;
      max-width: 300px;
      white-space: normal; /* permite salto de línea */
    }
  </style>
</head>
<body>
<div class="container mt-4">
  <ul class="nav nav-tabs" id="tabMenu" role="tablist">
    <li class="nav-item" role="presentation">
      <button class="nav-link active" id="listado-tab" data-bs-toggle="tab" data-bs-target="#listado" type="button" role="tab">
        📝 Listado de Invitados
      </button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="insertar-tab" data-bs-toggle="tab" data-bs-target="#insertar" type="button" role="tab">
        ➕ Insertar Invitado
      </button>
    </li>
  </ul>

  <div class="tab-content">
    <!-- Tab 1: Listado -->
    <div class="tab-pane fade show active" id="listado" role="tabpanel" aria-labelledby="listado-tab">
      <h3>Listado de invitados</h3>
      <table id="tablaInvitados" class="table table-striped table-bordered nowrap w-100">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Entradas</th>
            <th>Confirmación</th>
            <th>Foto</th>
            <th>Teléfono</th>
            <th>Link</th>
            <th>Mensaje</th>
            <th>eliminar</th>
          </tr>
        </thead>
        <tbody></tbody>
      </table>
    </div>

    <!-- Tab 2: Formulario -->
    <div class="tab-pane fade" id="insertar" role="tabpanel" aria-labelledby="insertar-tab">
      <h3>Insertar Invitado</h3>
      <form id="formInvitado" class="row g-3 mt-3">
        <div class="col-md-6">
          <label for="nombreFamilia" class="form-label">Nombre de Familia</label>
          <input type="text" class="form-control" id="nombreFamilia" required>
        </div>
        <div class="col-md-6">
          <label for="personasPermitidas" class="form-label">Personas Permitidas</label>
          <input type="number" class="form-control" id="personasPermitidas" min="1" required>
        </div>
        <div class="col-md-6">
          <label for="participaFoto" class="form-check-label">Participa en Foto</label>
          <input type="checkbox" class="form-check-input ms-2" id="participaFoto">
        </div>
        <div class="col-md-6">
          <label for="numeroTelefono" class="form-label">Número Telefónico</label>
          <input type="text" class="form-control" id="numeroTelefono" maxlength="10" required>
        </div>
        <div class="col-12">
          <button type="submit" class="btn btn-primary">Agregar Invitado</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- JS scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/amplitudejs@5.3.2/dist/amplitude.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>

<script type="module">
  import { UrlBase, UrlBasefront } from "./js/config.js";
  //const UrlBase = "http://192.168.1.217:8000/backend/";
  //const UrlBasefront = "http://192.168.1.217:8000/?familia=";
  let invitados = [];

  let tabla;
  let tbody;

  document.addEventListener("DOMContentLoaded", async function () {
    tbody = document.querySelector("#tablaInvitados tbody");
    await loadInvitados()

    tabla = $('#tablaInvitados').DataTable({
      autoWidth: false, // no lo calcules de forma automática con HTML
      responsive: true,
      columnDefs: [
        { targets: 6, width: '250px' }, // columna de link
      ],
      dom: 'Blfrtip',
      buttons: [
        {
          extend: 'excelHtml5',
          text: 'Exportar a Excel',
          className: 'buttons-excel',
          title: 'Listado de Invitados'
        },
        {
          extend: 'pdfHtml5',
          text: 'Exportar a PDF',
          className: 'buttons-pdf',
          title: 'Listado de Invitados',
          orientation: 'landscape',
          pageSize: 'A4'
        }
      ],
      lengthMenu: [ [10, 25, 50, -1], [10, 25, 50, "Todos"] ],
      language: {
        url: 'source/recursos/es-ES.json'
      }
    });

    // Manejo del formulario
    document.getElementById('formInvitado').addEventListener('submit', insertar_familia);
  });

  async function insertar_familia(e) {
    e.preventDefault();

    const nuevoInvitado = {
      nombre_familia: document.getElementById('nombreFamilia').value.trim(),
      personas_permitidas: parseInt(document.getElementById('personasPermitidas').value),
      participa_foto: document.getElementById('participaFoto').checked,
      numero_telefonico: document.getElementById('numeroTelefono').value.trim()
    };

    try {
      const response = await fetch(UrlBase + 'InsertarFamilia.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json'
        },
        body: JSON.stringify(nuevoInvitado)
      });

      const result = await response.json();

      if (result.success) {
        alert('Invitado insertado correctamente.');
        
        // Si quieres recargar la tabla, haz fetch al listado actualizado aquí
        document.getElementById('formInvitado').reset();
        await loadInvitados()
        //document.getElementById('listado-tab').click(); // volver al tab de listado
      } else {
        alert('Error al insertar: ' + result.error);
      }

    } catch (error) {
      alert('Error en la solicitud: ' + error.message);
    }
  }
  async function loadInvitados(){
    try {
      const response = await fetch(UrlBase + 'getListadoFamilias.php', {
        method: 'GET',
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded'
        }
      });

      if (!response.ok) {
        throw new Error('Error en la respuesta del servidor');
      }

      const data = await response.json();

      if (data.success) {
        console.log(data)
        invitados = data.data
        await renderTabla();
      } else {
        console.error('Error desde el servidor:', data.error);
      }
    } catch (error) {
      console.error('Error en la petición:', error);
    }
  }
  async function renderTabla(){
    tbody.innerHTML = '';
    await invitados.forEach( async (invitado)=> {
      const id = btoa(invitado.id)
      console.log(id)
      const numero = invitado.numero_telefonico; // México + número
      var mensaje = ""
      if(invitado.participa_foto){
        mensaje = `¡Hola ${invitado.nombre_familia}!

Con mucho cariño queremos invitarte a compartir con nosotros un día muy especial 💍✨.

Nos casamos y sería un honor contar con tu presencia en nuestra boda.

Aquí te compartimos el enlace con todos los detalles de la invitación 📲:
${UrlBasefront}${id}

🚨Esperamos tu confirmación a más tardar el día *10 de Agosto*.

Eres parte de nuestro círculo más querido, por eso queremos incluirte a un momento íntimo con nosotros, *te esperamos a las 4:30 en el lugar de la ceremonia* ponte guap@ que se plasmarán momentos eternos, por favor se puntual ✅.

Cualquier duda, no dudes en escribirnos. ¡Esperamos verte pronto! 🤗`;
      }else{
        mensaje = `¡Hola ${invitado.nombre_familia}!

Con mucho cariño queremos invitarte a compartir con nosotros un día muy especial 💍✨.

Nos casamos y sería un honor contar con tu presencia en nuestra boda.

Aquí te compartimos el enlace con todos los detalles de la invitación 📲:
${UrlBasefront}${id}

🚨Esperamos tu confirmación a más tardar el día *10 de Agosto*.

Cualquier duda, no dudes en escribirnos. ¡Esperamos verte pronto! 🤗`;
      }
      const url = `https://wa.me/52${numero}?text=${encodeURIComponent(mensaje)}`;
      const row = document.createElement("tr");
      row.innerHTML = `
        <td>${invitado.id}</td>
        <td>${invitado.nombre_familia}</td>
        <td>${invitado.personas_permitidas}</td>
        <td>${invitado.confirmacion_asistencia ? '✅' : '❌'}</td>
        <td>${invitado.participa_foto ? '✅' : '❌'}</td>
        <td>${invitado.numero_telefonico}</td>
        <td>${UrlBasefront}${id}</td>
        <td><a href="${url}" target="_blank" class="btn btn-success btn-sm">Enviar por WhatsApp</a></td>
        <td><button class="btn btn-primary btn-sm" onclick="enviarPeticion(${invitado.id})">Eliminar registro</button></td>
      `;
      tbody.appendChild(row);
    });
  }

  window.enviarPeticion = function(id) {
    fetch(UrlBase + 'delete_Familia.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify({ id: id })
    })
    .then(response => response.json())
    .then(data => {
      console.log('Respuesta del servidor:', data);
      alert(data.message);
      loadInvitados(); // <-- para que refresque la tabla si quieres
    })
    .catch(error => {
      console.error('Error al enviar la petición:', error);
      alert('Error al enviar la petición');
    });
  };
</script>
</body>
</html>
