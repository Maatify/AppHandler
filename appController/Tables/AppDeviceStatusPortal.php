<?php
/**
 * @PHP       Version >= 8.0
 * @copyright ©2023 Maatify.dev
 * @author    Mohamed Abdulalim (megyptm) <mohamed@maatify.dev>
 * @since     2025-01-7 6:29 AM
 * @link      https://www.maatify.dev Maatify.com
 * @link      https://github.com/Maatify/AppHandler  view project on GitHub
 * @Maatify   AppHandler :: AppDeviceStatusPortal
 */

namespace Maatify\AppController\Tables;

use Maatify\Portal\DbHandler\ParentClassHandler;
use Maatify\PostValidatorV2\ValidatorConstantsTypes;
use Maatify\PostValidatorV2\ValidatorConstantsValidators;

class AppDeviceStatusPortal extends ParentClassHandler
{
    public const IDENTIFY_TABLE_ID_COL_NAME = AppDeviceStatus::IDENTIFY_TABLE_ID_COL_NAME;
    public const TABLE_NAME                 = AppDeviceStatus::TABLE_NAME;
    public const TABLE_ALIAS                = AppDeviceStatus::TABLE_ALIAS;
    public const LOGGER_TYPE                = AppDeviceStatus::LOGGER_TYPE;
    public const LOGGER_SUB_TYPE            = AppDeviceStatus::LOGGER_SUB_TYPE;
    public const COLS                       = AppDeviceStatus::COLS;
    public const IMAGE_FOLDER               = self::TABLE_NAME;

    protected string $identify_table_id_col_name = self::IDENTIFY_TABLE_ID_COL_NAME;
    protected string $tableName = self::TABLE_NAME;
    protected string $tableAlias = self::TABLE_ALIAS;
    protected string $logger_type = self::LOGGER_TYPE;
    protected string $logger_sub_type = self::LOGGER_SUB_TYPE;
    protected array $cols = self::COLS;
    protected string $image_folder = self::IMAGE_FOLDER;

    // to use in list of AllPaginationThisTableFilter()
    protected array $inner_language_tables = [];

    // to use in list of source and destination rows with names
    protected string $inner_language_name_class = '';

    protected array $cols_to_add = [
        [ValidatorConstantsTypes::Name, ValidatorConstantsTypes::Name, ValidatorConstantsValidators::Require],
        [ValidatorConstantsTypes::Style, ValidatorConstantsTypes::Style, ValidatorConstantsValidators::Require],
    ];

    protected array $cols_to_edit = [
        [ValidatorConstantsTypes::Name, ValidatorConstantsTypes::Name, ValidatorConstantsValidators::Optional],
        [ValidatorConstantsTypes::Style, ValidatorConstantsTypes::Style, ValidatorConstantsValidators::Optional],
    ];

    protected array $cols_to_filter = [
        [self::IDENTIFY_TABLE_ID_COL_NAME, ValidatorConstantsTypes::Int, ValidatorConstantsValidators::Optional],
    ];

    // to use in add if child classes no have language_id
    protected array $child_classes = [];

    // to use in add if child classes have language_id
    protected array $child_classe_languages = [];
    private static self $instance;

    public static function obj(): self
    {
        if (empty(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }
}