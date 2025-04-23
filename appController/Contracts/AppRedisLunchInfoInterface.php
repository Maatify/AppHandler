<?php
/**
 * Created by Maatify.dev
 * User: Maatify.dev
 * Date: 2025-04-23
 * Time: 05:53
 * Project: AppHandler
 * IDE: PhpStorm
 * https://www.Maatify.dev
 */

declare(strict_types=1);

namespace Maatify\AppController\Contracts;

interface AppRedisLunchInfoInterface
{
    public function getSocialRow(): array;
    public function deleteSocialRow(): void;
    public function getAppPhones(): array;
    public function deleteAppPhones(): void;
    public function getLunchSlider(): array;
    public function deleteLunchSlider(): void;
    public function getLunchInfo(): array;
    public function deleteLunchInfo(): void;
}