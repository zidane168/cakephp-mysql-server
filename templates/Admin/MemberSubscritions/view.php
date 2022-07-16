<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MemberSubscrition $memberSubscrition
 */
?>

<div class="container-fluid card full-border">


<div class="row">
    <div class="col-12">
        <div class="box box-primary">
            <div class="box-header d-flex">
                <h3 class="box-title"> <?php echo __('Member Subscritions'); ?> </h3>

	            <?php 
            		if (isset($permissions['Member Subscritions']['edit']) && ($permissions['Member Subscritions']['edit'] == true)) { 
				?>

				<div class="box-tools ml-auto p-1">
	                <?php echo $this->Html->link('<i class="fa fa-pencil"></i> ' . __('edit'), array('action' => 'edit', $memberSubscrition->id), array('class' => 'btn btn-primary', 'escape' => false)); ?>
	            </div>
                
                <?php 
                    }
				?>
			</div>

	        <div class="box-body">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th><?= __('Member') ?></th>
                        <td><?= $memberSubscrition->has('member') ? $this->Html->link($memberSubscrition->member->name, ['controller' => 'Members', 'action' => 'view', $memberSubscrition->member->id]) : '' ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Id') ?></th>
                        <td><?= $this->Number->format($memberSubscrition->id) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Prodcut Id') ?></th>
                        <td><?= $this->Number->format($memberSubscrition->prodcut_id) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Enabled') ?></th>
                        <td><?= $memberSubscrition->enabled ? __('Yes') : __('No'); ?></td>
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

</div>

