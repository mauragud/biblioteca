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
                        <label class="control-label">Titulo:</label>
                        <input type="text" name="titulo" class="form-control" id="titulo" value="<?php echo set_value('titulo', isset($data->titulo) ? $data->titulo : '') ?>" placeholder="Escriba el titulo del libro" required/>
                    </div>
                    <div class="form-group">
                        <label class="control-label">isbn:</label>
                        <input type="text" name="isbn" class="form-control" id="isbn" value="<?php echo set_value('isbn', isset($data->isbn) ? $data->isbn : '') ?>" placeholder="Escriba el isbn del libro" required/>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Autor:</label>
                        <input type="text" name="autor" class="form-control" id="autor" value="<?php echo set_value('autor', isset($data->autor) ? $data->autor : '') ?>" placeholder="Escriba el autor del libro" required/>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Editorial:</label>
                        <input type="text" name="editorial" class="form-control" id="editorial" value="<?php echo set_value('editorial', isset($data->editorial) ? $data->editorial : '') ?>" placeholder="Escriba la editorial del libro" required/>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Tipo libro:</label>
                        <div class="controls">
                            <?php echo form_dropdown('tipo_libro_id', $array, set_value('tipo_libro_id', isset($data->tipo_libro_id) ? $data->tipo_libro_id : ''), 'class="chosen" id="tipo_libro_id" required') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Ubicación:</label>
                        <div class="controls">
                            <?php echo form_dropdown('ubicacion_id', $array1, set_value('ubicacion_id', isset($data->ubicacion_id) ? $data->ubicacion_id : ''), 'class="chosen" id="ubicacion_id" required') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <span class="btn btn-success fileinput-button" id="buttonUpload" <?php echo isset($data->foto) ? 'disabled' : '' ?> >
                            <i class="glyphicon glyphicon-plus"></i>
                            <span>Seleccione Foto</span>
                            <!-- The file input field used as target for the file upload widget -->
                            <input id="fileupload" type="file" name="file"/>
                        </span>
                        <!-- The global progress bar -->
                        <div id="progress" class="progress" style="margin-top:10px">
                            <div class="progress-bar progress-bar-success"></div>
                        </div>
                        <!-- The container for the uploaded files -->
                        <div id="files" class="files">
                            <span class="fotografia" data-toggle="tooltip" data-placement="top" title="Eliminar esta fotografia">
                                <?php if (isset($data->foto)): ?>
                                    <?php echo $data->foto ?>
                                <?php endif; ?>
                            </span>
                        </div>
                    </div>

                    <input type="hidden" name="foto" id="foto" value="" />
                    <input type="hidden" name="id" id="id" value="<?php echo isset($data->id) ? $data->id : '' ?>" />
                    <button type="submit" id="enviar" class="btn btn-default"><?php echo isset($data->id) ? 'Actualizar' : 'Crear' ?></button>
                </form>

            </div>
        </div>
    </div>
    <!--/span-->

</div><!--/row-->
<script>
    $(document).ready(function () {
        var upload = false;
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

        $('.chosen').chosen();
        $('.chosen').bind('change', function () {
            $(this).valid();
        });

        $('.fotografia').bind('click', function () {
            $.ajax({
                url: '<?php echo base_url() ?>parametrizacion/upload_foto/eliminar',
                data: {
                    foto: '<?php echo isset($data->foto) ? $data->foto : '' ?>',
                    id: '<?php echo isset($data->id) ? $data->id : '' ?>',
                    peticion: 'libro'
                },
                type: 'post',
                success: function (respuesta) {
                    alert(respuesta);
                    $('.fotografia').html('');
                }
            });
        });

        $('#fileupload').fileupload({
            url: '<?php echo base_url() ?>parametrizacion/upload_foto/index/libros',
            dataType: 'json',
            acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
            maxFileSize: 2000000,
            done: function (e, data) {
                //console.log(data);
                //$('<span class="fotografia tooltipp" data-toggle="tooltipp" data-placement="top" title="Eliminar esta fotografía" />').text(data.result.archivo).appendTo('#files');
                $('.fotografia').html(data.result.archivo);

                $('#buttonUpload').attr('disabled', true);
                $('#foto').val(data.result.archivo);
                upload = true;
            },
            progressall: function (e, data) {
                var progress = parseInt(data.loaded / data.total * 100, 10);
                $('#progress .progress-bar').css('width', progress + '%');
            }
        }).prop('disabled', !$.support.fileInput)
                .parent().addClass($.support.fileInput ? undefined : 'disabled');

        $('.fotografia').bind('click', function () {
            $.ajax({
                url: '<?php echo base_url() ?>parametrizacion/upload_foto/eliminar',
                data: {
                    foto: $('#foto').val(),
                    id: '<?php echo isset($data->id) ? $data->id : '' ?>',
                    peticion: 'libro'
                },
                type: 'post',
                success: function (respuesta) {
                    $('.fotografia').html('');
                    $('#foto').val('');
                    $('#buttonUpload').attr('disabled', false);
                    $('#progress .progress-bar').css('width', 0 + '%');
                    upload = false;
                }
            });
        });

        $('#enviar').click(function () {
            upload = false;
        });

        $(window).bind('beforeunload', function (e) {
            if (upload === true) {
                return "Tienes una fotografía subida pero no  has guardado la información, esa foto quedara el el disco duro pero no en la base de datos...";
            }
        });
    });
</script>
