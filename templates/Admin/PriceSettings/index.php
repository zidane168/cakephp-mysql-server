<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PriceSetting[]|\Cake\Collection\CollectionInterface $priceSettings
 */
?>

<div class="container-fluid card full-border">

    <div class="row">
        <div class="col-12">
            <div class="box box-primary">
                <div class="box-header d-flex">
                    <h3 class="box-title"> <?php echo __d('setting', 'price_setting'); ?> </h3>

                    <?php if (isset($permissions['PriceSettings']['add']) && ($permissions['PriceSettings']['add'] == true)) { ?>

                        <div class="box-tools ml-auto p-1">
                            <?= $this->Html->link("<i class='fas fa-plus'> </i> " . __('add'), ['action' => 'add'], [
                                'escape' => false,
                                'class' => 'btn btn-primary button'
                            ]) ?>
                        </div>
                    <?php  }  ?>
                </div> <!-- box-header -->

                <div class="box-body table-responsive">
                    <table id="<?php echo str_replace(' ', '', 'Price Setting'); ?>" class="table table-hover table-bordered table-striped">
                        <thead class="text-center">
                            <tr>
                                <th><?= $this->Paginator->sort('PriceSettings.id', __('id')) ?></th>
                                <th><?= $this->Paginator->sort('PriceSettings.price_from',    __d('setting', 'price_from')) ?></th>
                                <th><?= $this->Paginator->sort('PriceSettings.price_to',      __d('setting', 'price_to')) ?></th>
                                <th><?= $this->Paginator->sort('PriceSettings.enabled', __('enabled')) ?></th>
                                <th><?= $this->Paginator->sort('PriceSettings.created', __('created')) ?></th>
                                <th><?= $this->Paginator->sort('PriceSettings.modified', __('modified')) ?></th>
                                <th><?= __('operation') ?></th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php foreach ($priceSettings as $priceSetting) : ?>
                                <tr>
                                    <td><?= $this->Number->format($priceSetting->id) ?></td>
                                    <td><?= h($priceSetting->price_from) ?></td>
                                    <td><?= h($priceSetting->price_to) ?></td>
                                    <td>
                                        <?php echo $this->element(
                                            'view_check_ico',
                                            array(
                                                '_check'  => $this->Number->format($priceSetting->enabled)
                                            )
                                        )  ?>
                                    </td>
                                    <td><?= h($priceSetting->created) ?></td>
                                    <td><?= h($priceSetting->modified) ?></td>
                                    <td>

                                        <?php
                                        if (isset($permissions['PriceSettings']['view']) && ($permissions['PriceSettings']['view'] == true)) {
                                            echo $this->Html->link('<i class="fa fa-eercast"></i>', array('action' => 'view', $priceSetting->id), array('class' => 'btn btn-primary btn-sm m-r-btn', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => __('view')));
                                        }

                                        if (isset($permissions['PriceSettings']['edit']) && ($permissions['PriceSettings']['edit'] == true)) {
                                            echo $this->Html->link('<i class="fa fa-pencil"></i>', array('action' => 'edit', $priceSetting->id), array('class' => 'btn btn-warning btn-sm m-r-btn', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => __('edit')));
                                        }

                                        if (isset($permissions['PriceSettings']['delete']) && ($permissions['PriceSettings']['delete'] == true)) {

                                            echo $this->Form->postLink(
                                                '<i class="far fa-trash-alt"></i>',
                                                array('action' => 'delete',  $priceSetting->id),
                                                array(
                                                    'escape' => false, 'class' => 'btn btn-danger btn-sm m-r-btn', 'data-toggle' => 'tooltip', 'title' => __('delete'),
                                                    'confirm' => __('delete_message',  $priceSetting->id)
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