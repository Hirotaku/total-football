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
        //最新試合前
        $pickUpGames = $this->Games->find()
            ->Where([
                'Games.status' => 'TIMED',
                'OR' => [
                    'HomeTeams.favorite' => true,
                    'AwayTeams.favorite' => true,
                ]
            ])
            ->Order(['date' => 'DESC'])
            ->Contain(['Leagues','HomeTeams','AwayTeams'])
            ->limit(2)
            ->all();

        //直近6試合取得
        $latestGames = $this->Games->find()
            ->Where([
                'Games.status' => 'FINISHED',
                'OR' => [
                    'HomeTeams.favorite' => true,
                    'AwayTeams.favorite' => true,
                ]
            ])
            ->Order(['date' => 'DESC'])
            ->Contain(['Leagues','HomeTeams','AwayTeams'])
            ->limit(6)
            ->all();

        $this->set(compact('pickUpGames','latestGames'));
        $this->set('_serialize', ['games']);
    }
}
