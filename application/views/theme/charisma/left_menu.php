<!-- left menu starts -->
<div class="col-sm-2 col-lg-2">
    <div class="sidebar-nav">
        <div class="nav-canvas">
            <div class="nav-sm nav nav-stacked">

            </div>
            <ul class="nav nav-pills nav-stacked main-menu">
                <li class="nav-header">Menu</li>
                <li>
                    <a class="ajax-link" href="<?= base_url() ?>admin"><i class="glyphicon glyphicon-home"></i><span> Inicio</span></a>
                </li>
                <li class="accordion">
                    <a href="#"><i class="glyphicon glyphicon-plus"></i><span> Usuario</span></a>
                    <ul class="nav nav-pills nav-stacked">
                        <li><a href="<?= base_url() ?>seguridad/usuario">Listado</a></li>
                        <li><a href="<?= base_url() ?>seguridad/usuario/crear">Crear</a></li>
                    </ul>
                </li>
                <li class="accordion">
                    <a href="#"><i class="glyphicon glyphicon-plus"></i><span> Parametrizacion</span></a>
                    <ul class="nav nav-pills nav-stacked">
                        <li>
                            <a href="<?= base_url() ?>parametrizacion/tipo_libro">Tipo libro</a>
                        </li>
                        <li>
                            <a href="<?= base_url() ?>parametrizacion/ubicacion">Ubicación</a>
                        </li>
                    </ul>
                </li>
                <li class="accordion">
                    <a href="#"><i class="glyphicon glyphicon-plus"></i><span> Libros</span></a>
                    <ul class="nav nav-pills nav-stacked">
                        <li><a href="<?= base_url() ?>biblioteca/libro">Listado</a></li>
                        <li><a href="<?= base_url() ?>biblioteca/libro/crear">Crear</a></li>
                    </ul>
                </li>
                <li class="accordion">
                    <a href="#"><i class="glyphicon glyphicon-plus"></i><span> Prestamos</span></a>
                    <ul class="nav nav-pills nav-stacked">
                        <li><a href="<?= base_url() ?>biblioteca/prestamo">Listado</a></li>
                        <li><a href="<?= base_url() ?>biblioteca/prestamo/crear">Crear</a></li>
                    </ul>
                </li>
                <li>
                    <a href="<?= base_url() ?>seguridad/login/salir"><i class="glyphicon glyphicon-lock"></i><span> Salir</span></a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!--/span-->
<!-- left menu ends -->