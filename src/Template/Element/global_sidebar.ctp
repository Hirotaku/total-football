<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">MENU</li>
          <li>
            <a href="<?= $this->Url->build(['controller' => 'games', 'action' => 'index']); ?>">
              <span>Game</span>
            </a>
          </li>
            <li>
                <a href="<?= $this->Url->build(['controller' => 'leagues', 'action' => 'index']); ?>">
                <span>League</span>
                </a>
            </li>

            <li class="header">UPDATE</li>
            <li><a href="<?= $this->Url->build(['controller' => 'links', 'action' => 'getGame']); ?>"><i class="fa fa-circle-o text-aqua"></i> <span>試合情報更新</span></a></li>
            <li><a href="<?= $this->Url->build(['controller' => 'links', 'action' => 'getLeague']); ?>"><i class="fa fa-circle-o text-aqua"></i> <span>リーグ情報更新</span></a></li>
            <li><a href="<?= $this->Url->build(['controller' => 'links', 'action' => 'getTeam']); ?>"><i class="fa fa-circle-o text-aqua"></i> <span>チーム情報更新</span></a></li>
            <li><a href="<?= $this->Url->build(['controller' => 'links', 'action' => 'getPlayer']); ?>"><i class="fa fa-circle-o text-aqua"></i> <span>プレイヤー情報更新</span></a></li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
