<?php echo validation_errors(); ?>
<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i> Crear <?= $this->titulo_controlador ?></h2>


            </div>
            <div class="box-content">
                <form action="" method="POST" id="form_principal" role="form">
                    <div class="form-group">
                        <label class="control-label">Libro:</label>
                        <div class="controls">
                            <?php echo form_dropdown('libro_id', $array, set_value('libro_id', isset($data->libro_id) ? $data->libro_id : ''), 'class="chosen" id="libro_id" required') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Prestado a:</label>
                        <input type="text" name="prestado_a" class="form-control" id="prestado_a" value="<?php echo set_value('prestado_a', isset($data->prestado_a) ? $data->prestado_a : '') ?>" placeholder="A quien se presta el libro" required/>
                    </div>

                    <input type="hidden" name="fecha_prestamo" value="<?php echo time() ?>" />
                    <input type="hidden" name="usuario_id" value="<?php echo $this->session->userdata('id_usuario') ?>" />
                    <input type="hidden" name="estado" value="1" />
                    <button type="submit" class="btn btn-default"><?php echo isset($data->id) ? 'Actualizar' : 'Crear' ?></button>
                </form>

            </div>
        </div>
    </div>
    <!--/span-->

</div><!--/row-->
<script>
    $(document).ready(function () {
        $('#form_principal').validate({
            ignore: "",
            onkeyup: false,
            errorPlacement: function (error, element) {
                if (element.parent('.input-group').length) {
                    error.insertAfter(element.parent());
                } else if (element.is('select')) {
                    element.next().after(error);
                } else
                {
                    error.insertAfter(element);
                }
            }

        });

        $('.chosen').chosen({width: '100%'});
        $('.chosen').bind('change', function () {
            $(this).valid();
        });

    });
</script>
