<?php 
   use Cake\Core\Configure;
?>

<div class="row">
	<div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4" style="margin: auto">
		<div class="box box-widget widget-user">
			<div class="widget-user-header  login-template-background">
				<h3 class="widget-user-username text-center">
					<?php echo "CMS System" ?>
				</h3>
				<h5 class="widget-user-desc"></h5>
			</div>

			<div class="widget-user-image">
				<?php echo $this->Html->image('logo.gif' , [
					'style' => "width: 100px"
				] )?>
			</div>

			<div class="box-footer without-border">
			
					<?= $this->Form->create($administrator) ?>
						<fieldset>
							<div class="row">
								<div class="has-feedback col-12">
									<?php 
										echo $this->Form->control('email', array(
											'class' => 'form-control',
											'placeholder' => __('email'),
											'after' => '<span class="glyphicon glyphicon-envelope form-control-feedback"></span>',
											'label' => __('email')
										));
									?>

								</div>
							</div>

							<div class="row">
								<div class="has-feedback col-12">
									<?php 
										echo $this->Form->control('password', array(
											'class' => 'form-control',
											'placeholder' => __('password'),
											'after' => '<span class="glyphicon glyphicon-lock form-control-feedback"></span>',
											'label' => __('password')
										));
									?>
								</div>
							</div>

						

							<div class="row">
								<div class="col-4"  style="margin: auto">
									<?php
										echo $this->Form->submit(__('login'), array(
											'class' => 'btn btn-primary btn-block btn-flat'
										));
									?>
								</div>
							</div>
						</fieldset>
					<?= $this->Form->end() ?>
				</div>
				<!-- /.row -->
				<!-- <div class="row">
					<div class="col-xs-12">
						<label> <i class="glyphicon glyphicon-lock"></i> </label>
						<?php
							// echo $this->Html->link(__('forget_password'), array(
							// 	'plugin' => 'administration',
							// 	'controller' => 'administrators',
							// 	'action' => 'forgot_password',
							// 	'admin' => true
							// ));
						?>
					</div>

					<div class="hidden-xs col-sm-3"></div>
				</div> -->
				<!-- /.row -->
			</div>
<!-- 
			<div class="box-footer poweredby text-center">
				<?php
					// echo __('powered_by');
					// echo $this->Html->link(
					// 	$this->Html->image('vtl/logo.png', array(
					// 		'class' => 'logo',
					// 	)), 
					// 	Environment::read('poweredby.website'),
					// 	array(
					// 		'escape' => false,
					// 		'alt' => Environment::read('poweredby.name'),
					// 		'title' => Environment::read('poweredby.name'),
					// 		'target' => '_blank'
					// 	)
					// );
				?>
			</div> -->
		</div>
	</div>
</div>