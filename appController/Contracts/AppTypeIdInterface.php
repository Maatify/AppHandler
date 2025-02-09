<?php
/**
 * @PHP       Version >= 8.2
 * @copyright ©2023 Maatify.dev
 * @author    Mohamed Abdulalim (megyptm) <mohamed@maatify.dev>
 * @since     2025-02-05 10:59
 * @link      https://www.maatify.dev Maatify.com
 * @link      https://github.com/Maatify/AppHandler  view project on GitHub
 * @Maatify   AppHandler :: AppTypeIdInterface
 */

declare(strict_types=1);

namespace Maatify\AppController\Contracts;

interface AppTypeIdInterface
{
    public static function validate(int $type_id): ?self;
    public function getValue(): int;

    public function getName(): string;
}