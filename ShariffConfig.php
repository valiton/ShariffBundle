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

    /** @var array */
    protected $serviceConfig = array();

    /** @var string */
    protected $adapter;

    /** @var array */
    protected $adapterOptions;

    public function __construct($domain, $services, $cache)
    {
        $this->domain = $domain;
        $this->services = array_keys($services);
        $this->cacheTtl = $cache['ttl'];
        $this->cacheDir = isset($cache['cacheDir']) ? $cache['cacheDir'] : null;
        $this->adapter = isset($cache['adapter']) ? $cache['adapter'] : null;
        $this->adapterOptions = isset($cache['adapterOptions']) ? $cache['adapterOptions'] : null;

        foreach($services as $name => $serviceConfig) {
            if (null !== $serviceConfig) {
                $this->serviceConfig[$name] = $serviceConfig;
            }
        }
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

    /**
     * @param string $adapter
     */
    public function setAdapter($adapter)
    {
        $this->adapter = $adapter;
    }

    /**
     * @return string
     */
    public function getAdapter()
    {
        return $this->adapter;
    }

    /**
     * @param array $adapterOptions
     */
    public function setAdapterOptions($adapterOptions)
    {
        $this->adapterOptions = $adapterOptions;
    }

    /**
     * @return array
     */
    public function getAdapterOptions()
    {
        return $this->adapterOptions;
    }

    public function toArray()
    {
        $result = array();
        $result['domain'] = $this->domain;
        $result['services'] = $this->services;
        $result = array_merge($result, $this->serviceConfig);
        $result['cache'] = array('ttl' => $this->cacheTtl);
        if (null !== $this->cacheDir) {
            $result['cache']['cacheDir'] = $this->cacheDir;
        }
        if (null !== $this->adapter) {
            $result['cache']['adapter'] = $this->adapter;
        }
        if (null !== $this->adapterOptions) {
            $result['cache']['adapterOptions'] = $this->adapterOptions;
        }

        return $result;
    }
}