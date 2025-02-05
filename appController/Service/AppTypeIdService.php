<?php
/**
 * Created by Maatify.dev
 * User: Maatify.dev
 * Date: 2025-02-05
 * Time: 12:06
 * Project: AppHandler
 * IDE: PhpStorm
 * https://www.Maatify.dev
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