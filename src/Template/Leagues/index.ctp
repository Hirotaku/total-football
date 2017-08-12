<div class="admins index large-9 medium-8 columns content">
    <div class="col-xs-12">
        <div class="box">
            <h2 class="box-title title-large">　リーグ情報</h2>
            <div class="box-body search-block">
                <?= $this->Form->create(); ?>
                <table class="table search-table table-bordered table-hover">
                    <tbody>
                    <tr>
                        <th><?= 'id' ?></th>
                        <th><?= 'リーグ名' ?></th>
                        <th><?= '年' ?></th>
                        <th><?= $this->Form->button(__('clear'), ['type' => 'button', 'class' => 'btn-reset']); ?></th>
                    </tr>
                    <tr>
                        <td><?= $this->Form->input('id', ['type' => 'number', 'label' => false, 'empty' => true, 'class' => 'form-search']); ?></td>
                        <td><?= $this->Form->input('name', ['label' => false, 'empty' => true, 'class' => 'form-search']); ?></td>
                        <td><?= $this->Form->input('year', ['label' => false, 'empty' => true, 'class' => 'form-search']); ?></td>
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
                        <th scope="col"><?= $this->Paginator->sort('name', 'リーグ名') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('code', '略称') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('year', '年') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('current_matchday', '節数') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('number_of_teams', 'チーム数') ?></th>
                        <th scope="col" class="actions">
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($leagues as $league): ?>
                        <tr>
                            <td><?= h($league->id) ?></td>
                            <td><?= h($league->name) ?></td>
                            <td><?= h($league->code) ?></td>
                            <td><?= h($league->year) ?></td>
                            <td><?= h($league->current_matchday) ?></td>
                            <td><?= h($league->number_of_teams) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('view'), ['action' => 'view', $league->id], ['class' => 'btn btn-default']) ?>
                                <?= $this->Html->link(__('edit'), ['action' => 'edit', $league->id],['class' => 'btn btn-warning']) ?>
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
