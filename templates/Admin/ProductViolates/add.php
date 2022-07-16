<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductViolate $productViolate
 */
?>

<div class="container-fluid">

	<div class="row">
		<div class="col-12">
			<div class="card card-primary">
				<div class="card-header">
					<h3 class="card-title"> <?=__('Product Violates'); ?> </h3>
				</div>

                <div class="card-body table-responsive">
                    <?= $this->Form->create($productViolate) ?>
                    <fieldset>
                      
                        <?php
                            echo $this->Form->control('member_id', ['class' => 'form-control', 'options' => $members]);
                            echo $this->Form->control('product_id', ['class' => 'form-control', 'options' => $products]);
                            echo $this->Form->control('content', ['class' => 'form-control']);
                            echo $this->Form->control('enabled', ['class' => 'form-control']);
                            echo $this->Form->control('created_by', ['class' => 'form-control', 'options' => $createdBy, 'empty' => __('please_select')]);
                            echo $this->Form->control('updated_by', ['class' => 'form-control']);
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

