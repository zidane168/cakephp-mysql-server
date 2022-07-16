<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Member[]|\Cake\Collection\CollectionInterface $members
 */
?>

<div class="container-fluid card full-border">
    <div class="row">
        <div class="col-12">
            <?php
            echo $this->element('admin/filter/member_filter', array(
                'data_search' => $data_search
            ));
            ?>
        </div>
    </div>
</div>

<div class="container-fluid card full-border">

    <div class="row">
        <div class="col-12">
            <div class="box box-primary">
                <div class="box-header d-flex">
                    <h3 class="box-title"> <?php echo __d('member', 'member'); ?> </h3>

                    <?php if (isset($permissions['Members']['add']) && ($permissions['Members']['add'] == true)) { ?>

                        <div class="box-tools ml-auto p-1">
                            <?= $this->Html->link("<i class='fas fa-plus'> </i> " . __('add'), ['action' => 'add'], [
                                'escape' => false,
                                'class' => 'btn btn-primary button'
                            ]) ?>
                        </div>
                    <?php  }  ?>
                </div> <!-- box-header -->

                <div class="box-body  table-responsive"> 
                <table id="<?php echo str_replace(' ', '', 'Member'); ?>" class="table table-hover table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="text-center"><?= $this->Paginator->sort('Members.id',                __('id')) ?></th>
                            <th class="text-center"><?php echo '<a href="#">'. __('thumbnail') . '</a>'; ?> </th>
                           
                            <th class="text-center"><?= $this->Paginator->sort('Members.area_code',         __('area_code')) ?></th>
                            <th class="text-center"><?= $this->Paginator->sort('Members.phone',             __('phone')) ?></th>
                            <th class="text-center"><?= $this->Paginator->sort('Members.google_id',         __('google')) ?></th>
                            <th class="text-center"><?= $this->Paginator->sort('Members.facebook_id',       __('facebook')) ?></th>
                            
                            <th class="text-center"><?= $this->Paginator->sort('Members.name',              __('name')) ?></th>
                            <th class="text-center"><?= $this->Paginator->sort('Members.email',             __('email')) ?></th>
                            <th class="text-center"><?= $this->Paginator->sort('Members.company_ECid',      __d('member', 'company_ECid')) ?></th>
                            <th class="text-center"><?= $this->Paginator->sort('Members.person_ECid',       __d('member', 'person_ECid')) ?></th>
                            <th class="text-center"><?= $this->Paginator->sort('Members.company_phone',     __d('member', 'company_phone')) ?></th>
                            <th class="text-center"><?= $this->Paginator->sort('Members.company_address',   __d('member', 'company_address')) ?></th>
                            <th class="text-center"><?= $this->Paginator->sort('Members.enabled',           __('enabled')) ?></th>
                            <th class="text-center"><?= $this->Paginator->sort('Members.created',           __('created')) ?></th>
                            <th class="text-center"><?= $this->Paginator->sort('Members.modified',          __('modified')) ?></th>
                            <th class="text-center"><?= __('operation') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($members as $member) : ?>
                            <tr>
                                <td class="text-center"><?= $this->Number->format($member->id) ?></td>
                                <td class="text-center">
									<?php 
                                        if (isset($member['member_images']) && !empty($member['member_images'])) {
                                            echo $this->Html->image('../'. $member['member_images'][0]["path"], array(
                                                'class' => 'member-image img-thumbnail preview'));

                                            if (count($member['member_images']) > 1) {
                                                echo $this->Html->image('../'. $member['member_images'][1]["path"], array(
                                                    'class' => 'member-image img-thumbnail preview'));
                                            }      
                                        } 
                                    ?>
								</td>
                                <td class="text-center"><?= h($member->area_code) ?></td>
                                <td class="text-center"><?= h($member->phone) ?></td>
                                <td class="text-center"><?= h($member->google) ?></td>
                                <td class="text-center"><?= h($member->facebook) ?></td>
                                <td class="text-center"><?= h($member->name) ?></td>
                                <td class="text-center"><?= h($member->email) ?></td>
                                <td class="text-center"><?= h($member->company_ECid) ?></td>
                                <td class="text-center"><?= h($member->person_ECid) ?></td>
                                <td class="text-center"><?= h($member->company_phone) ?></td>
                                <td class="text-center"><?= h($member->company_address) ?></td>
                                <td class="text-center">
                                    <?= $this->element('view_check_ico', array('_check' => $member->enabled)) ?>
                                </td>
                                <td class="text-center"><?= h($member->created) ?></td>
                                <td class="text-center"><?= h($member->modified) ?></td>
                                <td class="text-center">

                                    <?php
                                    if (isset($permissions['Members']['view']) && ($permissions['Members']['view'] == true)) {
                                        echo $this->Html->link('<i class="fa fa-eercast"></i>', array('action' => 'view', $member->id), array('class' => 'btn btn-primary btn-sm m-r-btn', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => __('view')));
                                    }

                                    if (isset($permissions['Members']['edit']) && ($permissions['Members']['edit'] == true)) {
                                        echo $this->Html->link('<i class="fa fa-pencil"></i>', array('action' => 'edit', $member->id), array('class' => 'btn btn-warning btn-sm m-r-btn', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => __('edit')));
                                    }

                                    if (isset($permissions['Members']['delete']) && ($permissions['Members']['delete'] == true)) {

                                        echo $this->Form->postLink(
                                            '<i class="far fa-trash-alt"></i>',
                                            array('action' => 'delete',  $member->id),
                                            array(
                                                'escape' => false, 'class' => 'btn btn-danger btn-sm m-r-btn', 'data-toggle' => 'tooltip', 'title' => __('delete'),
                                                'confirm' => __('delete_message', $member->id)
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