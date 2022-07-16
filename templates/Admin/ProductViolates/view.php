<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductViolate $productViolate
 */
?>

<div class="container-fluid card full-border">


<div class="row">
    <div class="col-12">
        <div class="box box-primary">
            <div class="box-header d-flex">
                <h3 class="box-title"> <?php echo __d('product', 'product_violate'); ?> </h3>

	            <?php 
            		if (isset($permissions['ProductViolates']['edit']) && ($permissions['ProductViolates']['edit'] == true)) { 
				?>

				<div class="box-tools ml-auto p-1">
	                <?php echo $this->Html->link('<i class="fa fa-pencil"></i> ' . __('edit'), array('action' => 'edit', $productViolate->id), array('class' => 'btn btn-primary', 'escape' => false)); ?>
	            </div>
                
                <?php 
                    }
				?>
			</div>

	        <div class="box-body">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th><?= __('id') ?></th>
                        <td><?= $this->Number->format($productViolate->id) ?></td>
                    </tr>
                    <tr>
                        <th><?= __d('member', 'member') ?></th>
                        <td><?= $productViolate->has('member') ? $this->Html->link($productViolate->member->email, ['controller' => 'Members', 'action' => 'view', $productViolate->member->id]) : '' ?></td>
                    </tr>
                    <tr>
                        <th><?= __d('product', 'product') ?></th>
                        <td><?= $productViolate->has('product') ? $this->Html->link($productViolate->product->name, ['controller' => 'Products', 'action' => 'view', $productViolate->product->id]) : '' ?></td>
                    </tr>
                    
                    <?php
                     echo $this->element('admin/filter/common/status_info', array(
                        'object' => $productViolate,
                    ));
                    echo $this->element('admin/filter/common/enabled_info', array(
                        'object' => $productViolate,
                    ));
                    echo $this->element('admin/filter/common/admin_info', array(
                        'object' => $productViolate,
                    ));
                    ?>
                </table>


                <div class="text">
                    <strong><?= __('content') ?></strong>
                    <blockquote>
                        <?= $this->Text->autoParagraph(h($productViolate->content)); ?>
                    </blockquote>
                </div>
                </div>
            </div>
        </div>
    </div>

</div>

