<?= $this->Form->create($entity,['class' => 'form-center', 'novalidate' => true]) ?>
<div class="panel panel-default">
    <div class="panel-body">
        <div class="row">
            <div class="col-xs-7">
                <?= $this->Form->control('league_id',['class' => 'form-control']); ?>
            </div>
            <div class="col-xs-7">
                <?= $this->Form->control('name', ['class' => 'form-control form-text form-center']); ?>
            </div>
            <div class="col-xs-7">
                <?= $this->Form->control('code',['class' => 'form-control']); ?>
            </div>
            <div class="col-xs-7">
                <?= $this->Form->control('short_name',['class' => 'form-control']); ?>
            </div>
            <div class="col-xs-7">
                <?= $this->Form->control('crest_url',['class' => 'form-control']); ?>
            </div>
        </div>
    </div>
</div>

<div class="box-footer">
    <?= $this->Form->button(__('submit'),['class' => 'btn btn-info']) ?>
</div>
<?= $this->Form->end() ?>
