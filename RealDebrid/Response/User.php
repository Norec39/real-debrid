<?php

namespace RealDebrid\Response;
use Carbon\Carbon;
use Exception;

/**
 * User
 *
 * @package RealDebrid\Response
 * @author Valentin GOT
 */
class User extends AbstractResponse {

    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $email;

    /**
     * @var integer
     */
    private $points;

    /**
     * @var string
     */
    private $locale;

    /**
     * @var string
     */
    private $avatar;

    /**
     * @var string
     */
    private $type;

    /**
     * @var integer
     */
    private $premium;

    /**
     * @var Carbon
     */
    private $expiration;

    /**
     * User constructor.
     * @param $json
     * @throws Exception
     */
    public function __construct($json) {
        parent::__construct($json);

        $this->id = $json->id;
        $this->username = $json->username;
        $this->email = $json->email;
        $this->points = $json->points;
        $this->locale = $json->locale;
        $this->avatar = $json->avatar;
        $this->type = $json->type;
        $this->premium = $json->premium;
        $this->expiration = new Carbon($json->expiration);
    }

    public function getId() {
        return $this->id;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPoints() {
        return $this->points;
    }

    public function getLocale() {
        return $this->locale;
    }

    public function getAvatar() {
        return $this->avatar;
    }

    public function getType() {
        return $this->type;
    }

    public function getPremium() {
        return $this->premium;
    }

    public function getExpiration() {
        return $this->expiration;
    }
}