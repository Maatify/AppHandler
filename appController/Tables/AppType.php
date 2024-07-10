<?php
/**
 * Created by Maatify.dev
 * User: Maatify.dev
 * Date: 2024-07-10
 * Time: 8:29 AM
 * https://www.Maatify.dev
 */

namespace Maatify\AppController\Tables;

use App\DB\DBS\DbConnector;
use Maatify\Json\Json;

class AppType extends DbConnector
{
    public const        TABLE_NAME                 = "app_type";
    public const        TABLE_ALIAS                = 'app_type';
    public const        IDENTIFY_TABLE_ID_COL_NAME = 'app_id';
    public const        LOGGER_TYPE                = self::TABLE_NAME;
    public const        LOGGER_SUB_TYPE            = '';
    public const        COLS                       = [
        self::IDENTIFY_TABLE_ID_COL_NAME => 1,
        'icon'                           => 0,
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

    public const ALL_APPS = [1, 2, 3, 4, 5, 6, 7];

    public function TypeName(int $type_id): string
    {
        return $this->ColThisTable('name', "`$this->identify_table_id_col_name` = ? ", [$type_id]);
    }

    public function All(): void
    {
        Json::Success(
            $this->RowsThisTable()
        );
    }
}