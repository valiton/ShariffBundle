<?php
/**
 * www.valiton.com
 *
 * @author Uwe Jäger <uwe.jaeger@valiton.com>
 */


namespace Valiton\Bundle\ShariffBundle\Service;


use GuzzleHttp\Exception\GuzzleException;
use Heise\Shariff\Backend;
use Valiton\Bundle\ShariffBundle\ShariffConfig;

class ShariffService implements ShariffServiceInterface
{
    /** @var  ShariffConfig */
    protected $config;

    public function __construct(ShariffConfig $config)
    {
        $this->config = $config;
    }

    /**
     * Get the information from the backend for the given url
     *
     * @param $url
     * @return array
     */
    public function get($url)
    {
        $backend = new Backend($this->config->toArray());
        try {
            return $backend->get($url);
        } catch (GuzzleException $e) {
            return '{}';
        }
    }

}