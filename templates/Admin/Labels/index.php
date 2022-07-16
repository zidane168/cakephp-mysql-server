<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Label[]|\Cake\Collection\CollectionInterface $labels
 */
?>

<div class="container-fluid card full-border">
    <div class="row">
        <div class="col-12">
            <?php
            echo $this->element('admin/filter/label_filter', array(
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
                    <h3 class="box-title"> <?php echo __d('product', 'label'); ?> </h3>

                    <?php if (isset($permissions['Labels']['add']) && ($permissions['Labels']['add'] == true)) { ?>

                        <div class="box-tools ml-auto p-1">
                            <?= $this->Html->link("<i class='fas fa-plus'> </i> " . __('add'), ['action' => 'add'], [
                                'escape' => false,
                                'class' => 'btn btn-primary button'
                            ]) ?>
                        </div>
                    <?php  }  ?>
                </div> <!-- box-header -->

                <div class="box-body table-responsive">
                    <table id="<?php echo str_replace(' ', '', 'Label'); ?>" class="table table-hover table-bordered table-striped">
                        <thead class="text-center">
                            <tr>
                                <th><?= $this->Paginator->sort('Labels.id', __('id')) ?></th>
                                <th><?= $this->Paginator->sort('Labels.id', __('name')) ?></th>
                                <th><?= $this->Paginator->sort('Labels.enabled', __('enabled')) ?></th>
                                <th><?= $this->Paginator->sort('Labels.created', __('created')) ?></th>
                                <th><?= $this->Paginator->sort('Labels.modified', __('modified')) ?></th>
                                <th><?= __('operation') ?></th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php foreach ($labels as $label) : ?>
                                <tr>
                                    <td><?= $this->Number->format($label->id) ?></td>
                                    <td><?= h($label['LabelLanguages']['name']) ?></td>
                                    
                                    <td>
                                        <?php 
                                        echo $this->element(
                                            'view_check_ico',
                                            array(
                                                '_check'  => $this->Number->format($label->enabled)
                                            )
                                        ) 
                                        ?>
                                    </td>
                                    <td><?= h($label->created) ?></td>
                                    <td><?= h($label->modified) ?></td>
                                    <td>

                                        <?php
                                        if (isset($permissions['Labels']['view']) && ($permissions['Labels']['view'] == true)) {
                                            echo $this->Html->link('<i class="fa fa-eercast"></i>', array('action' => 'view', $label->id), array('class' => 'btn btn-primary btn-sm m-r-btn', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => __('view')));
                                        }

                                        if (isset($permissions['Labels']['edit']) && ($permissions['Labels']['edit'] == true)) {
                                            echo $this->Html->link('<i class="fa fa-pencil"></i>', array('action' => 'edit', $label->id), array('class' => 'btn btn-warning btn-sm m-r-btn', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => __('edit')));
                                        }

                                        if (isset($permissions['Labels']['delete']) && ($permissions['Labels']['delete'] == true)) {

                                            echo $this->Form->postLink(
                                                '<i class="far fa-trash-alt"></i>',
                                                array('action' => 'delete',  $label->id),
                                                array(
                                                    'escape' => false, 'class' => 'btn btn-danger btn-sm m-r-btn', 'data-toggle' => 'tooltip', 'title' => __('delete'),
                                                    'confirm' => __('delete_message',  $label->id)
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