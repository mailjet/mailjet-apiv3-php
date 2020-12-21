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

class Response
{
    private $status;
    private $success;
    private $body;
    private $rawResponse;

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
            $this->body = $this->decodeBody($response->getBody()->getContents());
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

    /**
     * From http://stackoverflow.com/questions/19520487/json-bigint-as-string-removed-in-php-5-5
     *
     * Decodes a mailjet string response to an object reprensenting that response
     *
     * @param string    $body   The mailjet response as string
     *
     * @return object           Object representing the mailjet response
     */
    protected function decodeBody($body)
    {
        if (version_compare(PHP_VERSION, '5.4.0', '>=') && !(defined('JSON_C_VERSION') && PHP_INT_SIZE > 4)) {
            /** In PHP >=5.4.0, json_decode() accepts an options parameter, that allows you
             * to specify that large ints (like Steam Transaction IDs) should be treated as
             * strings, rather than the PHP default behaviour of converting them to floats.
             */
            $object = json_decode($body, true, 512, JSON_BIGINT_AS_STRING);
        } else {
            /** Not all servers will support that, however, so for older versions we must
             * manually detect large ints in the JSON string and quote them (thus converting
             *them to strings) before decoding, hence the preg_replace() call.
             */
            $maxIntLength = strlen((string) PHP_INT_MAX) - 1;
            $jsonWithoutBigIntegers = preg_replace('/:\s*(-?\d{'.$maxIntLength.',})/', ': "$1"', $body);
            $object = json_decode($jsonWithoutBigIntegers, true);
        }
        return $object;
    }
}
