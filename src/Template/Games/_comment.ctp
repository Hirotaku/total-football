<div class="box">
    <div class="box-header with-border comment-box">
        <div class="row">
            <div class="col-xs-6">
                <label>first half memo</label>
                <?= $this->Form->control('first_half_memo',['type' => 'textarea', 'class' => 'comment-form', 'label' => false, 'disabled' => $disabled]) ?>
            </div>
            <div class="col-xs-6">
                <label>second half memo</label>
                <?= $this->Form->control('second_half_memo',['type' => 'textarea', 'class' => 'comment-form', 'label' => false, 'disabled' => $disabled]) ?>
            </div>
            <div class="col-xs-12">
                <label>total memo</label>
                <?= $this->Form->control('total_memo',['type' => 'textarea', 'class' => 'comment-form', 'label' => false, 'disabled' => $disabled]) ?>
            </div>
        </div>
    </div>
</div>
