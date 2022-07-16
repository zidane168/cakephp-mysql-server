<div class="row filter-panel">
    <div class="col-md-12">
        <?php
        echo $this->Form->create(NULL, array(
            $this->Url->build(['controller' => 'products', 'action' => 'index', 'admin' => true]),
            'class' => 'form_filter',
            'type' => 'get',
        ));
        ?>

        <div class="action-buttons-wrapper">
            <div class="row">
                <div class="col-md-3">
                    <?php
                    echo $this->Form->control('ECid', array(
                        'class' => 'form-control',
                        'label' => __d('product', 'ECid'),
                        'value' => isset($data_search['ECid']) && !empty($data_search['ECid']) ? $data_search['ECid'] : '',
                    ));
                    ?>
                </div>
                <div class="col-md-3">
                    <?php
                    echo $this->Form->control('product_type_id', [
                        'empty' => __('please_select'),
                        'data-live-search' => true,
                        'class' => 'selectpicker form-control',
                        'options' => $product_types,
                        'label' =>  __d('product', 'product_type'),
                        'value' => isset($data_search['product_type_id']) && !empty($data_search['product_type_id']) ? $data_search['product_type_id'] : array()

                    ]);
                    ?>
                </div>
              
                <div class="col-md-3">
                    <?php
                    echo $this->Form->control('is_star_recommendation', array(
                        'label' => __d('product', 'is_star_recommendation'),
                        'empty' => __('please_select'),
                        'data-live-search' => true,
                        'class' => 'selectpicker form-control',
                        'options' => $is_star_recommendation,
                        'value' => isset($data_search['is_star_recommendation']) ? $data_search['is_star_recommendation'] : array()

                    ));
                    ?>
                </div>
                 <div class="col-md-3">
                    <div><label><?php echo __('enabled'); ?></label></div>
                    <div class="btn-group btn-group-sm" data-toggle="buttons">
                        <label class="btn btn-default">
                            <input type="radio" name="status" value="" autocomplete="off" <?php echo !isset($data_search['status']) || $data_search['status'] === "" ? 'checked="checked"' : ''; ?>>
                            <?php echo __('all'); ?>
                        </label>
                        <label class="btn btn-default">
                            <input type="radio" name="status" value="1" autocomplete="off" <?php echo isset($data_search['status']) && $data_search['status']  === "1" ? 'checked="checked"' : ''; ?>>
                            <?php echo __('yes'); ?>
                        </label>
                        <label class="btn btn-default">
                            <input type="radio" name="status" value="0" autocomplete="off" <?php echo isset($data_search['status']) && $data_search['status'] === "0" ? 'checked="checked"' : ''; ?>>
                            <?php echo __('no'); ?>
                        </label>
                    </div>
                </div>
            </div>

            <div class="row">
                
                <div class="col-md-3">
                    <?php
                    echo $this->Form->control('name', array(
                        'class' => 'form-control',
                        'label' => __('name'),
                        'value' => isset($data_search['name']) && !empty($data_search['name']) ? $data_search['name'] : '',
                    ));
                    ?>
                </div>
                <div class="col-md-3">
                    <?php
                    echo $this->Form->control('mInfo', array(
                        'class' => 'form-control',
                        'label' => __d('member', 'member'),
                        'value' => isset($data_search['mInfo']) && !empty($data_search['mInfo']) ? $data_search['mInfo'] : '',
                    ));
                    ?>
                </div>
                <div class="col-md-3">
                    <?php
                    echo $this->Form->control('price', array(
                        'class' => 'form-control',
                        'label' => __d('product', 'price_big_than'),
                        'value' => isset($data_search['price']) && !empty($data_search['price']) ? $data_search['price'] : '',
                    ));
                    ?>
                </div>
               
            </div>

            <div class="row" style="margin-top: 20px">
                <div class="col-md-12 ">
                    <div class="d-flex justify-content-end">
                        <?php
                        echo $this->Form->submit(__('submit'), array(
                            'class' => 'btn btn-primary',
                        ));

                        echo "&nbsp;";

                        echo  $this->Html->link(__('reset'), array(
                            'controller' => 'products',
                            'prefix' => 'Admin',    // viet hoa T_T
                            'action' => 'index',

                        ), array(
                            'class' => 'btn btn-danger filter-button'    // add class to link
                        ));

                        echo $this->element('admin/filter/common/export_info');

                        ?>
                    </div>
                </div>
            </div>
            <?php echo $this->Form->end(); ?>
        </div>

    </div>
</div>