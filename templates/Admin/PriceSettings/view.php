<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PriceSetting $priceSetting
 */
?>

<div class="container-fluid card full-border">


    <div class="row">
        <div class="col-12">
            <div class="box box-primary">
                <div class="box-header d-flex">
                    <h3 class="box-title"> <?php echo __d('setting', 'price_setting'); ?> </h3>

                    <?php
                    if (isset($permissions['PriceSettings']['edit']) && ($permissions['PriceSettings']['edit'] == true)) {
                    ?>

                        <div class="box-tools ml-auto p-1">
                            <?php echo $this->Html->link('<i class="fa fa-pencil"></i> ' . __('edit'), array('action' => 'edit', $priceSetting->id), array('class' => 'btn btn-primary', 'escape' => false)); ?>
                        </div>

                    <?php
                    }
                    ?>
                </div>

                <div class="box-body">
                    <table class="table table-bordered table-striped">

                        <tr>
                            <th><?= __('id') ?></th>
                            <td><?= $this->Number->format($priceSetting->id) ?></td>
                        </tr>
                        <tr>
                            <th><?= __d('setting', 'price_from') ?></th>
                            <td><?= h($priceSetting->price_from) ?></td>
                        </tr>
                        <tr>
                            <th><?= __d('setting', 'price_to') ?></th>
                            <td><?= h($priceSetting->price_to) ?></td>
                        </tr>

                        <?php
                        echo $this->element('admin/filter/common/enabled_info', array(
                            'object' => $priceSetting,
                        ));
                        echo $this->element('admin/filter/common/admin_info', array(
                            'object' => $priceSetting,
                        ));
                        ?>
                    </table>


                </div>
            </div>
        </div>
    </div>

</div>