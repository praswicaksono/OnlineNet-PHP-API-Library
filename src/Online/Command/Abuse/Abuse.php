<?php
/**
 * Online - Abuse.php
 * Creator: Prasetyo Wicaksono
 * Created on 2/3/14 4:17 PM
 */

namespace Online\Command\Abuse;

use Online\Online;

/**
 * Class Abuse
 * @package Online\Command\Abuse
 */
class Abuse extends Online
{
    /**
     * function getAbuseList
     * @param int $count
     * @param int $minId
     * @param int $maxId
     * @return string
     */
    public function getAbuseList($count = 10, $minId = 0, $maxId = 10)
    {

        $query = self::buildQuery(
            '/abuse',
            'GET',
            array(
                'count' => $count,
                'max_id' => $maxId,
                'since_id' => $minId
            )
        );

        return self::execQuery($query);
    }

    /**
     * function getAbuseDetail
     * @param int $abuseId
     * @return string
     */
    public function getAbuseDetail($abuseId)
    {

        $query = self::buildQuery('/abuse/info/' . $abuseId);

        return self::execQuery($query);
    }

    /**
     * function replyAbuse
     * @param int $abuseId
     * @param string $answer
     * @param string $solution
     * @return string
     */
    public function replyAbuse($abuseId, $answer, $solution)
    {

        $query = self::buildQuery(
            '/abuse/reply',
            'POST',
            array(
                'abuse_id' => $abuseId,
                'answer' => $answer,
                'solution' => $solution
            )
        );

        return self::execQuery($query);
    }
}
