<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MemberSubscrition[]|\Cake\Collection\CollectionInterface $memberSubscritions
 */
?>

<div class="container-fluid card full-border">

	<div class="row">
		<div class="col-12">
			<div class="box box-primary">
				<div class="box-header d-flex">
                    <h3 class="box-title"> <?php echo __('memberSubscrition'); ?> </h3>
				
                    <?php if (isset($permissions['Member Subscritions']['add']) && ($permissions['Member Subscritions']['add'] == true)) { ?>
                    
                    <div class="box-tools ml-auto p-1">
                        <?= $this->Html->link("<i class='fas fa-plus'> </i> " . __('add'), ['action' => 'add'], [
                            'escape' => false,
                            'class' => 'btn btn-primary button']) ?>
                    </div>    
                    <?php  }  ?>
                </div> <!-- box-header -->

                <div class="box-body table-responsive">
                    <table id="<?php echo str_replace(' ', '', 'Member Subscrition'); ?>" class="table table-hover table-bordered table-striped">
                        <thead class="text-center">
                            <tr>
                                <th><?= $this->Paginator->sort('id', __('id')) ?></th>
                                <th><?= $this->Paginator->sort('member_id', __('member_id')) ?></th>
                                <th><?= $this->Paginator->sort('prodcut_id', __('prodcut_id')) ?></th>
                                <th><?= $this->Paginator->sort('enabled', __('enabled')) ?></th>
                                <th><?= __('operation') ?></th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php foreach ($memberSubscritions as $memberSubscrition): ?>
                            <tr>
                                                <td><?= $this->Number->format($memberSubscrition->id) ?></td>
                                                            <td><?= $memberSubscrition->has('member') ? $this->Html->link($memberSubscrition->member->name, ['controller' => 'Members', 'action' => 'view', $memberSubscrition->member->id]) : '' ?></td>
                                                                <td><?= $this->Number->format($memberSubscrition->prodcut_id) ?></td>
                                                    <td><?= h($memberSubscrition->enabled) ?></td>
                                <td>
                    	
                                <?php 
                                    if (isset($permissions['Member Subscritions']['view']) && ($permissions['Member Subscritions']['view'] == true)) { 
                                        echo $this->Html->link('<i class="fa fa-eercast"></i>', array('action' => 'view', $memberSubscrition->id), array('class' => 'btn btn-primary btn-sm m-r-btn', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => __('view')));
                                    } 
                                 
                                    if (isset($permissions['Member Subscritions']['edit']) && ($permissions['Member Subscritions']['edit'] == true)) { 
                                        echo $this->Html->link('<i class="fa fa-pencil"></i>', array('action' => 'edit', $memberSubscrition->id), array('class' => 'btn btn-warning btn-sm m-r-btn', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => __('edit')));
                                    }

                                    if (isset($permissions['Member Subscritions']['delete']) && ($permissions['Member Subscritions']['delete'] == true)) { 
	                                    
                                        echo $this->Form->postLink(  
                                            '<i class="far fa-trash-alt"></i>',  array('action' => 'delete',  $memberSubscrition->id), 
                                            array(
                                                'escape' => false, 'class' => 'btn btn-danger btn-sm m-r-btn', 'data-toggle'=>'tooltip', 'title' => __('delete'), 
                                                'confirm' => __('delete_message',  $memberSubscrition->id)
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