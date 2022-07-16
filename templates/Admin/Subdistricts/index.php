<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Subdistrict[]|\Cake\Collection\CollectionInterface $subdistricts
 */
?>

<div class="container-fluid card full-border">
    <div class="row">
        <div class="col-12">
            <?php
            echo $this->element('admin/filter/subdistrict_filter', array(
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
                    <h3 class="box-title"> <?php echo __d('setting', 'subdistricts'); ?> </h3>

                    <?php if (isset($permissions['Subdistricts']['add']) && ($permissions['Subdistricts']['add'] == true)) { ?>

                        <div class="box-tools ml-auto p-1">
                            <?= $this->Html->link("<i class='fas fa-plus'> </i> " . __('add'), ['action' => 'add'], [
                                'escape' => false,
                                'class' => 'btn btn-primary button'
                            ]) ?>
                        </div>
                    <?php  }  ?>
                </div> <!-- box-header -->

                <div class="box-body table-responsive">
                    <table id="<?php echo str_replace(' ', '', 'Subdistrict'); ?>" class="table table-hover table-bordered table-striped">
                        <thead class="text-center">
                            <tr>
                                <th><?= $this->Paginator->sort('Subdistricts.id', __('id')) ?></th>
                                <th><?= $this->Paginator->sort('Subdistricts.district_id', __d('setting', 'district')) ?></th>
                                <th><?= $this->Paginator->sort('Subdistricts.id', __('name')) ?></th>
                                <th><?= $this->Paginator->sort('Subdistricts.enabled', __('enabled')) ?></th>
                                <th><?= $this->Paginator->sort('Subdistricts.created', __('created')) ?></th>
                                <th><?= $this->Paginator->sort('Subdistricts.modified', __('modified')) ?></th>
                                <th><?= __('operation') ?></th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php foreach ($subdistricts as $subdistrict) : ?>
                                <tr>
                                    <td class="text-center"><?= $this->Number->format($subdistrict->id) ?></td>
                                    <td>
                                        <?= $subdistrict->has('district') ? $this->Html->link(
                                            h($subdistrict->district->district_languages[0]->name),
                                            ['controller' => 'Districts', 'action' => 'view', $subdistrict->district->id]
                                        ) : '' ?>
                                    </td>
                                    <td>
                                        <?= $this->Html->link(
                                            h($subdistrict->SubdistrictLanguages['name']),
                                            ['controller' => 'Subdistricts', 'action' => 'view', $subdistrict->id]
                                        )  ?>
                                    </td>
                                    <td class="text-center">
                                        <?= $this->element('view_check_ico', array('_check' => h($subdistrict->enabled))) ?>
                                    </td>
                                    <td class="text-center"><?= h($subdistrict->created) ?></td>
                                    <td class="text-center"><?= h($subdistrict->modified) ?></td>
                                    <td class="text-center">

                                        <?php
                                        if (isset($permissions['Subdistricts']['view']) && ($permissions['Subdistricts']['view'] == true)) {
                                            echo $this->Html->link('<i class="fa fa-eercast"></i>', array('action' => 'view', $subdistrict->id), array('class' => 'btn btn-primary btn-sm m-r-btn', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => __('view')));
                                        }

                                        if (isset($permissions['Subdistricts']['edit']) && ($permissions['Subdistricts']['edit'] == true)) {
                                            echo $this->Html->link('<i class="fa fa-pencil"></i>', array('action' => 'edit', $subdistrict->id), array('class' => 'btn btn-warning btn-sm m-r-btn', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => __('edit')));
                                        }

                                        if (isset($permissions['Subdistricts']['delete']) && ($permissions['Subdistricts']['delete'] == true)) {

                                            echo $this->Form->postLink(
                                                '<i class="far fa-trash-alt"></i>',
                                                array('action' => 'delete',  $subdistrict->id),
                                                array(
                                                    'escape' => false, 'class' => 'btn btn-danger btn-sm m-r-btn', 'data-toggle' => 'tooltip', 'title' => __('delete'),
                                                    'confirm' => __('delete_message',   $subdistrict->id)
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