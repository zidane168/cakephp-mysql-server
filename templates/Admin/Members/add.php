<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Member $member
 */
?>

<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title"> <?= __d('member', 'add_member'); ?> </h3>
                </div>

                <div class="card-body table-responsive">
                    <?= $this->Form->create($member, ['type' => 'file']) ?>
                    <fieldset>

                        <div class="col-6">
                            <?php

                            echo $this->Form->control('area_code_id', [
                                'empty' => __('please_select'),
                                'required' => true,
                                'escape' => false,
                                'data-live-search' => true,
                                'class' => 'selectpicker form-control',
                                'options' => $area_codes,
                                'label' => "<font class='red'> * </font>" . __('area_code'),
                            ]);
                            ?>
                        </div>
                        <?php

                        echo $this->Form->control('phone',              ['label' => __('phone'), 'class' => 'form-control']);
                        echo $this->Form->control('google',             ['label' => __('google'), 'class' => 'form-control']);
                        echo $this->Form->control('facebook',           ['label' => __('facebook'), 'class' => 'form-control']);
                        echo $this->Form->control('password',           [
                            'label' => __('password'),
                            'class' => 'form-control',
                            'autocomplete' => 'new-password',   // remove password auto fill
                        ]);
                        echo $this->Form->control('name',               ['label' => __('name'), 'class' => 'form-control']);
                        echo $this->Form->control('email',              [
                            'escape' => false,
                            'required' => 'required',
                            'label' => "<font class='red'> * </font>" . __('email'), 'class' => 'form-control'
                        ]);
                        echo $this->Form->control('company_ECid',       ['label' => __d('member', 'company_ECid'), 'class' => 'form-control']);
                        echo $this->Form->control('person_ECid',        ['label' => __d('member', 'person_ECid'), 'class' => 'form-control']);
                        echo $this->Form->control('company_phone',      ['label' => __d('member', 'company_phone'), 'class' => 'form-control']);
                        echo $this->Form->control('company_address',    ['label' => __d('member', 'company_address'), 'class' => 'form-control']);

                        echo $this->element('language_input_column', array(
                            'languages_model'       => $languages_model,
                            'languages_list'        => $languages_list,
                            'language_input_fields' => $language_input_fields,
                            'languages_edit_data'   => isset($this->request->data[$languages_model]) ? $this->request->data[$languages_model] : false,
                        ));

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