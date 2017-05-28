<?php
namespace App\Model\Table;

use App\Model\Table\AppTable;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Games Model
 *
 * @method \App\Model\Entity\Game get($primaryKey, $options = [])
 * @method \App\Model\Entity\Game newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Game[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Game|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Game patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Game[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Game findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class GamesTable extends AppTable
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

        $this->setTable('games');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        //relations
        $this->belongsTo('Leagues', ['foreignKey' => 'league_id']);
        $this->belongsTo('HomeTeams', ['className' => 'Teams','foreignKey' => 'home_team_id', 'propertyName' => 'home_team']);
        $this->belongsTo('AwayTeams', ['className' => 'Teams','foreignKey' => 'away_team_id', 'propertyName' => 'away_team']);

        $this->addBehavior('Timestamp');
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
            //自身のidの取り出し
            $selfId = $this->fetchGameLinkId($data);
            $saveData['id'] = $selfId;
            //league_idの取り出し
            $leagueId = $this->fetchLeagueLinkId($data);
            $saveData['league_id'] = $leagueId;
            //home_team_idの取り出し
            $homeId = $this->fetchHomeTeamLinkId($data);
            $saveData['home_team_id'] = $homeId;
            //away_team_idの取り出し
            $awayId = $this->fetchAwayTeamLinkId($data);
            $saveData['away_team_id'] = $awayId;

            //値をセット
            $saveData['date'] = $data->date;
            $saveData['status'] = $data->status;
            $saveData['matchday'] = $data->matchday;
            $saveData['home_team_name'] = $data->homeTeamName;
            $saveData['away_team_name'] = $data->awayTeamName;
            $saveData['goals_home_team'] = $data->result->goalsHomeTeam;
            $saveData['goals_away_team'] = $data->result->goalsAwayTeam;
            //上手く取れない。。
//            $saveData['half_goals_home_team'] = $data->result->halfTime->goalsHomeTeam;
//            $saveData['half_goals_away_team'] = $data->result->halfTime->goalsAwayTeam;

        return $saveData;
    }
}
