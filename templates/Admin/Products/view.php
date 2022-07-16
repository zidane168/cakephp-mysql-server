<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 */
?>

<div class="container-fluid card full-border">
    <div class="row">
        <div class="col-12">
            <div class="box box-primary">
                <div class="box-header d-flex">
                    <h3 class="box-title"><?php echo __d('product', 'product'); ?></h3>

                    <?php
                    if (isset($permissions['Products']['edit']) && ($permissions['Products']['edit'] == true)) {
                    ?>

                        <div class="box-tools ml-auto p-1">
                            <?php echo $this->Html->link('<i class="fa fa-pencil"></i> ' . __d('product', 'edit'), array('action' => 'edit', $product->id), array('class' => 'btn btn-primary', 'escape' => false)); ?>
                        </div>

                    <?php
                    }
                    ?>
                </div>

                <div class="box-body">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th><?= __d('product', 'product_type') ?></th>
                            <td>
                                <?=
                                $this->element('admin/filter/common/admin_product_type', array(
                                    '_type' => $product->product_type_id
                                ))
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <th><?= __('id') ?></th>
                            <td><?= $this->Number->format($product->id) ?></td>
                        </tr>
                        <tr>
                            <th><?= __d('product', 'ECid') ?></th>
                            <td><?= h($product->ECid) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('slug') ?></th>
                            <td><?= h($product->slug) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('name') ?></th>
                            <td><?= h($product->name) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('description') ?></th>
                            <td><?= h($product->description) ?></td>
                        </tr>
                        <tr>
                            <th><?= __d('member', 'member') ?></th>
                            <td><?php 
                                $name = '';
                                if ($product->has('member')) {

                                    if (isset($product->member->member_languages) && !empty($product->member->member_languages) ) {
                                        $name = $this->Html->link($product->member->member_languages[0]->agency_company_name , ['controller' => 'Members', 'action' => 'view', $product->member->id]);
                                    } else {
                                        $name = $this->Html->link($product->member->name , ['controller' => 'Members', 'action' => 'view', $product->member->id]);
                                    }
                                    
                                }
                            
                            echo $name ?></td>
                        </tr>
                        <tr>
                            <th><?= __d('setting', 'region') ?></th>
                            <td><?= $product->has('region') ? $this->Html->link($product->region->region_languages[0]->name, ['controller' => 'Regions', 'action' => 'view', $product->region->id]) : '' ?></td>
                        </tr>
                        <tr>
                            <th><?= __d('setting', 'district') ?></th>
                            <td><?= $product->has('district') ? $this->Html->link($product->district->district_languages[0]->name, ['controller' => 'Districts', 'action' => 'view', $product->district->id]) : '' ?></td>
                        </tr>
                        <tr>
                            <th><?= __d('setting', 'subdistrict') ?></th>
                            <td><?= $product->has('subdistrict') ? $this->Html->link($product->subdistrict->subdistrict_languages[0]->name, ['controller' => 'Subdistricts', 'action' => 'view', $product->subdistrict->id]) : '' ?></td>
                        </tr>
                        <tr>
                            <th><?= __d('product', 'label') ?></th>
                            <td>
                                <?php  
                                    foreach ($product->products_labels as $value) { ?>
                                        <label class="btn btn-outline-primary">  <?= $value['label']['label_languages'][0]['name']; ?> </label>
                                <?php }  ?> 
                            </td>
                        </tr>

                        <tr>
                            <th><?= __d('product', 'plugin') ?></th>
                            <td>
                                <?php  
                                    foreach ($product->products_plugins as $value) { ?>
                                        <label class="btn btn-outline-success">  <?= $value['plugin']['plugin_languages'][0]['name']; ?> </label>
                                <?php }  ?> 
                            </td>
                        </tr>
                        <tr>
                            <th><?= __d('product', 'contact_title') ?></th>
                            <td><?= h($contactTitles[$product->contact_title]) ?></td>
                        </tr>
                        <tr>
                            <th><?= __d('product', 'contact_person') ?></th>
                            <td><?= h($product->contact_person) ?></td>
                        </tr>
                        <tr>
                            <th><?= __d('product', 'product_option') ?></th>
                            <td><?= $product->product_option->product_option_languages[0]->name ?> </td>
                     
                        </tr>
                        <tr>
                            <th><?= __d('product', 'contact_email') ?></th>
                            <td><?= h($product->contact_email) ?></td>
                        </tr>
                        <tr>
                            <th><?= __d('product', 'contact_phone') ?></th>
                            <td><?= h($product->contact_phone) ?></td>
                        </tr>

                        <tr>
                            <th><?= __d('product', 'number_of_houldhold') ?></th>
                            <td><?= $this->Number->format($product->number_of_houldhold) ?></td>
                        </tr>
                        <tr>
                            <th><?= __d('product', 'number_of_parkingcar') ?></th>
                            <td><?= $this->Number->format($product->number_of_parkingcar) ?></td>
                        </tr>
                        <tr>
                            <th><?= __d('product', 'properties') ?></th>
                            <td><?= $this->Number->format($product->properties) ?></td>
                        </tr>
                        <tr>
                            <th><?= __d('product', 'total_number_of_parking_space') ?></th>
                            <td><?= $this->Number->format($product->total_number_of_parking_space) ?></td>
                        </tr>
                        <tr>
                            <th><?= __d('product', 'management_fee') ?></th>
                            <td><?= $this->Number->format($product->management_fee) ?></td>
                        </tr>
                        <tr>
                            <th><?= __d('product', 'government_rates') ?></th>
                            <td><?= $this->Number->format($product->government_rates) ?></td>
                        </tr>
                        <tr>
                            <th><?= __d('product', 'agency_commission') ?></th>
                            <td><?= $this->Number->format($product->agency_commission) ?></td>
                        </tr>
                        <tr>
                            <th><?= __d('product', 'price') ?></th>
                            <td class='red bold'><?= $this->Number->format($product->price) ?></td>
                        </tr>
                        <tr>
                            <th><?= __d('product', 'is_star_recommendation') ?></th>
                            <td>
                                <?= $this->element('admin/filter/common/admin_is_star_recommend', array(
                                    '_check' =>  $this->Number->format($product->is_star_recommendation)
                                )) ?>
                            </td>
                        </tr>

                        <?php
                        echo $this->element('admin/filter/common/enabled_info', array(
                            'object' => $product,
                        ));
                        echo $this->element('admin/filter/common/admin_info', array(
                            'object' => $product,
                        ));
                        ?>
                    </table>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="margin-top-15">
                                <?= $this->element('content_view', array(
                                    'images'                 => $images,
                                )); ?>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>