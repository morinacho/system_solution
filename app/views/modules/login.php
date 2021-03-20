<?php require_once APP_ROUTE . '/views/modules/header.php';?>
<div class="row col-12 justify-content-center mt-5">
    <div class="col-4 mt-5"> 
        <div class="card mt-3">
            <img src="<?php echo URL_ROUTE ?>media/system/images/loginheader.jpg" class="card-img-top">
            <div class="card-body">
                <form action="<?php echo URL_ROUTE ?>auth/login" method="post"> 
                    <div class="input-group mb-4">
                        <div class="input-group-prepend">
                            <div class="input-group-text material-icons">person</div>
                        </div>
                        <input type="email" class="form-control" id="username" name="user-email" placeholder="example@email.com">
                    </div> 
                    <div class="input-group mb-4">
                        <div class="input-group-prepend">
                            <div class="input-group-text material-icons">lock</div>
                        </div>
                        <input type="password" class="form-control" id="password" name="user-password" placeholder="********">
                    </div> 
                    <button type="submit" class="btn btn-primary btn-block" name="login">Iniciar Sesión</button>
                </form>
                <div class="dropdown-divider"></div>
                 <a class="dropdown-item text-center" href="#">Forgot password?</a>
                </div>
            </div>
        </div>
    </div> 
</div>
<?php require_once APP_ROUTE . '/views/modules/footer.php';?>
