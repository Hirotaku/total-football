<div class="leagues view large-9 medium-8 columns content">
    <h3><?= h($entity->name) ?></h3>
  <div class="box box-warning box-edit">
    <table class="table table-bordered">
        <tr>
          <th scope="row"><?= __('Code') ?></th>
          <td><?= h($entity->code) ?></td>
          <th scope="row"><?= __('Year') ?></th>
          <td><?= h($entity->year) ?></td>
          <th scope="row"><?= __('Current Matchday') ?></th>
          <td><?= h($entity->current_matchday) ?></td>
          <th scope="row"><?= __('Number Of Teams') ?></th>
          <td><?= h($entity->number_of_teams) ?></td>
        </tr>
    </table>
  </div>

  <div class="box box-default box-edit">
        <h4><?= __('Related Teams') ?></h4>
        <?php if (!empty($entity->teams)): ?>
        <table class="table table-bordered table-hover">
            <tr>
              <th scope="col"><?= $this->Paginator->sort('name', __('name')) ?></th>
              <th scope="col"><?= $this->Paginator->sort('code', __('code')) ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($entity->teams as $teams): ?>
            <tr>
              <td>
                <img src="<?= $teams->crest_url?>" width="40" height="40">
                <?= h($teams->name) ?>
              </td>
              <td><?= h($teams->code) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('view'), ['controller' => 'Teams', 'action' => 'view', $teams->id], ['class' => 'btn btn-sm btn-default']) ?>
                    <?= $this->Html->link(__('edit'), ['controller' => 'Teams', 'action' => 'edit', $teams->id], ['class' => 'btn btn-sm btn-warning']) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
