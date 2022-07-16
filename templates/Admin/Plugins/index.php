<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Plugin[]|\Cake\Collection\CollectionInterface $plugins
 */
?>

<div class="container-fluid card full-border">
    <div class="row">
        <div class="col-12">
            <?php
            echo $this->element('admin/filter/plugin_filter', array(
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
                    <h3 class="box-title"> <?php echo __d('product', 'plugin'); ?> </h3>

                    <?php if (isset($permissions['Plugins']['add']) && ($permissions['Plugins']['add'] == true)) { ?>

                        <div class="box-tools ml-auto p-1">
                            <?= $this->Html->link("<i class='fas fa-plus'> </i> " . __('add'), ['action' => 'add'], [
                                'escape' => false,
                                'class' => 'btn btn-primary button'
                            ]) ?>
                        </div>
                    <?php  }  ?>
                </div> <!-- box-header -->

                <div class="box-body table-responsive">
                    <table id="<?php echo str_replace(' ', '', 'Plugin'); ?>" class="table table-hover table-bordered table-striped">
                        <thead class="text-center">
                            <tr>
                                <th><?= $this->Paginator->sort('Plugins.id', __('id')) ?></th>
                                <th class="text-center"><?php echo '<a href="#">' . __('thumbnail') . '</a>'; ?> </th>

                                <th><?= $this->Paginator->sort('Plugins.id', __('name')) ?></th>
                                <th><?= $this->Paginator->sort('Plugins.enabled', __('enabled')) ?></th>
                                <th><?= $this->Paginator->sort('Plugins.created', __('created')) ?></th>
                                <th><?= $this->Paginator->sort('Plugins.modified', __('modified')) ?></th>
                                <th><?= __('operation') ?></th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php foreach ($plugins as $plugin) : ?>
                                <tr>
                                    <td><?= $this->Number->format($plugin->id) ?></td>
                                    <td class="text-center">
                                        <?php
                                        if (isset($plugin['plugin_images']) && !empty($plugin['plugin_images'])) {
                                            echo $this->Html->image('../' . $plugin['plugin_images'][0]["path"], array(
                                                'class' => 'member-image img-thumbnail preview'
                                            ));
                                        }
                                        ?>
                                    </td>
                                    <td><?= h($plugin['PluginLanguages']['name']) ?></td>
                                    <td>
                                        <?php
                                        echo $this->element(
                                            'view_check_ico',
                                            array(
                                                '_check'  => $this->Number->format($plugin->enabled)
                                            )
                                        )
                                        ?>
                                    </td>
                                    <td><?= h($plugin->created) ?></td>
                                    <td><?= h($plugin->modified) ?></td>
                                    <td>

                                        <?php
                                        if (isset($permissions['Plugins']['view']) && ($permissions['Plugins']['view'] == true)) {
                                            echo $this->Html->link('<i class="fa fa-eercast"></i>', array('action' => 'view', $plugin->id), array('class' => 'btn btn-primary btn-sm m-r-btn', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => __('view')));
                                        }

                                        if (isset($permissions['Plugins']['edit']) && ($permissions['Plugins']['edit'] == true)) {
                                            echo $this->Html->link('<i class="fa fa-pencil"></i>', array('action' => 'edit', $plugin->id), array('class' => 'btn btn-warning btn-sm m-r-btn', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => __('edit')));
                                        }

                                        if (isset($permissions['Plugins']['delete']) && ($permissions['Plugins']['delete'] == true)) {

                                            echo $this->Form->postLink(
                                                '<i class="far fa-trash-alt"></i>',
                                                array('action' => 'delete',  $plugin->id),
                                                array(
                                                    'escape' => false, 'class' => 'btn btn-danger btn-sm m-r-btn', 'data-toggle' => 'tooltip', 'title' => __('delete'),
                                                    'confirm' => __('delete_message',  $plugin->id)
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