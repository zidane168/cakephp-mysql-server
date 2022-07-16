<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 */
?>

<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title"> <?= __d('product', 'edit_product'); ?> </h3>
                </div>

                <div class="card-body table-responsive">
                    <?= $this->Form->create($product, ['type' => 'file']) ?>

                    <fieldset>



                        <?php
                        echo $this->Form->control('product_type_id', [
                            'required' => 'required',
                            'escape' => false,
                            'empty' => __('please_select'),
                            'data-live-search' => true,
                            'class' => 'selectpicker form-control',
                            'options' => $productTypes,
                            'label' =>  "<font class='red'> * </font>" . __d('product', 'product_type')
                        ]);

                        echo $this->Form->control('ECid', [
                            'required' => 'required',
                            'escape' => false,
                            'readonly' => true,
                            'class' => 'form-control',
                            'label' =>  "<font class='red'> * </font>" . __d('product', 'ECid')
                        ]);

                        echo $this->Form->control('member_id', [
                            'required' => 'required',
                            'escape' => false,
                            'empty' => __('please_select'),
                            'data-live-search' => true,
                            'class' => 'selectpicker form-control',
                            'options' => $members,
                            'label' => "<font class='red'> * </font>" .  __d('member', 'member')
                        ]);
                        ?>

                        <div class="row">
                            <div class="col-4">
                                <?php

                                echo $this->Form->control('region_id', [
                                    'required' => 'required',
                                    'escape' => false,
                                    'empty' => __('please_select'),
                                    'data-live-search' => true,
                                    'class' => 'selectpicker form-control',
                                    'options' => $regions,
                                    'id'    => 'region_id',
                                    'label' =>  "<font class='red'> * </font>" .  __d('setting', 'region')
                                ]); ?>
                            </div>
                            <div class="col-4">
                                <?php
                                echo $this->Form->control('district_id', [
                                    'required' => 'required',
                                    'escape' => false,
                                    'empty' => __('please_select'),
                                    'data-live-search' => true,
                                    'class' => 'selectpicker form-control',
                                    'id'    => 'district_id',
                                    'label' =>  "<font class='red'> * </font>" .  __d('setting', 'district')
                                ]);
                                ?> </div>
                            <div class="col-4">
                                <?php

                                echo $this->Form->control('subdistrict_id', [
                                    'required' => 'required',
                                    'escape' => false,
                                    'empty' => __('please_select'),
                                    'data-live-search' => true,
                                    'class' => 'selectpicker form-control',
                                    'id'    => 'subdistrict_id',
                                    'label' =>  "<font class='red'> * </font>" .  __d('setting', 'subdistrict')
                                ]);
                                ?>
                            </div>
                        </div>

                        <div class="from-group">
                            <label> <?= __d('product', 'label'); ?> </label>

                            <div class="row">
                                <?php foreach ($labels as $k => $c) {
                                    $check = false;

                                    foreach ($product->products_labels as $key => $value) {

                                        if ($value->label_id == $k) {
                                            $check = 'checked';
                                        }
                                    }
                                ?>
                                    <div class="col-2">
                                        <?php echo "<input type='checkbox' $check  name='ProductsLabels[]' value='$k'>$c</input>"; ?>
                                    </div>
                                <?php }
                                ?>
                            </div>
                        </div>

                        <div class="from-group">
                            <label> <?= __d('product', 'plugin'); ?> </label>

                            <div class="row">
                                <?php foreach ($plugins as $k => $c) {
                                    $check = false;

                                    foreach ($product->products_plugins as $key => $value) {

                                        if ($value->plugin_id == $k) {
                                            $check = 'checked';
                                        }
                                    }
                                ?>
                                    <div class="col-2">
                                        <?php echo "<input type='checkbox' $check  name='ProductsPlugins[]' value='$k'>$c</input>"; ?>
                                    </div>
                                <?php }
                                ?>
                            </div>
                        </div>

                        <?php

                        echo $this->Form->control('name', [
                            'escape' => false,
                            'required' => 'required',
                            'label' => "<font class='red'> * </font>" . __('name'),
                            'class' => 'form-control'
                        ]);
                        echo $this->Form->control('description', [
                            'escape' => false,
                            'required' => 'required',
                            'label' => "<font class='red'> * </font>" . __('description'),
                            'class' => 'form-control'
                        ]);
                        ?>

                        <div class="row">
                            <div class="col-3">

                                <?php
                                echo $this->Form->control('number_of_houldhold', [
                                    'escape' => false,
                                    'required' => 'required',
                                    'min' => 1,
                                    'label' => "<font class='red'> * </font>" . __d('product', 'number_of_houldhold'),
                                    'class' => 'form-control'
                                ]); ?>
                            </div>

                            <div class="col-3">

                                <?php
                                echo $this->Form->control('number_of_parkingcar', [
                                    'escape' => false,
                                    'required' => 'required',
                                    'min' => 1,
                                    'label' => "<font class='red'> * </font>" . __d('product', 'number_of_parkingcar'),
                                    'class' => 'form-control'
                                ]); ?>

                            </div>
                            <div class="col-3">
                                <?php echo $this->Form->control('agency_commission', [
                                    'escape' => false,
                                    'min' => 0,
                                    'required' => 'required',
                                    'label' => "<font class='red'> * </font>" . __d('product', 'agency_commission'),
                                    'class' => 'form-control'
                                ]); ?>
                            </div>

                            <div class="col-3">

                                <?php
                                echo $this->Form->control('price', [
                                    'escape' => false,
                                    'min' => 1,
                                    'required' => 'required',
                                    'label' => "<font class='red'> * </font>" . __d('product', 'price'),
                                    'class' => 'form-control'
                                ]);
                                ?>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">

                                <?php echo $this->Form->control('properties', [
                                    'escape' => false,
                                    'required' => 'required',
                                    'label' => "<font class='red'> * </font>" . __d('product', 'properties'),
                                    'class' => 'form-control'
                                ]);

                                ?>
                            </div>

                            <div class="col-6">
                                <?php echo $this->Form->control('total_number_of_parking_space', [
                                    'escape' => false,
                                    'required' => 'required',
                                    'label' => "<font class='red'> * </font>" . __d('product', 'total_number_of_parking_space'),
                                    'class' => 'form-control'
                                ]); ?>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <?php echo $this->Form->control('management_fee', [
                                    'escape' => false,
                                    'required' => 'required',
                                    'label' => "<font class='red'> * </font>" . __d('product', 'management_fee'),
                                    'class' => 'form-control'
                                ]); ?>
                            </div>

                            <div class="col-6">
                                <?php echo $this->Form->control('government_rates', [
                                    'escape' => false,
                                    'required' => 'required',
                                    'label' => "<font class='red'> * </font>" . __d('product', 'government_rates'),
                                    'class' => 'form-control'
                                ]);
                                ?>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-2">
                                <?php
                                echo $this->Form->control('contact_title', [
                                    'escape' => false,
                                    'required' => 'required',
                                    'empty' => __('please_select'),
                                    'data-live-search' => true,
                                    'class' => 'selectpicker form-control',
                                    'options' => $contactTitles,
                                    'label' =>   "<font class='red'> * </font>" . __d('product', 'contact_title'),
                                ]); ?>
                            </div>
                            <div class="col-10">
                                <?php

                                echo $this->Form->control('contact_person', [
                                    'escape' => false,
                                    'required' => 'required',
                                    'label' =>   "<font class='red'> * </font>" . __d('product', 'contact_person'),
                                    'class' => 'form-control'
                                ]);
                                ?>
                            </div>
                        </div>

                        <?php
                        echo $this->Form->control('contact_email', [
                            'label' =>   __d('product', 'contact_email'),
                            'class' => 'form-control'
                        ]);
                        echo $this->Form->control('contact_phone', [
                            'label' =>   __d('product', 'contact_phone'),
                            'class' => 'form-control'
                        ]);
                        echo $this->Form->control('is_star_recommendation', [
                            'label' => __d('product', 'is_star_recommendation'),
                        ]);

                        echo $this->Form->control(
                            'enabled',
                            ['label' => __('enabled')]
                        );

                        echo $this->element('images_upload', array(
                            'add_new_images_url' => $add_new_images_url,
                            'images_model' => $images_model,
                            'base_model' => $model,
                        ));
                        ?>

                        <div class="row mt-10">
                            <div class="col-2">
                                <?= $this->Form->button(__('submit'), ['class' => 'btn btn-large btn-primary form-control']) ?>
                            </div>
                        </div>
                    </fieldset>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
echo $this->Html->script('CakeAdminLTE/pages/admin_product', array('inline' => false));
?>
<script type="text/javascript">
    $(document).ready(function() {
        ADMIN_PRODUCT.url_get_district_data = '<?= $this->Url->build(['prefix' => 'Api/V1',  'controller' => 'Districts', 'action' => 'dataselect']);   ?>';
        ADMIN_PRODUCT.url_get_subdistrict_data = '<?= $this->Url->build(['prefix' => 'Api/V1',  'controller' => 'Subdistricts', 'action' => 'dataselect']);   ?>';

        ADMIN_PRODUCT.current_language = '<?= $current_language; ?>';
        ADMIN_PRODUCT.init_page();
    });
</script>