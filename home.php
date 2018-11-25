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
                      
<!-- Andy-->
                      <h2 id="text-center">Enter Location: </h2>
                      <form id="location-form">
                        <input type="text" id="location-input" class="form-control form-control-lg">
                        <br>
                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                      </form>
                      <div class="card-block" id="formatted-address"></div>
                      <div class="card-block" id="address-components"></div>
                      <div class="card-block" id="geometry"></div>
<!-- /Andy-->
                      
                      
                      
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="contact-box">
                                    <a class="row" href="profile.html">
                                        <div class="col-4">
                                            <div class="text-center">
                                                <img alt="image" class="rounded-circle m-t-xs img-fluid" src="https://thenypost.files.wordpress.com/2018/06/180608-donald-trump.jpg?quality=90&strip=all&w=618&h=410&crop=1">
                                                <div class="m-t-xs font-bold">
                                                    Fodão do EUA
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-8">
                                            <h3>
                                                <strong>Senhor Trump</strong>
                                            </h3>
                                            <p>
                                                <i class="fa fa-map-marker"></i> 
                                                Não Informado! a 3000000Km<br>
                                            </p>
                                            <address>
                                                <strong>Twitter, Inc.</strong><br>
                                                Sigiloso<br>
                                                <abbr title="Phone">P:</abbr> (XXX) XXX-XXXX
                                            </address>
                                        </div>
                                    </a>
                                </div>
                            </div>
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
    </body>

</html>
