<?php
/**
 * Online - User.php
 * Creator: Prasetyo Wicaksono
 * Created on 2/3/14 4:17 PM
 */

namespace Online\Command\User;


use Online\Online;

/**
 * Class User
 * @package Online\Command\User
 */
class User extends Online
{
    /**
     * function getUserInfo
     * @return string
     */
    public function getUserInfo()
    {

        $query = self::buildQuery('/user', 'GET');

        return self::execQuery($query);
    }
}
