<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit League'), ['action' => 'edit', $league->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete League'), ['action' => 'delete', $league->id], ['confirm' => __('Are you sure you want to delete # {0}?', $league->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Leagues'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New League'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Games'), ['controller' => 'Games', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Game'), ['controller' => 'Games', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Teams'), ['controller' => 'Teams', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Team'), ['controller' => 'Teams', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="leagues view large-9 medium-8 columns content">
    <h3><?= h($league->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($league->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Code') ?></th>
            <td><?= h($league->code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Year') ?></th>
            <td><?= h($league->year) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Current Matchday') ?></th>
            <td><?= h($league->current_matchday) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Number Of Teams') ?></th>
            <td><?= h($league->number_of_teams) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($league->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Deleted Date') ?></th>
            <td><?= h($league->deleted_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($league->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($league->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Deleted') ?></th>
            <td><?= $league->deleted ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Games') ?></h4>
        <?php if (!empty($league->games)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Deleted') ?></th>
                <th scope="col"><?= __('Deleted Date') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Date') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('League Id') ?></th>
                <th scope="col"><?= __('Matchday') ?></th>
                <th scope="col"><?= __('Home Team Id') ?></th>
                <th scope="col"><?= __('Home Team Name') ?></th>
                <th scope="col"><?= __('Away Team Id') ?></th>
                <th scope="col"><?= __('Away Team Name') ?></th>
                <th scope="col"><?= __('Goals Home Team') ?></th>
                <th scope="col"><?= __('Goals Away Team') ?></th>
                <th scope="col"><?= __('Half Goals Home Team') ?></th>
                <th scope="col"><?= __('Half Goals Away Team') ?></th>
                <th scope="col"><?= __('First Half Memo') ?></th>
                <th scope="col"><?= __('Second Half Memo') ?></th>
                <th scope="col"><?= __('Total Memo') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($league->games as $games): ?>
            <tr>
                <td><?= h($games->id) ?></td>
                <td><?= h($games->deleted) ?></td>
                <td><?= h($games->deleted_date) ?></td>
                <td><?= h($games->created) ?></td>
                <td><?= h($games->modified) ?></td>
                <td><?= h($games->date) ?></td>
                <td><?= h($games->status) ?></td>
                <td><?= h($games->league_id) ?></td>
                <td><?= h($games->matchday) ?></td>
                <td><?= h($games->home_team_id) ?></td>
                <td><?= h($games->home_team_name) ?></td>
                <td><?= h($games->away_team_id) ?></td>
                <td><?= h($games->away_team_name) ?></td>
                <td><?= h($games->goals_home_team) ?></td>
                <td><?= h($games->goals_away_team) ?></td>
                <td><?= h($games->half_goals_home_team) ?></td>
                <td><?= h($games->half_goals_away_team) ?></td>
                <td><?= h($games->first_half_memo) ?></td>
                <td><?= h($games->second_half_memo) ?></td>
                <td><?= h($games->total_memo) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Games', 'action' => 'view', $games->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Games', 'action' => 'edit', $games->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Games', 'action' => 'delete', $games->id], ['confirm' => __('Are you sure you want to delete # {0}?', $games->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Teams') ?></h4>
        <?php if (!empty($league->teams)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('League Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Code') ?></th>
                <th scope="col"><?= __('Short Name') ?></th>
                <th scope="col"><?= __('Crest Url') ?></th>
                <th scope="col"><?= __('Deleted') ?></th>
                <th scope="col"><?= __('Deleted Date') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($league->teams as $teams): ?>
            <tr>
                <td><?= h($teams->id) ?></td>
                <td><?= h($teams->league_id) ?></td>
                <td><?= h($teams->name) ?></td>
                <td><?= h($teams->code) ?></td>
                <td><?= h($teams->short_name) ?></td>
                <td><?= h($teams->crest_url) ?></td>
                <td><?= h($teams->deleted) ?></td>
                <td><?= h($teams->deleted_date) ?></td>
                <td><?= h($teams->created) ?></td>
                <td><?= h($teams->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Teams', 'action' => 'view', $teams->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Teams', 'action' => 'edit', $teams->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Teams', 'action' => 'delete', $teams->id], ['confirm' => __('Are you sure you want to delete # {0}?', $teams->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
