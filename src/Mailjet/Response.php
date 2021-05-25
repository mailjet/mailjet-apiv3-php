<?php

declare(strict_types=1);

/*
 * Copyright (C) 2013 Mailgun
 *
 * This software may be modified and distributed under the terms
 * of the MIT license. See the LICENSE file for details.
 */

namespace Mailjet;

use Psr\Http\Message\ResponseInterface;

class Response
{
    /**
     * @var int
     */
    private $status;

    /**
     * @var bool
     */
    private $success;

    /**
     * @var array
     */
    private $body = [];

    /**
     * @var ResponseInterface
     */
    private $rawResponse;

    /**
     * @var Request
     */
    private $request;

    /**
     * Construct a Mailjet response.
     *
     * @param Request           $request  Mailjet actual request
     * @param ResponseInterface $response Guzzle response
     */
    public function __construct(Request $request, ResponseInterface $response)
    {
        $this->request = $request;

        if ($response) {
            $this->rawResponse = $response;
            $this->status = $response->getStatusCode();
            $this->body = $this->decodeBody($response->getBody()->getContents());
            $this->success = 2 == floor($this->status / 100);
        }
    }

    /**
     * Status Getter
     * return the http status code.
     *
     * @return int status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Status Getter
     * return the entire response array.
     */
    public function getBody(): array
    {
        return $this->body;
    }

    /**
     * Data Getter
     * The data returned by the mailjet call.
     *
     * @return array data
     */
    public function getData(): array
    {
        return $this->body['Data'] ?? $this->body;
    }

    /**
     * Count getter
     * return the resulting array size.
     */
    public function getCount(): ?int
    {
        return $this->body['Count'] ?? null;
    }

    /**
     * Error Reason getter
     * return the resulting error message.
     */
    public function getReasonPhrase(): ?string
    {
        return $this->rawResponse->getReasonPhrase();
    }

    /**
     * Total getter
     * return the total count of all results.
     *
     * @return int|null count
     */
    public function getTotal(): ?int
    {
        return $this->body['Total'] ?? null;
    }

    /**
     * Success getter.
     *
     * @return bool true is return code is 2**
     */
    public function success(): ?bool
    {
        return $this->success;
    }

    public function getRequest(): Request
    {
        return $this->request;
    }

    /**
     * Decodes a mailjet string response to an object representing that response.
     *
     * @param string $body The mailjet response as string
     *
     * @return array Object representing the mailjet response
     */
    protected function decodeBody(string $body): array
    {
        return json_decode($body, true, 512, JSON_BIGINT_AS_STRING) ?: [];
    }
}
