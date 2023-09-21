<?php

namespace App\Edge;

use App\Vertex\Vertex;

class Edge
{
    private Vertex $start;
    private Vertex $end;

    private function __construct(Vertex $start, Vertex $end)
    {
        $this->start = $start;
        $this->end = $end;
    }

    public static function make(Vertex $start, Vertex $end): Edge
    {
        return new self($start, $end);
    }

    public function getStart(): Vertex
    {
        return $this->start;
    }

    public function getEnd(): Vertex
    {
        return $this->end;
    }

}