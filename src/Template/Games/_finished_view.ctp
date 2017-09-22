<div class="box-header with-border data-box">
    <h3><?= $game->league->name?></h3>
    <h4><?= $game->date?></h4>
    <h4><?= '第' . $game->matchday . '節' ?></h4>
    <div class="col-xs-12">
        <div class="col-xs-4 col-xs-offset-1">
            <h2 class="home-crest">
              <a href="<?= $this->Url->build(["controller" => "Teams", "action" => "view", $game->home_team->id]); ?>">
                <img src="<?= $game->home_team->crest_url?>" width="50" height="50">
              </a>
              <?= $game->home_team_name?>
            </h2>
        </div>
        <div class="col-xs-2">
            <h1>
                <label><?= $game->goals_home_team . " - " . $game->goals_away_team?></label>
            </h1>
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
    <h4>
        <?= $game->half_goals_home_team . " - " . $game->half_goals_away_team?><br>
        <?= $game->second_half_goals_home_team . " - " . $game->second_half_goals_away_team ?><br>
    </h4>
    <h4><?= h('試合終了') ?></h4>
</div>
