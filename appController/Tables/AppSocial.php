<?php
/**
 * @PHP       Version >= 8.2
 * @copyright ©2023 Maatify.dev
 * @author    Mohamed Abdulalim (megyptm) <mohamed@maatify.dev>
 * @since     2024-07-10 9:00 AM
 * @link      https://www.maatify.dev Maatify.com
 * @link      https://github.com/Maatify/AppHandler  view project on GitHub
 * @Maatify   AppHandler :: AppSocial
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
        'privacy_policy'                 => 0,
        'returns_refunds_policy'         => 0,
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

    public function socialRow(): array
    {
        return $this->RowThisTable('`email`, 
        `facebook`, 
        `twitter`, 
        `instagram`, 
        `linkedin`, 
        `youtube`, 
        `whatsapp`, 
        `dev_name`, 
        `dev_url`', "`$this->identify_table_id_col_name` = ? ", [1]);
    }

    public function androidUrl(): string
    {
        return $this->ColByName('android_app');
    }

    public function iosUrl(): string
    {
        return $this->ColByName('ios_app');
    }

    public function huaweiUrl(): string
    {
        return $this->ColByName('huawei_app');
    }

    public function androidAgentUrl(): string
    {
        return $this->ColByName('android_agent_app');
    }

    public function iosAgentUrl(): string
    {
        return $this->ColByName('ios_agent_app');
    }

    public function huaweiAgentUrl(): string
    {
        return $this->ColByName('huawei_agent_app');
    }

    private function ColByName(string $col): string
    {
        return $this->ColThisTable($col, "`$this->identify_table_id_col_name` = ? ", [1]);
    }
}