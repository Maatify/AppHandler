<?php
/**
 * @PHP       Version >= 8.2
 * @copyright ©2023 Maatify.dev
 * @author    Mohamed Abdulalim (megyptm) <mohamed@maatify.dev>
 * @since     2025-01-13 8:59 PM
 * @link      https://www.maatify.dev Maatify.com
 * @link      https://github.com/Maatify/AppHandler  view project on GitHub
 * @Maatify   AppHandler :: AppDeviceStatusEnum
 */

namespace Maatify\AppController\Enums;

use Maatify\AppController\Contracts\AppDeviceStatusInterface;

enum AppDeviceStatusEnum : int implements AppDeviceStatusInterface
{
    case Pending = 1;
    case Approved = 2;
    case Rejected = 3;


    /**
     * Validate and get the corresponding AppTypeIdEnum case.
     *
     * @param   int  $type_id
     *
     * @return ?self
     */
    public static function validate(int $type_id): ?self
    {
        return self::tryFrom($type_id);
    }

    public function getValue(): int
    {
        return $this->value;
    }

    public function getName(): string
    {
        return $this->name;
    }
}
