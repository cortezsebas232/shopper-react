<?php

namespace Mckenziearts\Shopper\Traits;

trait PathTrait
{
    /**
     * Create path for new directory / file
     *
     * @param $path
     * @param $name
     *
     * @return string
     */
    public function newPath($path, $name)
    {
        if (! $path) {
            return $name;
        }

        return $path.'/'.$name;
    }

    /**
     * Rename path - for copy / cut operations
     *
     * @param $itemPath
     * @param $recipientPath
     *
     * @return string
     */
    public function renamePath($itemPath, $recipientPath)
    {
        if ($recipientPath) {
            return $recipientPath.'/'.basename($itemPath);
        }

        return basename($itemPath);
    }

    /**
     * Transform path name
     *
     * @param $itemPath
     * @param $recipientPath
     * @param $partsForRemove
     *
     * @return string
     */
    public function transformPath($itemPath, $recipientPath, $partsForRemove)
    {
        $elements = array_slice(explode('/', $itemPath), $partsForRemove);

        if ($recipientPath) {
            return $recipientPath.'/'.implode('/', $elements);
        }

        return implode('/', $elements);
    }
}
