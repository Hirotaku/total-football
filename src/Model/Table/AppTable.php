<?php
namespace App\Model\Table;
use Cake\Datasource\EntityInterface;
use Cake\Datasource\Exception\InvalidPrimaryKeyException;
use Cake\Network\Exception\MethodNotAllowedException;
use Cake\ORM\Entity;
use Cake\ORM\Table;
use Cake\ORM\Query;
use Cake\ORM\Rule\ExistsIn;
use Cake\Validation\Validation;
/**
 * AppTable
 */
abstract class AppTable extends Table
{
    /**
     * initialize
     * @author hirosawa
     * @param array $config
     */
    public function initialize(array $config)
    {
        parent::initialize($config);
        // Config PrimaryKey
        $this->primaryKey('id');
        // Add Behaviors
        $this->addBehavior('Timestamp');
        // Add Behavior (Finder)
        $this->addBehavior('Reincarnation.SoftDelete');
    }

    /**
     * fetchSelfLinkId
     * 自身のidをリンクから取り出す（試合、リーグ、チームそれぞれ）
     * @author hirosawa
     */
   /* public function fetchSelfLinkId($data,$type) {
        $selfLink = strstr($data->_links->self->href, 'fixtures/',false);
        $selfId = intval(str_replace('fixtures/','',$selfLink));

        return $selfId;
    }*/

    /**
     * fetchGameLinkId
     * 試合のidをリンクから取り出す(gamesからの参照時のみ使用可能)
     * @author hirosawa
     */
    public function fetchGameLinkId($data) {
        $selfLink = strstr($data->_links->self->href, 'fixtures/',false);
        $selfId = intval(str_replace('fixtures/','',$selfLink));

        return $selfId;
    }

    /**
     * fetchLeagueLinkId
     * リーグのidをリンクから取り出す
     * @author hirosawa
     */
    public function fetchLeagueLinkId($data) {
        $selfLink = strstr($data->_links->competition->href, 'competitions/',false);
        $selfId = intval(str_replace('competitions/','',$selfLink));

        return $selfId;
    }

    /**
     * fetchTeamLinkId
     * チームのidをリンクから取り出す
     * @author hirosawa
     */
    public function fetchTeamLinkId($data) {
        $selfLink = strstr($data->_links->team->href, 'teams/',false);
        $selfId = intval(str_replace('teams/','',$selfLink));

        return $selfId;
    }

    /**
     * fetchHomeTeamLinkId
     * ホームチームのidをリンクから取り出す
     * @author hirosawa
     */
    public function fetchHomeTeamLinkId($data) {
        $selfLink = strstr($data->_links->homeTeam->href, 'teams/',false);
        $selfId = intval(str_replace('teams/','',$selfLink));

        return $selfId;
    }

    /**
     * fetchAwayTeamLinkId
     * アウェイチームのidをリンクから取り出す
     * @author hirosawa
     */
    public function fetchAwayTeamLinkId($data) {
        $selfLink = strstr($data->_links->awayTeam->href, 'teams/',false);
        $selfId = intval(str_replace('teams/','',$selfLink));

        return $selfId;
    }

    /**
     * fetchPlayerLinkId
     * プレイヤーのidをリンクから取り出す
     * @author hirosawa
     */
    public function fetchPlayerLinkId($data) {
        $selfLink = strstr($data->_links->self->href, 'fixtures/',false);
        $selfId = intval(str_replace('fixtures/','',$selfLink));

        return $selfId;
    }
}