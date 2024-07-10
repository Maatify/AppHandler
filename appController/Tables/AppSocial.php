<?php
/**
 * Created by Maatify.dev
 * User: Maatify.dev
 * Date: 2024-07-10
 * Time: 9:00 AM
 * https://www.Maatify.dev
 */

namespace Maatify\AppController\Tables;

use App\DB\DBS\DbConnector;

class AppSocial extends DbConnector
{
    public const        TABLE_NAME                 = "app_social";
    public const        TABLE_ALIAS                = '';
    public const        IDENTIFY_TABLE_ID_COL_NAME = 'social_id';
    public const        LOGGER_TYPE                = self::TABLE_NAME;
    public const        LOGGER_SUB_TYPE            = '';
    public const        COLS                       = [
        self::IDENTIFY_TABLE_ID_COL_NAME => 1,
        'email'                          => 0,
        'facebook'                       => 0,
        'twitter'                        => 0,
        'instagram'                      => 0,
        'linkedin'                       => 0,
        'youtube'                        => 0,
        'whatsapp'                       => 0,
        'about_us'                       => 0,
        'dev_name'                       => 0,
        'dev_url'                        => 0,
        'ios_app'                        => 0,
        'android_app'                    => 0,
        'huawei_app'                     => 0,
        'ios_agent_app'                  => 0,
        'android_agent_app'              => 0,
        'huawei_agent_app'               => 0,
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


    public function AppView(): array
    {
        return $this->RowThisTableByID(1);
    }

    public function AndroidUrl(): string
    {
        return $this->ColByName('android_app');
    }

    public function IosUrl(): string
    {
        return $this->ColByName('ios_app');
    }

    public function HuaweiUrl(): string
    {
        return $this->ColByName('huawei_app');
    }

    public function AndroidAgentUrl(): string
    {
        return $this->ColByName('android_agent_app');
    }

    public function IosAgentUrl(): string
    {
        return $this->ColByName('ios_agent_app');
    }

    public function HuaweiAgentUrl(): string
    {
        return $this->ColByName('huawei_agent_app');
    }

    private function ColByName(string $col): string
    {
        return $this->ColThisTable($col, "`$this->identify_table_id_col_name` = ? ", [1]);
    }
}