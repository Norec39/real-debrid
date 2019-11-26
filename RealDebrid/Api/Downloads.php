<?php

namespace RealDebrid\Api;

use RealDebrid\Exception\ActionAlreadyDoneException;
use RealDebrid\Exception\BadRequestException;
use RealDebrid\Exception\BadTokenException;
use RealDebrid\Exception\PermissionDeniedException;
use RealDebrid\Exception\RealDebridException;
use RealDebrid\Exception\UnknownResourceException;
use RealDebrid\Request\Downloads\DeleteRequest;
use RealDebrid\Request\Downloads\DownloadsRequest;
use stdClass;

/**
 * /downloads namespace
 *
 * Provides a set of methods to retrieve or delete download information
 * @package RealDebrid\Api
 * @author Valentin GOT
 * @license MIT
 * @api
 */
class Downloads extends EndPoint {

    /**
     * Get user downloads list
     *
     * Warning: You can not use both offset and page at the same time, page is prioritized in case it happens.
     * @param int $page Pagination system
     * @param int $limit Entries returned per page / request (must be within 0 and 100, default: 50)
     * @param int|null $offset Starting offset (must be within 0 and X-Total-Count HTTP header)
     * @return stdClass Downloads list
     * @throws ActionAlreadyDoneException
     * @throws BadRequestException
     * @throws BadTokenException
     * @throws PermissionDeniedException
     * @throws RealDebridException
     * @throws UnknownResourceException
     */
    public function get($page = 1, $limit = 50, $offset = null) {
        return $this->request(new DownloadsRequest($this->token, $page, $limit, $offset));
    }

    /**
     * Delete a link from downloads list
     *
     * @param string $id Download ID
     * @throws ActionAlreadyDoneException
     * @throws BadRequestException
     * @throws BadTokenException
     * @throws PermissionDeniedException
     * @throws RealDebridException
     * @throws UnknownResourceException
     */
    public function delete($id) {
        $this->request(new DeleteRequest($this->token, $id));
    }
}