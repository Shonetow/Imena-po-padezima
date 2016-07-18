<?php namespace Shonetow\Padezi;

class Vokativ
{
    /**
     * @var Padez
     */
    protected $padez;

    /**
     * Vokativ constructor.
     *
     * @param $padez
     */
    public function __construct(Padez $padez)
    {
        $this->padez = $padez;
    }

    public static function female($name)
    {
        $instance = new static(new Padez());

        return $instance->padez->vokativ($name, 1);
    }

    public static function male($name)
    {
        $instance = new static(new Padez());

        return $instance->padez->vokativ($name, 2);
    }
}