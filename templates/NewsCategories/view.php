<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\NewsCategory $newsCategory
 */
?>

<div class="container-fluid card full-border">


<div class="row">
    <div class="col-12">
        <div class="box box-primary">
            <div class="box-header d-flex">
                <h3 class="box-title"> <?php echo __('News Category'); ?> </h3>

	            <?php 
            		if (isset($permissions['News Categories']['edit']) && ($permissions['News Categories']['edit'] == true)) { 
				?>

				<div class="box-tools ml-auto p-1">
	                <?php echo $this->Html->link('<i class="fa fa-pencil"></i> ' . __('edit'), array('action' => 'edit', $newsCategory->id), array('class' => 'btn btn-primary', 'escape' => false)); ?>
	            </div>
                
                <?php 
                    }
				?>
			</div>

	        <div class="box-body">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th><?= __('Slug') ?></th>
                        <td><?= h($newsCategory->slug) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Created By') ?></th>
                        <td><?= $newsCategory->has('created_by') ? $this->Html->link($newsCategory->created_by->name, ['controller' => 'Administrators', 'action' => 'view', $newsCategory->created_by->id]) : '' ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Modified By') ?></th>
                        <td><?= $newsCategory->has('modified_by') ? $this->Html->link($newsCategory->modified_by->name, ['controller' => 'Administrators', 'action' => 'view', $newsCategory->modified_by->id]) : '' ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Id') ?></th>
                        <td><?= $this->Number->format($newsCategory->id) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Created') ?></th>
                        <td><?= h($newsCategory->created) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Modified') ?></th>
                        <td><?= h($newsCategory->modified) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Enabled') ?></th>
                        <td><?= $newsCategory->enabled ? __('Yes') : __('No'); ?></td>
                    </tr>

                    <?php
                    echo $this->element('admin/filter/common/enabled_info', array(
                        'object' => $region,
                    ));
                    echo $this->element('admin/filter/common/admin_info', array(
                        'object' => $region,
                    ));
                    ?>
                </table>


            </div>
        </div>
    </div>
</div>

