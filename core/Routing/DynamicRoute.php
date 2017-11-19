<?php
/**
 * Created by PhpStorm.
 * User: David
 * Date: 19.11.2017
 * Time: 20:56
 */

namespace core\Routing;


class DynamicRoute extends Route
{

    public function getParams(string $uri): array
    {
        $result = [];
        $pathSchema = $this->explodePath($this->getPath());
        $uriSchema = $this->explodePath($uri);

        foreach ($pathSchema as $key => $item) {
            $matches = [];
            preg_match('/\{(.*?)\}/', $item, $matches);
            if (!empty($matches)) {
                $result[] = $uriSchema[$key];
            }
        }
        return $result;
    }

    public function getType(): int
    {
        return self::TYPE_DYNAMIC;
    }

    public function pathMatch($uri)
    {
        $pathSchema = $this->explodePath($this->getPath());
        $uriSchema = $this->explodePath($uri);

        $uriSections = \count($uriSchema);

        for ($i = 0; $i < $uriSections; $i++) {
            if ($uriSchema[$i] === $pathSchema[$i]) {
                continue;
            }

            $unmatchedString = $pathSchema[$i];

            $matches = [];
            preg_match('/\{(.*?)\}/', $unmatchedString, $matches);
            if (!empty($matches)) {
                // String didnt match, because it is param.
                continue;
            }
            return false;
        }
        return true;
    }

    /**
     * @param string $path
     * @return array
     */
    protected function explodePath(string $path): array
    {
        return explode('/', $path);
    }

}