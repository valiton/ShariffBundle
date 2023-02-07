<?php
/**
 * www.valiton.com
 *
 * @author Uwe Jäger <uwe.jaeger@valiton.com>
 */


namespace Valiton\Bundle\ShariffBundle\Service;


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