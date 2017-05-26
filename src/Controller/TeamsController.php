<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Teams Controller
 *
 * @property \App\Model\Table\TeamsTable $Teams
 *
 * @method \App\Model\Entity\Team[] paginate($object = null, array $settings = [])
 */
class TeamsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $teams = $this->paginate($this->Teams);

        $this->set(compact('teams'));
        $this->set('_serialize', ['teams']);
    }

    /**
     * saveApiData method
     *
     * @param string|null $id Game id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function saveApiData($leagueId)
    {
        //todo : ここは1チームからの目線で見た年間の試合スケジュール情報
        //データ取得するAPIのURL
        //チームidでチームを決定
        $uri = 'http://api.football-data.org/v1/competitions/'. $leagueId .'/teams';
        $apiData = $this->GetApiData->getApi($uri);

        $hasError = false;
        foreach ($apiData->teams as $data) {
            //API取得したデータをカラムに合わせる
            $saveData = $this->Teams->makeSaveQuery($data);

            //保存
            //insertもupdateもあり得る。→いずれにせよ、idを指定する。
            $id = $saveData['id'];
            $team = $this->Teams->newEntity();
            //newEntityしたため、id再指定
            $team['id'] = $id;
            $team['league_id'] = $leagueId;

            $d = $this->Teams->patchEntity($team, $saveData);
            if (!$this->Teams->save($d)) {
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
     * @param string|null $id Team id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $team = $this->Teams->get($id, [
            'contain' => []
        ]);

        $this->set('team', $team);
        $this->set('_serialize', ['team']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $team = $this->Teams->newEntity();
        if ($this->request->is('post')) {
            $team = $this->Teams->patchEntity($team, $this->request->getData());
            if ($this->Teams->save($team)) {
                $this->Flash->success(__('The team has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The team could not be saved. Please, try again.'));
        }
        $this->set(compact('team'));
        $this->set('_serialize', ['team']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Team id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $team = $this->Teams->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $team = $this->Teams->patchEntity($team, $this->request->getData());
            if ($this->Teams->save($team)) {
                $this->Flash->success(__('The team has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The team could not be saved. Please, try again.'));
        }
        $this->set(compact('team'));
        $this->set('_serialize', ['team']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Team id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $team = $this->Teams->get($id);
        if ($this->Teams->delete($team)) {
            $this->Flash->success(__('The team has been deleted.'));
        } else {
            $this->Flash->error(__('The team could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
