<?php
/**
 * @PHP       Version >= 8.0
 * @copyright ©2023 Maatify.dev
 * @author    Mohamed Abdulalim (megyptm) <mohamed@maatify.dev>
 * @since     2025-01-05 7:58 AM
 * @link      https://www.maatify.dev Maatify.com
 * @link      https://github.com/Maatify/AppHandler  view project on GitHub
 * @Maatify   AppHandler :: EnumAppTypeId
 */

namespace Maatify\AppController;

use Maatify\AppController\Tables\AppSocial;

enum EnumAppTypeId: int
{
    case Web = 1;
    case Android = 2;
    case IOS = 3;
    case Huawei = 4;
    case AgentWeb = 5;
    case AgentAndroid = 6;
    case AgentIOS = 7;
    case AgentHuawei = 8;

    /**
     * Map each enum case to its corresponding URL.
     *
     * @return string
     */
    public function getUrl(): string
    {
        return match ($this) {
            self::Android => AppSocial::obj()->AndroidUrl(),
            self::IOS => AppSocial::obj()->IosUrl(),
            self::Huawei => AppSocial::obj()->HuaweiUrl(),
            self::AgentAndroid => AppSocial::obj()->AndroidAgentUrl(),
            self::AgentIOS => AppSocial::obj()->IosAgentUrl(),
            self::AgentHuawei => AppSocial::obj()->HuaweiAgentUrl(),
            default => '',
        };
    }

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