<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AiPairing $aiPairing
 */
?>

<div class="container-fluid">

	<div class="row">
		<div class="col-12">
			<div class="card card-primary">
				<div class="card-header">
					<h3 class="card-title"> <?=__('Ai Pairings'); ?> </h3>
				</div>

                <div class="card-body table-responsive">
                    <?= $this->Form->create($aiPairing) ?>
                    <fieldset>
                      
                        <?php
                            echo $this->Form->control('product_name', ['class' => 'form-control']);
                            echo $this->Form->control('region_id', ['class' => 'form-control', 'options' => $regions]);
                            echo $this->Form->control('district_id', ['class' => 'form-control', 'options' => $districts]);
                            echo $this->Form->control('subdistrict_id', ['class' => 'form-control', 'options' => $subdistricts]);
                            echo $this->Form->control('price', ['class' => 'form-control']);
                            echo $this->Form->control('enabled', ['class' => 'form-control']);
                            echo $this->Form->control('created_by', ['class' => 'form-control', 'options' => $createdBy, 'empty' => __('please_select')]);
                            echo $this->Form->control('modified_by', ['class' => 'form-control', 'options' => $modifiedBy, 'empty' => __('please_select')]);
                ?>

                        <div class="row mt-10">
                            <div class="col-2">
                                <?= $this->Form->button(__('submit'), ['class' => 'btn btn-large btn-primary form-control']) ?>
                            </div>
                        </div>
                    </fieldset>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>
</div>

