<div class="leagues index large-9 medium-8 columns content">
  <div class="box">
    <div class="box-header">
      <h1 class="box-title title-large"><?= __('Leagues') ?></h1>
    </div>

    <!-- /.box-header -->
    <div class="box-body">
      <table class="table table-bordered table-hover">
        <thead>
        <tr>
          <th scope="col"><?= $this->Paginator->sort('name', __('name')) ?></th>
          <th scope="col"><?= $this->Paginator->sort('code', __('code')) ?></th>
          <th scope="col"><?= $this->Paginator->sort('year', __('year')) ?></th>
          <th scope="col"><?= $this->Paginator->sort('current_matchday', __('current_matchday')) ?></th>
          <th scope="col"><?= $this->Paginator->sort('number_of_teams', __('number_of_teams')) ?></th>
          <th scope="col" class="actions">
          </th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($entities as $entity): ?>
          <tr>
            <td><?= h($entity->name) ?></td>
            <td><?= h($entity->code) ?></td>
            <td><?= h($entity->year) ?></td>
            <td><?= h($entity->current_matchday) ?></td>
            <td><?= h($entity->number_of_teams) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('view'), ['action' => 'view', $entity->id], ['class' => 'btn btn-sm btn-default']) ?>
                <?= $this->Html->link(__('edit'), ['action' => 'edit', $entity->id], ['class' => 'btn btn-sm btn-warning']) ?>
                <?= $this->Form->postLink(__('delete'), ['action' => 'delete', $entity->id], ['class' => 'btn btn-sm btn-danger', 'confirm' => __('削除してもよろしいですか？')]) ?>
            </td>
          </tr>
        <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
    <?= $this->element('pagenator') ?>
</div>
