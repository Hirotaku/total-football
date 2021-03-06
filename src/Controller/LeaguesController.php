<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Leagues Controller
 *
 * @property \App\Model\Table\LeaguesTable $Leagues
 *
 * @method \App\Model\Entity\League[] paginate($object = null, array $settings = [])
 */
class LeaguesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $entities = $this->paginate($this->Leagues);

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
    public function saveApiData()
    {
        //todo : リーグすべての情報を取得
        //データ取得するAPIのURL
        $uri = 'http://api.football-data.org/v1/competitions';
        $apiData = $this->GetApiData->getApi($uri);

        $hasError = false;
        foreach ($apiData as $data) {
            //API取得したデータをカラムに合わせる
            $saveData = $this->Leagues->makeSaveQuery($data);

            //保存
            $id = $saveData['id'];
            $league = $this->Leagues->newEntity();
            //newEntityしたため、id再指定
            $league['id'] = $id;
            $d = $this->Leagues->patchEntity($league, $saveData);
            if (!$this->Leagues->save($d)) {
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
     * @param string|null $id League id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $entity = $this->Leagues->get($id, [
            'contain' => ['Teams']
        ]);

        $this->set(compact('entity'));
        $this->set('_serialize', ['entity']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $entity = $this->Leagues->newEntity();
        if ($this->request->is('post')) {
            $entity = $this->Leagues->patchEntity($entity, $this->request->getData());
            if ($this->Leagues->save($entity)) {
                $this->Flash->success(__('The league has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The league could not be saved. Please, try again.'));
        }
        $this->set(compact('entity'));
        $this->set('_serialize', ['entity']);
    }

    /**
     * Edit method
     *
     * @param string|null $id League id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $entity = $this->Leagues->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $entity = $this->Leagues->patchEntity($entity, $this->request->getData());
            if ($this->Leagues->save($entity)) {
                $this->Flash->success(__('The league has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The league could not be saved. Please, try again.'));
        }
        $this->set(compact('entity'));
        $this->set('_serialize', ['entity']);
    }

    /**
     * Delete method
     *
     * @param string|null $id League id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $entity = $this->Leagues->get($id);
        if ($this->Leagues->delete($entity)) {
            $this->Flash->success(__('The league has been deleted.'));
        } else {
            $this->Flash->error(__('The league could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
