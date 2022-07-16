<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Administrator $administrator
 */
?>

<div class="container-fluid">

	<div class="row">
		<div class="col-12">
			<div class="card card-primary">
				<div class="card-header">
					<h3 class="card-title"> <?=__d('administrator', 'administrator'); ?> </h3>
				</div>

                <div class="card-body table-responsive">
                    <?= $this->Form->create($administrator) ?>
                    <fieldset>
                        <legend><?= __('edit') ?></legend>
                        <?php
                            echo $this->Form->control('company_id', [
                                'class' => 'form-control', 
                                'options' => $companies, 
                                'label' =>  __d('company', 'company'),
                                'escape' => false,
                                'empty' => __('please_select'),
                            ]);

                        echo "<br>";

                        echo '<label class="red"> * </label> <label class="bold">' .  __d('role', 'role') . '</label>';
                        echo $this->Form->select('roles', $roles, [
                            'multiple' => 'checkbox',
                            'value' => $currentRoles,
                            'class' => "checkbox"
                        ]);

                        echo "<br>";
                        echo $this->Form->control('name', [
                            'label' => '<font class="red"> * </font>' . __('name'),
                            'required' => 'true',
                            'escape' => false,
                            'class' => 'form-control']);

                        echo "<br>";
                        echo $this->Form->control('email', [
                            'label' => '<font class="red"> * </font>' . __('email'),
                            'required' => 'true',
                            'escape' => false,
                            'class' => 'form-control']);

                        echo "<br>";
                        echo $this->Form->control('phone', [
                            'label' =>  __('phone'),
                            'class' => 'form-control']);    
                ?>

                        <div class="row mt-10">
                            <div class="col-2">
                                <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-large btn-primary form-control']) ?>
                            </div>
                        </div>
                </fieldset>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>

