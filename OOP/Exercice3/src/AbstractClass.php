<?php

// An abstract class LighterFactory
abstract class AbstractLighterFactory
{
    protected $resources = [];
    
    public function addResources($type, $amount)
    {
        if (!isset($this->resources[$type])) {
            $this->resources[$type] = 0;
        }
        $this->resources[$type] += $amount;
    }
    
    protected function consumeResource($type, $amount)
    {
        if (!isset($this->resources[$type])) {
            $this->resources[$type] = 0;
        }
        $this->resources[$type] -= $amount;
    }
    
    abstract public function buildLighter();
}

// ManualLighterFactory
class ManualLighterFactory extends AbstractLighterFactory
{
    public function __construct($amount = 10)
    {
        $this->addResources('fuel', $amount);
        $this->addResources('minion', 5);
    }
    
    public function buildLighter()
    {
        if (isset($this->resources['fuel']) && $this->resources['fuel'] > 0) {
            $this->consumeResource('fuel', 1);
            return 'manual lighter';
        }
        throw new Exception('No fuel');
    }
}

class DecoratedManualLighterFactory extends ManualLighterFactory
{
    public function __construct()
    {
        parent::__construct(20);
    }
    public function buildLighter()
    {
        return 'Decorated '.parent::buildLighter();
    }
}

$factory = new DecoratedManualLighterFactory();
$factory->addResources('fuel', 10);
try {
    echo $factory->buildLighter();
} catch (Exception $e) {
    echo $e->getMessage();
}

// ElectricLighterFactory
class ElectricLighterFactory extends AbstractLighterFactory
{
    public function buildLighter()
    {
        if (isset($this->resources['gaz']) && $this->resources['gaz'] > 0) {
            $this->consumeResource('gaz', 1);
            return 'electric lighter';
        }
        return 'No gaz';
    }
}

$factory = new ManualLighterFactory();
$factory->addResources('fuel', 10);
echo $factory->buildLighter();

echo "\n";
$factory = new ElectricLighterFactory();
$factory->addResources('fuel', 10);
echo $factory->buildLighter();