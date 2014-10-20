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
                        <label class="control-label">Usuario:</label>
                        <input type="text" name="usuario" class="form-control" id="usuario" value="<?php echo set_value('usuario', isset($data->usuario) ? $data->usuario : '') ?>" placeholder="Escriba su usuario" required/>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Email:</label>
                        <input type="email" name="email" class="form-control" id="email" value="<?php echo set_value('email', isset($data->email) ? $data->email : '') ?>" placeholder="Escirba su email"  required/>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Contraseña:</label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="Contraseña"  minlength="4" required/>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Repita Contraseña:</label>
                        <input type="password" name="re_password" class="form-control" id="re_password" placeholder="Repita Contraseña" minlength="4" required/>
                    </div>

                    <input type="hidden" name="id" value="<?php echo isset($data->id) ? $data->id : '' ?>" />
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
                usuario: {
                    remote: {
                        type:'post',
                        url: "<?php echo $this->url ?>/check_usuario",
                        data: {
                            id: function () {
                                return $("#id").val();
                            },
                            usuario: function () {
                                return $("#usuario").val();
                            }
                        }
                    }
                },
                re_password: {
                    equalTo: "#password"
                }
            },
            messages: {
                usuario:
                        {
                            remote: 'El usuario ya existe'
                        },
                re_password:
                        {
                            equalTo: 'Las contraseñas no coinciden'
                        }
            }
        });
    });
</script>
