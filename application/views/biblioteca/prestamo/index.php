<?php echo $this->session->flashdata('mensaje') ?>
<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-user"></i> <?= $this->titulo_controlador ?> </h2>

                <div class="box-icon">
                    <a href="<?= $this->url ?>/crear" class="btn btn-round btn-default"><i class="glyphicon glyphicon-pencil"></i></a>
                </div>
            </div>
            <div class="box-content">
                <?php if ($datas): ?>
                    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                        <thead>
                            <tr>
                                <th>Titulo</th>
                                <th>Foto</th>
                                <th>Fecha prestamo</th>
                                <th>Prestado a</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($datas as $data): ?>
                                <tr>
                                    <td><?= $data->titulo ?></td>
                                    <td style="vertical-align: middle"><?php echo $data->foto ? '<img class="foto" src="' . base_url() . $data->foto . '" alt="foto" width="30px" />' : '' ?></td>
                                    <td><?= date('d-m-Y',$data->fecha_prestamo) ?></td>
                                    <td><?= $data->prestado_a ?></td>
                                    <td><?php echo $this->config->item('estado')[$data->estado] ?></td>
                                    <td class="center">
                                        <a class="btn btn-info btn-xs" href="<?= $this->url ?>/actualizar/<?= $data->id ?>">
                                            <i class="glyphicon glyphicon-edit icon-white"></i>
                                            Devolver
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    No hay libros prestados
                <?php endif; ?>
            </div>
        </div>
    </div>
    <!--/span-->
</div><!--/row-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3>Fotografia</h3>
            </div>
            <div class="modal-body" style="text-align: center">

            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-default" data-dismiss="modal">Cerrar</a>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('.eliminar').bind('click', function (e) {
            e.preventDefault();
            bootbox.confirm("Seguro desea Eliminar este registro?", function (result) {
                if (result === true) {
                    window.location = e.currentTarget;
                }
            });
        });
        
        $('.foto').bind('click', function () {
            var ruta = $(this).attr('src');
            $('.modal-body').html('<img class="foto" src="' + ruta + '" alt="foto_ubicacion" width="400px" />')
            $('#myModal').modal('show');
        });
    });
</script>

