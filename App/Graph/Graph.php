<?php

namespace App\Graph;

use App\Edge\Edge;
use App\Vertex\HasVertices;
use App\Vertex\Vertex;

class Graph
{
    use HasVertices;

    protected function __construct(array $grid)
    {
        $rows = count($grid);
        $cols = count($grid[0]);

        for ($i = 0; $i < $rows; $i++) {
            for ($j = 0; $j < $cols; $j++) {
                $vertex = self::makeVertex($i, $j, $grid[$i][$j]);
                $this->addVertex($vertex);
            }
        }
        /** @var Vertex $vertex */
        foreach ($this->vertices as $vertex) {
            $x = $vertex->getX();
            $y = $vertex->getY();

            if ($x > 0) {
                $vertex->addEdge(Edge::make($vertex, $this->getVertex($x - 1, $y)));
            }
            if ($x < $rows - 1) {
                $vertex->addEdge(Edge::make($vertex, $this->getVertex($x + 1, $y)));
            }
            if ($y > 0) {
                $vertex->addEdge(Edge::make($vertex, $this->getVertex($x, $y - 1)));
            }
            if ($y < $cols - 1) {
                $vertex->addEdge(Edge::make($vertex, $this->getVertex($x, $y + 1)));
            }
            if ($x > 0 && $y > 0) {
                $vertex->addEdge(Edge::make($vertex, $this->getVertex($x - 1, $y - 1)));
            }
            if ($x > 0 && $y < $cols - 1) {
                $vertex->addEdge(Edge::make($vertex, $this->getVertex($x - 1, $y + 1)));
            }
            if ($x < $rows - 1 && $y > 0) {
                $vertex->addEdge(Edge::make($vertex, $this->getVertex($x + 1, $y - 1)));
            }
            if ($x < $rows - 1 && $y < $cols - 1) {
                $vertex->addEdge(Edge::make($vertex, $this->getVertex($x + 1, $y + 1)));
            }
        }
    }

    protected static function makeVertex(int $i, int $j, int $value): Vertex
    {
        return Vertex::make($i, $j, $value);
    }

    public static function make(array $grid): Graph
    {
        return new self($grid);
    }
}