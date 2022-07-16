<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductViolate[]|\Cake\Collection\CollectionInterface $productViolates
 */
?>

<div class="container-fluid card full-border">

    <div class="row">
        <div class="col-12">
            <div class="box box-primary">
                <div class="box-header d-flex">
                    <h3 class="box-title"> <?php echo __d('product', 'product_violate'); ?> </h3>

                    <!-- <?php
                            if (isset($permissions['ProductViolates']['add']) && ($permissions['ProductViolates']['add'] == true)) { ?>
                    
                    <div class="box-tools ml-auto p-1">
                        <?= $this->Html->link("<i class='fas fa-plus'> </i> " . __('add'), ['action' => 'add'], [
                                    'escape' => false,
                                    'class' => 'btn btn-primary button'
                                ]) ?>
                    </div>    
                    <?php  }
                    ?> -->
                </div> <!-- box-header -->

                <div class="box-body table-responsive">
                    <table id="<?php echo str_replace(' ', '', 'Product Violate'); ?>" class="table table-hover table-bordered table-striped">
                        <thead class="text-center">
                            <tr>
                                <th><?= $this->Paginator->sort('ProductViolates.id', __('id')) ?></th>
                                <th><?= $this->Paginator->sort('ProductViolates.member_id',  __d('member', 'member')) ?></th>
                                <th><?= $this->Paginator->sort('ProductViolates.product_id', __d('product', 'product')) ?></th>
                                <th><?= $this->Paginator->sort('ProductViolates.status', __('status')) ?></th>
                                <th><?= $this->Paginator->sort('ProductViolates.enabled', __('enabled')) ?></th>
                                <th><?= $this->Paginator->sort('ProductViolates.created', __('created')) ?></th>
                                <th><?= $this->Paginator->sort('ProductViolates.updated', __('modified')) ?></th>
                                <th><?= __('operation') ?></th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php foreach ($productViolates as $productViolate) : ?>
                                <tr>
                                    <td><?= $this->Number->format($productViolate->id) ?></td>
                                    <td><?= $productViolate->has('member') ? $this->Html->link($productViolate->member->email, ['controller' => 'Members', 'action' => 'view', $productViolate->member->id]) : '' ?></td>
                                    <td><?= $productViolate->has('product') ? $this->Html->link($productViolate->product->name, ['controller' => 'Products', 'action' => 'view', $productViolate->product->id]) : '' ?></td>

                                    <td>
                                        <?=
                                        $this->element('admin/filter/common/admin_status', array(
                                            '_check' => $productViolate->status,
                                        ))
                                        ?>
                                    </td>
                                    <td>
                                        <?=
                                        $this->element('view_check_ico', array(
                                            '_check' => $productViolate->enabled,
                                        ))
                                        ?>
                                    </td>

                                    <td><?= h($productViolate->created) ?></td>
                                    <td><?= h($productViolate->modified) ?></td>
                                    <td>

                                        <?php
                                        if (isset($permissions['ProductViolates']['view']) && ($permissions['ProductViolates']['view'] == true)) {
                                            echo $this->Html->link('<i class="fa fa-eercast"></i>', array('action' => 'view', $productViolate->id), array('class' => 'btn btn-primary btn-sm m-r-btn', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => __('view')));
                                        }

                                        if (isset($permissions['ProductViolates']['edit']) && ($permissions['ProductViolates']['edit'] == true)) {
                                            echo $this->Html->link('<i class="fa fa-pencil"></i>', array('action' => 'edit', $productViolate->id), array('class' => 'btn btn-warning btn-sm m-r-btn', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => __('edit')));
                                        }

                                        if (isset($permissions['ProductViolates']['delete']) && ($permissions['ProductViolates']['delete'] == true)) {

                                            echo $this->Form->postLink(
                                                '<i class="far fa-trash-alt"></i>',
                                                array('action' => 'delete',  $productViolate->id),
                                                array(
                                                    'escape' => false, 'class' => 'btn btn-danger btn-sm m-r-btn', 'data-toggle' => 'tooltip', 'title' => __('delete'),
                                                    'confirm' => __('delete_message',  $productViolate->id)
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