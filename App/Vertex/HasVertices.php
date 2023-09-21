<?php

namespace App\Vertex;

trait HasVertices
{
    private array $vertices = [];

    public function addVertex(Vertex $vertex): void
    {
        $this->vertices[] = $vertex;
    }

    public function getVertex($x, $y):? Vertex
    {
        foreach ($this->vertices as $vertex) {
            if ($vertex->getX() === $x && $vertex->getY() === $y) {
                return $vertex;
            }
        }
        return null;
    }

    public function getVertices(): array
    {
        return $this->vertices;
    }

}