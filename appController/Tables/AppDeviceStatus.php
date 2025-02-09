<?php
/**
 * @PHP       Version >= 8.2
 * @copyright ©2023 Maatify.dev
 * @author    Mohamed Abdulalim (megyptm) <mohamed@maatify.dev>
 * @since     2025-01-7 6:24 AM
 * @link      https://www.maatify.dev Maatify.com
 * @link      https://github.com/Maatify/AppHandler  view project on GitHub
 * @Maatify   AppHandler :: AppDeviceStatusEnum
 */

namespace Maatify\AppController\Tables;

use App\DB\DBS\DbConnector;
use Maatify\Json\Json;

class AppDeviceStatus extends DbConnector
{
    public const        TABLE_NAME                 = "app_device_status";
    public const        TABLE_ALIAS                = 'app_device_status';
    public const        IDENTIFY_TABLE_ID_COL_NAME = 'device_status_id';
    public const        LOGGER_TYPE                = self::TABLE_NAME;
    public const        LOGGER_SUB_TYPE            = '';
    public const        COLS                       = [
        self::IDENTIFY_TABLE_ID_COL_NAME => 1,
        'style'                          => 0,
        'name'                           => 0,
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

    public function All(): void
    {
        Json::Success(
            $this->RowsThisTable()
        );
    }

    public function InnerJoinThisTableByIdentifyId(string $tables): array
    {
        return [
            "INNER JOIN `$this->tableName` ON `$this->tableName`.`$this->identify_table_id_col_name` = `$tables`.`$this->identify_table_id_col_name`",
            "`$this->tableName`.`name` as app_name, `$this->tableName`.`app_icon` as app_icon",
        ];
    }
}