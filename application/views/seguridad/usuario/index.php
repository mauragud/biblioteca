<?php echo $this->session->flashdata('mensaje') ?>
<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-user"></i> <?= $this->titulo_controlador ?> </h2>

                <div class="box-icon">
                    <a href="<?= $this->url?>/crear" class="btn btn-round btn-default"><i class="glyphicon glyphicon-pencil"></i></a>
                </div>
            </div>
            <div class="box-content">
                <?php if($datas): ?>
                <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                    <thead>
                        <tr>
                            <th>Usuario</th>
                            <th>Email</th>
                            <th>Fecha Creación</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($datas as $data): ?>
                        <tr>
                            <td><?= $data->usuario ?></td>
                            <td class="center"><?= $data->email ?></td>
                            <td class="center"><?= $data->created ?></td>
                            <td class="center">
                                <a class="btn btn-info" href="<?= $this->url ?>/actualizar/<?= $data->id ?>">
                                    <i class="glyphicon glyphicon-edit icon-white"></i>
                                    Editar
                                </a>
                                <a class="btn btn-danger eliminar" href="<?= $this->url ?>/eliminar/<?= $data->id ?>">
                                    <i class="glyphicon glyphicon-trash icon-white"></i>
                                    Eliminar
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?php else:?>
                No se encontraron Datos
                <?php endif; ?>
            </div>
        </div>
    </div>
    <!--/span-->

</div><!--/row-->

