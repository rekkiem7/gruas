
<style>
body{
	background-image: url("imagenes/login_wall.jpg");
}
.form-signin
{
    max-width: 330px;
    padding: 15px;
    margin: 0 auto;
    padding-top: 5px;
}
.form-signin .form-signin-heading, .form-signin .checkbox
{
    margin-bottom: 10px;
}
.form-signin .checkbox
{
    font-weight: normal;
}
.form-signin .form-control
{
    position: relative;
    font-size: 16px;
    height: auto;
    padding: 10px;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}
.form-signin .form-control:focus
{
    z-index: 2;
}
.form-signin input[type="password"]
{
    margin-bottom: 10px;
}
.account-wall
{
    margin-top: 20px;
    padding: 40px 0px 20px 0px;
    background-color: #f7f7f7;
    -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
}
.login-title
{
    color: #555;
    font-size: 18px;
    font-weight: 400;
    display: block;
}
.profile-img
{
    width: 96px;
    height: 96px;
    margin: 0 auto 10px;
    display: block;
    -moz-border-radius: 50%;
    -webkit-border-radius: 50%;
    border-radius: 50%;
}
.profile-name {
    font-size: 16px;
    font-weight: bold;
    text-align: center;
    margin: 10px 0 0;
    height: 1em;
}
.profile-email {
    display: block;
    padding: 0 8px;
    font-size: 15px;
    color: #404040;
    line-height: 2;
    font-size: 14px;
    text-align: center;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
}
.need-help
{
    display: block;
    margin-top: 10px;
}
.new-account
{
    display: block;
    margin-top: 10px;
}
</style>
<body>
	<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
        	<center><img class="animated fadeInDown" src="<?php echo base_url();?>imagenes/logo_titan.png" alt="" width="50%" height="30%"></center>
            <div class="account-wall animated fadeInDown">
                <img class="profile-img" src="<?php echo base_url();?>imagenes/grua.png" alt="">
                <p class="profile-name">Grúas Pacheco</p><br>
                <form class="form-signin"  method="post" action="<?php echo site_url("login/index") ?>">
                <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Nombre de Usuario" required><br>
                <input type="password" class="form-control" id="pass" name="pass" placeholder="Password" required>
               <?php if($error){?><div class="alert alert-danger" role="alert"><strong>Atención:&nbsp;</strong><?php echo $error;?></div><?php }?>
                <button class="btn btn-lg btn-primary btn-block" type="submit">
                    Ingresar</button>
                
                </form>
            </div>
            
        </div>
    </div>
</div>

<BR>
<div class="animated fadeInUp">
<center><p style="color:#ffffff">&copy 2016 Titan Development Solutions - Todos los derechos reservados</p></center>
</div>
</body>
</html>
