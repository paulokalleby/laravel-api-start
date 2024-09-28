<?php

namespace App\Enums;

enum RoleEnum: string
{
    case ADMIN    = 'Admin';
    case DEFAULT  = 'Default';
    case CUSTOMER = 'Customer';

    public static function toArray() : array
    {
        return [
            self::ADMIN    => 'Admin',
            self::DEFAULT  => 'Default',
            self::CUSTOMER => 'Customer',
        ];
    }

    public function label() : string
    {
        return match ($this) {
            self::ADMIN    => 'Administrador',
            self::DEFAULT  => 'Usuário padrão',
            self::CUSTOMER => 'Cliente',
        };
    }

}
