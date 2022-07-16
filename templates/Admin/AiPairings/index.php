<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AiPairing[]|\Cake\Collection\CollectionInterface $aiPairings
 */
?>

<div class="container-fluid card full-border">
    <div class="row">
        <div class="col-12">
            <?php
            echo $this->element('admin/filter/ai_pairing_filter', array(
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
                    <h3 class="box-title"> <?php echo __d('product', 'ai_pairing'); ?> </h3>

                    <!-- <?php if (isset($permissions['AiPairings']['add']) && ($permissions['AiPairings']['add'] == true)) { ?>

                        <div class="box-tools ml-auto p-1">
                            <?= $this->Html->link("<i class='fas fa-plus'> </i> " . __('add'), ['action' => 'add'], [
                                'escape' => false,
                                'class' => 'btn btn-primary button'
                            ]) ?>
                        </div>
                    <?php  }  ?> -->
                </div> <!-- box-header -->

                <div class="box-body table-responsive">
                    <table id="<?php echo str_replace(' ', '', 'Ai Pairing'); ?>" class="table table-hover table-bordered table-striped">
                        <thead class="text-center">
                            <tr>
                                <th><?= $this->Paginator->sort('AiPairings.id', __('id')) ?></th>
                                <th><?= $this->Paginator->sort('AiPairings.product_name',           __('name')) ?></th>
                                <th><?= $this->Paginator->sort('AiPairings.region_id',             __d('setting', 'region')) ?></th>
                                <th><?= $this->Paginator->sort('AiPairings.district_id',           __d('setting', 'district')) ?></th>
                                <th><?= $this->Paginator->sort('AiPairings.subdistrict_id',        __d('setting', 'subdistrict')) ?></th>
                                <th><?= $this->Paginator->sort('AiPairings.price',     __d('product', 'price')) ?></th>
                                <th><?= $this->Paginator->sort('AiPairings.status',    __('status')) ?></th>
                                <th><?= $this->Paginator->sort('AiPairings.enabled',   __('enabled')) ?></th>
                                <th><?= $this->Paginator->sort('AiPairings.created',   __('created')) ?></th>
                                <th><?= $this->Paginator->sort('AiPairings.modified',  __('modified')) ?></th>
                                <th><?= __('operation') ?></th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php foreach ($aiPairings as $aiPairing) : ?>
                                <tr>
                                    <td><?= $this->Number->format($aiPairing->id) ?></td>
                                    <td><?= h($aiPairing->product_name) ?></td>
                                    <td><?= $aiPairing->has('region') ? $this->Html->link($aiPairing->region->region_languages[0]->name, ['controller' => 'Regions', 'action' => 'view', $aiPairing->region->id]) : '' ?></td>
                                    <td><?= $aiPairing->has('district') ? $this->Html->link($aiPairing->district->district_languages[0]->name, ['controller' => 'Districts', 'action' => 'view', $aiPairing->district->id]) : '' ?></td>
                                    <td><?= $aiPairing->has('subdistrict') ? $this->Html->link($aiPairing->subdistrict->subdistrict_languages[0]->name, ['controller' => 'Subdistricts', 'action' => 'view', $aiPairing->subdistrict->id]) : '' ?></td>
                                    <td><?= $this->Number->format($aiPairing->price) ?></td>
                                    <td>
                                        <?=
                                        $this->element('admin/filter/common/admin_status', array(
                                            '_check' => $aiPairing->status,
                                        ))
                                        ?>
                                    </td>
                                    <td>
                                        <?=
                                        $this->element('view_check_ico', array(
                                            '_check' => $aiPairing->enabled,
                                        ))
                                        ?>
                                    </td>
                                    <td><?= h($aiPairing->created) ?></td>
                                    <td><?= h($aiPairing->modified) ?></td>
                                    <td>

                                        <?php
                                        if (isset($permissions['AiPairings']['view']) && ($permissions['AiPairings']['view'] == true)) {
                                            echo $this->Html->link('<i class="fa fa-eercast"></i>', array('action' => 'view', $aiPairing->id), array('class' => 'btn btn-primary btn-sm m-r-btn', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => __('view')));
                                        }

                                        if (isset($permissions['AiPairings']['edit']) && ($permissions['AiPairings']['edit'] == true)) {
                                            echo $this->Html->link('<i class="fa fa-pencil"></i>', array('action' => 'edit', $aiPairing->id), array('class' => 'btn btn-warning btn-sm m-r-btn', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => __('edit')));
                                        }

                                        if (isset($permissions['AiPairings']['delete']) && ($permissions['AiPairings']['delete'] == true)) {

                                            echo $this->Form->postLink(
                                                '<i class="far fa-trash-alt"></i>',
                                                array('action' => 'delete',  $aiPairing->id),
                                                array(
                                                    'escape' => false, 'class' => 'btn btn-danger btn-sm m-r-btn', 'data-toggle' => 'tooltip', 'title' => __('delete'),
                                                    'confirm' => __('delete_message',  $aiPairing->id)
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