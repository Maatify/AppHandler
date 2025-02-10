<?php
/**
 * @PHP       Version >= 8.2
 * @copyright ©2023 Maatify.dev
 * @author    Mohamed Abdulalim (megyptm) <mohamed@maatify.dev>
 * @since     2025-01-15 2:11 PM
 * @link      https://www.maatify.dev Maatify.com
 * @link      https://github.com/Maatify/AppHandler  view project on GitHub
 * @Maatify   AppHandler :: AppDeviceFields
 */

namespace Maatify\AppController\Tables;

use \App\DB\DBS\DbConnector;
use Maatify\AppController\Contracts\AppTypeIdInterface;
use Maatify\Json\Json;

abstract class AppDeviceFields extends DbConnector implements AppTypeIdInterface
{
    public const TABLE_NAME                 = 'app_f_device';
    public const TABLE_ALIAS                = '';
    public const IDENTIFY_TABLE_ID_COL_NAME = 'id';
    public const LOGGER_TYPE                = self::TABLE_NAME;
    public const LOGGER_SUB_TYPE            = '';
    public const COLS                       = [
        self::IDENTIFY_TABLE_ID_COL_NAME    => 1,
        AppType::IDENTIFY_TABLE_ID_COL_NAME => 1,
        'device_id'                         => 0,
        'sms_fields'                        => 1,
        'login_fields'                      => 1,
    ];

    protected string $tableName = self::TABLE_NAME;
    protected string $tableAlias = self::TABLE_ALIAS;
    protected string $identify_table_id_col_name = self::IDENTIFY_TABLE_ID_COL_NAME;
    protected string $logger_type = self::LOGGER_TYPE;
    protected string $logger_sub_type = self::LOGGER_SUB_TYPE;
    protected array $cols = self::COLS;

    protected int $max_failed_sms = 5;
    protected int $max_failed_login = 7;

    protected string $device_id;
    protected int $app_type_id;

    public function getMaxFailedSms(): int
    {
        return $this->max_failed_sms;
    }

    public function getMaxFailedLogins(): int
    {
        return $this->max_failed_login;
    }

    public function setAppTypeId(AppTypeIdInterface $appTypeId): self
    {
        $this->app_type_id = $appTypeId->getValue();
        return $this;
    }

    public function setDeviceId(string $deviceId): self
    {
        $this->device_id = $deviceId;
        return $this;
    }

    public function getDeviceId(): string
    {
        return $this->device_id;
    }

    public function getAppTypeId(): int
    {
        return $this->app_type_id;
    }

    private function recordDevice(): void
    {
        $this->Add([
            'app_type_id'  => $this->app_type_id,
            'device_id'    => $this->device_id,
            'sms_fields'   => 0,
            'login_fields' => 0,
        ]);
    }

    public function deviceIdIsExist(): int
    {
        $this->row_id = (int)$this->ColThisTable('id', '`app_type_id` = ? AND `device_id` = ? ', [$this->app_type_id, $this->device_id]);

        return $this->row_id;
    }

    public function checkDeviceIsBlocked(): void
    {
        if ($this->checkDeviceIsBlockedBool()) {
            Json::DeviceIsBlocked();
        }
    }

    public function checkDeviceIsBlockedBool(): bool
    {
        if (! $this->deviceIdIsExist()) {
            $this->recordDevice();

            return false;
        }

        if ($this->ColThisTable('sms_fields',
            '`app_type_id` = ? AND `device_id` = ? AND `sms_fields` >= ? AND `login_fields` >= ? ',
            [$this->app_type_id, $this->device_id, $this->getMaxFailedSms(), $this->getMaxFailedLogins()])
        ) {
            return true;
        }

        return false;
    }


    private function fieldSms(): int
    {
        return (int)$this->ColThisTable('sms_fields', '`id` = ? ', [$this->row_id]);
    }

    public function addFieldSms(): int
    {
        $fields = $this->fieldSms();
        if ($fields <= $this->getMaxFailedSms()) {
            if ($this->Edit(['sms_fields' => $fields + 1], '`id` = ? ', [$this->row_id])) {
                return $fields + 1;
            }
        }
        Json::DeviceIsBlocked();
        exit();
    }

    public function removeFieldSms(): void
    {
        if ($this->deviceIdIsExist()) {
            $this->Edit(['sms_fields' => 0], '`id` = ? ', [$this->row_id]);
        }
    }



    private function fieldLogins(): int
    {
        return (int)$this->ColThisTable('login_fields', '`id` = ? ', [$this->row_id]);
    }

    public function addFieldLogins(): int
    {
        $fields = $this->fieldLogins();
        if ($fields <= $this->getMaxFailedLogins()) {
            if ($this->Edit(['login_fields' => $fields + 1], '`id` = ? ', [$this->row_id])) {
                return $fields + 1;
            }
        }
        Json::DeviceIsBlocked();
        exit();
    }

    public function removeFieldLogins(): void
    {
        if ($this->deviceIdIsExist()) {
            $this->Edit(['login_fields' => 0], '`id` = ? ', [$this->row_id]);
        }
    }
}