<?php

use Cake\Routing\Router;

if ($file['extension'] == "docx" || $file['extension'] == "doc") { ?>
    <img alt="word" class="analyst_report_file" src="<?= Router::url('/', true) . 'img/file_icon/doc.svg' ?>" />

<?php } elseif ($file['extension'] == "xlsx" || $file['extension'] == "xls") { ?>
    <img alt="excel" class="analyst_report_file" src="<?= Router::url('/', true) . 'img/file_icon/xls.svg' ?>" />

<?php } elseif ($file['extension'] == "pdf") { ?>
    <img alt="pdf" class="analyst_report_file" src="<?= Router::url('/', true) . 'img/file_icon/pdf.svg' ?>" />

<?php } else { ?>

    <img alt="other" class="analyst_report_file" src="<?= Router::url('/', true) . 'img/file_icon/file.svg' ?>" />
<?php }  ?>