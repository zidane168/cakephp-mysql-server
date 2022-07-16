<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductViolate $productViolate
 */
?>

<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title"> <?= __d('product', 'edit_product_violate'); ?> </h3>
                </div>

                <div class="card-body table-responsive">
                    <?= $this->Form->create($productViolate) ?>
                    <fieldset>

                        <?php
                        echo $this->Form->control('member_id', [
                            'label' => __d('member', 'member'),
                            'disabled' => true,
                            'class' => 'form-control', 'options' => $members
                        ]);
                        echo $this->Form->control('product_id', [
                            'label' => __d('product', 'product'),
                            'disabled' => true,
                            'class' => 'form-control', 'options' => $products
                        ]);
                        echo $this->Form->control('content', [
                            'label' => __('content'),
                            'readonly' => true,
                            'class' => 'form-control'
                        ]);
                        ?>

                        <div class='row'>
                            <div class='col-6'>
                                <?php
                                echo $this->Form->control('status_id', [
                                    'label' => "<font class='red'> * </font>" . __('status'),
                                    'required' => true,
                                    'escape' => false,
                                    'value' => isset($productViolate->status) ? ($productViolate->status) : 0,
                                    'class' => 'form-control'
                                ]); ?>
                            </div>
                        </div>

                        <?php

                        echo $this->Form->control('enabled', [
                            'label' => __('enabled'),
                        ]);

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