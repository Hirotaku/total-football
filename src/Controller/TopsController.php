<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Tops Controller
 *
 * @property \App\Model\Table\TopsTable $Tops
 *
 * @method \App\Model\Entity\Game[] paginate($object = null, array $settings = [])
 */
class TopsController extends AppController
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
//        $games = $this->paginate($this->Games);
        //最新試合前
        $pickUpGames = $this->Games->find()
            ->Where(['status' => 'TIMED'])
            ->Order(['date' => 'DESC'])
            ->Contain(['Leagues','HomeTeams','AwayTeams'])
            ->first();

        //直近3試合取得
        $latestGames = $this->Games->find()
            ->Where(['status' => 'FINISHED'])
            ->Order(['date' => 'DESC'])
            ->Contain(['Leagues','HomeTeams','AwayTeams'])
            ->limit(3)
            ->all();

        $this->set(compact('pickUpGames','latestGames'));
        $this->set('_serialize', ['games']);
    }
}