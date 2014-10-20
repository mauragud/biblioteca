<!DOCTYPE html>
<html lang="es">
    <head>
        <!--
            ===
            This comment should NOT be removed.
    
            Charisma v2.0.0
    
            Copyright 2012-2014 Muhammad Usman
            Licensed under the Apache License v2.0
            http://www.apache.org/licenses/LICENSE-2.0
    
            http://usman.it
            http://twitter.com/halalit_usman
            ===
        -->
        <meta charset="utf-8">
        <title>Acceso a Biblioteca Virtual</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Charisma, a fully featured, responsive, HTML5, Bootstrap admin template.">
        <meta name="author" content="Muhammad Usman">

        <!-- The styles -->
        <link id="bs-css" href="<?= base_url() . RECURSOS ?>css/bootstrap-cerulean.min.css" rel="stylesheet">

        <link href="<?= base_url() . RECURSOS ?>css/charisma-app.css" rel="stylesheet">
        <link href='<?= base_url() . RECURSOS ?>bower_components/fullcalendar/dist/fullcalendar.css' rel='stylesheet'>
        <link href='<?= base_url() . RECURSOS ?>bower_components/fullcalendar/dist/fullcalendar.print.css' rel='stylesheet' media='print'>
        <link href='<?= base_url() . RECURSOS ?>bower_components/chosen/chosen.min.css' rel='stylesheet'>
        <link href='<?= base_url() . RECURSOS ?>bower_components/colorbox/example3/colorbox.css' rel='stylesheet'>
        <link href='<?= base_url() . RECURSOS ?>bower_components/responsive-tables/responsive-tables.css' rel='stylesheet'>
        <link href='<?= base_url() . RECURSOS ?>bower_components/bootstrap-tour/build/css/bootstrap-tour.min.css' rel='stylesheet'>
        <link href='<?= base_url() . RECURSOS ?>css/jquery.noty.css' rel='stylesheet'>
        <link href='<?= base_url() . RECURSOS ?>css/noty_theme_default.css' rel='stylesheet'>
        <link href='<?= base_url() . RECURSOS ?>css/elfinder.min.css' rel='stylesheet'>
        <link href='<?= base_url() . RECURSOS ?>css/elfinder.theme.css' rel='stylesheet'>
        <link href='<?= base_url() . RECURSOS ?>css/jquery.iphone.toggle.css' rel='stylesheet'>
        <link href='<?= base_url() . RECURSOS ?>css/uploadify.css' rel='stylesheet'>
        <link href='<?= base_url() . RECURSOS ?>css/animate.min.css' rel='stylesheet'>
        <link href='<?= base_url() . RECURSOS ?>css/biblioteca.css' rel='stylesheet'>

        <!-- jQuery -->
        <script src="<?= base_url() . RECURSOS ?>bower_components/jquery/jquery.min.js"></script>

        <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <!-- The fav icon -->
        <link rel="shortcut icon" href="img/favicon.ico">

    </head>

    <body>
        <div class="ch-container">
            <div class="row">

                <div class="row">
                    <div class="col-md-12 center login-header">
                        <h2>Bienvenido a Biblioteca Virtual</h2>
                    </div>
                    <!--/span-->
                </div><!--/row-->

                <div class="row">
                    <div class="well col-md-5 center login-box">
                        <?= validation_errors() ?>
                        <form class="form-horizontal" action="" id="form_principal" method="post">
                            <fieldset>
                                <div class="input-group input-group-lg">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user red"></i></span>
                                    <input type="text" name="usuario" class="form-control" placeholder="Nombre de Usuario" required/>
                                </div>
                                <div class="clearfix"></div><br>

                                <div class="input-group input-group-lg">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock red"></i></span>
                                    <input type="password" name="password" class="form-control" placeholder="Contraseña" required/>
                                </div>

                                <div class="clearfix"></div>

                                <p class="center col-md-5">
                                    <button type="submit" class="btn btn-primary">Ingresar</button>
                                </p>
                            </fieldset>
                        </form>
                    </div>
                    <!--/span-->
                </div><!--/row-->
            </div><!--/fluid-row-->

        </div><!--/.fluid-container-->
        <script>
            $(document).ready(function () {
                $('#form_principal').validate({
                    onkeyup: false
                });
            });
        </script>
        <!-- JQUERY VALIDATE -->
        <script src="<?= base_url() . RECURSOS ?>js/jquery.validate.min.js"></script>
        <script src="<?= base_url() . RECURSOS ?>js/localization/messages_es.min.js"></script>
        <!-- external javascript -->
        <script src="<?= base_url() . RECURSOS ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    </body>
</html>
