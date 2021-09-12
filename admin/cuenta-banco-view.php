<?php
    $bankAccount=ejecutarSQL::consultar("SELECT * FROM cuentabanco");
    if(mysqli_num_rows($bankAccount)>=1)
    {
        $bankD=mysqli_fetch_array($bankAccount, MYSQLI_ASSOC);
        ?>
        <div class="breadcrumbs breadcrumbs-style">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <h2>Actualizar cuenta bancaria</h2>
                </div>
            </div>
        </div>

        <div id="book-a-table" class="book-a-table">
            <div class="container" data-aos="fade-up">
                <form action="./process/up-banco.php" method="POST" role="form" class="form-content FormCatElec" data-form="update">
                    <div class="php-email-form">
                        <input type="hidden" readonly="" class="form-control" name="id" value="<?php echo $bankD['id']; ?>">
                        <div class="form-row">
                            <div class="col-lg-6 col-md-6 form-group">
                                <label>Número de cuenta</label>
                                <input class="form-control" type="text" name="bancoCuenta" value="<?php echo $bankD['Numero']; ?>" maxlength="50" required="">
                            </div>
                            <div class="col-lg-6 col-md-6 form-group">
                                <label>Nombre del banco</label>
                                <input class="form-control" type="text" name="bancoNombre" value="<?php echo $bankD['Nombre']; ?>" maxlength="50" required="">
                            </div>
                            <div class="col-lg-6 col-md-6 form-group">
                                <label>Nombre del beneficiario</label>
                                <input class="form-control" type="text" name="bancoBeneficiario" value="<?php echo $bankD['Beneficiario']; ?>" maxlength="50" required="">
                            </div>
                            <div class="col-lg-6 col-md-6 form-group">
                                <label>Tipo de cuenta</label>
                                <input class="form-control" type="text" name="bancoTipo" value="<?php echo $bankD['Tipo']; ?>" maxlength="50" required="">
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit">Actualizar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <?php
    }else{
        ?>
        <div class="breadcrumbs breadcrumbs-style">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <h2>Agregar cuenta bancaria</h2>
                </div>
            </div>
        </div>

        <div id="book-a-table" class="book-a-table">
            <div class="container" data-aos="fade-up">
                <form action="./process/reg-banco.php" method="POST" role="form" class="FormCatElec" data-form="save">
                    <div class="php-email-form">
                        <div class="form-row">
                            <div class="col-lg-6 col-md-6 form-group">
                                <input class="form-control" type="text" name="bancoCuenta" maxlength="50" required="" placeholder="Numero de cuenta">
                            </div>
                            <div class="col-lg-6 col-md-6 form-group">
                                <input class="form-control" type="text" name="bancoNombre" maxlength="50" required="" placeholder="Nombre del banco">
                            </div>
                            <div class="col-lg-6 col-md-6 form-group">
                                <input class="form-control" type="text" name="bancoBeneficiario" maxlength="50" required="" placeholder="Nombre del beneficiario">
                            </div>
                            <div class="col-lg-6 col-md-6 form-group">
                                <input class="form-control" type="text" name="bancoTipo" maxlength="50" required="" placeholder="Tipo de cuenta">
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit">Agregar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <?php
    }
?>