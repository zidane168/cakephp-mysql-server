<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MemberSubscrition $memberSubscrition
 */
?>

<div class="container-fluid">

	<div class="row">
		<div class="col-12">
			<div class="card card-primary">
				<div class="card-header">
					<h3 class="card-title"> <?=__('Member Subscritions'); ?> </h3>
				</div>

                <div class="card-body table-responsive">
                    <?= $this->Form->create($memberSubscrition) ?>
                    <fieldset>
                      
                        <?php
                            echo $this->Form->control('member_id', ['class' => 'form-control', 'options' => $members]);
                            echo $this->Form->control('prodcut_id', ['class' => 'form-control']);
                            echo $this->Form->control('enabled', ['class' => 'form-control']);
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

