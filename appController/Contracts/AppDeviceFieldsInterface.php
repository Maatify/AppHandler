<?php
/**
 * @PHP       Version >= 8.2
 * @copyright ©2023 Maatify.dev
 * @author    Mohamed Abdulalim (megyptm) <mohamed@maatify.dev>
 * @since     2025-02-10 06:50 AM
 * @link      https://www.maatify.dev Maatify.com
 * @link      https://github.com/Maatify/AppHandler  view project on GitHub
 * @Maatify   AppHandler :: AppDeviceFieldsInterface
 */

declare(strict_types=1);

namespace Maatify\AppController\Contracts;

interface AppDeviceFieldsInterface
{
    public function getMaxFailedSms(): int;
    public function getMaxFailedLogins(): int;
}