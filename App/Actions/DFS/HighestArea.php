<?php

namespace App\Actions\DFS;

use App\Graph\Graph;
use App\Vertex\Vertex;

class HighestArea extends Dfs
{
    public static function find(Graph $graph): int
    {
        $maxArea = 0;

        $conditionCallback = function ($vertex) {
            return $vertex->getValue() === 1;
        };

        /** @var Vertex $vertex */
        foreach ($graph->getVertices() as $vertex) {
            if ($conditionCallback($vertex) && !$vertex->isVisited()) {
                $max = self::dfs($vertex, 1, $conditionCallback);
                $maxArea = max($maxArea, $max);
            }
        }
        return $maxArea;
    }

    protected static function accumulator($value): int
    {
        $value++;
        return $value;
    }

}