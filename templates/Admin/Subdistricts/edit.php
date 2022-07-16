<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Subdistrict $subdistrict
 */
?>

<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title"> <?= __d('setting', 'edit_subdistrict'); ?> </h3>
                </div>

                <div class="card-body table-responsive">
                    <?= $this->Form->create($subdistrict) ?>
                    <fieldset>

                        <?php
                        echo $this->Form->control('district_id', [
                            'empty' => __('please_select'),
                            'required' => 'required',
                            'escape' => false,
                            'data-live-search' => true,
                            'label' => "<font class='red'> * </font>" . __d('setting', 'district'),
                            'class' => 'selectpicker form-control', 'options' => $districts
                        ]);

                        echo $this->element('language_input_column', array(
                            'languages_model'           => $languages_model,
                            'languages_edit_model'      => $languages_edit_model,
                            'languages_list'            => $languages_list,
                            'language_input_fields'     => $language_input_fields,
                            'languages_edit_data'       => $languages_edit_data,
                        ));

                        echo $this->Form->control('enabled');
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