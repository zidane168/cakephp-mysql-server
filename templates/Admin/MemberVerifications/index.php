<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MemberVerification[]|\Cake\Collection\CollectionInterface $memberVerifications
 */
?>

<div class="container-fluid card full-border">

    <div class="row">
        <div class="col-12">
            <div class="box box-primary">
                <div class="box-header d-flex">
                    <h3 class="box-title"> <?php echo __d('member', 'member_verification'); ?> </h3>

                    <?php if (isset($permissions['MemberVerifications']['add']) && ($permissions['MemberVerifications']['add'] == true)) { ?>

                        <div class="box-tools ml-auto p-1">
                            <?= $this->Html->link("<i class='fas fa-plus'> </i> " . __('add'), ['action' => 'add'], [
                                'escape' => false,
                                'class' => 'btn btn-primary button'
                            ]) ?>
                        </div>
                    <?php  }  ?>
                </div> <!-- box-header -->

                <div class="box-body table-responsive">
                    <table id="<?php echo str_replace(' ', '', 'MemberVerification'); ?>" class="table table-hover table-bordered table-striped">
                        <thead class="text-center">
                            <tr>
                                <th><?= $this->Paginator->sort('MemberVerifications.id', __('id')) ?></th>
                                <th><?= $this->Paginator->sort('MemberVerifications.area_code',         __('area_code')) ?></th>
                                <th><?= $this->Paginator->sort('MemberVerifications.phone',             __('phone')) ?></th>
                                <th><?= $this->Paginator->sort('MemberVerifications.verification_method',     __d('member', 'verification_method')) ?></th>
                                <th><?= $this->Paginator->sort('MemberVerifications.verification_type',       __d('member', 'verification_type')) ?></th>
                                <th><?= $this->Paginator->sort('MemberVerifications.email',             __('email')) ?></th>
                                <th><?= $this->Paginator->sort('MemberVerifications.code',              __d('member', 'code')) ?></th>
                                <th><?= $this->Paginator->sort('MemberVerifications.is_used',           __d('member', 'is_used')) ?></th>
                                <th><?= $this->Paginator->sort('MemberVerifications.enabled',           __('enabled')) ?></th>
                                <th><?= $this->Paginator->sort('MemberVerifications.created',           __('created')) ?></th>
                                <th><?= $this->Paginator->sort('MemberVerifications.modified',          __('modified')) ?></th>
                                <th><?= __('operation') ?></th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php foreach ($memberVerifications as $memberVerification) : ?>
                                <tr>
                                    <td><?= $this->Number->format($memberVerification->id) ?></td>

                                    <td><?= h($memberVerification->area_code) ?></td>
                                    <td><?= h($memberVerification->phone) ?></td>
                                    <td>
                                        <?= $this->element('admin/filter/common/member_verification_methods', array(
                                            'verification_methods' => $verification_methods,
                                            'memberVerification' => $memberVerification,
                                        ));  ?>
                                    </td>

                                    <td>
                                        <?= $this->element('admin/filter/common/member_verification_types', array(
                                            'verification_types' => $verification_types,
                                            'memberVerification' => $memberVerification,
                                        ));  ?>
                                    </td>

                                    <td><?= h($memberVerification->email) ?></td>
                                    <td class="bold red">
                                        <?= h($memberVerification->code) ?>
                                    </td>
                                    <td>
                                        <?= $this->element('view_check_ico', array('_check'  => $this->Number->format($memberVerification->is_used))) ?>
                                    </td>
                                    <td>
                                        <?= $this->element('view_check_ico', array('_check'  => $this->Number->format($memberVerification->enabled))) ?>

                                    </td>
                                    <td><?= h($memberVerification->created) ?></td>
                                    <td><?= h($memberVerification->modified) ?></td>
                                    <td>

                                        <?php
                                        if (isset($permissions['MemberVerifications']['view']) && ($permissions['MemberVerifications']['view'] == true)) {
                                            echo $this->Html->link('<i class="fa fa-eercast"></i>', array('action' => 'view', $memberVerification->id), array('class' => 'btn btn-primary btn-sm m-r-btn', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => __('view')));
                                        }

                                        if (isset($permissions['MemberVerifications']['edit']) && ($permissions['MemberVerifications']['edit'] == true)) {
                                            echo $this->Html->link('<i class="fa fa-pencil"></i>', array('action' => 'edit', $memberVerification->id), array('class' => 'btn btn-warning btn-sm m-r-btn', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => __('edit')));
                                        }

                                        if (isset($permissions['MemberVerifications']['delete']) && ($permissions['MemberVerifications']['delete'] == true)) {

                                            echo $this->Form->postLink(
                                                '<i class="far fa-trash-alt"></i>',
                                                array('action' => 'delete',  $memberVerification->id),
                                                array(
                                                    'escape' => false, 'class' => 'btn btn-danger btn-sm m-r-btn', 'data-toggle' => 'tooltip', 'title' => __('delete'),
                                                    'confirm' => __('delete_message',  $memberVerification->id)
                                                )
                                            );
                                        }

                                        ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <?= $this->element('Paginator'); ?>
            </div><!-- box, box-primary -->
        </div><!-- .col-12 -->
    </div><!-- row -->
</div> <!-- container -->