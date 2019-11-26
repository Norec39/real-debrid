<?php

namespace RealDebrid\Api;
use RealDebrid\Exception\ActionAlreadyDoneException;
use RealDebrid\Exception\BadRequestException;
use RealDebrid\Exception\BadTokenException;
use RealDebrid\Exception\PermissionDeniedException;
use RealDebrid\Exception\RealDebridException;
use RealDebrid\Exception\UnknownResourceException;
use RealDebrid\Request\Hosts\DomainsRequest;
use RealDebrid\Request\Hosts\HostsRequest;
use RealDebrid\Request\Hosts\RegexRequest;
use RealDebrid\Request\Hosts\StatusRequest;
use stdClass;

/**
 * /hosts namespace
 *
 * Provides a set of methods to checkout the supported hosts, their status, ...
 * @package RealDebrid\Api
 * @author Valentin GOT
 * @license MIT
 * @api
 */
class Hosts extends EndPoint {

    /**
     * Get supported hosts
     *
     * @return stdClass Supported hosts
     * @throws BadTokenException
     * @throws PermissionDeniedException
     * @throws RealDebridException
     * @throws UnknownResourceException
     * @throws ActionAlreadyDoneException
     * @throws BadRequestException
     */
    public function get() {
        return $this->request(new HostsRequest());
    }

    /**
     * Get status of supported hosters or not and their status on competitors
     *
     * @return stdClass Supported hosters status
     * @throws ActionAlreadyDoneException
     * @throws BadRequestException
     * @throws BadTokenException
     * @throws PermissionDeniedException
     * @throws RealDebridException
     * @throws UnknownResourceException
     */
    public function status() {
        return $this->request(new StatusRequest($this->token));
    }

    /**
     * Get all supported links Regex, useful to find supported links inside a document
     *
     * @return array Supported links regex
     * @throws ActionAlreadyDoneException
     * @throws BadRequestException
     * @throws BadTokenException
     * @throws PermissionDeniedException
     * @throws RealDebridException
     * @throws UnknownResourceException
     */
    public function regex() {
        return $this->request(new RegexRequest($this->token));
    }

    /**
     * Get all hoster domains supported on the service
     *
     * @return array All hoster domains
     * @throws ActionAlreadyDoneException
     * @throws BadRequestException
     * @throws BadTokenException
     * @throws PermissionDeniedException
     * @throws RealDebridException
     * @throws UnknownResourceException
     */
    public function domains() {
        return $this->request(new DomainsRequest($this->token));
    }
}