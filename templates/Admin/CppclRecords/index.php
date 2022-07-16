<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CppclRecord[]|\Cake\Collection\CollectionInterface $cppclRecords
 */
?>

<div class="container-fluid card full-border">
    <div class="row">
        <div class="col-12">
            <?php
            echo $this->element('admin/filter/cppcl_record_filter', array(
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
                    <h3 class="box-title"> <?php echo __d('report', 'cppcl_record'); ?> </h3>

                    <?php if (isset($permissions['CppclRecords']['add']) && ($permissions['CppclRecords']['add'] == true)) { ?>

                        <div class="box-tools ml-auto p-1">
                            <?= $this->Html->link("<i class='fas fa-plus'> </i> " . __('add'), ['action' => 'add'], [
                                'escape' => false,
                                'class' => 'btn btn-primary button'
                            ]) ?>
                        </div>
                    <?php  }  ?>
                </div> <!-- box-header -->

                <div class="box-body table-responsive">
                    <table id="<?php echo str_replace(' ', '', 'Cppcl Record'); ?>" class="table table-hover table-bordered table-striped">
                        <thead class="text-center">
                            <tr>
                                <th><?= $this->Paginator->sort('id',                __('id')) ?></th>
                                <th><?= $this->Paginator->sort('registration_date', __d('report', 'registration_date')) ?></th>
                                <th><?= $this->Paginator->sort('address',           __d('report', 'address')) ?></th>
                                <th><?= $this->Paginator->sort('name',              __d('report', 'name')) ?></th>
                                <th><?= $this->Paginator->sort('building',          __d('report', 'building')) ?></th>
                                <th><?= $this->Paginator->sort('layers',            __d('report', 'layers')) ?></th>
                                <th><?= $this->Paginator->sort('unit',              __d('report', 'unit')) ?></th>
                                <th><?= $this->Paginator->sort('construction_area', __d('report', 'construction_area')) ?></th>
                                <th><?= $this->Paginator->sort('transaction',       __d('report', 'transaction')) ?></th>
                                <th><?= $this->Paginator->sort('price_per_square_foot', __d('report', 'price_per_square_foot')) ?></th>
                                <th><?= $this->Paginator->sort('created',           __('created')) ?></th>
                                <th><?= $this->Paginator->sort('modified',          __('modified')) ?></th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php foreach ($cppclRecords as $cppclRecord) : ?>
                                <tr>
                                    <td><?= $this->Number->format($cppclRecord->id) ?></td>
                                    <td><?= h($cppclRecord->registration_date) ?></td>
                                    <td><?= h($cppclRecord->address) ?></td>
                                    <td><?= h($cppclRecord->name) ?></td>
                                    <td><?= h($cppclRecord->building) ?></td>
                                    <td><?= h($cppclRecord->layers) ?></td>
                                    <td><?= h($cppclRecord->unit) ?></td>
                                    <td><?= h($cppclRecord->construction_area) ?></td>
                                    <td><?= $this->Number->format($cppclRecord->transaction) ?></td>
                                    <td><?= h($cppclRecord->price_per_square_foot) ?></td>
                                    <td><?= h($cppclRecord->created) ?></td>
                                    <td><?= h($cppclRecord->modified) ?></td>
                                   
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