<?php
/**
 * Created by Maatify.dev
 * User: Maatify.dev
 * Date: 2024-07-10
 * Time: 8:35 AM
 * https://www.Maatify.dev
 */

namespace Maatify\AppController\Tables;

use App\DB\DBS\DbConnector;
use Maatify\Json\Json;

class AppVersions extends DbConnector
{
    public const        TABLE_NAME                 = "app_versions";
    public const        TABLE_ALIAS                = '';
    public const        IDENTIFY_TABLE_ID_COL_NAME = 'version_id';
    public const        LOGGER_TYPE                = self::TABLE_NAME;
    public const        LOGGER_SUB_TYPE            = '';
    public const        COLS                       = [
        self::IDENTIFY_TABLE_ID_COL_NAME => 1,
        'version_no'                     => 1,
        'name'                           => 0,
        'allowed'                        => 1,
        'app_id'                         => 1,
    ];

    protected string $tableName = self::TABLE_NAME;
    protected string $tableAlias = self::TABLE_ALIAS;
    protected string $identify_table_id_col_name = self::IDENTIFY_TABLE_ID_COL_NAME;
    protected string $logger_type = self::LOGGER_TYPE;
    protected string $logger_sub_type = self::LOGGER_SUB_TYPE;
    protected array $cols = self::COLS;
    private static self $instance;

    public static function obj(): self
    {
        if (empty(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    private int $app_type_id = 0;
    private int $app_version = 0;
    private string $device_name = '';
    private string $device_id = '';
    private string $app_type_name = '';
    public function Validate(): void
    {
        $this->app_type_id = (int)$this->postValidator->Require('app_type_id', 'int');
        if (! in_array($this->app_type_id, AppType::ALL_APPS)) {
            Json::Incorrect('app_type_id');
            // app type 1: web, 2: android, 3: ios, 4: Huawei
        } else {
            $this->app_version = (int)$this->postValidator->Require('app_version', 'int');
            if (! $this->Check()) {
                $url = match ($this->app_type_id) {
                    2 => AppSocial::obj()->AndroidUrl(),
                    3 => AppSocial::obj()->IosUrl(),
                    4 => AppSocial::obj()->HuaweiUrl(),
                    5 => AppSocial::obj()->AndroidAgentUrl(),
                    6 => AppSocial::obj()->IosAgentUrl(),
                    7 => AppSocial::obj()->HuaweiAgentUrl(),
                    default => '',
                };

                Json::Incorrect('app_version', /*'Wrong APP Version (Need Updates)'*/ $url);
            }
            $this->device_name = $this->postValidator->Require('device_name', 'device_name');
            $this->device_id = $this->postValidator->Require('device_id', 'device_id');
            $this->app_type_name = AppType::obj()->TypeName($this->app_type_id);
        }
    }

    private function Check(): int
    {
        return (int)$this->ColThisTable('allowed',
            "`app_id` = '$this->app_type_id' AND (`version_no` <= '$this->app_version' OR 
            (`version_no` = '$this->app_version' AND `$this->identify_table_id_col_name` = 
                (select `$this->identify_table_id_col_name` 
                FROM `$this->tableName` 
                WHERE `app_id` = '$this->app_type_id' 
                ORDER BY `$this->identify_table_id_col_name` DESC LIMIT 1)
            )
            ) ORDER BY `$this->identify_table_id_col_name` DESC LIMIT 1");
    }

    public function AppTypeId(): int
    {
        return $this->app_type_id;
    }

    public function AppVersion(): int
    {
        return $this->app_version;
    }

    public function DeviceName(): string
    {
        return $this->device_name;
    }

    public function DeviceID(): string
    {
        return $this->device_id;
    }

    public function AppTypeName(): string
    {
        return $this->app_type_name;
    }
}