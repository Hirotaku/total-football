<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

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
        $entities = $this->paginate($this->Teams);

        $this->set(compact('entities'));
        $this->set('_serialize', ['entities']);
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
        return $this->redirect(['controller' => 'Leagues', 'action' => 'view', $leagueId]);

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
        $entity = $this->Teams->get($id, [
            'contain' => ['Leagues', 'Players'],
            'Order' => [
                'Players.number' => 'ASC'
            ]
        ]);

        $this->set('entity', $entity);
        $this->set('_serialize', ['entity']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $entity = $this->Teams->newEntity();
        if ($this->request->is('post')) {
            $entity = $this->Teams->patchEntity($entity, $this->request->getData());
            if ($this->Teams->save($entity)) {
                $this->Flash->success(__('The team has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The team could not be saved. Please, try again.'));
        }
        $this->set(compact('entity'));
        $this->set('_serialize', ['entity']);
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
        $entity = $this->Teams->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $entity = $this->Teams->patchEntity($entity, $this->request->getData());
            if ($this->Teams->save($entity)) {
                $this->Flash->success(__('The team has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The team could not be saved. Please, try again.'));
        }
        //マスタをセット
        $this->setMasterOptions();

        $this->set(compact('entity'));
        $this->set('_serialize', ['entity']);
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
        $entity = $this->Teams->get($id);
        if ($this->Teams->delete($entity)) {
            $this->Flash->success(__('The team has been deleted.'));
        } else {
            $this->Flash->error(__('The team could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    private function setMasterOptions()
    {
        $team = TableRegistry::get('Teams');
        $teams = $team->find('list')
            ->select(['id', 'name'])
            ->order(['id' => 'ASC'])
            ->all();
        $league = TableRegistry::get('Leagues');
        $leagues = $league->find('list')
            ->select(['id', 'name'])
            ->order(['id' => 'DESC'])
            ->all();

        $this->set(compact('teams'));
        $this->set(compact('leagues'));
    }

    public function addFavorite($teamId)
    {
        $this->autoRender = false;
        $entity = $this->Teams->get($teamId, [
            'contain' => []
        ]);
        $entity->id = $teamId;
        $entity->favorite = true;
        if ($this->Teams->save($entity)) {
            return $this->redirect(['action' => 'view', $teamId]);
        }
        $this->Flash->error(__('The team could not be saved. Please, try again.'));
    }

    public function outFavorite($teamId)
    {
        $this->autoRender = false;
        $entity = $this->Teams->get($teamId, [
            'contain' => []
        ]);
        $entity->id = $teamId;
        $entity->favorite = false;
        if ($this->Teams->save($entity)) {
            return $this->redirect(['action' => 'view', $teamId]);
        }
        $this->Flash->error(__('The team could not be saved. Please, try again.'));
    }
}
