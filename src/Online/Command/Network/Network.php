<?php
/**
 * Online - Network.php
 * Creator: Prasetyo Wicaksono
 * Created on 2/3/14 4:17 PM
 */
namespace Online\Command\Network;


use Online\Online;

/**
 * Class Network
 * @package Online\Command\Network
 */
class Network extends Online
{
    /**
     * function getDdosAlert
     * @param string $targetIp
     * @param int $count
     * @param int $midId
     * @param int $maxId
     * @return string
     */
    public function getDdosAlert($targetIp, $count = 10, $midId = 0, $maxId = 10)
    {

        $query = self::buildQuery(
            '/network/ddos',
            'GET',
            array(
                'target_ip' => $targetIp,
                'count' => $count,
                'max_id' => $maxId,
                'since_id' => $midId
            )
        );

        return self::execQuery($query);
    }

    /**
     * function getDdosAlertDetail
     * @param int $alertId
     * @return string
     */
    public function getDdosAlertDetail($alertId)
    {

        $query = self::buildQuery('/network/ddos/' . $alertId);

        return self::execQuery($query);
    }
}
