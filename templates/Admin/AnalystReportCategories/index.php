<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AnalystReportCategory[]|\Cake\Collection\CollectionInterface $analystReportCategories
 */
?>


<div class="container-fluid card full-border">
    <div class="row">
        <div class="col-12">
            <?php
            echo $this->element('admin/filter/analyst_report_category_filter', array(
                'data_search' => $data_search
            ));
            ?>
        </div>
    </div>
</div>

<div class="container-fluid card full-border">

    <div class="row">
        <div class="col-12">
            <div class="box box-primary">
                <div class="box-header d-flex">
                    <h3 class="box-title"> <?php echo __d('report', 'analyst_report_category'); ?> </h3>

                    <?php if (isset($permissions['AnalystReportCategories']['add']) && ($permissions['AnalystReportCategories']['add'] == true)) { ?>

                        <div class="box-tools ml-auto p-1">
                            <?= $this->Html->link("<i class='fas fa-plus'> </i> " . __('add'), ['action' => 'add'], [
                                'escape' => false,
                                'class' => 'btn btn-primary button'
                            ]) ?>
                        </div>
                    <?php  }  ?>
                </div> <!-- box-header -->

                <div class="box-body table-responsive">
                    <table id="<?php echo str_replace(' ', '', 'Analyst Report Category'); ?>" class="table table-hover table-bordered table-striped">
                        <thead class="text-center">
                            <tr>
                                <th><?= $this->Paginator->sort('AnalystReportCategory.id', __('id')) ?></th>
                                <th><?= $this->Paginator->sort('AnalystReportCategory.slug', __('slug')) ?></th>
                                <th><?= $this->Paginator->sort('AnalystReportCategory.enabled', __('enabled')) ?></th>
                                <th><?= $this->Paginator->sort('AnalystReportCategory.created', __('created')) ?></th>
                                <th><?= $this->Paginator->sort('AnalystReportCategory.modified', __('modified')) ?></th>
                                <th><?= __('operation') ?></th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php foreach ($analystReportCategories as $analystReportCategory) : ?>
                                <tr>
                                    <td><?= $this->Number->format($analystReportCategory->id) ?></td>
                                    <td class="text-center"><?= h($analystReportCategory->AnalystReportCategoryLanguages['name']) ?></td>
                                    <td class="text-center">
                                        <?= $this->element('view_check_ico', array('_check' => $analystReportCategory->enabled)) ?>
                                    </td>
                                    <td><?= h($analystReportCategory->created) ?></td>
                                    <td><?= h($analystReportCategory->modified) ?></td>
                                    <td>

                                        <?php
                                        if (isset($permissions['AnalystReportCategories']['view']) && ($permissions['AnalystReportCategories']['view'] == true)) {
                                            echo $this->Html->link('<i class="fa fa-eercast"></i>', array('action' => 'view', $analystReportCategory->id), array('class' => 'btn btn-primary btn-sm m-r-btn', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => __('view')));
                                        }

                                        if (isset($permissions['AnalystReportCategories']['edit']) && ($permissions['AnalystReportCategories']['edit'] == true)) {
                                            echo $this->Html->link('<i class="fa fa-pencil"></i>', array('action' => 'edit', $analystReportCategory->id), array('class' => 'btn btn-warning btn-sm m-r-btn', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => __('edit')));
                                        }

                                        if (isset($permissions['AnalystReportCategories']['delete']) && ($permissions['AnalystReportCategories']['delete'] == true)) {

                                            echo $this->Form->postLink(
                                                '<i class="far fa-trash-alt"></i>',
                                                array('action' => 'delete',  $analystReportCategory->id),
                                                array(
                                                    'escape' => false, 'class' => 'btn btn-danger btn-sm m-r-btn', 'data-toggle' => 'tooltip', 'title' => __('delete'),
                                                    'confirm' => __('delete_message',  $analystReportCategory->id)
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