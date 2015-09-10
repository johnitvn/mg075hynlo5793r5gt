<?php

namespace backend\components;

use Yii;
use yii\base\Component;
use Google_Client;
use Google_Auth_AssertionCredentials;

/**
 * Description of GoogleClient
 *
 * @author john
 */
class GoogleClient extends Component {

    /**
     * @var string
     */
    public $serviceAccountEmail;

    /**
     * Can use  alias or absolute file path
     * @var string 
     */
    public $keyFile;

    /**
     * @var string
     */
    public $appName;

    /**
     *
     * @var array
     */
    public $scopes;

    /**
     * 
     * @var \Google_Client 
     */
    private $_client;

    /**
     * @return \Google_Client
     */
    public function getClient() {
        if ($this->_client == null) {
            $this->_client = new Google_Client();
            $this->_client->setApplicationName($this->appName);
            $key = file_get_contents(Yii::getAlias($this->keyFile));
            $cred = new Google_Auth_AssertionCredentials($this->serviceAccountEmail, $this->scopes, $key);
            $this->_client->setAssertionCredentials($cred);
            if ($this->_client->getAuth()->isAccessTokenExpired()) {
                $this->_client->getAuth()->refreshTokenWithAssertion($cred);
            }
        }
        return $this->_client;
    }

}
