<?php
/**
 * www.valiton.com
 *
 * @author Uwe Jäger <uwe.jaeger@valiton.com>
 */


namespace Valiton\Bundle\ShariffBundle\Controller;


use FOS\RestBundle\View\View;
use FOS\RestBundle\View\ViewHandlerInterface;
use Symfony\Component\HttpFoundation\Request;
use Valiton\Bundle\ShariffBundle\Service\ShariffServiceInterface;

class ShariffController
{
    /** @var  ShariffServiceInterface */
    protected $shariffService;

    /** @var ShariffConfig */
    protected $config;

    /** @var  ViewHandlerInterface */
    protected $viewHandler;

    public function __construct(ShariffServiceInterface $shariffService, ShariffConfig $config, ViewHandlerInterface $viewHandler)
    {
        $this->shariffService = $shariffService;
        $this->viewHandler = $viewHandler;
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

        $result = $this->shariffService->get($url);

        $view = View::create($result);
        $view->setFormat('json');

        return $this->viewHandler->handle($view);
    }
}
