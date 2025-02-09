<?php
/**
 * @PHP       Version >= 8.2
 * @copyright ©2023 Maatify.dev
 * @author    Mohamed Abdulalim (megyptm) <mohamed@maatify.dev>
 * @since     2025-02-05 12:06
 * @link      https://www.maatify.dev Maatify.com
 * @link      https://github.com/Maatify/AppHandler  view project on GitHub
 * @Maatify   AppHandler :: AppDeviceStatusService
 */

declare(strict_types=1);

namespace Maatify\AppController\Service;

use Maatify\AppController\Contracts\AppTypeIdInterface;

class AppTypeIdService
{
    private AppTypeIdInterface $appTypeIdEnum;

    public function __construct(AppTypeIdInterface $appTypeIdEnum)
    {
        $this->appTypeIdEnum = $appTypeIdEnum;
    }

    public function validate(int $type_id): ?AppTypeIdInterface
    {
        return $this->appTypeIdEnum::validate($type_id);
    }
}