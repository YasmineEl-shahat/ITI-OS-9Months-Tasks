<?php

namespace TidioLiveChat\TidioSdk;

if (!defined('WPINC')) {
    die('File loaded directly. Exiting.');
}

use TidioLiveChat\Encryption\Exception\DecryptionFailedException;
use TidioLiveChat\Http\Exception\HttpClientException;
use TidioLiveChat\Http\Exception\UnauthorizedResponseException;
use TidioLiveChat\IntegrationState;
use TidioLiveChat\Http\Exception\ErrorResponseException;
use TidioLiveChat\TidioSdk\Dto\ApiCredentialsDto;
use TidioLiveChat\TidioSdk\Exception\CannotIntegrateWithProjectException;
use TidioLiveChat\TidioSdk\Exception\CannotRetrieveAccessTokensException;

class TidioIntegrationService
{
    const TIDIO_WORDPRESS_OAUTH_CLIENT_ID = '8ea883be-28c3-4bfd-9fe2-4091eb38fe08';

    /**
     * @var IntegrationState
     */
    private $integrationState;
    /**
     * @var TidioApiClientFactory
     */
    private $apiClientFactory;

    /**
     * @param IntegrationState $integrationState
     * @param TidioApiClientFactory $apiClientFactory
     */
    public function __construct($integrationState, $apiClientFactory)
    {
        $this->integrationState = $integrationState;
        $this->apiClientFactory = $apiClientFactory;
    }

    /**
     * @param string $refreshToken
     * @throws CannotIntegrateWithProjectException
     */
    public function integrateProject($refreshToken)
    {
        try {
            $apiCredentials = $this->getAccessTokens($refreshToken);
            $apiClient = $this->apiClientFactory->createAuthenticated($apiCredentials->getAccessToken());
            $data = $apiClient->sendPostRequest('/platforms/wordpress/integrate');
        } catch (UnauthorizedResponseException $exception) {
            throw CannotIntegrateWithProjectException::withUnauthorizedErrorCode();
        } catch (ErrorResponseException $exception) {
            if (isset($exception->getResponseData()['error'])) {
                throw CannotIntegrateWithProjectException::withErrorCode($exception->getResponseData()['error']);
            }

            throw CannotIntegrateWithProjectException::withUnknownErrorCode();
        }

        $this->integrationState->integrate(
            $data['projectPublicKey'],
            $apiCredentials->getAccessToken(),
            $apiCredentials->getRefreshToken()
        );
    }

    /**
     * @return ApiCredentialsDto
     * @throws CannotRetrieveAccessTokensException
     */
    public function retrieveAccessTokens()
    {
        if (!$this->integrationState->hasValidAccessTokens()) {
            throw CannotRetrieveAccessTokensException::withAccessTokensNotSetErrorCode();
        }

        try {
            $refreshToken = $this->integrationState->getRefreshToken();
        } catch (DecryptionFailedException $exception) {
            $this->integrationState->markAccessTokensAsInvalid();

            throw CannotRetrieveAccessTokensException::withDecryptionFailedErrorCode();
        }

        try {
            $apiCredentials = $this->getAccessTokens($refreshToken);
        } catch (UnauthorizedResponseException $exception) {
            $this->integrationState->markAccessTokensAsInvalid();

            throw CannotRetrieveAccessTokensException::withInvalidAccessTokensErrorCode();
        } catch (ErrorResponseException $exception) {
            throw CannotRetrieveAccessTokensException::withInvalidResponseErrorCode($exception->getStatusCode());
        } catch (\Exception $exception) {
            throw CannotRetrieveAccessTokensException::withUnknownErrorCode();
        }

        $this->integrationState->updateAccessTokens($apiCredentials->getAccessToken(), $apiCredentials->getRefreshToken());

        return $apiCredentials;
    }

    /**
     * @param string $refreshToken
     * @return ApiCredentialsDto
     * @throws UnauthorizedResponseException
     * @throws ErrorResponseException
     */
    private function getAccessTokens($refreshToken)
    {
        $apiClient = $this->apiClientFactory->create();
        $tokens = $apiClient->sendPostRequest('/platforms/oauth/access_token', [
            'grant_type' => 'refresh_token',
            'client_id' => self::TIDIO_WORDPRESS_OAUTH_CLIENT_ID,
            'refresh_token' => $refreshToken
        ]);

        return new ApiCredentialsDto(
            $tokens['access_token'],
            $tokens['refresh_token']
        );
    }
}
