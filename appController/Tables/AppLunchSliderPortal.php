<?php
/**
 * Created by Maatify.dev
 * User: Maatify.dev
 * Date: 2024-07-10
 * Time: 1:06 PM
 * https://www.Maatify.dev
 */

namespace Maatify\AppController\Tables;

use App\DB\Handler\ParentLanguageSliderHandler;
use App\DB\Tables\DbLanguage;
use Maatify\PostValidatorV2\ValidatorConstantsTypes;
use Maatify\PostValidatorV2\ValidatorConstantsValidators;

class AppLunchSliderPortal extends ParentLanguageSliderHandler
{
    public const IDENTIFY_TABLE_ID_COL_NAME = AppLunchSlider::IDENTIFY_TABLE_ID_COL_NAME;
    public const TABLE_NAME                 = AppLunchSlider::TABLE_NAME;
    public const TABLE_ALIAS                = AppLunchSlider::TABLE_ALIAS;
    public const LOGGER_TYPE                = AppLunchSlider::LOGGER_TYPE;
    public const LOGGER_SUB_TYPE            = AppLunchSlider::LOGGER_SUB_TYPE;
    public const COLS                       = AppLunchSlider::COLS;
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
        [DbLanguage::IDENTIFY_TABLE_ID_COL_NAME, ValidatorConstantsTypes::Int, ValidatorConstantsValidators::Require],
        ['image_type', ValidatorConstantsTypes::Small_Letters, ValidatorConstantsValidators::Require],
        ['image', ValidatorConstantsTypes::String, ValidatorConstantsValidators::Optional],
        ['title', ValidatorConstantsTypes::Name, ValidatorConstantsValidators::Require],
        [ValidatorConstantsTypes::Description, ValidatorConstantsTypes::Description, ValidatorConstantsValidators::Require],
        ['sort', ValidatorConstantsTypes::Int, ValidatorConstantsValidators::Optional],
        ['status', ValidatorConstantsTypes::Int, ValidatorConstantsValidators::Optional],

    ];

    protected array $cols_to_edit = [
        ['title', ValidatorConstantsTypes::Name, ValidatorConstantsValidators::Optional],
        [ValidatorConstantsTypes::Description, ValidatorConstantsTypes::Description, ValidatorConstantsValidators::Optional],
        ['sort', ValidatorConstantsTypes::Int, ValidatorConstantsValidators::Optional],
        [ValidatorConstantsTypes::Status, ValidatorConstantsTypes::Status, ValidatorConstantsValidators::Optional],

    ];

    protected array $cols_to_filter = [
        [self::IDENTIFY_TABLE_ID_COL_NAME, ValidatorConstantsTypes::Int, ValidatorConstantsValidators::Optional],
        ['title', ValidatorConstantsTypes::Name, ValidatorConstantsValidators::Optional],
        [ValidatorConstantsTypes::Status, ValidatorConstantsTypes::Status, ValidatorConstantsValidators::Optional],
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