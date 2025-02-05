<?php
/**
 * Created by Maatify.dev
 * User: Maatify.dev
 * Date: 2025-02-05
 * Time: 12:08
 * Project: AppHandler
 * IDE: PhpStorm
 * https://www.Maatify.dev
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