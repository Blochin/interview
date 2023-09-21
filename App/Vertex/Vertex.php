<?php

namespace App\Vertex;

use App\Actions\DFS\HasDfsHelpers;
use App\Edge\HasEdges;

class Vertex
{
    use HasEdges, HasDfsHelpers;

    private int $x;
    private int $y;
    private int $value;

    protected function __construct(int $x, int $y, int $value)
    {
        $this->x = $x;
        $this->y = $y;
        $this->value = $value;
    }

    public static function make(int $x, int $y, int $value): Vertex
    {
        return new self($x, $y, $value);
    }

    public function getX(): int
    {
        return $this->x;
    }

    public function getY(): int
    {
        return $this->y;
    }

    public function getValue(): int
    {
        return $this->value;
    }
}