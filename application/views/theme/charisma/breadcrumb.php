<div>
    <ul class="breadcrumb">
        <li>
            <a href="<?= base_url() ?>admin">Inicio</a>
        </li>
        <?php if(isset($breads)): ?>
        <?php for ($i = 0; $i < count($breads); $i++): ?>
            <li>
                <a href="<?php echo $breads[$i]['ruta'] ?>"><?php echo $breads[$i]['titulo'] ?></a>
            </li>
        <?php endfor; ?>
        <?php endif; ?>
    </ul>
</div>