<?php
/**
 * Created by Maatify.dev
 * User: Maatify.dev
 * Date: 2024-07-10
 * Time: 9:44 AM
 * https://www.Maatify.dev
 */

namespace Maatify\AppController\Tables;

use App\DB\Handler\ParentClassHandler;
use Maatify\PostValidatorV2\ValidatorConstantsTypes;
use Maatify\PostValidatorV2\ValidatorConstantsValidators;

class AppTypePortal extends ParentClassHandler
{
    public const TABLE_NAME                 = AppType::TABLE_NAME;
    public const TABLE_ALIAS                = AppType::TABLE_ALIAS;
    public const IDENTIFY_TABLE_ID_COL_NAME = AppType::IDENTIFY_TABLE_ID_COL_NAME;
    public const LOGGER_TYPE                = AppType::LOGGER_TYPE;
    public const LOGGER_SUB_TYPE            = AppType::LOGGER_SUB_TYPE;
    public const COLS                       = AppType::COLS;

    protected string $tableName = self::TABLE_NAME;
    protected string $tableAlias = self::TABLE_ALIAS;
    protected string $identify_table_id_col_name = self::IDENTIFY_TABLE_ID_COL_NAME;
    protected string $logger_type = self::LOGGER_TYPE;
    protected string $logger_sub_type = self::LOGGER_TYPE;
    protected array $cols = self::COLS;
    private static self $instance;

    public static function obj(): self
    {
        if (empty(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    protected array $cols_to_edit = [
        ['icon', ValidatorConstantsTypes::String, ValidatorConstantsValidators::Optional],
        ['name', ValidatorConstantsTypes::NameEn, ValidatorConstantsValidators::Optional],
    ];

    protected array $cols_to_filter = [
        [self::IDENTIFY_TABLE_ID_COL_NAME, ValidatorConstantsTypes::Int, ValidatorConstantsValidators::Optional],
        ['name', ValidatorConstantsTypes::NameEn, ValidatorConstantsValidators::Optional],
    ];
}