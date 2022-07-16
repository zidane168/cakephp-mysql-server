<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductOption[]|\Cake\Collection\CollectionInterface $productOptions
 */
?>

<div class="container-fluid card full-border">

    <div class="row">
        <div class="col-12">
            <div class="box box-primary">
                <div class="box-header d-flex">
                    <h3 class="box-title"> <?php echo __d('product', 'product_option'); ?> </h3>

                    <?php if (isset($permissions['ProductOptions']['add']) && ($permissions['ProductOptions']['add'] == true)) { ?>

                        <div class="box-tools ml-auto p-1">
                            <?= $this->Html->link("<i class='fas fa-plus'> </i> " . __('add'), ['action' => 'add'], [
                                'escape' => false,
                                'class' => 'btn btn-primary button'
                            ]) ?>
                        </div>
                    <?php  }  ?>
                </div> <!-- box-header -->

                <div class="box-body table-responsive">
                    <table id="<?php echo str_replace(' ', '', 'ProductOption'); ?>" class="table table-hover table-bordered table-striped">
                        <thead class="text-center">
                            <tr>
                                <th><?= $this->Paginator->sort('ProductOptions.id', __('id')) ?></th>
                                <th><?= $this->Paginator->sort('ProductOptions.id', __('name')) ?></th>
                                <th><?= $this->Paginator->sort('enabled', __('enabled')) ?></th>
                                <th><?= $this->Paginator->sort('created', __('created')) ?></th>
                                <th><?= $this->Paginator->sort('modified', __('modified')) ?></th>
                                <th><?= __('operation') ?></th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php foreach ($productOptions as $productOption) : ?>
                                <tr>
                                    <td><?= $this->Number->format($productOption->id) ?></td>
                                    <td class="text-center"><?= h($productOption->ProductOptionLanguages['name']) ?></td>
                                    <td>
                                        <?= $this->element(
                                            'view_check_ico',
                                            array(
                                                '_check'  =>  $this->Number->format($productOption->enabled)
                                            )
                                        )
                                        ?>
                                    </td>
                                    <td><?= h($productOption->created) ?></td>
                                    <td><?= h($productOption->modified) ?></td>
                                    <td>

                                        <?php
                                        if (isset($permissions['ProductOptions']['view']) && ($permissions['ProductOptions']['view'] == true)) {
                                            echo $this->Html->link('<i class="fa fa-eercast"></i>', array('action' => 'view', $productOption->id), array('class' => 'btn btn-primary btn-sm m-r-btn', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => __('view')));
                                        }

                                        if (isset($permissions['ProductOptions']['edit']) && ($permissions['ProductOptions']['edit'] == true)) {
                                            echo $this->Html->link('<i class="fa fa-pencil"></i>', array('action' => 'edit', $productOption->id), array('class' => 'btn btn-warning btn-sm m-r-btn', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => __('edit')));
                                        }

                                        if (isset($permissions['ProductOptions']['delete']) && ($permissions['ProductOptions']['delete'] == true)) {

                                            echo $this->Form->postLink(
                                                '<i class="far fa-trash-alt"></i>',
                                                array('action' => 'delete',  $productOption->id),
                                                array(
                                                    'escape' => false, 'class' => 'btn btn-danger btn-sm m-r-btn', 'data-toggle' => 'tooltip', 'title' => __('delete'),
                                                    'confirm' => __('delete_message',  $productOption->id)
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