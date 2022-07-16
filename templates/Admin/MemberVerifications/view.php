<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MemberVerification $memberVerification
 */
?>

<div class="container-fluid card full-border">


    <div class="row">
        <div class="col-12">
            <div class="box box-primary">
                <div class="box-header d-flex">
                    <h3 class="box-title"> <?php echo __d('member', 'member_verification'); ?> </h3>

                    <?php
                    if (isset($permissions['MemberVerifications']['edit']) && ($permissions['MemberVerifications']['edit'] == true)) {
                    ?>

                        <div class="box-tools ml-auto p-1">
                            <?php echo $this->Html->link('<i class="fa fa-pencil"></i> ' . __('edit'), array('action' => 'edit', $memberVerification->id), array('class' => 'btn btn-primary', 'escape' => false)); ?>
                        </div>

                    <?php
                    }
                    ?>
                </div>

                <div class="box-body">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th><?= __('id') ?></th>
                            <td><?= $this->Number->format($memberVerification->id) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('email') ?></th>
                            <td><?= h($memberVerification->email) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('area_code') ?></th>
                            <td><?= h($memberVerification->area_code) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('phone') ?></th>
                            <td><?= h($memberVerification->phone) ?></td>
                        </tr>
                        <tr>
                            <th><?= __d('member', 'code') ?></th>
                            <td><?= h($memberVerification->code) ?></td>
                        </tr>
                       
                        
                        <tr>
                            <th><?= __d('member', 'verification_type') ?></th>
                            <td><?= h($verification_types[$memberVerification->verification_type]) ?></td>
                        </tr>
                        <tr>
                            <th><?= __d('member', 'verification_method') ?></th>
                            <td><?= h($verification_methods[$memberVerification->verification_method]) ?></td>
                        </tr>
                        <tr>
                            <th><?= __d('member', 'is_used') ?></th>
                            <td>
                                <?= $this->element('is_used', array('_check'  => $this->Number->format($memberVerification->is_used))) ?>
                            </td>
                        </tr>

                        <?php
                        echo $this->element('admin/filter/common/enabled_info', array(
                            'object' => $memberVerification,
                        ));
                        echo $this->element('admin/filter/common/admin_info', array(
                            'object' => $memberVerification,
                        ));
                        ?>
                    </table>


                </div>
            </div>
        </div>
    </div>