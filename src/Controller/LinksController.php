<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Apis Controller
 *
 *
 */
class LinksController extends AppController
{

    public function initialize()
    {
        $this->Games = TableRegistry::get('games');
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
    }

    public function getGame()
    {
        $this->setMasterOptions();

        if ($this->request->is('post')) {
            $this->redirect(['controller' => 'games', 'action' => 'saveApiData', $this->request->data('team_id')]);
        }
    }

    public function getLeague()
    {
        if ($this->request->is('post')) {
            $this->redirect(['controller' => 'leagues', 'action' => 'saveApiData']);
        }
    }

    public function getTeam()
    {
        $this->setMasterOptions();

        if ($this->request->is('post')) {
            $this->redirect(['controller' => 'teams', 'action' => 'saveApiData']);
        }
    }

    public function getPlayer()
    {
        $this->setMasterOptions();

        if ($this->request->is('post')) {
            $this->redirect(['controller' => 'players', 'action' => 'saveApiData', $this->request->data('team_id')]);
        }
    }

    private function setMasterOptions()
    {
        $team = TableRegistry::get('Teams');
        $teams = $team->find('list')
//            ->where(['favorite' => true])
            ->select(['id', 'name'])
            ->order(['favorite' => 'ASC', 'id' => 'ASC'])
            ->toArray();
        $league = TableRegistry::get('Leagues');
        $leagues = $league->find('list')
            ->select(['id', 'name'])
            ->order(['id' => 'DESC'])
            ->toArray();

        $this->set(compact(['teams', 'leagues']));
    }
}
