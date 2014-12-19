<?php
/**
 * www.valiton.com
 *
 * @author Uwe Jäger <uwe.jaeger@valiton.com>
 */


namespace Valiton\Bundle\ShariffBundle\Service;


use Valiton\Bundle\ShariffBundle\ShariffConfig;

interface ShariffServiceInterface
{
    /**
     * Get the information from the backend for the given url
     *
     * @param $url
     * @return array
     */
    public function get($url);
}