<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Model\Entity\Game;

/**
 * Games Controller
 *
 * @property \App\Model\Table\GamesTable $Games
 *
 * @method \App\Model\Entity\Game[] paginate($object = null, array $settings = [])
 */
class GamesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Leagues', 'HomeTeams','AwayTeams'],
            'order' => ['Games.id' => 'DESC']
        ];
        $games = $this->paginate($this->Games);

        $this->set(compact('games'));
        $this->set('_serialize', ['games']);
    }

    /**
     * saveApiData method
     *
     * @param string|null $id Game id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function saveApiData($teamId)
    {
        //todo : ここは1チームからの目線で見た年間の試合スケジュール情報
        //データ取得するAPIのURL
        //チームidでチームを決定
        $uri = 'http://api.football-data.org/v1/teams/'. $teamId .'/fixtures';
        $apiData = $this->GetApiData->getApi($uri);

        $hasError = false;
        foreach ($apiData->fixtures as $data) {
        //API取得したデータをカラムに合わせる
        $saveData = $this->Games->makeSaveQuery($data);

        //保存
        //insertもupdateもあり得る。→いずれにせよ、idを指定する。
            $id = $saveData['id'];
            $game = $this->Games->newEntity();
            //newEntityしたため、id再指定
            $game['id'] = $id;
            $d = $this->Games->patchEntity($game, $saveData);
            if (!$this->Games->save($d)) {
                $this->log($id.'not saved');
                $hasError = true;
            }

        }
        if ($hasError) {
            $this->Flash->error(__('Has Error. Please check logs'));
        } else {
            $this->Flash->success(__('saved'));

        }
        return $this->redirect(['action' => 'index']);

    }

    /**
     * View method
     *
     * @param string|null $id Game id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $game = $this->Games->get($id, [
            'contain' => ['Leagues', 'HomeTeams','AwayTeams']
        ]);

        $this->set('game', $game);
        $this->set('_serialize', ['game']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $game = $this->Games->newEntity();
        if ($this->request->is('post')) {
            $game = $this->Games->patchEntity($game, $this->request->getData());
            if ($this->Games->save($game)) {
                $this->Flash->success(__('The game has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The game could not be saved. Please, try again.'));
        }
        $this->set(compact('game'));
        $this->set('_serialize', ['game']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Game id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $game = $this->Games->get($id, [
            'contain' => ['Leagues', 'HomeTeams','AwayTeams']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $game = $this->Games->patchEntity($game, $this->request->getData());
            if ($this->Games->save($game)) {
                $this->Flash->success(__('The game has been saved.'));

                return $this->redirect(['action' => 'view', $id]);
            }
            $this->Flash->error(__('The game could not be saved. Please, try again.'));
        }
        $this->set(compact('game'));
        $this->set('_serialize', ['game']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Game id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $game = $this->Games->get($id);
        if ($this->Games->delete($game)) {
            $this->Flash->success(__('The game has been deleted.'));
        } else {
            $this->Flash->error(__('The game could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
