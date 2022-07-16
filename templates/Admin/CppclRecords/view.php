<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CppclRecord $cppclRecord
 */
?>

<div class="container-fluid card full-border">


<div class="row">
    <div class="col-12">
        <div class="box box-primary">
            <div class="box-header d-flex">
                <h3 class="box-title"> <?php echo __('Cppcl Records'); ?> </h3>

	            <?php 
            		if (isset($permissions['Cppcl Records']['edit']) && ($permissions['Cppcl Records']['edit'] == true)) { 
				?>

				<div class="box-tools ml-auto p-1">
	                <?php echo $this->Html->link('<i class="fa fa-pencil"></i> ' . __('edit'), array('action' => 'edit', $cppclRecord->id), array('class' => 'btn btn-primary', 'escape' => false)); ?>
	            </div>
                
                <?php 
                    }
				?>
			</div>

	        <div class="box-body">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th><?= __('Address') ?></th>
                        <td><?= h($cppclRecord->address) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Name') ?></th>
                        <td><?= h($cppclRecord->name) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Building') ?></th>
                        <td><?= h($cppclRecord->building) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Layers') ?></th>
                        <td><?= h($cppclRecord->layers) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Unit') ?></th>
                        <td><?= h($cppclRecord->unit) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Construction Area') ?></th>
                        <td><?= h($cppclRecord->construction_area) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Price Per Square Foot') ?></th>
                        <td><?= h($cppclRecord->price_per_square_foot) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Created By') ?></th>
                        <td><?= $cppclRecord->has('created_by') ? $this->Html->link($cppclRecord->created_by->name, ['controller' => 'Administrators', 'action' => 'view', $cppclRecord->created_by->id]) : '' ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Modified By') ?></th>
                        <td><?= $cppclRecord->has('modified_by') ? $this->Html->link($cppclRecord->modified_by->name, ['controller' => 'Administrators', 'action' => 'view', $cppclRecord->modified_by->id]) : '' ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Id') ?></th>
                        <td><?= $this->Number->format($cppclRecord->id) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Transaction') ?></th>
                        <td><?= $this->Number->format($cppclRecord->transaction) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Registration Date') ?></th>
                        <td><?= h($cppclRecord->registration_date) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Created') ?></th>
                        <td><?= h($cppclRecord->created) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Modified') ?></th>
                        <td><?= h($cppclRecord->modified) ?></td>
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

