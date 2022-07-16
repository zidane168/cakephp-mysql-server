<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\NewsCategory[]|\Cake\Collection\CollectionInterface $newsCategories
 */
?>

<div class="container-fluid card full-border">

	<div class="row">
		<div class="col-12">
			<div class="box box-primary">
				<div class="box-header d-flex">
                    <h3 class="box-title"> <?php echo __('newsCategory'); ?> </h3>
				
                    <?php if (isset($permissions['News Categories']['add']) && ($permissions['News Categories']['add'] == true)) { ?>
                    
                    <div class="box-tools ml-auto p-1">
                        <?= $this->Html->link("<i class='fas fa-plus'> </i> " . __('add'), ['action' => 'add'], [
                            'escape' => false,
                            'class' => 'btn btn-primary button']) ?>
                    </div>    
                    <?php  }  ?>
                </div> <!-- box-header -->

                <div class="box-body table-responsive">
                    <table id="<?php echo str_replace(' ', '', 'News Category'); ?>" class="table table-hover table-bordered table-striped">
                        <thead class="text-center">
                            <tr>
                                <th><?= $this->Paginator->sort('id', __('id')) ?></th>
                                <th><?= $this->Paginator->sort('slug', __('slug')) ?></th>
                                <th><?= $this->Paginator->sort('enabled', __('enabled')) ?></th>
                                <th><?= $this->Paginator->sort('created', __('created')) ?></th>
                                <th><?= $this->Paginator->sort('created_by', __('created_by')) ?></th>
                                <th><?= $this->Paginator->sort('modified', __('modified')) ?></th>
                                <th><?= $this->Paginator->sort('modified_by', __('modified_by')) ?></th>
                                <th><?= __('operation') ?></th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php foreach ($newsCategories as $newsCategory): ?>
                            <tr>
                                                        <td><?= $this->Number->format($newsCategory->id) ?></td>
                                                            <td><?= h($newsCategory->slug) ?></td>
                                                            <td><?= h($newsCategory->enabled) ?></td>
                                                            <td><?= h($newsCategory->created) ?></td>
                                                            <td><?= $newsCategory->has('created_by') ? $this->Html->link($newsCategory->created_by->name, ['controller' => 'Administrators', 'action' => 'view', $newsCategory->created_by->id]) : '' ?></td>
                                                                            <td><?= h($newsCategory->modified) ?></td>
                                                                    <td><?= $newsCategory->has('modified_by') ? $this->Html->link($newsCategory->modified_by->name, ['controller' => 'Administrators', 'action' => 'view', $newsCategory->modified_by->id]) : '' ?></td>
                                        <td>
                    	
                                <?php 
                                    if (isset($permissions['News Categories']['view']) && ($permissions['News Categories']['view'] == true)) { 
                                        echo $this->Html->link('<i class="fa fa-eercast"></i>', array('action' => 'view', $newsCategory->id), array('class' => 'btn btn-primary btn-sm m-r-btn', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => __('view')));
                                    } 
                                 
                                    if (isset($permissions['News Categories']['edit']) && ($permissions['News Categories']['edit'] == true)) { 
                                        echo $this->Html->link('<i class="fa fa-pencil"></i>', array('action' => 'edit', $newsCategory->id), array('class' => 'btn btn-warning btn-sm m-r-btn', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => __('edit')));
                                    }

                                    if (isset($permissions['News Categories']['delete']) && ($permissions['News Categories']['delete'] == true)) { 
	                                    
                                        echo $this->Form->postLink(  
                                            '<i class="far fa-trash-alt"></i>',  array('action' => 'delete',  $newsCategory->id), 
                                            array(
                                                'escape' => false, 'class' => 'btn btn-danger btn-sm m-r-btn', 'data-toggle'=>'tooltip', 'title' => __('delete'), 
                                                'confirm' => __('delete_message',  $newsCategory->id)
                                            ));
				
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