<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MENU</li>
            <li class="active">
                <a href="<?= $this->Url->build(['controller' => 'games', 'action' => 'index']); ?>">
                    <i class="fa fa-calendar"></i> <span>Schedule</span>
                    <span class="pull-right-container">
            </span>
                </a>
            </li>
            <li>
                <a href="<?= $this->Url->build(['controller' => 'leagues', 'action' => 'index']); ?>">
                <span>League</span>
                </a>
            </li>
            <li>
                <a href="<?= $this->Url->build(['controller' => 'teams', 'action' => 'index']); ?>">
                    <span>Team</span>
                </a>
            </li>
            <li>
                <a href="<?= $this->Url->build(['controller' => 'players', 'action' => 'index']); ?>">
                    <span>Player</span>
                </a>
            </li>
            <li>

            </li>


            <li class="header">CONFIG</li>
            <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>getLeagueData</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>getTeamData</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>getPlayerData</span></a></li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>