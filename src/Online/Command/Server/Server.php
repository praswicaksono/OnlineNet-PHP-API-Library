<?php
/**
 * Online - Server.php
 * Creator: Prasetyo Wicaksono
 * Created on 2/3/14 1:28 PM
 */

namespace Online\Command\Server;


use Online\Online;

/**
 * Class Server
 * @package Online\Command\Server
 */
class Server extends Online
{
    /**
     * function getAllServerId
     * @return array
     */
    public function getAllServerId()
    {

        $query = self::buildQuery('/server');
        $ids = json_decode(self::execQuery($query));

        foreach ($ids as $id) {
            $var = explode('/', $id->{'$ref'});
            $result[] = $var[4];
        }

        return $result;
    }

    /**
     * function getServerDetail
     * @param int $serverId
     * @return mixed
     */
    public function getServerDetail($serverId)
    {

        $query = self::buildQuery('/server/' . $serverId);

        return self::execQuery($query);
    }

    /**
     * function editServerHostname
     * @param int $serverId
     * @param string $hostname
     * @return mixed
     */
    public function editServerHostname($serverId, $hostname = 'default')
    {

        self::setHeader(
            array(
                'Content-Length: ' . strlen($hostname)
            )
        );

        $query = self::buildQuery(
            '/server/' . $serverId,
            'PUT',
            array(
                'hostname' => $hostname
            )
        );

        return self::execQuery($query);
    }

    /**
     * function createBmcSession
     * @param string $serverId
     * @param string $authorizationIP
     * @return mixed
     */
    public function createBmcSession($serverId, $authorizationIP)
    {

        $query = self::buildQuery(
            '/server/bmc/session',
            'POST',
            array(
                'server_id' => $serverId,
                'ip' => $authorizationIP
            )
        );

        return self::execQuery($query);
    }

    /**
     * function deleteBmcSession
     * @param string $sessionId
     * @return mixed
     */
    public function deleteBmcSession($sessionId)
    {

        $query = self::buildQuery('/server/bmc/session/' . $sessionId, 'DELETE');

        return self::execQuery($query);
    }

    /**
     * function getBmcSessionDetail
     * @param string $sessionId
     * @return mixed
     */
    public function getBmcSessionDetail($sessionId)
    {

        $query = self:: buildQuery('/server/bmc/session/' . $sessionId);

        return self::execQuery($query);
    }

    /**
     * function bootServerNormal
     * @param int $serverId
     * @return mixed
     */
    public function bootServerNormal($serverId)
    {

        $query = self::buildQuery('/server/boot/normal/' . $serverId, 'POST');

        return self::execQuery($query);
    }

    /**
     * function bootServerRescue
     * @param int $serverId
     * @return mixed
     */
    public function bootServerRescue($serverId)
    {

        $query = self::buildQuery('/server/boot/rescue/' . $serverId, 'POST');

        return self::execQuery($query);
    }

    /**
     * function bootServerTest
     * @param int $serverId
     * @return mixed
     */
    public function bootServerTest($serverId)
    {

        $query = self::buildQuery('/server/boot/test/' . $serverId, 'POST');

        return self::execQuery($query);
    }

    /**
     * function rebootServer
     * @param int $serverId
     * @return mixed
     */
    public function rebootServer($serverId)
    {

        $query = self::buildQuery('/server/reboot/' . $serverId, 'POST');

        return self::execQuery($query);
    }

    /**
     * function enableHardwareWatch
     * @param int $serverId
     * @return mixed
     */
    public function enableHardwareWatch($serverId)
    {

        $query = self::buildQuery('/server/hardwareWatch/enable/' . $serverId, 'POST');

        return self::execQuery($query);
    }

    /**
     * function disableHardwareWatch
     * @param int $serverId
     * @return mixed
     */
    public function disableHardwareWatch($serverId)
    {

        $query = self::buildQuery('/server/hardwareWatch/disable/' . $serverId, 'POST');

        return self::execQuery($query);
    }

    /**
     * function getRescueImages
     * @param int $serverId
     * @return mixed
     */
    public function getRescueImages($serverId)
    {

        $query = self::buildQuery('/server/rescue_images/' . $serverId, 'POST');

        return self::execQuery($query);
    }

    /**
     * function getBackupServer
     * @param int $serverId
     * @return mixed
     */
    public function getBackupServer($serverId)
    {

        $query = self::buildQuery(
            '/server/backup',
            'GET',
            array(
                'server_id' => $serverId
            )
        );

        return self::execQuery($query);
    }

    /**
     * function editBackupServer
     * @param int $serverId
     * @param string $password
     * @param bool $autoLogin
     * @param bool $acl
     * @return mixed
     */
    public function editBackupServer($serverId, $password = 'default', $autoLogin = true, $acl = false)
    {

        $query = self::buildQuery(
            '/server/backup/edit',
            'POST',
            array(
                'server_id' => $serverId,
                'password' => $password,
                'autologin' => $autoLogin,
                'acl_enabled' => $acl
            )
        );

        return self::execQuery($query);
    }

    /**
     * function getFailoverIp
     * @return mixed
     */
    public function getFailoverIp()
    {

        $query = self::buildQuery('/server/failover');

        return self::execQuery($query);
    }

    /**
     * function deleteFailoverMac
     * @param string $failoverIp
     * @return mixed
     */
    public function deleteFailoverMac($failoverIp)
    {

        $query = self::buildQuery(
            '/server/failover/deleteMac',
            'POST',
            array(
                'address' => $failoverIp
            )
        );

        return self::execQuery($query);
    }

    /**
     * function editFailoverIp
     * @param string $failoverIp
     * @param string $destination
     * @return mixed
     */
    public function editFailoverIp($failoverIp, $destination)
    {

        $query = self::buildQuery(
            '/server/failover/edit',
            'POST',
            array(
                'source' => $failoverIp,
                'destination' => $destination
            )
        );

        return self::execQuery($query);
    }

    /**
     * function generateMac
     * @param string $failoverIp
     * @param string $type
     * @return mixed|string
     */
    public function generateMac($failoverIp, $type)
    {

        if (!($type == 'vmware' || $type == 'kvm' || $type == 'xen')) {
            return "Invalid mac type";
        }

        $query = self::buildQuery(
            '/server/failover/generateMac',
            'POST',
            array(
                'source' => $failoverIp,
                'type' => $type
            )
        );

        return self::execQuery($query);
    }

    /**
     * function editIp
     * @param string $ip
     * @param string $reverse
     * @param null $destination
     * @return mixed
     */
    public function editIp($ip, $reverse, $destination = null)
    {

        $query = self::buildQuery(
            '/server/ip',
            'POST',
            array(
                'address' => $ip,
                'reverse' => $reverse,
                'destination' => $destination
            )
        );

        return self::execQuery($query);
    }
}
