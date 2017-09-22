<!-- Widget: user widget style 1 -->
<div class="box box-widget widget-user">
  <!-- Add the bg color to the header using any of the bg-* classes -->
  <div class="widget-user-header bg-aqua-active fix-bg-aqua-active">
    <img class="fix-img-circle" src="<?= $entity->crest_url?>" alt="User Avatar" style="float: left">
    <h3 class="widget-user-username widget-text">
        <?= $entity->name ?>
        <?php if ($entity->favorite == true): ?>
          <a href="<?= $this->Url->build(["controller" => "Teams", "action" => "outFavorite", $entity->id]); ?>">
            <i class="fa fa-fw fa-star" style="color: yellow"></i>
          </a>
        <?php else: ?>
          <a href="<?= $this->Url->build(["controller" => "Teams", "action" => "addFavorite", $entity->id]); ?>">
            <i class="fa fa-fw fa-star-o" style="color: white"></i>
          </a>
        <?php endif; ?>
    </h3>
    <h5 class="widget-user-desc widget-text">
        <?= $entity->has('league') ? $entity->league->name : '' ?>
    </h5>
    <h5 class="widget-user-desc widget-text"><?= $entity->code?></h5>
  </div>
  <div class="box-footer">
    <div class="row">
      <div class="col-sm-4 border-right">
        <div class="description-block">
          <h5 class="description-header">UPDATE PLAYER DATA</h5>
          <span class="description-text">
            <?= $this->Html->link(__('update'), ['controller' => 'Players', 'action' => 'saveApiData', $entity->id], ['class' => 'btn btn-sm btn-default']) ?>
          </span>
        </div>
      </div>
      <div class="col-sm-4 border-right">
        <div class="description-block">
          <h5 class="description-header">GAME SCHEDULE</h5>
          <span class="description-text">
            <?= $this->Html->link(__('GO TO SCHEDULE'), ['controller' => 'Games', 'action' => 'teamIndex', $entity->id], ['class' => 'btn btn-sm btn-default']) ?>
          </span>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="description-block">
          <h5 class="description-header">UPDATE GAME DATA</h5>
          <span class="description-text">
            <?php if ($entity->favorite == true): ?>
              <?= $this->Html->link(__('update'), ['controller' => 'Games', 'action' => 'saveApiData', $entity->id], ['class' => 'btn btn-sm btn-default']) ?>
            <img src="">
            <?php else:; ?>
              <?= $this->Html->link(__('ADD'), ['action' => 'addFavorite', $entity->id], ['class' => 'btn btn-sm btn-default']) ?>
            <?php endif; ?>
          </span>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /.widget-user -->

<div class="leagues view large-9 medium-8 columns content">
  <div class="box box-default box-edit">
      <h4><?= __('Players') ?></h4>
      <?php if (!empty($entity->players)): ?>
        <table class="table table-bordered table-hover">
          <tr>
            <th scope="col"><?= __('Number') ?></th>
            <th scope="col"><?= __('Position') ?></th>
            <th scope="col"><?= __('Name') ?></th>
            <th scope="col"><?= __('Nationality') ?></th>
            <th scope="col"><?= __('Birthday') ?></th>
            <th scope="col" class="actions"><?= __('Actions') ?></th>
          </tr>
          <?php foreach ($entity->players as $players): ?>
          <tr>
            <td><?= h($players->number) ?></td>
            <td><?= h($players->position) ?></td>
            <td><?= h($players->name) ?></td>
            <td><?= h($players->nationality) ?></td>
            <td><?= h($players->birthday) ?></td>
            <td class="actions">
                  <?= $this->Html->link(__('view'), ['controller' => 'Players', 'action' => 'view', $players->id], ['class' => 'btn btn-sm btn-default']) ?>
                  <?= $this->Html->link(__('edit'), ['controller' => 'Players', 'action' => 'edit', $players->id], ['class' => 'btn btn-sm btn-warning']) ?>
            </td>
          </tr>
          <?php endforeach; ?>
      </table>
      <?php endif; ?>
  </div>
</div>

<?= $this->Html->css('Teams/view.css'); ?>