<?php
/**
 * Online - Storage.php
 * Creator: Prasetyo Wicaksono
 * Created on 2/3/14 1:12 PM
 */

namespace Online\Command\Storage;


use Online\Online;

/**
 * Class Storage
 * @package Online\Command\Storage
 */
class Storage extends Online
{
    /**
     * function getRpnRsyncBackup
     * @return mixed
     */
    public function getRpnRsyncBackup()
    {

        $query = self::buildQuery('/storage/rpn/rsync');

        return self::execQuery($query);
    }

    /**
     * function editRpnRsyncBackup
     * @param string $name
     * @param string $password
     * @return mixed
     */
    public function editRpnRsyncBackup($name, $password = 'default')
    {

        $query = self::buildQuery(
            '/storage/rpn/rsync/edit',
            'POST',
            array(
                'name' => $name,
                'password' => $password
            )
        );

        return self::execQuery($query);
    }

    /**
     * function getRpnSan
     * @return mixed
     */
    public function getRpnSan()
    {

        $query = self::buildQuery('/storage/rpn/san');

        return self::execQuery($query);
    }

    /**
     * function addServerToRpnSan
     * @param string $iqnSuffix
     * @param int $serverId
     * @return mixed
     */
    public function addServerToRpnSan($iqnSuffix, $serverId)
    {

        $query = self::buildQuery(
            '/storage/rpn/san/addServer',
            'POST',
            array(
                'iqn_suffix' => $iqnSuffix,
                'server_id' => $serverId
            )
        );

        return self::execQuery($query);
    }

    /**
     * function removeServerInRpnSan
     * @param string $iqnSuffix
     * @param int $serverId
     * @return mixed
     */
    public function removeServerInRpnSan($iqnSuffix, $serverId)
    {

        $query = self::buildQuery(
            '/storage/rpn/san/removeServer',
            'POST',
            array(
                'iqn_suffix' => $iqnSuffix,
                'server_id' => $serverId
            )
        );

        return self::execQuery($query);
    }
}
