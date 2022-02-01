<?php

namespace dojo\nameAuthors;

class FormatNameAuthorService
{

    public function format($name)
    {
        if (! $name) {
            throw new \Exception('Params not found');
        }

        $names = $this->explodeNames($name);
        $lastName = $this->getLastName($names);

        if (count($names) == 1) {
            return strtoupper($lastName);
        }

        $lastName = $this->verifyLastName();

    }

    private function explodeNames($name)
    {
        return explode(' ', $name);
    }

    private function getLastName(array $names)
    {
        return end($names);
    }

    private function mountName(array $names, $lastName)
    {
        return "{$lastName}";
    }
}