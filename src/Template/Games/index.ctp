<div class="admins index large-9 medium-8 columns content">

    <div class="col-xs-12">
        <div class="box">
            <h1 class="box-title title-large">　試合情報</h1>
            <div class="box-body search-block">
                <?= $this->Form->create(); ?>
                <table class="table search-table table-bordered table-hover">
                    <tbody>
                    <tr>
                        <th><?= 'id' ?></th>
                        <th><?= 'ステータス' ?></th>
                        <th><?= 'リーグ' ?></th>
                        <th><?= '節' ?></th>
                        <th><?= 'ホーム' ?></th>
                        <th><?= 'アウェイ' ?></th>
                        <th><?= $this->Form->button(__('clear'), ['type' => 'button', 'class' => 'btn-reset']); ?></th>
                    </tr>
                    <tr>
                        <td><?= $this->Form->input('id', ['type' => 'number', 'label' => false, 'empty' => true, 'class' => 'form-search']); ?></td>
                        <td><?= $this->Form->input('status', ['type' => 'select', 'label' => false, 'empty' => true, 'class' => 'form-search']); ?></td>
                        <td><?= $this->Form->input('league_id', ['type' => 'select', 'label' => false, 'empty' => true, 'class' => 'form-search']); ?></td>
                        <td><?= $this->Form->input('matchday', ['label' => false, 'empty' => true, 'class' => 'form-search']); ?></td>
                        <td><?= $this->Form->input('home_team_id', ['type' => 'select', 'label' => false, 'empty' => true, 'class' => 'form-search']); ?></td>
                        <td><?= $this->Form->input('away_team_id', ['type' => 'select', 'label' => false, 'empty' => true, 'class' => 'form-search']); ?></td>
                        <td><button type="submit" class="btn btn-default"><i class="fa fa-search"><?= __('search')?></i></button></td>
                    </tr>
                    </tbody>
                </table>
                <?= $this->Form->end(); ?>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('status', 'ステータス') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('league_id', 'リーグ') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('matchday', '節') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('home_team_id', 'ホーム') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('away_team_id', 'アウェイ') ?></th>
                        <th scope="col" class="actions">
                                <?= $this->Html->link(__('add'), ['action' => 'add'],['type' => 'button','class' => 'btn btn-primary right']) ?>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($games as $game): ?>
                        <tr>
                            <td><?= h($game->id) ?></td>
                            <td><?= h($game->status) ?></td>
                            <td><?= h($game->league->name) ?></td>
                            <td><?= h($game->matchday) ?></td>
                            <td><?= h($game->home_team->name) ?></td>
                            <td><?= h($game->away_team->name) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('view'), ['action' => 'view', $game->id], ['class' => 'btn btn-default']) ?>
                                <?= $this->Html->link(__('edit'), ['action' => 'edit', $game->id],['class' => 'btn btn-warning']) ?>
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
</div>
