<?php
/**
 * www.valiton.com
 *
 * @author Uwe Jäger <uwe.jaeger@valiton.com>
 */


namespace Valiton\Bundle\ShariffBundle\Twig;


use Twig\Extension\AbstractExtension;
use Twig\Extension\GlobalsInterface;
use Valiton\Bundle\ShariffBundle\ShariffConfig;

class ShariffExtension extends AbstractExtension implements GlobalsInterface
{
    protected $shariffConfig;

    public function __construct(ShariffConfig $shariffConfig)
    {
        $this->shariffConfig = $shariffConfig;
    }


    public function getGlobals()
    {
        return array('shariffConfig' => $this->shariffConfig);
    }

}
