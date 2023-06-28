<?php 
    include_once __DIR__.'/Templates/header.php';
?>
    
    <div class="col-md-6 py-5 p-4 d-flex text-center">
                <div class="card">
                    <div class="card-header">
                        Ingresar Datos:
                    </div>
                    <div class="dropdown d-flex justify-content-center m-4">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Departamentos
                        </button>
                        <ul class="dropdown-menu">
                            <option value="1">Departamento 1</option>
                            <option value="2">Departamento 2</option>
                            <option value="3">Departamento 3</option>
                        </ul>
                    </div>
                    <form class="p-4" method="POST" action="registrar.php">
                        <div class="mb-3">
                            <label class="form-label">Nombre</label>
                            <input type="text" class="form-control" name="txtNombre" autofocus required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Apellido</label>
                            <input type="text" class="form-control" name="txtApellido" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Fecha Nac</label>
                            <input type="date" class="form-control" name="txtFecha" required>
                        </div>
                        <div class="d-grid">
                            <input type="hidden" name="oculto" value="1">
                            <input type="submit" class="btn btn-primary" value="Registrar">
                        </div>
                    </form>
                </div>
            </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <?php
                    if(isset($_GET['mensaje']) && $_GET['mensaje'] == 'falta'){
                ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>ERROR!</strong> Rellena todos los campos.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
                    }
                ?>

                <?php
                    if(isset($_GET['mensaje']) && $_GET['mensaje'] == 'registrado'){
                ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Registrado!</strong> Se agregaron los datos.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
                    }
                ?>

                <?php
                    if(isset($_GET['mensaje']) && $_GET['mensaje'] == 'error'){
                ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> Vuelve a intentar.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
                    }
                ?>

                <?php
                    if(isset($_GET['mensaje']) && $_GET['mensaje'] == 'editado'){
                ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Editado!</strong> Se actualizaron los datos.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
                    }
                ?>

                <?php
                    if(isset($_GET['mensaje']) && $_GET['mensaje'] == 'eliminado'){
                ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Eliminado!</strong> Se eliminaron los datos del usuario seleccionado.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
                    }
                ?>

                <div class="card d-flex text-center">
                    <div class="card-header">
                        Lista de campers
                    </div>
                    <div class="p-4">
                        <div class="table-responsive">
                            <table class="table align-middle">
                                <thead>
                                    <tr>
                                        <th scope="col">idCamper</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Apellido</th>
                                        <th scope="col">Fecha Nac</th>
                                        <th scope="col">idReg</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    
                                        foreach($persona as $dato){
                                    
                                    ?>
                                    <tr class="">
                                        <td scope="row"><?php echo $dato -> codigo; ?></td>
                                        <td><?php echo $dato -> nombre; ?></td>
                                        <td><?php echo $dato -> edad; ?></td>
                                        <td><?php echo $dato -> signo; ?></td>
                                        <td><a class="text-primary" href="editar.php?codigo=<?php echo $dato -> codigo; ?>"><i class="bi bi-pencil-square"></i></a></td>
                                        <td><a onclick="return confirm('¿Estás seguro de eliminar los datos del usuario?')" class="text-danger" href="eliminar.php?codigo=<?php echo $dato -> codigo; ?>"><i class="bi bi-trash-fill"></i></a></td>
                                    </tr>
                                    <?php
                                    
                                        }
                                    
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
    include_once __DIR__. '/Templates/footer.php';
?>