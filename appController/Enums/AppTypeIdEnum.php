<?php
/**
 * @PHP       Version >= 8.2
 * @copyright ©2023 Maatify.dev
 * @author    Mohamed Abdulalim (megyptm) <mohamed@maatify.dev>
 * @since     2025-01-05 7:58 AM
 * @link      https://www.maatify.dev Maatify.com
 * @link      https://github.com/Maatify/AppHandler  view project on GitHub
 * @Maatify   AppHandler :: AppDeviceStatusEnum
 */

namespace Maatify\AppController\Enums;

use Maatify\AppController\Contracts\AppTypeIdInterface;
use Maatify\AppController\Tables\AppSocial;

enum AppTypeIdEnum: int implements AppTypeIdInterface
{
    case Web = 1;
    case Android = 2;
    case IOS = 3;
    case Huawei = 4;
    case AgentWeb = 5;
    case AgentAndroid = 6;
    case AgentIOS = 7;
    case AgentHuawei = 8;
    case API = 9;

    /**
     * Map each enum case to its corresponding URL.
     *
     * @return string
     */
    public function getUrl(): string
    {
        return match ($this) {
            self::Android => AppSocial::obj()->androidUrl(),
            self::IOS => AppSocial::obj()->iosUrl(),
            self::Huawei => AppSocial::obj()->huaweiUrl(),
            self::AgentAndroid => AppSocial::obj()->androidAgentUrl(),
            self::AgentIOS => AppSocial::obj()->iosAgentUrl(),
            self::AgentHuawei => AppSocial::obj()->huaweiAgentUrl(),
            default => '',
        };
    }

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