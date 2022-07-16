<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\NewsType $newsType
 */
?>

<div class="container-fluid card full-border">


<div class="row">
    <div class="col-12">
        <div class="box box-primary">
            <div class="box-header d-flex">
                <h3 class="box-title"> <?php echo __d('news', 'type'); ?> </h3>

	            <?php 
            		if (isset($permissions['NewsTypes']['edit']) && ($permissions['NewsTypes']['edit'] == true)) { 
				?>

				<div class="box-tools ml-auto p-1">
	                <?php echo $this->Html->link('<i class="fa fa-pencil"></i> ' . __('edit'), array('action' => 'edit', $newsType->id), array('class' => 'btn btn-primary', 'escape' => false)); ?>
	            </div>
                
                <?php 
                    }
				?>
			</div>

	        <div class="box-body">
                <table class="table table-bordered table-striped">
                    
                    <tr>
                        <th><?= __('id') ?></th>
                        <td><?= $this->Number->format($newsType->id) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('slug') ?></th>
                        <td><?= h($newsType->slug) ?></td>
                    </tr>

                    <?php
                    echo $this->element('admin/filter/common/enabled_info', array(
                        'object' => $newsType,
                    ));
                    echo $this->element('admin/filter/common/admin_info', array(
                        'object' => $newsType,
                    ));
                    ?>
                </table>


                </div>
            </div>
        </div>
    </div>

</div>

