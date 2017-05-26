<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Leagues Model
 *
 * @property \Cake\ORM\Association\HasMany $Games
 * @property \Cake\ORM\Association\HasMany $Teams
 *
 * @method \App\Model\Entity\League get($primaryKey, $options = [])
 * @method \App\Model\Entity\League newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\League[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\League|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\League patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\League[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\League findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class LeaguesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('leagues');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Games', [
            'foreignKey' => 'league_id'
        ]);
        $this->hasMany('Teams', [
            'foreignKey' => 'league_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->allowEmpty('name');

        $validator
            ->allowEmpty('code');

        $validator
            ->allowEmpty('year');

        $validator
            ->allowEmpty('current_matchday');

        $validator
            ->allowEmpty('number_of_teams');

        $validator
            ->boolean('deleted')
            ->allowEmpty('deleted');

        $validator
            ->dateTime('deleted_date')
            ->allowEmpty('deleted_date');

        return $validator;
    }

    /**
     * makeSaveQuery
     *
     */
    public function makeSaveQuery($data)
    {
        $saveData = [];
        //値をセット
        $saveData['id'] = $data->id;
        $saveData['name'] = $data->caption;
        $saveData['code'] = $data->league;
        $saveData['year'] = $data->year;
        $saveData['current_matchday'] = $data->currentMatchday;
        $saveData['number_of_teams'] = $data->numberOfTeams;

        return $saveData;
    }
}
