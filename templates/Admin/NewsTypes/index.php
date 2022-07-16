<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\NewsType[]|\Cake\Collection\CollectionInterface $newsTypes
 */
?>

<div class="container-fluid card full-border">

    <div class="row">
        <div class="col-12">
            <div class="box box-primary">
                <div class="box-header d-flex">
                    <h3 class="box-title"> <?php echo __d('news', 'type'); ?> </h3>

                    <?php if (isset($permissions['NewsTypes']['add']) && ($permissions['NewsTypes']['add'] == true)) { ?>

                        <div class="box-tools ml-auto p-1">
                            <?= $this->Html->link("<i class='fas fa-plus'> </i> " . __('add'), ['action' => 'add'], [
                                'escape' => false,
                                'class' => 'btn btn-primary button'
                            ]) ?>
                        </div>
                    <?php  }  ?>
                </div> <!-- box-header -->

                <div class="box-body table-responsive">
                    <table id="<?php echo str_replace(' ', '', 'News Type'); ?>" class="table table-hover table-bordered table-striped">
                        <thead class="text-center">
                            <tr>
                                <th><?= $this->Paginator->sort('NewsTypes.id', __('id')) ?></th>
                                <th><?= $this->Paginator->sort('NewsTypes.slug', __('slug')) ?></th>
                                <th><?= $this->Paginator->sort('NewsTypes.id', __('name')) ?></th>
                              
                                <th><?= $this->Paginator->sort('NewsTypes.enabled', __('enabled')) ?></th>
                                <th><?= $this->Paginator->sort('NewsTypes.created', __('created')) ?></th>
                                <th><?= $this->Paginator->sort('NewsTypes.modified', __('modified')) ?></th>
                                <th><?= __('operation') ?></th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php foreach ($newsTypes as $newsType) : ?>
                                <tr>
                                    <td><?= $this->Number->format($newsType->id) ?></td>
                                    <td><?= h($newsType->slug) ?></td>
                                    <td><?= h($newsType->news_type_languages[0]->name) ?></td>
                                    <td>
                                        <?=
                                        $this->element(
                                            'view_check_ico',
                                            array(
                                                '_check'  => ($newsType->enabled)
                                            )
                                        )
                                        ?>
                                    </td>
                                    <td><?= h($newsType->created) ?></td>
                                    <td><?= h($newsType->modified) ?></td>
                                    <td>

                                        <?php
                                        if (isset($permissions['NewsTypes']['view']) && ($permissions['NewsTypes']['view'] == true)) {
                                            echo $this->Html->link('<i class="fa fa-eercast"></i>', array('action' => 'view', $newsType->id), array('class' => 'btn btn-primary btn-sm m-r-btn', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => __('view')));
                                        }

                                        if (isset($permissions['NewsTypes']['edit']) && ($permissions['NewsTypes']['edit'] == true)) {
                                            echo $this->Html->link('<i class="fa fa-pencil"></i>', array('action' => 'edit', $newsType->id), array('class' => 'btn btn-warning btn-sm m-r-btn', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => __('edit')));
                                        }

                                        if (isset($permissions['NewsTypes']['delete']) && ($permissions['NewsTypes']['delete'] == true)) {

                                            echo $this->Form->postLink(
                                                '<i class="far fa-trash-alt"></i>',
                                                array('action' => 'delete',  $newsType->id),
                                                array(
                                                    'escape' => false, 'class' => 'btn btn-danger btn-sm m-r-btn', 'data-toggle' => 'tooltip', 'title' => __('delete'),
                                                    'confirm' => __('delete_message',  $newsType->id)
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