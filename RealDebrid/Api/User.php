<?php

namespace RealDebrid\Api;

use RealDebrid\Exception\ActionAlreadyDoneException;
use RealDebrid\Exception\BadRequestException;
use RealDebrid\Exception\BadTokenException;
use RealDebrid\Exception\PermissionDeniedException;
use RealDebrid\Exception\RealDebridException;
use RealDebrid\Exception\UnknownResourceException;
use RealDebrid\Request\User\UserRequest;
use RealDebrid\Response\Handlers\User\UserHandler;

/**
 * /user namespace
 *
 * Provides a set of methods to retrieve some information about a Real-Debrid user
 * @package RealDebrid\Api
 * @author Valentin GOT
 * @license MIT
 * @api
 */
class User extends EndPoint {

    /**
     * Returns some information on the current user.
     *
     * @return \RealDebrid\Response\User Some information on the current user
     * @throws BadTokenException
     * @throws PermissionDeniedException
     * @throws RealDebridException
     * @throws UnknownResourceException
     * @throws ActionAlreadyDoneException
     * @throws BadRequestException
     */
    public function get() {
        return $this->request(new UserRequest($this->token), new UserHandler());
    }
}