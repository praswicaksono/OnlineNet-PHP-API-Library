<?php
/**
 * Online - OnlineTest.php
 * Creator: Prasetyo Wicaksono
 * Created on 2/7/14 3:20 PM
 */
namespace Test\OnlineTest;

use Online\Online;

/**
 * Class OnlineTest
 * @package Test\OnlineTest
 */
class OnlineTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var $online
     */
    protected $online;

    /**
     * function testGetToken
     */
    public function testGetToken()
    {

        $this->assertEquals('1234567890', $this->online->getToken());
    }

    /**
     * function testGetApiUrl
     */
    public function testGetApiUrl()
    {

        $this->assertEquals('https://api.online.net/api/v1', $this->online->getApiUrl());
    }

    /**
     * function testGetAbuseNamespace
     */
    public function testGetAbuseNamespace()
    {

        $abuse = $this->online->abuse();
        $this->assertEquals(true, ($abuse instanceof Online));
    }

    /**
     * function testGetNetworkNamespace
     */
    public function testGetNetworkNamespace()
    {

        $network = $this->online->network();
        $this->assertEquals(true, ($network instanceof Online));
    }

    /**
     * function testGetServerNamespace
     */
    public function testGetServerNamespace()
    {

        $server = $this->online->server();
        $this->assertEquals(true, ($server instanceof Online));
    }

    /**
     * function testGetStorageNamespace
     */
    public function testGetStorageNamespace()
    {

        $storage = $this->online->storage();
        $this->assertEquals(true, ($storage instanceof Online));
    }

    /**
     * function testGetUserNamespace
     */
    public function testGetUserNamespace()
    {

        $user = $this->online->user();
        $this->assertEquals(true, ($user instanceof Online));
    }

    /**
     * function setUp
     */
    protected function setUp()
    {

        $this->online = new Online('1234567890');
    }

}