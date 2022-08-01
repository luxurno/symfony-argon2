<?php

namespace App\Transformer;

use App\Encrypter\AuthenticationPasswordOptions;

class PasswordTransformer
{
    private const SCHEMA = [
        0 => '',
        1 => 'argon2id',
        2 => 'v=19',
        3 => 'options',
        4 => 'salt',
        5 => 'password',
    ];

    public static function transformToHashPassword(string $password): string
    {
        $hash = password_hash($password, PASSWORD_ARGON2ID, AuthenticationPasswordOptions::getOptions());
        $hash = explode('$', $hash);

        return $hash[4]."$".$hash[5];
    }

    public static function transformFromPassword(string $password): string
    {
        $password = explode('$', $password);

        $schema = self::SCHEMA;
        $options = [];

        $options['m'] = AuthenticationPasswordOptions::getMemoryCost();
        $options['t'] = AuthenticationPasswordOptions::getTimeCost();
        $options['p'] = AuthenticationPasswordOptions::getThreads();

        $option = '';
        foreach ($options as $key => $item) {
            $option .= sprintf(
                '%s=%s,',
                $key,
                $item,
            );
        }
        $schema[3] = substr($option, 0, -1);
        $schema[4] = $password[0];
        $schema[5] = $password[1];

        return implode('$', $schema);
    }
}
