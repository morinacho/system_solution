<?php require_once APP_ROUTE . '/views/modules/header.php'; ?>
<h3 class="text-center mb-2">Agregar nuevo usuario</h3>
<div class="col-12 row justify-content-center">
    <form method="post" action="<?php echo URL_ROUTE ?>users/store" target="_top" class="col-8">
        <div class="form-group">
            <label for="nameInput">Nombre</label>
            <input id="nameInput" name="user-name" type="text" class="form-control" placeholder="Ingresar nombre" required>
        </div>
        <div class="form-group">
            <label for="lastnameInput">Apellido</label>
            <input id="lastnameInput" name="user-lastname" type="text" class="form-control" placeholder="Ingresar apellido" required>
        </div>
        <div class="form-group">
            <label for="mailInput">Correo</label>
            <input id="mailInput" name="user-mail" type="text" class="form-control" placeholder="example@mail.com" required>
        </div>
        <div class="form-group">
            <label for="passInput">Password</label>
            <input id="passInput" name="user-pass" type="password" class="form-control" placeholder="********" required>
        </div>
        <div class="row">
            <div class="form-group col-4">
                <label for="doc-type">Tipo documento</label>
                <select id="doc-type" name="docuemt-type" class="form-control" required>
                    <option disabled selected>Tipo de documento</option>
                    <?php
                    foreach ($param["TipoDocumento"] as $key => $value) {
                        echo "<option value='$key'>$value</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group col-8">
                <label for="docInput">Nro documento</label>
                <input id="docInput" name="user-doc" type="text" class="form-control justNumbers" placeholder="Ingresar documento sin puntos" required>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-6">
                <label for="doc-type">Escuela</label>
                <select id="doc-type" name="docuemt-type" class="form-control" required>
                    <option disabled selected>Selecione escuela</option>
                    <?php
                    foreach ($param["Escuela"] as $key => $value) {
                        echo "<option value='$key'>$value</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group col-6">
                <label for="docInput">Carrera</label>
                <select id="doc-type" name="docuemt-type" class="form-control" required>
                    <option disabled selected>Selecione carrera</option>
                    <?php
                    foreach ($param["Carrera"] as $key => $value) {
                        echo "<option value='$key'>$value</option>";
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="user-type">Tipo usuario</label>
            <select id="user-type" name="rol-type" class="form-control" required>
                <option disabled selected>Tipo de usuario</option>
                <?php
                foreach ($param["TipoRol"] as $key => $value) {
                    echo "<option value='$key'>$value</option>";
                }
                ?>
            </select>
        </div>
        <button id="create-user" name="user-create" type="submit" class="form-control btn btn-primary">Guardar</button>
    </form>
</div>
<?php require_once APP_ROUTE . '/views/modules/footer.php'; ?>