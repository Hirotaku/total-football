<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * League Entity
 *
 * @property int $id
 * @property string $name
 * @property string $code
 * @property string $year
 * @property string $current_matchday
 * @property string $number_of_teams
 * @property bool $deleted
 * @property \Cake\I18n\FrozenTime $deleted_date
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Game[] $games
 * @property \App\Model\Entity\Team[] $teams
 */
class League extends Entity
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
}
