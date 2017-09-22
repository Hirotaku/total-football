<div class="box-header with-border data-box">
    <h3><?= $game->league->name?></h3>
    <h4><?= $game->date?></h4>
    <h4><?= '第' . $game->matchday . '節' ?></h4>
    <div class="col-xs-12">
        <div class="col-xs-4 col-xs-offset-1">
            <h2 class="home-crest">
              <a href="<?= $this->Url->build(["controller" => "Teams", "action" => "view", $game->home_team->id]); ?>">
                <img src="<?= $game->home_team->crest_url?>" width="60" height="60">
              </a>
                <?= $game->home_team_name?>
            </h2>
        </div>
        <div class="col-xs-2">
            <h2><?= " v "?></h2>
        </div>
        <div class="col-xs-4">
            <h2 class="away-crest">
                <?= $game->away_team_name?>
              <a href="<?= $this->Url->build(["controller" => "Teams", "action" => "view", $game->away_team->id]); ?>">
                <img src="<?= $game->away_team->crest_url?>" width="60" height="60">
              </a>
            </h2>
        </div>
    </div>
    <h4><?= h('試合開始前') ?></h4>
</div>
