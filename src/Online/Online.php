<?php
/**
 * Online - Online.php
 * Creator: Prasetyo Wicaksono
 * Created on 2/3/14 4:17 PM
 */

namespace Online;

use Online\Command\Abuse\Abuse;
use Online\Command\Network\Network;
use Online\Command\Server\Server;
use Online\Command\Storage\Storage;
use Online\Command\User\User;
use RestClient\RestClientInterface;

/**
 * Class Online
 * @package Online
 */
class Online
{

    /**
     * @var $apiUrl string
     */
    protected $apiUrl = 'https://api.online.net/api/v1';
    /**
     * @var $token string
     */
    protected $token;
    /**
     * @var $reqMethod RestClientInterface
     */
    protected $reqMethod;
    /**
     * @var $data array
     */
    protected $data;
    /**
     * @var $httpMethod string
     */
    protected $httpMethod;
    /**
     * @var $auth array
     */
    protected $auth;

    /**
     * @param string $token
     * @param RestClientInterface $reqMethod
     */
    public function __construct($token, RestClientInterface $reqMethod = null)
    {

        $this->token = $token;
        $this->setAuth();
        $this->setReqMethod($reqMethod);
    }

    /**
     * function setAuth
     */
    protected function setAuth()
    {

        $this->auth = array(
            'Authorization: Bearer ' . $this->token,
            'X-Pretty-JSON: 1'
        );
    }

    /**
     * function getReqMethod
     * @return mixed
     */
    public function getReqMethod()
    {

        return $this->reqMethod;
    }

    /**
     * function setReqMethod
     * @param RestClientInterface $reqMethod
     */
    public function setReqMethod(RestClientInterface $reqMethod = null)
    {

        $this->reqMethod = $reqMethod ? : new \RestClient\CurlRestClient();
    }

    /**
     * function getToken
     * @return mixed
     */
    public function getToken()
    {

        return $this->token;
    }

    /**
     * function setToken
     * @param string $token
     */
    public function setToken($token)
    {

        $this->token = $token;
    }

    /**
     * function getApiUrl
     * @return string
     */
    public function getApiUrl()
    {

        return $this->apiUrl;
    }

    /**
     * function setApiUrl
     * @param string $apiUrl
     */
    public function setApiUrl($apiUrl)
    {

        $this->apiUrl = $apiUrl;
    }

    /**
     * function user
     * @return User
     */
    public function user()
    {

        return new User($this->token);
    }

    /**
     * function abuse
     * @return Abuse
     */
    public function abuse()
    {

        return new Abuse($this->token);
    }

    /**
     * function network
     * @return Network
     */
    public function network()
    {

        return new Network($this->token);
    }

    /**
     * function storage
     * @return Storage
     */
    public function storage()
    {

        return new Storage($this->token);
    }

    /**
     * function server
     * @return Server
     */
    public function server()
    {

        return new Server($this->token);
    }

    /**
     * function buildQuery
     * @param string $function
     * @param string $httpMethod
     * @param null $data
     * @return string
     */
    protected function buildQuery($function, $httpMethod = 'GET', $data = null)
    {

        $this->httpMethod = $httpMethod;
        if ($httpMethod == 'GET') {
            $this->data = null;
            if (empty($data)) {
                return $this->apiUrl . $function;
            } else {
                return $this->apiUrl . $function . '?' . http_build_query($data);
            }
        } else {
            if (empty($data)) {
                $this->data = null;
            } else {
                $this->data = $data;
            }

            return $this->apiUrl . $function;
        }
    }

    /**
     * function execQuery
     * @param string $query
     * @return mixed
     */
    protected function execQuery($query)
    {

        return $this->reqMethod->executeQuery($query, $this->httpMethod, $this->auth, $this->data);
    }
}
