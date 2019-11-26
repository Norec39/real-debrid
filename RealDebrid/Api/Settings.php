<?php

namespace RealDebrid\Api;
use RealDebrid\Exception\ActionAlreadyDoneException;
use RealDebrid\Exception\BadRequestException;
use RealDebrid\Exception\BadTokenException;
use RealDebrid\Exception\PermissionDeniedException;
use RealDebrid\Exception\RealDebridException;
use RealDebrid\Exception\UnknownResourceException;
use RealDebrid\Request\Settings\AvatarDeleteRequest;
use RealDebrid\Request\Settings\AvatarFileRequest;
use RealDebrid\Request\Settings\ChangePasswordRequest;
use RealDebrid\Request\Settings\ConvertPointsRequest;
use RealDebrid\Request\Settings\DisableLogsRequest;
use RealDebrid\Request\Settings\SettingsRequest;
use RealDebrid\Request\Settings\UpdateRequest;
use stdClass;

/**
 * /settings namespace
 *
 * Provides a set of methods to retrieve or update your Real-Debrid settings
 * @package RealDebrid\Api
 * @author Valentin GOT
 * @license MIT
 * @api
 */
class Settings extends EndPoint {

    /**
     * The download port setting
     */
    const DOWNLOAD_PORT = 'download_port';

    /**
     * The Real-Debrid locale
     */
    const LOCALE = 'locale';

    /**
     * The streaming language preference
     */
    const STREAMING_LANGUAGE_PREFERENCE = 'streaming_language_preference';

    /**
     * The streaming quality preference
     */
    const STREAMING_QUALITY = 'streaming_quality';

    /**
     * The streaming quality preference (on mobiles)
     */
    const MOBILE_STREAMING_QUALITY = 'mobile_streaming_quality';

    /**
     * The streaming cast audio preference
     */
    const STREAMING_CAST_AUDIO_PREFERENCE = 'streaming_cast_audio_preference';

    /**
     * Get current user settings with possible values to update
     *
     * @return stdClass Current user settings
     * @throws BadTokenException
     * @throws PermissionDeniedException
     * @throws RealDebridException
     * @throws UnknownResourceException
     * @throws ActionAlreadyDoneException
     * @throws BadRequestException
     */
    public function get() {
        return $this->request(new SettingsRequest($this->token));
    }

    /**
     * Update a user setting
     *
     * @param string $name Setting name (class constants)
     * @param string $value Possible values are available in /settings
     * @throws BadTokenException
     * @throws PermissionDeniedException
     * @throws RealDebridException
     * @throws UnknownResourceException
     * @throws ActionAlreadyDoneException
     * @throws BadRequestException
     */
    public function update($name, $value) {
        $this->request(new UpdateRequest($this->token, $name, $value));
    }

    /**
     * @throws ActionAlreadyDoneException
     * @throws BadRequestException
     * @throws BadTokenException
     * @throws PermissionDeniedException
     * @throws RealDebridException
     * @throws UnknownResourceException
     */
    public function convertPoints() {
        $this->request(new ConvertPointsRequest($this->token));
    }

    /**
     * @throws ActionAlreadyDoneException
     * @throws BadRequestException
     * @throws BadTokenException
     * @throws PermissionDeniedException
     * @throws RealDebridException
     * @throws UnknownResourceException
     */
    public function disableLogs() {
        $this->request(new DisableLogsRequest($this->token));
    }

    /**
     * @throws ActionAlreadyDoneException
     * @throws BadRequestException
     * @throws BadTokenException
     * @throws PermissionDeniedException
     * @throws RealDebridException
     * @throws UnknownResourceException
     */
    public function changePassword() {
        $this->request(new ChangePasswordRequest($this->token));
    }

    /**
     * Upload a new user avatar image
     *
     * @param string $path Path to the avatar file
     * @throws BadTokenException
     * @throws PermissionDeniedException
     * @throws RealDebridException
     * @throws UnknownResourceException
     * @throws ActionAlreadyDoneException
     * @throws BadRequestException
     */
    public function addAvatar($path) {
        $this->request(new AvatarFileRequest($this->token, $path));
    }

    /**
     * @throws ActionAlreadyDoneException
     * @throws BadRequestException
     * @throws BadTokenException
     * @throws PermissionDeniedException
     * @throws RealDebridException
     * @throws UnknownResourceException
     */
    public function deleteAvatar() {
        $this->request(new AvatarDeleteRequest($this->token));
    }
}