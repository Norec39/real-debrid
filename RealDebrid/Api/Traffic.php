<?php

namespace RealDebrid\Api;
use Carbon\Carbon;
use RealDebrid\Exception\ActionAlreadyDoneException;
use RealDebrid\Exception\BadRequestException;
use RealDebrid\Exception\BadTokenException;
use RealDebrid\Exception\PermissionDeniedException;
use RealDebrid\Exception\RealDebridException;
use RealDebrid\Exception\UnknownResourceException;
use RealDebrid\Request\Traffic\DetailsRequest;
use RealDebrid\Request\Traffic\TrafficRequest;
use stdClass;

/**
 * /traffic namespace
 *
 * Provides a set of methods to retrieve hoster traffic status
 * @package RealDebrid\Api
 * @author Valentin GOT
 * @license MIT
 * @api
 */
class Traffic extends EndPoint {

    /**
     * Get traffic information for limited hosters (limits, current usage, extra packages)
     *
     * @return stdClass Traffic information
     * @throws ActionAlreadyDoneException
     * @throws BadRequestException
     * @throws BadTokenException
     * @throws PermissionDeniedException
     * @throws RealDebridException
     * @throws UnknownResourceException
     */
    public function get() {
        return $this->request(new TrafficRequest($this->token));
    }

    /**
     * Get traffic details on each hoster used during a defined period
     *
     * @param Carbon|null $start Start period, default: a week ago
     * @param Carbon|null $end End period, default: today
     * @return stdClass Traffic details
     * @throws BadTokenException
     * @throws PermissionDeniedException
     * @throws RealDebridException
     * @throws UnknownResourceException
     * @throws ActionAlreadyDoneException
     * @throws BadRequestException
     */
    public function details(Carbon $start = null, Carbon $end = null) {
        return $this->request(new DetailsRequest($this->token, $start, $end));
    }
}