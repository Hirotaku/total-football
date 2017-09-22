<section class="content-header">

    <section class="content">
        <h2>
            Pickup Match
            <small></small>
        </h2>
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <?php foreach ($pickUpGames as $pickUpGame) : ?>
            <div class="col-lg-6 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                      <p><?= $pickUpGame->league->name?> <?= $pickUpGame->date?></p>
                      <div class="row" style="text-align: center">
                        <div class="col-sm-1">
                          <img src="<?= $pickUpGame->home_team->crest_url?>" width="40" height="40">
                        </div>
                        <div class="col-sm-4">
                          <p><?= $pickUpGame->home_team_name ?></p>
                        </div>
                        <div class="col-sm-2">
                          <p><?= ' v ' ?></p>
                        </div>
                        <div class="col-sm-4">
                          <p><?= $pickUpGame->away_team_name ?></p>
                        </div>
                        <div class="col-sm-1" style="padding-left: 0px; margin-left: -10px">
                          <img src="<?= $pickUpGame->away_team->crest_url?>" width="40" height="40">
                        </div>
                      </div>
                </div>
                    <div class="icon">
                    </div>
                    <a href="<?= $this->Url->build(['controller' => 'games', 'action' => 'view', $pickUpGame->id]); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <h2>
            Latest Matches
            <small></small>
        </h2>
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <?php foreach ($latestGames as $latestGame) : ?>
            <div class="col-lg-6 col-xs-6" style="height: 160px">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <p><?= $latestGame->league->name?> <?= $latestGame->date?></p>
                      <div class="row" style="text-align: center">
                        <div class="col-sm-1">
                          <img src="<?= $latestGame->home_team->crest_url?>" width="40" height="40">
                        </div>
                        <div class="col-sm-4">
                          <p><?= $latestGame->home_team_name ?></p>
                        </div>
                        <div class="col-sm-2">
                          <p><?= $latestGame->goals_home_team . " - " . $latestGame->goals_away_team ?></p>
                        </div>
                        <div class="col-sm-4">
                          <p><?= $latestGame->away_team_name ?></p>
                        </div>
                        <div class="col-sm-1" style="padding-left: 0px; margin-left: -10px">
                          <img src="<?= $latestGame->away_team->crest_url?>" width="40" height="40">
                        </div>
                      </div>
                    </div>
                    <div class="icon">
                        <!--                        <i class="ion ion-bag"></i>-->
                    </div>
                    <a href="<?= $this->Url->build(['controller' => 'games', 'action' => 'view', $latestGame->id]); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </section>

</section>
