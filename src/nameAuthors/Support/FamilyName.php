<?php


class FamilyName
{
    const JUNIOR = 'junior';
    const FILHO = 'filho';
    const FILHA = 'filha';
    const NETO = 'neto';
    const NETA = 'neta';
    const SOBRINHO = 'sobrinho';
    const SOBRINHA = 'sobrinha';

    public function getAll()
    {
        return [
            self::JUNIOR,
            self::FILHO,
            self::FILHA,
            self::NETO,
            self::NETA,
            self::SOBRINHO,
            self::SOBRINHA
        ];
    }
}

