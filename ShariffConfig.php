<?php
/**
 * www.valiton.com
 *
 * @author Uwe Jäger <uwe.jaeger@valiton.com>
 */


namespace Valiton\Bundle\ShariffBundle;


class ShariffConfig
{
    /** @var string */
    protected $domain;

    /** @var string */
    protected $cacheDir;

    /** @var int */
    protected $cacheTtl;

    /** @var array */
    protected $services;

    public function __construct($domain, $services, $cache)
    {
        $this->domain = $domain;
        $this->services = $services;
        $this->cacheTtl = $cache['ttl'];
        $this->cacheDir = isset($cache['cacheDir']) ? $cache['cacheDir'] : null;
    }


    /**
     * @param string $cacheDir
     */
    public function setCacheDir($cacheDir)
    {
        $this->cacheDir = $cacheDir;
    }

    /**
     * @return string
     */
    public function getCacheDir()
    {
        return $this->cacheDir;
    }

    /**
     * @param int $cacheTtl
     */
    public function setCacheTtl($cacheTtl)
    {
        $this->cacheTtl = $cacheTtl;
    }

    /**
     * @return int
     */
    public function getCacheTtl()
    {
        return $this->cacheTtl;
    }

    /**
     * @param string $domain
     */
    public function setDomain($domain)
    {
        $this->domain = $domain;
    }

    /**
     * @return string
     */
    public function getDomain()
    {
        return $this->domain;
    }

    /**
     * @param array $services
     */
    public function setServices($services)
    {
        $this->services = $services;
    }

    /**
     * @return array
     */
    public function getServices()
    {
        return $this->services;
    }

    public function toArray()
    {
        $result = array();
        $result['domain'] = $this->domain;
        $result['services'] = $this->services;
        $result['cache'] = array('ttl' => $this->cacheTtl);
        if (null !== $this->cacheDir) {
            $result['cache']['cahceDir'] = $this->cacheDir;
        }
        return $result;
    }
}