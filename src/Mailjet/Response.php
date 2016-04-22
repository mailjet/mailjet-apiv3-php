<?php
/**
 * PHP version 5
 *
 * This is the Mailjet Response
 *
 * @category Mailjet_API
 * @package  Mailjet-apiv3
 * @author   Guillaume Badi <gbadi@mailjet.com>
 * @license  https://opensource.org/licenses/MIT
 * @link     dev.mailjet.com
 */

namespace Mailjet;
use Psr\Http\Message\ResponseInterface;

/**
 * This is the Mailjet Response
 * @category Mailjet_API
 * @package  Mailjet-apiv3
 * @author Guillaume Badi <gbadi@mailjet.com>
 * @license MIT https://opensource.org/licenses/MIT
 * @link dev.mailjet.com
 */
class Response
{
    private $status;
    private $success;
    private $body;

    /**
     * Construct a Mailjet response
     * @param Request        $request  Mailjet actual request
     * @param ResponseInterface $response Guzzle response
     */
    public function __construct($request, $response)
    {
        $this->request = $request;

        if ($response) {
            $this->rawResponse = $response;
            $this->status = $response->getStatusCode();
            $this->body = json_decode($response->getBody(), true, 512, JSON_BIGINT_AS_STRING);
            $this->success = floor($this->status / 100) == 2 ? true : false;
        }
    }

    /**
     * Status Getter
     * return the http status code
     * @return int status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Status Getter
     * return the entire response array
     * @return array
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * Data Getter
     * The data returned by the mailjet call
     * @return array data
     */
    public function getData()
    {
        if (isset($this->body['Data'])) {
            return $this->body['Data'];
        }

        return $this->body;
    }

    /**
     * Count getter
     * return the resulting array size
     * @return null|int
     */
    public function getCount()
    {
        if (isset($this->body['Count'])) {
            return $this->body['Count'];
        }

        return null;
    }

    /**
     * Error Reason getter
     * return the resulting error message
     * @return null|string
     */
    public function getReasonPhrase()
    {
        return $this->rawResponse->getReasonPhrase();
    }

    /**
     * Total getter
     * return the total count of all results
     * @return int count
     */
    public function getTotal()
    {
        if (isset($this->body['Total'])) {
            return $this->body['Total'];
        }

        return null;
    }

    /**
     * Success getter
     * @return boolean true is return code is 2**
     */
    public function success()
    {
        return $this->success;
    }
}
