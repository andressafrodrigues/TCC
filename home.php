
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>iCleanIt - Login!</title>
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
    </head>

        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            <!-- <form role="search" class="navbar-form-custom" action="search_results.html">
                <div class="form-group">
                    <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                </div>
            </form> -->
        </div>

                            <?php 
                                $config = new configuracaoPagina();
                                $config->tipo =   "menu";
                                $config->id   =   "1";
                                $menu = $config->returnconfiguracao($config);
                                echo($menu);
                            ?>
                            </li>
                        </ul>
                    </nav>

                <div class="wrapper wrapper-content">
                    B.E.T.A.

     
                    <h2 id="text-center">Enter Location: </h2>
                    <form id="location-form">
                      <input type="text" id="location-input" class="form-control form-control-lg">
                      <br>
                      <button type="submit" class="btn btn-primary btn-block">Submit</button>
                    </form>
                    <div class="card-block" id="formatted-address"></div>
                    <div class="card-block" id="address-components"></div>
                    <div class="card-block" id="geometry"></div>
                  </div>
                 <?php 
                    include("config/footer.php");
                 ?>
            </div>
        </div>
        <!-- Mainly scripts -->
        <script src="assets/js/login.js"></script>
        <script src="assets/js/geolocation.js"></script>
    </body>

</html>
