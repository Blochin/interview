<?php

namespace App\Actions\DFS;

use App\Edge\Edge;
use App\Graph\Graph;

abstract class Dfs
{
    abstract protected static function find(Graph $graph);
    final static function dfs($vertex, $object, $conditionCallback)
    {
        $vertex->setVisited(true);
        /** @var Edge $edge */
        foreach ($vertex->getEdges() as $edge) {
            $neighbor = $edge->getEnd();
            if ($conditionCallback($neighbor) && !$neighbor->isVisited()) {
                $newObject = static::accumulator($object);
                $object = self::dfs($neighbor, $newObject,$conditionCallback);
            }
        }
        return $object;
    }

    abstract protected static function accumulator($value);
}