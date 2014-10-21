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
                        <label class="control-label">Descripción:</label>
                        <input type="text" name="descripcion" class="form-control" id="descripcion" value="<?php echo set_value('descripcion', isset($data->descripcion) ? $data->descripcion : '') ?>" placeholder="Escriba su descripción" required/>
                    </div>

                    <input type="hidden" name="id" id="id" value="<?php echo isset($data->id) ? $data->id : '' ?>" />
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
            onkeyup: false,
            rules: {
                descripcion: {
                    remote: {
                        type: 'post',
                        url: "<?php echo $this->url ?>/check",
                        data: {
                            id: function () {
                                return $("#id").val();
                            },
                            usuario: function () {
                                return $("#descripcion").val();
                            }
                        }
                    }
                }
            },
            messages: {
                descripcion:
                        {
                            remote: 'El Tipo libro ya existe'
                        }
            }
        });

    });
</script>
