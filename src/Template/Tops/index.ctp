<section class="content-header">

    <section class="content">
        <h2>
            Pickup Match
            <small></small>
        </h2>
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <p><?= $pickUpGames->league->name?> <?= $pickUpGames->date?></p>
                        <p>
                        <img src="<?= $pickUpGames->home_team->crest_url?>" width="40" height="40">
                        <?= $pickUpGames->home_team_name ." v ".$pickUpGames->away_team_name?>
                        <img src="<?= $pickUpGames->away_team->crest_url?>" width="40" height="40">
                        </p>
                        <p></p>
                    </div>
                    <div class="icon">
<!--                        <i class="ion ion-bag"></i>-->
                    </div>
                    <a href="<?= $this->Url->build(['controller' => 'games', 'action' => 'view', $pickUpGames->id]); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>

        <h2>
            Latest Matches
            <small></small>
        </h2>
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <?php foreach ($latestGames as $latestGame) : ?>
            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <p><?= $latestGame->league->name?> <?= $latestGame->date?></p>
                        <p>
                            <img src="<?= $latestGame->home_team->crest_url?>" width="40" height="40">
                            <?= $latestGame->home_team_name . "   ".
                            $latestGame->goals_home_team . " - " .
                            $latestGame->goals_away_team . "   ".
                            $latestGame->away_team_name?>
                            <img src="<?= $latestGame->away_team->crest_url?>" width="40" height="40">
                        </p>
                        <p></p>
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
