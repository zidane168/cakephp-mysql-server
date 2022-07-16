<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AiPairing $aiPairing
 */
?>

<div class="container-fluid card full-border">


<div class="row">
    <div class="col-12">
        <div class="box box-primary">
            <div class="box-header d-flex">
                <h3 class="box-title"> <?php echo __d('product', 'ai_pairing'); ?> </h3>

	            <?php 
            		if (isset($permissions['AiPairings']['edit']) && ($permissions['AiPairings']['edit'] == true)) { 
				?>

				<div class="box-tools ml-auto p-1">
	                <?php echo $this->Html->link('<i class="fa fa-pencil"></i> ' . __('edit'), array('action' => 'edit', $aiPairing->id), array('class' => 'btn btn-primary', 'escape' => false)); ?>
	            </div>
                
                <?php 
                    }
				?>
			</div>

	        <div class="box-body">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th><?= __('id') ?></th>
                        <td><?= $this->Number->format($aiPairing->id) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('name') ?></th>
                        <td><?= h($aiPairing->product_name) ?></td>
                    </tr>
                    <tr>
                        <th><?= __d('setting', 'region') ?></th>
                        <td><?= $aiPairing->has('region') ? $this->Html->link($aiPairing->region->region_languages[0]->name, ['controller' => 'Regions', 'action' => 'view', $aiPairing->region->id]) : '' ?></td>
                    </tr>
                    <tr>
                        <th><?= __d('setting', 'district') ?></th>
                        <td><?= $aiPairing->has('district') ? $this->Html->link($aiPairing->district->district_languages[0]->name, ['controller' => 'Districts', 'action' => 'view', $aiPairing->district->id]) : '' ?></td>
                    </tr>
                    <tr>
                        <th><?= __d('setting', 'subdistrict') ?></th>
                        <td><?= $aiPairing->has('subdistrict') ? $this->Html->link($aiPairing->subdistrict->subdistrict_languages[0]->name, ['controller' => 'Subdistricts', 'action' => 'view', $aiPairing->subdistrict->id]) : '' ?></td>
                    </tr>
                   
                    <tr>
                        <th><?= __d('product', 'price') ?></th>
                        <td><?= $this->Number->format($aiPairing->price) ?></td>
                    </tr>


                    <?php
                      echo $this->element('admin/filter/common/status_info', array(
                        'object' => $aiPairing,
                    ));
                    echo $this->element('admin/filter/common/enabled_info', array(
                        'object' => $aiPairing,
                    ));
                    echo $this->element('admin/filter/common/admin_info', array(
                        'object' => $aiPairing,
                    ));
                    ?>
                </table>


                </div>
            </div>
        </div>
    </div>

</div>

