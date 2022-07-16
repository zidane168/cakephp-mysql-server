<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AnalystReport $analystReport
 */
?>

<div class="container-fluid card full-border">


    <div class="row">
        <div class="col-12">
            <div class="box box-primary">
                <div class="box-header d-flex">
                    <h3 class="box-title"> <?php echo __d('report', 'analyst_report'); ?> </h3>

                    <?php
                    if (isset($permissions['AnalystReports']['edit']) && ($permissions['AnalystReports']['edit'] == true)) {
                    ?>

                        <div class="box-tools ml-auto p-1">
                            <?php echo $this->Html->link('<i class="fa fa-pencil"></i> ' . __('edit'), array('action' => 'edit', $analystReport->id), array('class' => 'btn btn-primary', 'escape' => false)); ?>
                        </div>

                    <?php
                    }
                    ?>
                </div>

                <div class="box-body">
                    <table class="table table-bordered table-striped">

                        <tr>
                            <th><?= __('id') ?></th>
                            <td><?= $this->Number->format($analystReport->id) ?></td>
                        </tr>
                        <tr>
                            <th><?= __d('report', 'ECid') ?></th>
                            <td><?= h($analystReport->ECid) ?></td>
                        </tr>
                        <tr>
                            <th><?= __d('report', 'analyst_report_category') ?></th>
                            <td><?= $analystReport->has('analyst_report_category') ? $this->Html->link($analystReport->analyst_report_category->analyst_report_category_languages[0]->name, ['controller' => 'AnalystReportCategories', 'action' => 'view', $analystReport->analyst_report_category->id]) : '' ?></td>
                        </tr>
                        <?php
                        echo $this->element('admin/filter/common/enabled_info', array(
                            'object' => $analystReport,
                        ));
                        echo $this->element('admin/filter/common/admin_info', array(
                            'object' => $analystReport,
                        ));
                        ?>
                    </table>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="margin-top-15">
                                <?= $this->element('content_file_view', array(
                                    'languages'             => $languages,
                                    'language_input_fields' => $language_input_fields,
                                    'files'                 => $files,
                                )); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>