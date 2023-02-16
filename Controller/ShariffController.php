<?php
/**
 * www.valiton.com
 *
 * @author Uwe Jäger <uwe.jaeger@valiton.com>
 */


namespace Valiton\Bundle\ShariffBundle\Controller;


use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Valiton\Bundle\ShariffBundle\Service\ShariffServiceInterface;
use Valiton\Bundle\ShariffBundle\ShariffConfig;

class ShariffController
{
    /** @var  ShariffServiceInterface */
    protected $shariffService;

    /** @var ShariffConfig */
    protected $config;

    public function __construct(ShariffServiceInterface $shariffService, ShariffConfig $config)
    {
        $this->shariffService = $shariffService;
        $this->config = $config;
    }

    public function get(Request $request)
    {
        $url = $request->query->get('url');
        $forceProtocol = $this->config->getForceProtocol();

        if (!is_null($forceProtocol)) {
            if ($forceProtocol === "https") {
                $url = str_replace('http://', 'https://', $url);
            }
            if ($forceProtocol === "http") {
                $url = str_replace('https://', 'http://', $url);
            }
        }

        return new JsonResponse($this->shariffService->get($url));
    }
}
