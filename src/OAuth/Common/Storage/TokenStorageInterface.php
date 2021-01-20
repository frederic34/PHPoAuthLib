<?php

namespace OAuth\Common\Storage;

use OAuth\Common\Token\TokenInterface;
use OAuth\Common\Storage\Exception\TokenNotFoundException;

/**
 * All token storage providers must implement this interface.
 */
interface TokenStorageInterface
{
    /**
     * Function to retrieve access token
     *
     * @param string $service   service name
     *
     * @return TokenInterface
     *
     * @throws TokenNotFoundException
     */
    public function retrieveAccessToken($service);

    /**
     * @param string         $service   service name
     * @param TokenInterface $token     token
     *
     * @return TokenStorageInterface
     */
    public function storeAccessToken($service, TokenInterface $token);

    /**
     * @param string $service   service name
     *
     * @return bool
     */
    public function hasAccessToken($service);

    /**
     * Delete the users token. Aka, log out.
     *
     * @param string $service   service name
     *
     * @return TokenStorageInterface
     */
    public function clearToken($service);

    /**
     * Delete *ALL* user tokens. Use with care. Most of the time you will likely
     * want to use clearToken() instead.
     *
     * @return TokenStorageInterface
     */
    public function clearAllTokens();

    /**
     * Store the authorization state related to a given service.
     *
     * @param string $service   service name
     * @param string $state     state of authorization
     *
     * @return TokenStorageInterface
     */
    public function storeAuthorizationState($service, $state);

    /**
     * Check if an authorization state for a given service exists.
     *
     * @param string $service   service name
     *
     * @return bool
     */
    public function hasAuthorizationState($service);

    /**
     * Retrieve the authorization state for a given service.
     *
     * @param string $service   service name
     *
     * @return string
     */
    public function retrieveAuthorizationState($service);

    /**
     * Clear the authorization state of a given service.
     *
     * @param string $service   service name
     *
     * @return TokenStorageInterface
     */
    public function clearAuthorizationState($service);

    /**
     * Delete *ALL* user authorization states. Use with care. Most of the time you will likely
     * want to use clearAuthorization() instead.
     *
     * @return TokenStorageInterface
     */
    public function clearAllAuthorizationStates();
}
