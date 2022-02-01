<?php

namespace dojo\nameAuthors;

use dojo\nameAuthors\support\FamilyName;

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
            unset($names[count($names)]);

            $nameFormatted = strtoupper($prevName) . ' ' . strtoupper($lastName) . ', ';
            foreach ($names as $key => $name) {
                $nameFormatted .= ucfirst($name);

                $nameFormatted .= ($key == count($names) - 1) ? '' : ' ';
            }

          return $nameFormatted;
        }
    }
}