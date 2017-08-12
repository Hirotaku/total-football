<?= $this->Form->create($game) ?>
<div class="box">
    <div class="box-header with-border comment-box">
        <div class="row">
            <?php if ($this->request->action == 'view'): ?>
            <div class="col-xs-1 col-xs-offset-11">
                <?= $this->Html->link(__('edit'), ['action' => 'edit', $game->id],['class' => 'btn btn-warning right']) ?>
            </div>
            <?php endif; ?>
            <div class="col-xs-4 col-xs-offset-2">
                <label>first half memo</label>
                <?= $this->Form->control('first_half_memo',['type' => 'textarea', 'class' => 'comment-form', 'label' => false, 'disabled' => $disabled]) ?>
            </div>
            <div class="col-xs-4">
                <label>second half memo</label>
                <?= $this->Form->control('second_half_memo',['type' => 'textarea', 'class' => 'comment-form', 'label' => false, 'disabled' => $disabled]) ?>
            </div>
            <div class="col-xs-8 col-xs-offset-2">
                <label>total memo</label>
                <?= $this->Form->control('total_memo',['type' => 'textarea', 'class' => 'comment-form', 'label' => false, 'disabled' => $disabled]) ?>
            </div>
            <?php if ($this->request->action != 'view'): ?>
            <div class="col-xs-12">
                <?= $this->Form->button('save',['class' => 'btn btn-info']) ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?= $this->Form->end() ?>
