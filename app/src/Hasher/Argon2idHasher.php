<?php

namespace App\Hasher;

use App\Transformer\PasswordTransformer;
use Symfony\Component\PasswordHasher\PasswordHasherInterface;

class Argon2idHasher implements PasswordHasherInterface
{
    public function hash(string $plainPassword): string
    {
        return $plainPassword;
    }

    public function verify(string $hashedPassword, string $plainPassword): bool
    {
        $hashedPassword = PasswordTransformer::transformFromPassword($hashedPassword);

        return password_verify($plainPassword, $hashedPassword);
    }

    public function needsRehash(string $hashedPassword): bool
    {
        return false;
    }
}
