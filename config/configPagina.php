<?php
    class configuracaoPagina{
        public $tipo; //Footer ou Header ou Menu ou Banco
        public $id;
        public $rooter = "";

        function returnConfiguracao($classe){
            $dirRoot    =   "";
            $tipo       =   $classe->tipo;
            $id         =   $classe->id;
            $dirRoot    =   $classe->rooter;

            if($dirRoot != "" && $dirRoot != " "){
                $rooter = $classe->rooter;
            }else{
                $rooter = $_SESSION["rooter"];
            }

            $result =   "nada";
            if ($tipo == 'header'){
                if ($id == '1'){
                    $result = '<head>
                                    <meta charset="utf-8">
                                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                                    <title>ICleanerIT</title>
                                    
                                    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
                                    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet">
                                    <link href="assets/css/plugins/toastr/toastr.min.css" rel="stylesheet">
                                    <link href="assets/js/plugins/gritter/jquery.gritter.css" rel="stylesheet">

                                    <link href="assets/css/plugins/jsTree/style.min.css" rel="stylesheet">
                                    <link href="assets/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">
                                    <link href="assets/css/plugins/iCheck/custom.css" rel="stylesheet">
                                    <link href="assets/css/plugins/chosen/bootstrap-chosen.css" rel="stylesheet">
                                    <link href="assets/css/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet">
                                    <link href="assets/css/plugins/colorpicker/bootstrap-colorpicker.min.css" rel="stylesheet">
                                    <link href="assets/css/plugins/cropper/cropper.min.css" rel="stylesheet">
                                    <link href="assets/css/plugins/switchery/switchery.css" rel="stylesheet">
                                    <link href="assets/css/plugins/jasny/jasny-bootstrap.min.css" rel="stylesheet">
                                    <link href="assets/css/plugins/nouslider/jquery.nouislider.css" rel="stylesheet">
                                    <link href="assets/css/plugins/datapicker/datepicker3.css" rel="stylesheet">
                                    <link href="assets/css/plugins/ionRangeSlider/ion.rangeSlider.css" rel="stylesheet">
                                    <link href="assets/css/plugins/ionRangeSlider/ion.rangeSlider.skinFlat.css" rel="stylesheet">
                                    <link href="assets/css/plugins/clockpicker/clockpicker.css" rel="stylesheet">
                                    <link href="assets/css/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet">
                                    <link href="assets/css/plugins/select2/select2.min.css" rel="stylesheet">
                                    <link href="assets/css/plugins/touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet">
                                    <link href="assets/css/plugins/dualListbox/bootstrap-duallistbox.min.css" rel="stylesheet">
                                    <link href="assets/css/plugins/steps/jquery.steps.css" rel="stylesheet">
                                    <link href="assets/css/plugins/dataTables/datatables.min.css" rel="stylesheet">
                                    <link href="assets/css/plugins/summernote/summernote.css" rel="stylesheet">
                                    <link href="assets/css/plugins/summernote/summernote-bs3.css" rel="stylesheet">
                                    <!-- Sweet Alert -->
                                    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

                                    <link href="assets/css/animate.css" rel="stylesheet">
                                    <link href="assets/css/style.css" rel="stylesheet">

                                    <script src="https://code.jquery.com/jquery-3.2.1.min.js"
                                            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
                                            crossorigin="anonymous"></script>

                                    <style type="text/css">
                                        .float-add {
                                            position: fixed;
                                            float: bottom;
                                            bottom: 50px;
                                            right: 15px;
                                            z-index: 100;
                                        }
                                    </style>

                                </head>
                                ';
                }
            }elseif($tipo == 'footer'){
                if ($id == '1'){
                    $result =   ' 
                                    <div class="footer">
                                        <div class="pull-right">
                                            Controle de Estoque</strong>.
                                        </div>
                                        <div>
                                            <strong>Copyright</strong> Andy & Gerson &copy; 2017
                                        </div>
                                    </div>
                                ';
                }
                if($id == '2'){
                    $result =   '

                                       <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
                                    <!--<script src="js/jquery-3.1.1.min.js"></script>-->
                                    <script src="js/bootstrap.min.js"></script>
                                    <script type="text/javascript" src="jquery-1.2.6.pack.js"></script>
                                    <script type="text/javascript" src="jquery.maskedinput-1.1.4.pack.js"/></script>
                                    <script src="https://www.calcmaps.com/js/scripts.js?v=2"></script>
                                    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js"/></script>
                                    <script type="text/javascript" src="jquery.maskedinput-1.1.4.pack.js"/></script>

                                    <!-- Custom and plugin javascript -->
                                    <script src="js/inspinia.js"></script>
                                    <script src="js/plugins/pace/pace.min.js"></script>
                                    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

                                    <!-- Flot -->
                                    <script src="js/plugins/flot/jquery.flot.js"></script>
                                    <script src="js/plugins/flot/jquery.flot.spline.js"></script>
                                    <script src="js/plugins/flot/jquery.flot.tooltip.min.js"></script>
                                    <script src="js/plugins/flot/jquery.flot.resize.js"></script>
                                    <script src="js/plugins/flot/jquery.flot.pie.js"></script>

                                    <!-- ChartJS-->
                                    <script src="js/plugins/chartJs/Chart.min.js"></script>

                                    <!-- Peity -->
                                    <script src="js/plugins/peity/jquery.peity.min.js"></script>

                                    <!-- Peity demo -->
                                    <script src="js/demo/peity-demo.js"></script>

                                    <!-- GITTER -->
                                    <script src="js/plugins/gritter/jquery.gritter.min.js"></script>

                                    <!-- Sparkline -->
                                    <script src="js/plugins/sparkline/jquery.sparkline.min.js"></script>

                                    <!-- Sparkline demo data  -->
                                    <script src="js/demo/sparkline-demo.js"></script>

                                    <!-- iCheck -->
                                    <script src="js/plugins/iCheck/icheck.min.js"></script>

                                    <!-- Chosen -->
                                    <script src="js/plugins/chosen/chosen.jquery.js"></script>

                                    <!-- JSKnob -->
                                    <script src="js/plugins/jsKnob/jquery.knob.js"></script>

                                    <!-- Input Mask-->
                                    <script src="js/plugins/jasny/jasny-bootstrap.min.js"></script>

                                    <!-- Data picker -->
                                    <script src="js/plugins/datapicker/bootstrap-datepicker.js"></script>

                                    <!-- NouSlider -->
                                    <script src="js/plugins/nouslider/jquery.nouislider.min.js"></script>

                                    <!-- Switchery -->
                                    <script src="js/plugins/switchery/switchery.js"></script>

                                    <!-- IonRangeSlider -->
                                    <script src="js/plugins/ionRangeSlider/ion.rangeSlider.min.js"></script>

                                    <!-- MENU -->
                                    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>

                                    <!-- Color picker -->
                                    <script src="js/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>

                                    <!-- Clock picker -->
                                    <script src="js/plugins/clockpicker/clockpicker.js"></script>

                                    <!-- Image cropper -->
                                    <script src="js/plugins/cropper/cropper.min.js"></script>

                                    <!-- Date range use moment.js same as full calendar plugin -->
                                    <script src="js/plugins/fullcalendar/moment.min.js"></script>

                                    <!-- Date range picker -->
                                    <script src="js/plugins/daterangepicker/daterangepicker.js"></script>

                                    <!-- Select2 -->
                                    <script src="js/plugins/select2/select2.full.min.js"></script>

                                    <!-- TouchSpin -->
                                    <script src="js/plugins/touchspin/jquery.bootstrap-touchspin.min.js"></script>

                                    <!-- Tags Input -->
                                    <script src="js/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>

                                    <!-- Dual Listbox -->
                                    <script src="js/plugins/dualListbox/jquery.bootstrap-duallistbox.js"></script>

                                    <!-- Tree View -->
                                    <script src="js/plugins/jsTree/jstree.min.js"></script>

                                    <!-- Toastr script -->
                                    <script src="js/plugins/toastr/toastr.min.js"></script>

                                    <!-- Steps -->
                                    <script src="js/plugins/steps/jquery.steps.min.js"></script>

                                    <!-- Jquery Validate -->
                                    <script src="js/plugins/validate/jquery.validate.min.js"></script>

                                    <!-- SQL -->
                                    <script src="js/plugins/sql/sql.js"></script>

                                    <!-- DataTables -->
                                    <script src="js/plugins/dataTables/datatables.min.js"></script>

                                    <!-- Peity -->
                                    <script src="js/demo/peity-demo.js"></script>

                                    <!-- SUMMERNOTE -->
                                    <script src="js/plugins/summernote/summernote.min.js"></script>

                                    <!-- Sweet alert -->
                                    <script src="js/plugins/sweetalert/sweetalert.min.js"></script>

                                    <script>
                                        $(document).ready(function(){
                                            $("#summernote").summernote({
                                                shortcuts: false,
                                                toolbar: [
                                                    ["style", ["bold", "italic", "underline", "clear"]],
                                                    ["fontsize", ["fontsize"]],
                                                    ["para", ["paragraph"]],
                                                    ["Insert",["picture"]],
                                                  ]
                                            });
                                            $("#summernoteDescLivros").summernote({
                                                shortcuts: false,
                                                toolbar: [
                                                    ["style", ["bold", "italic", "underline", "clear"]],
                                                    ["fontsize", ["fontsize"]],
                                                    ["para", ["paragraph"]],
                                                    ["Insert",["picture"]],
                                                  ]
                                            });
                                            $("#summernoteDescEditaLivros").summernote({
                                                shortcuts: false,
                                                toolbar: [
                                                    ["style", ["bold", "italic", "underline", "clear"]],
                                                    ["fontsize", ["fontsize"]],
                                                    ["para", ["paragraph"]],
                                                    ["Insert",["picture"]],
                                                  ]
                                            });
                                            $("#summernoteDescCategoria").summernote({
                                                shortcuts: false
                                            });
                                            $("#summernoteDescCategoriaEdita").summernote({
                                                shortcuts: false
                                            });
                                            $("#summernoteDescEditoraEdita").summernote({
                                                shortcuts: false
                                            });
                                            $("#summernoteDescEditora").summernote({
                                                shortcuts: false
                                            });
                                            $("#summernoteDescAutor").summernote({
                                                shortcuts: false
                                            });
                                            $("#summernoteDescAutorEdita").summernote({
                                                shortcuts: false
                                            });
                                       });
                                       $(".chosen-select").chosen({width: "100%"});
                                    </script>
                                ';
                        }
            }elseif($tipo == "menu"){
                if($id == "1"){
                    $result =   '
                                    <ul class="nav navbar-top-links navbar-right">
                                        <li class="dropdown">
                                            <li>
                                                <a href="login.html">
                                                    <i class="fa fa-sign-out"></i> Log out
                                                </a>
                                            </li>
                                            <li class="dropdown">
                                                <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                                                    <i class="fa fa-tasks"></i>  
                                                </a>
                                                <ul class="dropdown-menu dropdown-alerts">
                                                    <li>
                                                        <a href="#" onclick="editarUsuario()" class="dropdown-item">
                                                            <div>
                                                                <i class="fa fa-gear fa-fw"></i> Editar Perfil
                                                            </div>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </li>
                                    </ul>
                                ';
                }
            }
            return $result;
        }

    }
?>