<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PriceSetting $priceSetting
 */
?>

<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title"> <?= __d('setting', 'add_price_setting'); ?> </h3>
                </div>

                <div class="card-body table-responsive">
                    <?= $this->Form->create($priceSetting) ?>
                    <fieldset>

                        <?php
                        echo $this->Form->control('price_from', [
                            'label' => __d('setting', 'price_from'),
                            'class' => 'form-control']);

                        echo $this->Form->control('price_to', [
                            'label' => __d('setting', 'price_to'),
                            'class' => 'form-control']);

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