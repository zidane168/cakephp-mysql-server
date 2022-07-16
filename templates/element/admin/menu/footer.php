<?php
    use Cake\Core\Configure;
?>


<div class="row">
    <div class="col-md-12">
        <small class="">
            Version: <?= Configure::read('site.version') . " | "  . date('Y-m-d H:i:s') ?>
        </small>
    </div>
</div>
