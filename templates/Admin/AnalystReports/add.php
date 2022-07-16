<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AnalystReport $analystReport
 */
?>

<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title"> <?= __d('report', 'add_analyst_report'); ?> </h3>
                </div>

                <div class="card-body table-responsive">
                    <?= $this->Form->create($analystReport, ['type' => 'file']) ?>
                    <fieldset>

                        <?php
                        echo $this->Form->control(
                            'analyst_report_category_id',
                            [
                                'label' => "<font class='red'> * </font>" .  __d('report', 'analyst_report_category'),
                                'required' => 'required',
                                'escape' => false,
                                'data-live-search' => true,
                                'class' => 'selectpicker form-control', 'options' => $analystReportCategories
                            ]
                        );

                        echo $this->element('language_input_column', array(
                            'languages_model'       => $languages_model,
                            'languages_list'        => $languages_list,
                            'language_input_fields' => $language_input_fields,
                            'languages_edit_data'   => isset($this->request->data[$languages_model]) ? $this->request->data[$languages_model] : false,
                        ));

                        echo $this->element('files_upload',array(
                            'files_model' => $files_model,	
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