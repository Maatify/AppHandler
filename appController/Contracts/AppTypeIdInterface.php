<?php
/**
 * Created by Maatify.dev
 * User: Maatify.dev
 * Date: 2025-02-05
 * Time: 10:59
 * Project: AppHandler
 * IDE: PhpStorm
 * https://www.Maatify.dev
 */

declare(strict_types=1);

namespace Maatify\AppController\Contracts;

interface AppTypeIdInterface
{
    public static function validate(int $type_id): ?self;
    public function getValue(): int;

    public function getName(): string;
}