<!DOCTYPE html>
<html lang="es">
    <head>
        <?php $this->load->view(THEME . 'head') ?>
    </head>
    <body>
        <!--TOPBAR-->
        <?php $this->load->view(THEME . 'topbar') ?>
        <!--END TOPBAR-->
        <div class="ch-container">
            <div class="row">
                <?php $this->load->view(THEME . 'left_menu') ?>
                <!--CONTENT-->
                <div id="content" class="col-lg-10 col-sm-10">
                    <!--BREADCRUMB-->
                    <?php $this->load->view(THEME . 'breadcrumb') ?>
                    <!--END BREADCRUMB-->

                    <!--CONTENIDO PROYECTO-->
                    <?php $this->load->view($contenido) ?>
                    <!--END CONTENIDO-->
                </div>
                <!--END CONTENT-->
            </div>
            <!--FOOTER-->
            <?php $this->load->view(THEME . 'footer') ?>
            <!--END FOOTER-->
        </div>

        <!-- external javascript -->

        <script src="<?= base_url() . RECURSOS ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

        <!-- library for cookie management -->
        <script src="<?= base_url() . RECURSOS ?>js/jquery.cookie.js"></script>
        <!-- calender plugin -->
        <script src='<?= base_url() . RECURSOS ?>bower_components/moment/min/moment.min.js'></script>
        <script src='<?= base_url() . RECURSOS ?>bower_components/fullcalendar/dist/fullcalendar.min.js'></script>
        <!-- data table plugin -->
        <script src='<?= base_url() . RECURSOS ?>js/jquery.dataTables.min.js'></script>

        <!-- select or dropdown enhancer -->
        <script src="<?= base_url() . RECURSOS ?>bower_components/chosen/chosen.jquery.min.js"></script>
        <!-- plugin for gallery image view -->
        <script src="<?= base_url() . RECURSOS ?>bower_components/colorbox/jquery.colorbox-min.js"></script>
        <!-- notification plugin -->
        <script src="<?= base_url() . RECURSOS ?>js/jquery.noty.js"></script>
        <!-- library for making tables responsive -->
        <script src="<?= base_url() . RECURSOS ?>bower_components/responsive-tables/responsive-tables.js"></script>
        <!-- tour plugin -->
        <script src="<?= base_url() . RECURSOS ?>bower_components/bootstrap-tour/build/js/bootstrap-tour.min.js"></script>
        <!-- star rating plugin -->
        <script src="<?= base_url() . RECURSOS ?>js/jquery.raty.min.js"></script>
        <!-- for iOS style toggle switch -->
        <script src="<?= base_url() . RECURSOS ?>js/jquery.iphone.toggle.js"></script>
        <!-- autogrowing textarea plugin -->
        <script src="<?= base_url() . RECURSOS ?>js/jquery.autogrow-textarea.js"></script>
        <!-- multiple file upload plugin -->
        <script src="<?= base_url() . RECURSOS ?>js/jquery.uploadify-3.1.min.js"></script>
        <!-- history.js for cross-browser state change on ajax -->
        <script src="<?= base_url() . RECURSOS ?>js/jquery.history.js"></script>
        <!-- JQUERY VALIDATE -->
        <script src="<?= base_url() . RECURSOS ?>js/jquery.validate.min.js"></script>
        <script src="<?= base_url() . RECURSOS ?>js/localization/messages_es.min.js"></script>
        <!--BOOTBOX VENTANA DE ALERTAS -->
        <script src="<?= base_url() . RECURSOS ?>js/bootbox.min.js"></script>
        <!-- application script for Charisma demo -->
        <script src="<?= base_url() . RECURSOS ?>js/charisma.js"></script>

    </body>
</html>

