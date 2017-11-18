<?php

namespace core\Bootstrap;

class BootstrapService
{

    public function bootstrap($params)
    {
        $components = $this->findComponentsToBootstrap();
    }

    /**
     * @return string[]
     */
    private function findComponentsToBootstrap(): array
    {
        // Todo implement component contract.
        return [];
    }
}