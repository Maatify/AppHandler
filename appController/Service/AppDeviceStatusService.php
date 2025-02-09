<?php
/**
 * @PHP       Version >= 8.2
 * @copyright ©2023 Maatify.dev
 * @author    Mohamed Abdulalim (megyptm) <mohamed@maatify.dev>
 * @since     2025-02-05 12:08
 * @link      https://www.maatify.dev Maatify.com
 * @link      https://github.com/Maatify/AppHandler  view project on GitHub
 * @Maatify   AppHandler :: AppDeviceStatusService
 */

declare(strict_types=1);

namespace Maatify\AppController\Service;

use Maatify\AppController\Contracts\AppDeviceStatusInterface;

class AppDeviceStatusService
{
    private AppDeviceStatusInterface $appTypeIdEnum;

    public function __construct(AppDeviceStatusInterface $appTypeIdEnum)
    {
        $this->appTypeIdEnum = $appTypeIdEnum;
    }

    public function validate(int $type_id): ?AppDeviceStatusInterface
    {
        return $this->appTypeIdEnum::validate($type_id);
    }
}