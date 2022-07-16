<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\News[]|\Cake\Collection\CollectionInterface $news
 */

use Cake\Utility\Text;
?>

<div class="container-fluid card full-border">

    <div class="row">
        <div class="col-12">
            <div class="box box-primary">
                <div class="box-header d-flex">
                    <h3 class="box-title"> <?php echo __d('news', 'news'); ?> </h3>

                    <?php if (isset($permissions['News']['add']) && ($permissions['News']['add'] == true)) { ?>

                        <div class="box-tools ml-auto p-1">
                            <?= $this->Html->link("<i class='fas fa-plus'> </i> " . __('add'), ['action' => 'add'], [
                                'escape' => false,
                                'class' => 'btn btn-primary button'
                            ]) ?>
                        </div>
                    <?php  }  ?>
                </div> <!-- box-header -->

                <div class="box-body table-responsive">
                    <table id="<?php echo str_replace(' ', '', 'News'); ?>" class="table table-hover table-bordered table-striped">
                        <thead class="text-center">
                            <tr>
                                <th><?= $this->Paginator->sort('id', __('id')) ?></th>
                                <th><?= $this->Paginator->sort('slug', __('slug')) ?></th>
                                <th><?= $this->Paginator->sort('news_type_id', __d('news', 'type')) ?></th>
                                <th><?= $this->Paginator->sort('news_category_id', __d('news', 'category')) ?></th>
                                <th><?= $this->Paginator->sort('name', __('name')) ?></th>
                                <th><?= $this->Paginator->sort('is_hot_news', __d('news', 'is_hot_news')) ?></th>
                                <th><?= $this->Paginator->sort('enabled', __('enabled')) ?></th>
                                <th><?= $this->Paginator->sort('created', __('created')) ?></th>
                                <th><?= $this->Paginator->sort('modified', __('modified')) ?></th>
                                <th><?= __('operation') ?></th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php foreach ($news as $news) : ?>
                                <tr>
                                    <td><?= $this->Number->format($news->id) ?></td>
                                    <td><?= h($news->slug) ?></td>
                                    <td>
                                        <?= h($news->news_type->news_type_languages[0]->name) ?>
                                    </td>
                                    <td class='text-left w-25'> 
                                        <?php  foreach ($news->news_categories as $value) { ?>
                                                <label class="btn btn-outline-primary">  <?= $value['category']['category_languages'][0]['name']; ?> </label>
                                        <?php }  ?> 
                                    </td>
                                    <td>
                                        <?= $news->news_languages[0]->name ?>
                                    </td>
                                    <!-- <td>
                                        <?= 
                                            // remove html element <p>22  </p> => 22
                                            html_entity_decode(Text::truncate(h($news->news_languages[0]->description), 30, ['html' => true])) 
                                        ?>
                                    </td> -->
                                    <td>
                                        <?=
                                        $this->element(
                                            'show_yes_no',
                                            array(
                                                '_check'  => ($news->is_hot_news)
                                            )
                                        )
                                        ?>
                                    </td>
                                    <td>
                                        <?=
                                        $this->element(
                                            'view_check_ico',
                                            array(
                                                '_check'  => ($news->enabled)
                                            )
                                        )
                                        ?>
                                    </td>
                                    <td><?= h($news->created) ?></td>
                                    <td><?= h($news->modified) ?></td>
                                    <td>

                                        <?php
                                        if (isset($permissions['News']['view']) && ($permissions['News']['view'] == true)) {
                                            echo $this->Html->link('<i class="fa fa-eercast"></i>', array('action' => 'view', $news->id), array('class' => 'btn btn-primary btn-sm m-r-btn', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => __('view')));
                                        }

                                        if (isset($permissions['News']['edit']) && ($permissions['News']['edit'] == true)) {
                                            echo $this->Html->link('<i class="fa fa-pencil"></i>', array('action' => 'edit', $news->id), array('class' => 'btn btn-warning btn-sm m-r-btn', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => __('edit')));
                                        }

                                        if (isset($permissions['News']['delete']) && ($permissions['News']['delete'] == true)) {

                                            echo $this->Form->postLink(
                                                '<i class="far fa-trash-alt"></i>',
                                                array('action' => 'delete',  $news->id),
                                                array(
                                                    'escape' => false, 'class' => 'btn btn-danger btn-sm m-r-btn', 'data-toggle' => 'tooltip', 'title' => __('delete'),
                                                    'confirm' => __('delete_message',  $news->id)
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