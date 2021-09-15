<!-- ========== Nav bar ========== -->
<div class="modal fade" id="menu" tabindex="-1" aria-labelledby="menuLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content modal-dark">
            <div class="modal-header">
                <h5 class="modal-title" id="menuLabel">
                    AL CARBON GRILL
                </h5>
            </div>
            <div class="modal-body">
                <ul class="nav nav-tabs flex-column">
                    <li>
                        <form action="<?php echo SERVERURL; ?>buscar.php" method="GET">
                            <div class="input-group">
                                <input type="text" id="addon1" class="form-control" name="term" required="" placeholder="Buscar">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-warning" type="submit"><i class="icofont-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </li>
                    <br>
                    <li><a href="<?php echo SERVERURL; ?>">Inicio</a></li>
                    <li><a href="<?php echo SERVERURL; ?>platillos.php">Platillos</a></li>
                    <?php 
                    if (!empty($_SESSION['activo'])) {
                        ?>
                        <li><a href="<?php echo SERVERURL; ?>carrito.php">Carrito</a></li>

                        <?php 
                        if ($_SESSION['userType']=="User") {
                            ?>
                            <li><a href="<?php echo SERVERURL; ?>pedido.php">Pedidos</a></li>
                            <li><a href="<?php echo SERVERURL; ?>my-account.php">Mi cuenta</a></li>
                            <?php
                        }else{
                            ?>
                            <li><a href="<?php echo SERVERURL; ?>configAdmin.php">Administración</a></li>
                            <?php
                        } ?>
                        <li><a href="#" data-toggle="modal" data-target="#logout">Cerrar sesion</a></li>
                        <?php
                    }else{
                        ?>
                        <li><a href="#" data-toggle="modal" data-target="#login">Iniciar sesión</a></li>
                        <li><a href="<?php echo SERVERURL; ?>registro.php">Registrate</a></li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger" data-dismiss="modal" type="button">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- ========== Login ========== -->
<div class="modal fade" id="login" tabindex="-1" aria-labelledby="loginLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content modal-dark">
            <div class="modal-header">
                <h5 class="modal-title" id="loginLabel">
                    AL CARBÓN GRILL
                </h5>
            </div>
            <div class="modal-body">
                <div id="specials" class="specials">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                        <a class="nav-link active show" data-toggle="tab" href="#tab-1">Iniciar sesión</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#tab-2">Registrate</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#tab-3">Cambiar contraseña</a>
                                    </li>
                                </ul><br>
                            </div>
                            <div class="col-lg-12 mt-4 mt-lg-0">
                                <div class="tab-content">
                                    <div class="tab-pane active show" id="tab-1">
                                        <form action="<?php echo SERVERURL; ?>process/login.php" method="post" role="form" class="FormCatElec" data-form="login">
                                            <div class="form-row">
                                                <div class="col-lg-6 col-md-6 form-group">
                                                    <input type="text" class="form-control" name="dni-login" required="" placeholder="Numero de DNI">
                                                </div>
                                                <div class="col-lg-6 col-md-6 form-group">
                                                    <input type="password" class="form-control" name="clave-login" required="" placeholder="Contraseña">
                                                </div>
                                            </div>
                                            <div class="ResFormL" style="width: 100%; text-align: center; margin: 0;"></div>
                                            <div class="text-center div-style">
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="optionsRadios1" name="optionsRadios" class="custom-control-input" value="option1" checked="">
                                                    <label class="custom-control-label text-warning" for="optionsRadios1">Cliente</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="optionsRadios2" name="optionsRadios" class="custom-control-input" value="option2">
                                                    <label class="custom-control-label text-secondary" for="optionsRadios2">Administrador</label>
                                                </div>
                                            </div>

                                            <div class="text-center">
                                                <button type="submit" class="btn btn-outline-warning">Iniciar sesión</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane" id="tab-2">
                                        <form class="FormCatElec" action="<?php echo SERVERURL; ?>process/reg-cliente.php" role="form" method="POST" data-form="save">
                                            <div class="form-row">
                                                <div class="col-lg-3 col-md-4 form-group">
                                                    <input class="form-control" type="text" required name="clien-dni" pattern="[0-9]{1,15}" maxlength="9" minlength="8" placeholder="DNI">
                                                </div>
                                                <div class="col-lg-4 col-md-4 form-group">
                                                    <input class="form-control" type="text" required name="clien-nom" pattern="[a-zA-Z ]{1,50}" maxlength="50" placeholder="Nombre">
                                                </div>
                                                <div class="col-lg-5 col-md-4 form-group">
                                                    <input class="form-control" type="text" required name="clien-ape" pattern="[a-zA-Z ]{1,50}" maxlength="50" placeholder="Apellidos">
                                                </div>
                                                <div class="col-lg-7 col-md-8 form-group">
                                                    <input class="form-control" type="text" required name="clien-dir" maxlength="100" placeholder="Direccion">
                                                </div>
                                                <div class="col-lg-5 col-md-4 form-group">
                                                    <input class="form-control" type="tel" required name="clien-tel" maxlength="15" minlength="9" placeholder="Teléfono">
                                                </div>
                                                <div class="col-lg-6 col-md-6 form-group">
                                                    <input class="form-control" type="password" required name="clien-pass" maxlength="50" minlength="8" placeholder="Contraseña">
                                                </div>
                                                <div class="col-lg-6 col-md-6 form-group">
                                                    <input class="form-control" type="password" required name="clien-pass2" maxlength="50" minlength="8" placeholder=" Repita contraseña">
                                                </div>
                                            </div>
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-outline-warning">Registrarse</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane" id="tab-3">
                                        <form class="FormCatElec" action="<?php echo SERVERURL; ?>process/recuperar-contrasena.php" role="form" method="POST" data-form="save">
                                            <div class="form-row">
                                                <div class="col-lg-6 col-md-6 form-group">
                                                    <input class="form-control" type="text" required="" name="user-dni" placeholder="Número de DNI">
                                                </div>
                                                <div class="col-lg-6 col-md-6 form-group">
                                                    <input class="form-control" type="text" name="user-tel" required="" placeholder="Número de telefono">
                                                </div>
                                            </div>
                                            <label>Nueva contraseña</label>
                                            <div class="form-row">
                                                <div class="col-lg-6 col-md-6 form-group">
                                                    <input class="form-control" type="password" name="user-pass1" maxlength="50" minlength="8" placeholder="Contraseña">
                                                </div>
                                                <div class="col-lg-6 col-md-6 form-group">
                                                    <input class="form-control" type="password" name="user-pass2" maxlength="50" minlength="8" placeholder="Repita contraseña">
                                                </div>
                                            </div>
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-outline-warning">Cambiar contraseña</button>
                                            </div>
                                        </form>
                                    </div>
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                
            <div class="modal-footer">
                <button class="btn btn-danger" data-dismiss="modal" type="button">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- ========== Transaccion bancaria ========== -->
<div class="modal fade" id="TransaccionBancaria" tabindex="-1" aria-labelledby="TransaccionBancarioaLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content modal-dark">
            <form class="FormCatElec" action="<?php echo SERVERURL; ?>process/confirmar-compra.php" method="POST" role="form" data-form="save">
                <div class="modal-header">
                    <h5 class="modal-title" id="TransaccionBancarioaLabel">
                        Pago por transaccion bancaria
                    </h5>
                </div>
                <div class="modal-body">
                    <?php
                        $consult1=ejecutarSQL::consultar("SELECT * FROM cuentabanco");
                        if(mysqli_num_rows($consult1)>=1)
                        {
                            $datBank=mysqli_fetch_array($consult1, MYSQLI_ASSOC);
                            ?>
                            <p>Por favor haga el deposito en la siguiente cuenta.</p>
                            <p>
                                Banco: <strong class="text-warning"><?php echo $datBank['Nombre']; ?></strong>
                                <br>
                                Numero de cuenta: <strong class="text-warning"><?php echo $datBank['Numero']; ?></strong>
                                <br>
                                Nombre del beneficiario: <strong class="text-warning"><?php echo $datBank['Beneficiario']; ?></strong>
                                <br>
                                Tipo de cuenta: <strong class="text-warning"><?php echo $datBank['Tipo']; ?></strong>
                                <br>
                            </p>
                            <div class="form-group">
                                <input class="form-control" type="hidden" name="TipoPago" readonly="" value="Transacción Bancaria">

                                <input class="form-control" type="text" name="NumDepo" placeholder="Numero de deposito" maxlength="50" required="">
                            </div>
                            <div class="form-group">
                                <select class="form-control" name="tipo-envio" data-toggle="tooltip" data-placement="top" title="Elige El Tipo De Envio">
                                    <option value="" disabled="" selected="">Selecciona una opción</option>
                                    <option value="Recojo">Recojo en restaurante</option>
                                    <option value="Envio">Envio gratis</option> 
                                </select>
                            </div>
                            <?php
                                if ($_SESSION['userType']=="Admin") {
                                    ?>
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="Cedclien" placeholder="DNI del cliente" maxlength="15" required="">
                                    </div>
                                    <?php
                                }else{
                                    ?>
                                    <input type="hidden" name="Cedclien" value="<?php echo $_SESSION['userDNI']; ?>">
                                    <?php 
                                }
                            ?>
                            <div class="form-group">
                                <input class="form-control" type="text" name="clien-dir-ref" placeholder="Direccion y/o referencia de envio" maxlength="50" required="">
                            </div>
                            <div class="form-group">
                                <label>Sube una foto del comprobante</label>
                                <div class="input-group">
                                    <input type="file" name="comprobante">
                                </div>
                                <p class="text-warning"><small>Archivos admitidos .jpg y .png. Maximo 5 MB</small></p>
                            </div>
                            <?php
                        }else{
                            ?>
                            <p>Ocurrio un error: Parese ser que no se ha configurado la cuenta de banco</p>
                            <?php
                        }
                        mysqli_free_result($consult1);
                    ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-warning">Guardar canbios</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- ========== Pago en efectivo ========== -->
<div class="modal fade" id="PagoEfectivo" tabindex="-1" aria-labelledby="PagoEfectivoLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content modal-dark">
            <form class="FormCatElec" action="<?php echo SERVERURL; ?>process/confirmar-compra.php" method="POST" role="form" data-form="save">
                <div class="modal-header">
                    <h5 class="modal-title" id="PagoEfectivoLabel">Pago Contra-Entega</h5>
                </div>
                <div class="modal-body">
                    <p>Usted pagara al momento de recivir su pedido.</p>

                    <input class="form-control" type="hidden" name="TipoPago" readonly="" value="Contra-Entega">
                    <input class="form-control" type="hidden" name="NumDepo" readonly="" value="0000000">
                    <div class="form-group">
                        <select class="form-control" name="tipo-envio" data-toggle="tooltip" data-placement="top" title="Elige El Tipo De Envio">
                            <option value="" disabled="" selected="">Selecciona el tipo de envio</option>
                            <option value="Recojo">Recojo en restaurante</option>
                            <option value="Envio">Envio gratis</option> 
                        </select>
                    </div>
                    <?php
                        if ($_SESSION['userType']=="Admin") {
                            ?>
                            <div class="form-group">
                                <input class="form-control" type="text" name="Cedclien" placeholder="DNI del cliente" maxlength="15" required="">
                            </div>
                            <?php
                        }else{
                            ?>
                            <input type="hidden" name="Cedclien" value="<?php echo $_SESSION['userDNI']; ?>">
                            <?php
                        }
                    ?>
                    <div class="form-group">
                        <input class="form-control" type="text" name="clien-dir-ref" placeholder="Direccion y/o referencia de envio" maxlength="50" required="">
                    </div>
                    <div class="d-none d-md-none d-lg-none">
                        <input type="file" name="comprobante" value="default.png"> 
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-warning">Guardar canbios</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- ========== Cerrar sesion ========== -->
<div class="modal fade" id="logout" tabindex="-1" aria-labelledby="logoutLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content modal-dark">
            <div class="modal-header">
                <h5 class="modal-title" id="logoutLabel">
                    Cerrar sesion
                </h5>
            </div>
            <div class="modal-body">
                <p>¿Esta seguro que desea salir?</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger" data-dismiss="modal" type="button">No</button>
                <a href="<?php echo SERVERURL; ?>process/logout.php" class="btn btn-warning">Si</a>
            </div>
        </div>
    </div>
</div>

<!-- ========== Administración ========== -->

<!-- ========== Categoria ========== -->
<div class="modal fade" id="addCategory" tabindex="-1" aria-labelledby="categoriaLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content modal-dark">
            <form action="process/reg-categoria.php" method="POST" class="FormCatElec" data-form="save">
                <div class="modal-header">
                    <h5 class="modal-title" id="categoriaLabel">
                        Nueva categoria
                    </h5>
                </div>
                <div class="modal-body">
                    <div class="form-row">
                        <div class="col-lg-12 col-md-12 form-group">
                            <input class="form-control" type="text" name="categ-name" maxlength="30" required="" placeholder="Nombre de la categoría">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" data-dismiss="modal" type="button">No</button>
                    <button class="btn btn-warning" type="submit">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>       