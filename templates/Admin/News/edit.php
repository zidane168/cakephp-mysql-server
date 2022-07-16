<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\News $news
 */
?>

<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title"> <?= __d('news', 'edit_news'); ?> </h3>
                </div>

                <div class="card-body table-responsive">
                    <?= $this->Form->create($news, ['type' => 'file']) ?>
                    <fieldset>

                        <?php
                        echo $this->Form->control('news_type_id', [
                            'empty' => __('please_select'),
                            'required' => true,
                            'escape' => false,
                            'data-live-search' => true,
                            'class' => 'selectpicker form-control', 'options' => $news_types,
                            'label' => "<font class='red'> * </font>" . __d('news', 'type')

                        ]); ?>

                        <div class="from-group">
                            <label> <?= "<font class='red'> * </font>" .  __d('news', 'category'); ?> </label>
                            <div class="row">
                                <?php foreach ($categories as $k => $c) {
                                    $check = false;

                                    foreach ($news->news_categories as $key => $value) {

                                        if ($value->category_id == $k) {
                                            $check = 'checked';
                                        }
                                    }
                                ?>
                                    <div class="col-2">
                                        <?php echo "<input type='checkbox' $check  name='NewsCategories[]' value='$k'>$c</input>"; ?>
                                    </div>
                                <?php }
                                ?>
                            </div>
                        </div>

                        <?php
                        echo $this->element('language_input_column', array(
                            'languages_model'           => $languages_model,
                            'languages_edit_model'      => $languages_edit_model,
                            'languages_list'            => $languages_list,
                            'language_input_fields'     => $language_input_fields,
                            'languages_edit_data'       => $languages_edit_data,
                        ));
                        ?>


                        <?php
                        echo $this->Form->control('is_hot_news', [
                            'label' =>  __d('news', 'is_hot_news')
                        ]);

                        echo $this->element('images_upload', array(
                            'add_new_images_url' => $add_new_images_url,
                            'images_model' => $images_model,
                            'base_model' => $model,
                        ));
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