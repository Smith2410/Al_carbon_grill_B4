<div class="breadcrumbs breadcrumbs-style">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h2>Lista de administradores</h2>
            <ol>
                <li><a href="configAdmin.php?view=administrador">Nuevo Administrador</a></li>
            </ol>
        </div>
    </div>
</div>

<div id="book-a-table" class="book-a-table">
    <div class="container" data-aos="fade-up">
        <div class="row">
            <div class="table-responsive table-style">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">DNI</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellidos</th>
                            <th scope="col">Teléfono</th>
                            <th scope="col">Dirección</th>
                            <th scope="col">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $mysqli = mysqli_connect(SERVER, USER, PASS, BD);
                            mysqli_set_charset($mysqli, "utf8");

                            $administradores=mysqli_query($mysqli,"SELECT SQL_CALC_FOUND_ROWS * FROM administrador WHERE DNI!='".$_SESSION['adminID']."' AND rol=0");

                            while($adm=mysqli_fetch_array($administradores, MYSQLI_ASSOC))
                            {
                                ?>
                                <tr>
                                    <td><?php echo $adm['DNI']; ?></td>
                                    <td><?php echo $adm['Nombre']; ?></td>
                                    <td><?php echo $adm['Apellidos']; ?></td>
                                    <td><?php echo $adm['Telefono']; ?></td>
                                    <td><?php echo $adm['Direccion']; ?></td>
                                    <td class="text-center">
                                        <form action="process/del-administrador.php" method="POST" class="FormCatElec" data-form="delete">
                                            <input type="hidden" name="admin-code" value="<?php echo $adm['DNI']; ?>">
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