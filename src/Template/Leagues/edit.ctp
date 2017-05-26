<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $league->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $league->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Leagues'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Games'), ['controller' => 'Games', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Game'), ['controller' => 'Games', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Teams'), ['controller' => 'Teams', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Team'), ['controller' => 'Teams', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="leagues form large-9 medium-8 columns content">
    <?= $this->Form->create($league) ?>
    <fieldset>
        <legend><?= __('Edit League') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('code');
            echo $this->Form->control('year');
            echo $this->Form->control('current_matchday');
            echo $this->Form->control('number_of_teams');
            echo $this->Form->control('deleted');
            echo $this->Form->control('deleted_date');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
