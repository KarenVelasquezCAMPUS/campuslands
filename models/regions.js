function cargarRegiones() {
    const departamentoSeleccionado = document.getElementById('departamento').value;

    fetch(/obtenerRegiones.php?departamento=${departamentoSeleccionado})
      .then(response => response.json())
      .then(data => {
        const regionSelect = document.getElementById('region');

        regionSelect.innerHTML = '';

        data.forEach(region => {
          const option = document.createElement('option');
          option.value = region.id;
          option.textContent = region.nombre;
          regionSelect.appendChild(option);
        });
      });
  }

$departamento = $_GET['departamento'];
$regiones = obtenerRegionesPorDepartamento($departamento);
header('Content-Type: application/json');
echo json_encode($regiones);