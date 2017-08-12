<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Game Entity
 *
 * @property int $id
 * @property bool $deleted
 * @property \Cake\I18n\FrozenTime $deleted_date
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 */
class Game extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];

    /*
     * 後半ゴール数（ホームチーム）
     *
     */
    public function _getSecondHalfGoalsHomeTeam()
    {
        $secondGoals = $this->_properties['goals_home_team'] - $this->_properties['half_goals_home_team'];

        return $secondGoals;
    }

    /*
     * 後半ゴール数（アウェイチーム）
     *
     */
    protected function _getSecondHalfGoalsAwayTeam()
    {
        $secondGoals = $this->_properties['goals_away_team'] - $this->_properties['half_goals_away_team'];

        return $secondGoals;
    }
}
