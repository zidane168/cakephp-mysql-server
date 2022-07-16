<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product[]|\Cake\Collection\CollectionInterface $products
 */
use Cake\Utility\Text;
?>

<div class="container-fluid card full-border">
    <div class="row">
        <div class="col-12">
            <?php
            echo $this->element('admin/filter/product_filter', array(
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
                    <h3 class="box-title"> <?php echo __d('product', 'product'); ?> </h3>

                    <?php if (isset($permissions['Products']['add']) && ($permissions['Products']['add'] == true)) { ?>

                        <div class="box-tools ml-auto p-1">
                            <button class="btn btn-success" id="btn-filter"> <?= __('column_filter') ?> </button>

                            <?= $this->Html->link("<i class='fas fa-plus'> </i> " . __('add'), ['action' => 'add'], [
                                'escape' => false,
                                'class' => 'btn btn-primary button'
                            ]) ?>


                        </div>
                    <?php  }  ?>
                </div> <!-- box-header -->

                <?php
                echo $this->element('admin/filter/common/admin_filter_columns', array(
                    'key' => 'Product.Columns'
                )) ?>

                <div class="box-body table-responsive">
                    <table id="<?php echo str_replace(' ', '', 'Product'); ?>" class="table table-hover table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="text-center"><?= $this->Paginator->sort('id',                __('id')) ?></th>
                                <th class="text-center"><?= $this->Paginator->sort('slug',              __('slug')) ?></th>
                                <th class="text-center"><?= $this->Paginator->sort('ECid',              __d('product', 'ECid')) ?></th>
                                <th class="text-center"><?= $this->Paginator->sort('product_type_id',   __d('product', 'product_type')) ?></th>
                                <th class="text-center"><?= $this->Paginator->sort('member_id',         __d('member', 'member')) ?></th>
                                <th class="text-center"><?= $this->Paginator->sort('region_id',         __d('setting', 'region')) ?></th>
                                <th class="text-center"><?= $this->Paginator->sort('district_id',       __d('setting', 'district')) ?></th>
                                <th class="text-center"><?= $this->Paginator->sort('subdistrict_id',    __d('setting', 'subdistrict')) ?></th>
                                <th class="text-center"><?= $this->Paginator->sort('name',              __('name')) ?></th>
                                <th class="text-center"><?= $this->Paginator->sort('description',       __('description')) ?></th>
                                <th class="text-center"><?= $this->Paginator->sort('number_of_houldhold',               __d('product', 'number_of_houldhold')) ?></th>
                                <th class="text-center"><?= $this->Paginator->sort('number_of_parkingcar',              __d('product', 'number_of_parkingcar')) ?></th>
                                <th class="text-center"><?= $this->Paginator->sort('is_star_recommendation',            __d('product', 'is_star_recommendation')) ?></th>
                                <th class="text-center"><?= $this->Paginator->sort('properties',                        __d('product', 'properties')) ?></th>
                                <th class="text-center"><?= $this->Paginator->sort('total_number_of_parking_space',     __d('product', 'total_number_of_parking_space')) ?></th>
                                <th class="text-center"><?= $this->Paginator->sort('management_fee',                    __d('product', 'management_fee')) ?></th>
                                <th class="text-center"><?= $this->Paginator->sort('government_rates',                  __d('product', 'government_rates')) ?></th>
                                <th class="text-center"><?= $this->Paginator->sort('agency_commission',                 __d('product', 'agency_commission')) ?></th>
                                <th class="text-center"><?= $this->Paginator->sort('price',                             __d('product', 'price')) ?></th>
                                <th class="text-center"><?= $this->Paginator->sort('contact_title',                     __d('product', 'contact_title')) ?></th>
                                <th class="text-center"><?= $this->Paginator->sort('contact_person',                    __d('product', 'contact_person')) ?></th>
                                <th class="text-center"><?= $this->Paginator->sort('contact_email',                     __d('product', 'contact_email')) ?></th>
                                <th class="text-center"><?= $this->Paginator->sort('contact_phone',                     __d('product', 'contact_phone')) ?></th>
                                <th class="text-center"><?= $this->Paginator->sort('enabled',                           __('enabled')) ?></th>
                                <th class="text-center"><?= __('operation') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($products as $product) : ?>
                                <tr class="product text-center">
                                    <td class="text-center"><?= $this->Number->format($product->id) ?></td>
                                    <td class="text-center"><?= h($product->slug) ?></td>
                                    <td class="text-center"><?= h($product->ECid) ?></td>
                                    <td>
                                        <?=
                                        $this->element('admin/filter/common/admin_product_type', array(
                                            '_type' => $product->product_type_id
                                        ))
                                        ?>
                                    </td>
                                    <td>
                                        <?= $this->Html->link($product->Members['name'], ['controller' => 'Members', 'action' => 'view', $product->member_id]) ?>
                                    </td>
                                    <td>
                                        <?= $product->has('region') ?
                                            $this->Html->link(
                                                $product->region->region_languages[0]->name,
                                                ['controller' => 'Regions', 'action' => 'view', $product->region->id]
                                            ) : ''
                                        ?>
                                    </td>
                                    <td>
                                        <?= $product->has('district') ?
                                            $this->Html->link(
                                                $product->district->district_languages[0]->name,
                                                ['controller' => 'Districts', 'action' => 'view', $product->district->id]
                                            ) : '' 
                                        ?>
                                    </td>
                                    <td>
                                        <?= $product->has('subdistrict') ?
                                            $this->Html->link(
                                                $product->subdistrict->subdistrict_languages[0]->name,
                                                ['controller' => 'Subdistricts', 'action' => 'view', $product->subdistrict->id]
                                            ) : '' 
                                        ?>
                                    </td>
                                    <td class="text-center"><?= h($product->name) ?></td>
                                    <td class="text-center">
                                        <?= 
                                            Text::truncate(h($product->description), 30, ['html' => true])
                                        ?>
                                    </td>
                                    <td class="text-center"><?= $this->Number->format($product->number_of_houldhold) ?></td>
                                    <td class="text-center"><?= $this->Number->format($product->number_of_parkingcar) ?></td>
                                    <td class="text-center">
                                        <?=
                                        $this->element('admin/filter/common/admin_is_star_recommend', array(
                                            '_check' => $this->Number->format($product->is_star_recommendation),
                                        ))
                                        ?>
                                    </td>
                                    <td class="text-center"><?= $this->Number->format($product->properties) ?></td>
                                    <td class="text-center"><?= $this->Number->format($product->total_number_of_parking_space) ?></td>
                                    <td class="text-center"><?= $this->Number->format($product->management_fee) ?></td>
                                    <td class="text-center"><?= $this->Number->format($product->government_rates) ?></td>
                                    <td class="text-center"><?= $this->Number->format($product->agency_commission) ?></td>
                                    <td class="text-center bold red"><?= $this->Number->format($product->price) ?></td>
                                    <td class="text-center"><?= h($contactTitles[$product->contact_title]) ?></td>
                                    <td class="text-center"><?= h($product->contact_person) ?></td>
                                    <td class="text-center"><?= h($product->contact_email) ?></td>
                                    <td class="text-center"><?= h($product->contact_phone) ?></td>
                                    <td class="text-center">
                                        <?php

                                        echo $this->element(
                                            'view_check_ico',
                                            array(
                                                '_check'  => $this->Number->format($product->enabled)
                                            )
                                        ) 
                                        
                                        ?>
                                    </td>

                                    <td class="text-center">

                                        <?php
                                        if (isset($permissions['Products']['view']) && ($permissions['Products']['view'] == true)) {
                                            echo $this->Html->link('<i class="fa fa-eercast"></i>', array('action' => 'view', $product->id), array('class' => 'btn btn-primary btn-sm m-r-btn', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => __('view')));
                                        }

                                        if (isset($permissions['Products']['edit']) && ($permissions['Products']['edit'] == true)) {
                                            echo $this->Html->link('<i class="fa fa-pencil"></i>', array('action' => 'edit', $product->id), array('class' => 'btn btn-warning btn-sm m-r-btn', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => __('edit')));
                                        }

                                        if (isset($permissions['Products']['delete']) && ($permissions['Products']['delete'] == true)) {

                                            echo $this->Form->postLink(
                                                '<i class="far fa-trash-alt"></i>',
                                                array('action' => 'delete',  $product->id),
                                                array(
                                                    'escape' => false, 'class' => 'btn btn-danger btn-sm m-r-btn', 'data-toggle' => 'tooltip', 'title' => __('delete'),
                                                    'confirm' => __('delete_message', $product->id)
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