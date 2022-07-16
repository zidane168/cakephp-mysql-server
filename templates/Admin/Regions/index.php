<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Region[]|\Cake\Collection\CollectionInterface $regions
 */
?>

<div class="container-fluid card full-border">
    <div class="row">
        <div class="col-12">
            <?php
            echo $this->element('admin/filter/region_filter', array(
                'data_search' => $data_search
            ));
            ?>
        </div>
    </div>
</div>

<div class="container-fluid card full-border">

    <div class="row">
        <div class="col-12">
            <div class="box box-primary ">
                <div class="box-header d-flex">
                    <h3 class="box-title"> <?php echo __d('setting', 'regions'); ?> </h3>

                    <?php if (isset($permissions['Regions']['add']) && ($permissions['Regions']['add'] == true)) { ?>

                        <div class="box-tools ml-auto p-1">
                            <?= $this->Html->link("<i class='fas fa-plus'> </i> " . __('add'), ['action' => 'add'], [
                                'escape' => false,
                                'class' => 'btn btn-primary button'
                            ]) ?>
                        </div>
                    <?php  }  ?>
                </div> <!-- box-header -->

                <div class="box-body table-responsive">
                    <table id="<?php echo str_replace(' ', '', 'Region'); ?>" class="table table-hover table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="text-center"><?= $this->Paginator->sort('Regions.id', __('id')) ?></th>
                                <th class="text-center"><?= $this->Paginator->sort('Regions.id', __('name')) ?></th>
                                <th class="text-center"><?= $this->Paginator->sort('Regions.enabled', __('enabled')) ?></th>
                                <th class="text-center"><?= $this->Paginator->sort('Regions.created', __('created')) ?></th>
                                <th class="text-center"><?= $this->Paginator->sort('Regions.modified', __('modified')) ?></th>
                                <th class="text-center"><?= __('operation') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($regions as $region) : ?>
                                <tr>
                                    <td class="text-center"><?= $this->Number->format($region->id) ?></td>
                                    <td class="text-center"><?= h($region->RegionLanguages['name']) ?></td>
                                    <td class="text-center">
                                        <?= $this->element('view_check_ico', array('_check' => $region->enabled)) ?>
                                    </td>
                                    <td class="text-center"><?= h($region->created) ?></td>
                                    <td class="text-center"><?= h($region->modified) ?></td>

                                    <td class="text-center">

                                        <?php
                                        if (isset($permissions['Regions']['view']) && ($permissions['Regions']['view'] == true)) {
                                            echo $this->Html->link('<i class="fa fa-eercast"></i>', array('action' => 'view', $region->id), array('class' => 'btn btn-primary btn-sm m-r-btn', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => __('view')));
                                        }

                                        if (isset($permissions['Regions']['edit']) && ($permissions['Regions']['edit'] == true)) {
                                            echo $this->Html->link('<i class="fa fa-pencil"></i>', array('action' => 'edit', $region->id), array('class' => 'btn btn-warning btn-sm m-r-btn', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => __('edit')));
                                        }

                                        if (isset($permissions['Regions']['delete']) && ($permissions['Regions']['delete'] == true)) {

                                            echo $this->Form->postLink(
                                                '<i class="far fa-trash-alt"></i>',
                                                array('action' => 'delete',  $region->id),
                                                array(
                                                    'escape' => false, 'class' => 'btn btn-danger btn-sm m-r-btn', 'data-toggle' => 'tooltip', 'title' => __('delete'),
                                                    'confirm' => __('delete_message', $region->id)
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