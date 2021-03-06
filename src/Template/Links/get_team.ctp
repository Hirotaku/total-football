<?= $this->Form->create() ?>
<div class="box-header with-border data-box">
  <h2>チーム情報更新</h2>
  <div class="col-xs-12">
    <div class="col-xs-4 col-xs-offset-4">
      <label>リーグ選択</label>
        <?= $this->Form->control('league_id', ['type' => 'select', 'empty' => true, 'label' => false, 'class' => 'form-control select2',]); ?>
    </div>
  </div>
  <div class="col-xs-12">
      <div class="col-xs-4 col-xs-offset-4">
        <?= $this->Form->button('更新', ['class' => 'btn btn-info btn-order-submit']) ?>
      </div>
  </div>
</div>
<?= $this->Form->end() ?>