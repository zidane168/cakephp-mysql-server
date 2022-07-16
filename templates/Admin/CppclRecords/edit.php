<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CppclRecord $cppclRecord
 */
?>

<div class="container-fluid">

	<div class="row">
		<div class="col-12">
			<div class="card card-primary">
				<div class="card-header">
					<h3 class="card-title"> <?=__('Cppcl Records'); ?> </h3>
				</div>

                <div class="card-body table-responsive">
                    <?= $this->Form->create($cppclRecord) ?>
                    <fieldset>
                      
                        <?php
                            echo $this->Form->control('registration_date', ['class' => 'form-control', 'empty' => true]);
                            echo $this->Form->control('address', ['class' => 'form-control']);
                            echo $this->Form->control('name', ['class' => 'form-control']);
                            echo $this->Form->control('building', ['class' => 'form-control']);
                            echo $this->Form->control('layers', ['class' => 'form-control']);
                            echo $this->Form->control('unit', ['class' => 'form-control']);
                            echo $this->Form->control('construction_area', ['class' => 'form-control']);
                            echo $this->Form->control('transaction', ['class' => 'form-control']);
                            echo $this->Form->control('price_per_square_foot', ['class' => 'form-control']);
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

