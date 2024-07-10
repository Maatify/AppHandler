<?php
/**
 * @PHP       Version >= 8.0
 * @copyright ©2023 Maatify.dev
 * @author    Mohamed Abdulalim (megyptm) <mohamed@maatify.dev>
 * @since     2023-06-03 11:40 AM
 * @link      https://www.maatify.dev Maatify.com
 * @link      https://github.com/Maatify/cooperation  view project on GitHub
 * @Maatify   cooperation :: AppPhones
 */

namespace Maatify\AppController\Tables;


use App\DB\DBS\DbConnector;

class AppPhones extends DbConnector
{
    public const        TABLE_NAME                 = "app_phones";
    public const        TABLE_ALIAS                = '';
    public const        IDENTIFY_TABLE_ID_COL_NAME = 'phone_id';
    public const        LOGGER_TYPE                = self::TABLE_NAME;
    public const        LOGGER_SUB_TYPE            = '';
    public const        COLS                       = [
        self::IDENTIFY_TABLE_ID_COL_NAME => 1,
        'phone'                          => 0,
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

    protected function CheckPhoneExist(string $phone): bool
    {
        return $this->RowIsExistThisTable('`phone` = ? ', [$phone]);
    }


    public function AppView(): array
    {
        return $this->RowsThisTable('`phone`', "`$this->identify_table_id_col_name` > ? ORDER BY `sort` ASC ", [0]);
    }
}