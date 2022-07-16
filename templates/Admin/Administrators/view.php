<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Administrator $administrator
 */
?>
<div class="container-fluid card full-border">
    <div class="row">
        <div class="col-12">
            <div class="box box-primary">
                <div class="box-header d-flex">
                    <h3 class="box-title"><?= __('administrator'); ?></h3>
                    <?php if (isset($permissions['Administrators']['add']) && ($permissions['Administrators']['add'] == true)) { ?>
                        
                        <div class="box-tools ml-auto p-1">
                            <?php echo $this->Html->link('<i class="fa fa-pencil"></i> '.__('edit'), array('action' => 'edit', $administrator->id), array('class' => 'btn btn-primary', 'escape' => false)); ?>
                        </div>    
                    <?php  }  ?>
                </div>
            </div>

            <div class="box box-body">
                <table id="Administrators" class="table table-bordered table-striped">
                    <tr>
                        <th><?= __('id') ?></th>
                        <td><?= $this->Number->format($administrator->id) ?></td>
                    </tr>
                    
                    <tr>
                        <th><?= __d('company', 'company') ?></th>
                        <td><?= $administrator->has('company') ? $this->Html->link( reset($administrator->company->company_languages)['name'], ['controller' => 'Companies', 'action' => 'view', $administrator->company->id]) : '' ?></td>
                    </tr>
                  
                    <tr>
                        <th><?= __('name') ?></th>
                        <td><?= h($administrator->name) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('email') ?></th>
                        <td><?= h($administrator->email) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('phone') ?></th>
                        <td><?= h($administrator->phone) ?></td>
                    </tr>
                   <tr>
                        <th><?= __('modified_by') ?></th>
                        <td>
                            <?= $administrator->modified_by ? h($administrator->modified_by['name']) : '' ?>
                        </td>
                    </tr>

                    <tr>
                        <th><?= __('modified') ?></th>
                        <td><?= h($administrator->updated) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('created_by') ?></th>
                        <td>
                            <?= $administrator->created_by ? h($administrator->created_by['name']) : '' ?>
                        </td>
                    </tr>
                   
                    <tr>
                        <th><?= __('created') ?></th>
                        <td><?= h($administrator->created) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('enabled') ?></th>
                        <td><?= $administrator->enabled ? __('yes') : __('no'); ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>