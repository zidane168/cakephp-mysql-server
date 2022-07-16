<div class="row filter-panel">
    <div class="col-md-12">
        <?php
        echo $this->Form->create(NULL, array(
            $this->Url->build(['controller' => 'cppclRecords', 'action' => 'index', 'admin' => true]),
            'class' => 'form_filter',
            'type' => 'get',
        ));
        ?>

        <div class="action-buttons-wrapper">
            <div class="row">
                <div class="col-md-4">
                    <?php

                    echo $this->element('datetime_picker', array(
                        'id'                => 'registration_date',
                        'field_name'        => 'registration_date',
                        'placeholder'       => __d('report', 'registration_date'),
                        'label'             => __d('report', 'registration_date'),
                        'class'             => 'date',
                        'format'            => 'YYYY-MM-DD',
                        'value' => isset($data_search['registration_date']) && !empty($data_search['registration_date']) ? $data_search['registration_date'] : '', 
                    ));

                    ?>
                </div>

                <div class="col-md-4">
                    <?php
                    echo $this->Form->control('name', array(
                        'class' => 'form-control',
                        'label' => __('name'),
                        'value' => isset($data_search['name']) && !empty($data_search['name']) ? $data_search['name'] : '',
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
                            'controller' => 'cppclRecords',
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