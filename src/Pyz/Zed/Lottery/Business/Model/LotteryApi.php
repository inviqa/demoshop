<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Lottery\Business\Model;

use Generated\Shared\Transfer\LotteryApiResponseTransfer;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;

class LotteryApi implements LotteryApiInterface
{

    /**
     * @var \GuzzleHttp\Client
     */
    protected $client;

    /**
     * @var string
     */
    protected $url;

    /**
     * @param \GuzzleHttp\Client $client
     * @param string $url
     */
    public function __construct(Client $client, $url)
    {
        $this->client = $client;
        $this->url = $url;
    }

    /**
     * @param string $firstName
     * @param string $lastName
     * @param string $email
     *
     * @return \Generated\Shared\Transfer\LotteryApiResponseTransfer
     */
    public function call($firstName, $lastName, $email)
    {
        $requestData = $this->buildRequestData($firstName, $lastName, $email);
        $response = $this->client->request('POST', $this->url, $requestData);

        return $this->buildApiResponse($response);
    }


    /**
     * @param \GuzzleHttp\Psr7\Response $response
     *
     * @return \Generated\Shared\Transfer\LotteryApiResponseTransfer
     */
    protected function buildApiResponse(Response $response)
    {
        $lotteryApiResponseTransfer = new LotteryApiResponseTransfer();
        $lotteryApiResponseTransfer->setStatus('error');

        if ($response->getStatusCode() === 200) {
            $responseData = $this->getResultDataFromResponse($response);
            $lotteryApiResponseTransfer->setStatus($responseData['status']);
            $lotteryApiResponseTransfer->setDescription($responseData['description']);
        }

        return $lotteryApiResponseTransfer;
    }

    /**
     * @param string $firstName
     * @param string $lastName
     * @param string $email
     *
     * @return array
     */
    protected function buildRequestData($firstName, $lastName, $email)
    {
        return [
            'form_params' => [
                'first_name' => $firstName,
                'last_name' => $lastName,
                'email' => $email,
            ]
        ];
    }

    /**
     * @param \GuzzleHttp\Psr7\Response $response
     *
     * @return array
     */
    protected function getResultDataFromResponse(Response $response)
    {
        $jsonResponse = $response->getBody()->getContents();
        $responseData = json_decode($jsonResponse, true);

        return $responseData['result'];
    }

}
