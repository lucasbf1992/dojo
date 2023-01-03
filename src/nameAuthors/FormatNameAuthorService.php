<?php

namespace app\nameAuthors;

use app\nameAuthors\Support\FamilyName;

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

        return $this->mountName($lastName, $names);

    }

    private function explodeNames($name)
    {
        return explode(' ', $name);
    }

    private function getLastName(array $names)
    {
        return end($names);
    }

    private function mountName($lastName, $names)
    {
        if (in_array($lastName, FamilyName::getAll()) && count($names) > 2) {
            $prevName = $names[count($names) - 2];

            unset($names[count($names) - 2]);
            unset($names[array_key_last($names)]);

            $nameFormatted = strtoupper($prevName) . ' ' . strtoupper($lastName) . ', ';
            foreach ($names as $key => $name) {
                $nameFormatted .= ucfirst(strtolower($name));

                $nameFormatted .= ($key == count($names) - 1) ? '' : ' ';
            }

          return $nameFormatted;
        }

        unset($names[array_key_last($names)]);
        $nameFormatted = strtoupper($lastName) . ', ';
        foreach ($names as $key => $name) {
            $nameFormatted .= ucfirst(strtolower($name));

            $nameFormatted .= ($key == count($names) - 1) ? '' : ' ';
        }

        return $nameFormatted;
    }
}