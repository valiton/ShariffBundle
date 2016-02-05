<?php
/**
 * www.valiton.com
 *
 * @author Uwe Jäger <uwe.jaeger@valiton.com>
 */


namespace Valiton\Bundle\ShariffBundle\Twig;


use Valiton\Bundle\ShariffBundle\ShariffConfig;

class ShariffExtension extends \Twig_Extension implements \Twig_Extension_GlobalsInterface
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

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return 'shariff';
    }

}
