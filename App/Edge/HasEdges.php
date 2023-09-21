<?php

namespace App\Edge;

trait HasEdges
{
    private array $edges = [];

    public function addEdge(Edge $edge): void
    {
        $this->edges[] = $edge;
    }

    public function getEdges(): array
    {
        return $this->edges;
    }

}