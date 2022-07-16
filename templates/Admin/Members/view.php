<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Member $member
 */
?>

<div class="container-fluid card full-border">


    <div class="row">
        <div class="col-12">
            <div class="box box-primary">
                <div class="box-header d-flex">
                    <h3 class="box-title"><?php __d('member', 'member') ?></h3>

                    <?php
                    if (isset($permissions['Members']['edit']) && ($permissions['Members']['edit'] == true)) {
                    ?>

                        <div class="box-tools ml-auto p-1">
                            <?php echo $this->Html->link('<i class="fa fa-pencil"></i> ' . __('edit'), array('action' => 'edit', $member->id), array('class' => 'btn btn-primary', 'escape' => false)); ?>
                        </div>

                    <?php
                    }
                    ?>
                </div>

                <div class="box-body">
                    <table class="table table-bordered table-striped">

                        <tr>
                            <th><?= __('id') ?></th>
                            <td><?= $this->Number->format($member->id) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('area_code') ?></th>
                            <td><?= ($member->id) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('phone') ?></th>
                            <td><?= $this->Number->format($member->phone) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('google') ?></th>
                            <td><?= $this->Number->format($member->google_id) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('facebook') ?></th>
                            <td><?= $this->Number->format($member->facebook_id) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('name') ?></th>
                            <td><?= h($member->name) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('email') ?></th>
                            <td><?= h($member->email) ?></td>
                        </tr>
                        <tr>
                            <th><?= __d('member', 'company_ECid') ?></th>
                            <td><?= h($member->company_ECid) ?></td>
                        </tr>
                        <tr>
                            <th><?= __d('member', 'person_ECid') ?></th>
                            <td><?= h($member->person_ECid) ?></td>
                        </tr>
                        <tr>
                            <th><?= __d('member', 'company_phone') ?></th>
                            <td><?= h($member->company_phone) ?></td>
                        </tr>
                        <tr>
                            <th><?= __d('member', 'company_address') ?></th>
                            <td><?= h($member->company_address) ?></td>
                        </tr>

                        <?php
                        echo $this->element('admin/filter/common/enabled_info', array(
                            'object' => $member,
                        ));
                        echo $this->element('admin/filter/common/admin_info', array(
                            'object' => $member,
                        ));
                        ?>

                    </table>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="margin-top-15">
                                <?= $this->element('content_view', array(
                                    'languages'             => $languages,
                                    'language_input_fields' => $language_input_fields,
                                    'images'                 => $images,
                                )); ?>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>