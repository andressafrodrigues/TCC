

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>iCleanIt - Login!</title>

<?php include("config/header.php");?>
</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>

                <span class="logo-name">iCleanIt!</span>

            </div>
    
            <p>Para entrar, efetue o login.</p>
            <form class="m-t" id="formLogin" role="form" method="POST">
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Insira o e-mail" required="">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Insira a senha" required="">
                </div>
                <button type="submit" class="btn btn-primary btn-login block full-width m-b">Login</button>
                <p class="text-muted text-center"><small>Não possui uma conta?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="register.html">Criar conta</a>
            </form>
            <p class="m-t"> <small>Andressa Felipe Rodrigues &copy; 2018</small> </p>
        </div>
    </div>

    <!-- Mainly scripts -->
 <?php 
    include("config/footer.php");
 ?>

 <script src="assets/js/login.js"></script>

</body>

</html>
