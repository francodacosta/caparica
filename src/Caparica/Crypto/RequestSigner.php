<?php
/**
 * Caparica
 *
 * Signed requests
 *
 * @author    Nuno Franco da Costa <nuno@francodacosta.com>
 * @copyright 2013-2014 Nuno Franco da Costa
 * @license   http://www.opensource.org/licenses/mit-license.php MIT
 * @link      https://github.com/francodacosta/caparica
 */

namespace Caparica\Crypto;

/**
 * handles the signature generations
 */
class RequestSigner implements SignerInterface
{
    /**
     * signs a request
     *
     * @param  array $params   associative array with parameters used to sign the request
     * @param  string $password the password
     *
     * @return string
     */
    public function sign (array $params, $password)
    {
        $string = $this->toParametersString($params);

        return hash_hmac('sha256', $string, $password);
    }

    /**
     * Conversts an array to a string
     * the resulting string is is ordered by key and has the querystring format (key1=value1&key2=value2 ....) and is url encoded
     *
     * @param  array  $params
     *
     * @return string
     */
    private function toParametersString(array $params)
    {
        ksort($params, SORT_NATURAL | SORT_FLAG_CASE);

        $keyValue = array_map(
            function ($key, $value) {
                return sprintf("%s=%s", $key, $value);
            },
            array_keys($params),
            $params
        );

         return implode('&', $keyValue);
    }
}
