<div class="breadcrumbs breadcrumbs-style">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h2>Lista de repartidores</h2>
            <ol>
                <li><a href="configAdmin.php?view=administrador">Nuevo repartidor</a></li>
            </ol>
        </div>
    </div>
</div>

<div id="book-a-table" class="book-a-table">
    <div class="container" data-aos="fade-up">
        <div class="row">
            <div class="table-responsive table-style">
                <table class="table table-striped">
                    <thead class="">
                        <tr>
                            <th scope="col">DNI</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellidos</th>
                            <th scope="col">Teléfono</th>
                            <th scope="col">Dirección</th>
                            <th scope="col">Actualizar</th>
                            <th scope="col">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $mysqli = mysqli_connect(SERVER, USER, PASS, BD);
                            mysqli_set_charset($mysqli, "utf8");

                            $repartidores=mysqli_query($mysqli,"SELECT SQL_CALC_FOUND_ROWS * FROM administrador WHERE rol = 1");

                          while($repa=mysqli_fetch_array($repartidores, MYSQLI_ASSOC)){
                        ?>
                        <tr>
                            <td><?php echo $repa['DNI']; ?></td>
                            <td><?php echo $repa['Nombre']; ?></td>
                            <td><?php echo $repa['Apellidos']; ?></td>
                            <td><?php echo $repa['Telefono']; ?></td>
                            <td><?php echo $repa['Direccion']; ?></td>
                            <td class="text-center">
                                <a href="configAdmin.php?view=administrador-info&code=<?php echo $repa['DNI']; ?>" class="btn btn-outline-primary"><i class="icofont-edit"></i></a>
                            </td>
                            <td class="text-center">
                                <form action="process/del-administrador.php" method="POST" class="FormCatElec" data-form="delete">
                                    <input type="hidden" name="admin-code" value="<?php echo $repa['DNI']; ?>">
                                    <button type="submit" class="btn btn-outline-danger"><i class="icofont-trash"></i></button>    
                                </form>
                            </td>
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