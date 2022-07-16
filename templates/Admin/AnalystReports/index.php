<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AnalystReport[]|\Cake\Collection\CollectionInterface $analystReports
 */
?>

<div class="container-fluid card full-border">

    <div class="row">
        <div class="col-12">
            <div class="box box-primary">
                <div class="box-header d-flex">
                    <h3 class="box-title"> <?php echo __d('report', 'analyst_report'); ?> </h3>

                    <?php if (isset($permissions['AnalystReports']['add']) && ($permissions['AnalystReports']['add'] == true)) { ?>

                        <div class="box-tools ml-auto p-1">
                            <?= $this->Html->link("<i class='fas fa-plus'> </i> " . __('add'), ['action' => 'add'], [
                                'escape' => false,
                                'class' => 'btn btn-primary button'
                            ]) ?>
                        </div>
                    <?php  }  ?>
                </div> <!-- box-header -->

                <div class="box-body table-responsive">
                    <table id="<?php echo str_replace(' ', '', 'Analyst Report'); ?>" class="table table-hover table-bordered table-striped">
                        <thead class="text-center">
                            <tr>
                                <th><?= $this->Paginator->sort('AnalystReport.id', __('id')) ?></th>
                                <th><?= $this->Paginator->sort('AnalystReport.ECid', __('ECid')) ?></th>
                                <th><?= $this->Paginator->sort('AnalystReport.id', __d('report', 'analyst_report_category')) ?></th>
                                <th><?= $this->Paginator->sort('AnalystReport.enabled', __('enabled')) ?></th>
                                <th><?= $this->Paginator->sort('AnalystReport.created', __('created')) ?></th>
                                <th><?= $this->Paginator->sort('AnalystReport.modified', __('modified')) ?></th>
                                <th><?= __('operation') ?></th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php foreach ($analystReports as $analystReport) : ?>
                                <tr>
                                    <td><?= $this->Number->format($analystReport->id) ?></td>
                                    <td><?= h($analystReport->ECid) ?></td>
                                    <td><?= $analystReport->has('analyst_report_category') ? $this->Html->link($analystReport->analyst_report_category->analyst_report_category_languages[0]->name, ['controller' => 'AnalystReportCategories', 'action' => 'view', $analystReport->analyst_report_category->id]) : '' ?></td>
                                    <td>
                                        <?php

                                        echo $this->element(
                                            'view_check_ico',
                                            array(
                                                '_check'  => $this->Number->format($analystReport->enabled)
                                            )
                                        )

                                        ?>
                                    </td>
                                    <td><?= h($analystReport->created) ?></td>
                                    <td><?= h($analystReport->modified) ?></td>
                                    <td>

                                        <?php
                                        if (isset($permissions['AnalystReports']['view']) && ($permissions['AnalystReports']['view'] == true)) {
                                            echo $this->Html->link('<i class="fa fa-eercast"></i>', array('action' => 'view', $analystReport->id), array('class' => 'btn btn-primary btn-sm m-r-btn', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => __('view')));
                                        }

                                        if (isset($permissions['AnalystReports']['edit']) && ($permissions['AnalystReports']['edit'] == true)) {
                                            echo $this->Html->link('<i class="fa fa-pencil"></i>', array('action' => 'edit', $analystReport->id), array('class' => 'btn btn-warning btn-sm m-r-btn', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => __('edit')));
                                        }

                                        if (isset($permissions['AnalystReports']['delete']) && ($permissions['AnalystReports']['delete'] == true)) {

                                            echo $this->Form->postLink(
                                                '<i class="far fa-trash-alt"></i>',
                                                array('action' => 'delete',  $analystReport->id),
                                                array(
                                                    'escape' => false, 'class' => 'btn btn-danger btn-sm m-r-btn', 'data-toggle' => 'tooltip', 'title' => __('delete'),
                                                    'confirm' => __('delete_message',  $analystReport->id)
                                                )
                                            );
                                        }

                                        ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <?= $this->element('Paginator'); ?>
            </div><!-- box, box-primary -->
        </div><!-- .col-12 -->
    </div><!-- row -->
</div> <!-- container -->