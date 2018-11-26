<?php session_start(); ?>
<!DOCTYPE html>
    <?php 
        require("init.php");
        include ("config/connectionSQL.php");
        include ("config/configPagina.php");
        $config = new configuracaoPagina();
        $config->tipo =   "header";
        $config->id   =   "1";
        $header = $config->returnconfiguracao($config);
        echo($header);
    ?>
    <?php
        include($diretorioRoot."modals/editUsuario.php");
    ?>
    <body class="top-navigation">
        <div id="wrapper">
            <div id="page-wrapper" class="gray-bg">
                <div class="row border-bottom">
                    <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
                        <div class="navbar-header">
                            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#">
                                <i class="fa fa-book"></i> Agendamentos
                            </a>
                        </div>
                        <?php 
                            $config = new configuracaoPagina();
                            $config->tipo =   "menu";
                            $config->id   =   "1";
                            $menu = $config->returnconfiguracao($config);
                            echo($menu);
                        ?>
                    </nav>
                <div class="wrapper wrapper-content">
                <h3><strong>Próximos</strong></h3>
                    <div class="wrapper wrapper-content animated fadeInRight">
                        <div class="row" id="dadosAutonomos">
                        </div>
                    </div>
                    <?php 
                        include("config/footer.php");
                    ?>
                </div>
            </div>
        </div>
        <!-- Mainly scripts -->
        <script src="assets/js/login.js"></script>
        <script src="assets/js/geolocation.js"></script>
        <script>
            exibeProximos30KM();
        </script>
    </body>

</html>
