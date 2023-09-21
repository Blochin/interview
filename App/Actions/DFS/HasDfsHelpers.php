<?php

namespace App\Actions\DFS;

trait HasDfsHelpers
{
    private bool $isVisited = false;

    public function setVisited(bool $value): void
    {
        $this->isVisited = $value;
    }

    public function isVisited(): bool
    {
        return $this->isVisited;
    }


}