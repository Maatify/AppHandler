<?php
/**
 * @PHP       Version >= 8.1
 * @copyright ©2023 Maatify.dev
 * @author    Mohamed Abdulalim (megyptm) <mohamed@maatify.dev>
 * @since     2025-01-13 8:59 PM
 * @link      https://www.maatify.dev Maatify.com
 * @link      https://github.com/Maatify/AppHandler  view project on GitHub
 * @Maatify   AppHandler :: AppDeviceStatus
 */

namespace Maatify\AppController\Enums;

enum EnumAppDeviceStatus : int
{
    case Pending = 1;
    case Approved = 2;
    case Rejected = 3;


    /**
     * Validate and get the corresponding EnumAppTypeId case.
     *
     * @param   int  $type_id
     *
     * @return ?self
     */
    public static function validate(int $type_id): ?self
    {
        return self::tryFrom($type_id);
    }
}
