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
    </body>
</html>

