<?php require_once APP_ROUTE . '/views/modules/header.php'; ?>
<h3 class="text-center mb-3">Editar usuario</h3>
<div class="col-12 row justify-content-center">
    <form method="post" action="<?php echo URL_ROUTE ?>users/update" target="_top" class="col-8">
        <div class="form-group">
            <label for="nameInput">Nombre</label>
            <input id="nameInput" name="user-name" value="<?php echo $param['user']->datos_usuario_nombre ?>" type="text" class="form-control" placeholder="Ingresar nombre" required>
            <input name="user-id" value="<?php echo $param['user']->datos_usuario_id ?>" type="hidden">
        </div>
        <div class="form-group">
            <label for="lastnameInput">Apellido</label>
            <input id="lastnameInput" name="user-lastname" value="<?php echo $param['user']->datos_usuario_apellido ?>" type="text" class="form-control" placeholder="Ingresar apellido" required>
        </div>
        <div class="form-group">
            <label for="mailInput">Correo</label>
            <input id="mailInput" name="user-mail" value="<?php echo $param['user']->datos_usuario_email ?>" type="text" class="form-control" placeholder="example@mail.com" required>
        </div>
        <div class="form-group">
            <label for="passInput">Password</label>
            <input id="passInput" name="user-pass" type="password" class="form-control" placeholder="********">
        </div>
        <div class="row">
            <div class="form-group col-4">
                <label for="doc-type">Tipo documento</label>
                <select id="doc-type" name="docuemt-type" class="form-control" required>
                    <option disabled selected>Tipo de documento</option>
                    <?php
                    foreach ($param["TipoDoc"] as $key => $value) {
                        if ($value == $param['user']->tipo_documento_nombre) {
                            echo "<option value='$key' selected>$value</option>";
                        } else {
                            echo "<option value='$key'>$value</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="form-group col-8">
                <label for="docInput">Nro documento</label>
                <input id="docInput" name="user-doc" value="<?php echo $param['user']->datos_usuario_documento ?>" type="text" class="form-control justNumbers" placeholder="Ingresar documento sin puntos" required>
            </div>
        </div>
        <div class="form-group">
            <label for="user-type">Tipo usuario</label>
            <select id="user-type" name="rol-type" class="form-control" required>
                <option disabled selected>Tipo de usuario</option>
                <?php
                foreach ($param["TipoRol"] as $key => $value) {
                    if ($value == $param['user']->tipo_rol_nombre) {
                        echo "<option value='$key' selected>$value</option>";
                    } else {
                        echo "<option value='$key'>$value</option>";
                    }
                }
                ?>
            </select>
        </div>
        <button id="edit-user" name="user-edit" type="submit" class="form-control btn btn-primary">Editar</button>
    </form>
</div>
<?php require_once APP_ROUTE . '/views/modules/footer.php'; ?>