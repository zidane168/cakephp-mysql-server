<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AiPairing $aiPairing
 */
?>

<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title"> <?= __d('product', 'edit_ai_pairing'); ?> </h3>
                </div>

                <div class="card-body table-responsive">
                    <?= $this->Form->create($aiPairing) ?>
                    <fieldset>

                        <?php
                        echo $this->Form->control('product_name', [
                            'label' => __('name'),
                            'readonly' => true,
                            'class' => 'form-control'
                        ]);
                        ?>

                        <div class="row">
                            <div class="col-4">
                                <?php
                                echo $this->Form->control('region_id', [
                                    'disabled' => true,
                                    'label' => __d('setting', 'region'),
                                    'class' => 'form-control', 'options' => $regions
                                ]); ?>
                            </div>

                            <div class="col-4">
                                <?php

                                echo $this->Form->control('district_id', [
                                    'disabled' => true,
                                    'label' => __d('setting', 'district'),
                                    'class' => 'form-control', 'options' => $districts
                                ]); ?>
                            </div>

                            <div class="col-4">
                                <?php


                                echo $this->Form->control('district_id', [
                                    'disabled' => true,
                                    'label' => __d('setting', 'district'),
                                    'class' => 'form-control'
                                ]); ?>
                            </div>
                        </div>

                        <?php

                        echo $this->Form->control('price', [
                            'disabled' => true,
                            'label' => __d('product', 'price'),
                            'class' => 'form-control'
                        ]); ?>

                        <div class='row'>
                            <div class='col-6'>
                                <?php
                                echo $this->Form->control('status_id', [
                                    'label' => "<font class='red'> * </font>" . __('status'),
                                    'required' => true,
                                    'escape' => false,
                                    'value' => isset($aiPairing->status) ? ($aiPairing->status) : 0,
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