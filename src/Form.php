<?php

declare(strict_types=1);

namespace webbird\forms;

class Form implements ElementInterface
{
    use \webbird\common\PropertyGeneratorTrait;
    
    public function __construct(mixed ...$options)
    {
        // mix options with defaults
        $config = array_merge($options,$this->knownAttributes());
        // populate
        $this->getParameters($config);
    }
    
    /**
     * get a list of attributes that are specific for this element together
     * with default settings; used by __construct() to initialize the object
     * 
     * @return array
     */
    public function knownAttributes(): array
    {
        return [
            'accept-charset' => null,
            'action'         => null,
            'autocomplete'   => null, // 'on','off'
            'class'          => null, // CSS class
            'enctype'        => null, // application/x-www-form-urlencoded, multipart/form-data, text/plain
            'id'             => null,
            'method'         => 'POST', // 'GET','POST'
        ];
    }
    
    /**
     * set action (URI)
     * the getter is provided by the PropertiesGeneratorTrait
     * 
     * @param string $action
     * @return self
     */
    public function setAction(string $action): self
    {
        // validate
        
        $this->action = $action;
        return $this;
    }
}
