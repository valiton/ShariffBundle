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

    /** @var  ViewHandlerInterface */
    protected $viewHandler;

    public function __construct(ShariffServiceInterface $shariffService, ViewHandlerInterface $viewHandler)
    {
        $this->shariffService = $shariffService;
        $this->viewHandler = $viewHandler;
    }


    public function get(Request $request)
    {
        $result = $this->shariffService->get($request->query->get('url'));

        $view = View::create($result);
        $view->setFormat('json');

        return $this->viewHandler->handle($view);
    }
}