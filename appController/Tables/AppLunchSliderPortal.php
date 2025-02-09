<?php
/**
 * @PHP       Version >= 8.2
 * @copyright ©2023 Maatify.dev
 * @author    Mohamed Abdulalim (megyptm) <mohamed@maatify.dev>
 * @since     2024-07-10 1:06 PM
 * @link      https://www.maatify.dev Maatify.com
 * @link      https://github.com/Maatify/AppHandler  view project on GitHub
 * @Maatify   AppHandler :: AppLunchSliderPortal
 */

namespace Maatify\AppController\Tables;

use \App\Assist\AppFunctions;
use \App\DB\Tables\DbLanguage;
use Maatify\Json\Json;
use Maatify\LanguagePortalHandler\DBHandler\ParentLanguageSliderHandler;
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
        ['is_archived', ValidatorConstantsTypes::Bool, ValidatorConstantsValidators::Optional],

    ];

    protected array $cols_to_filter = [
        ['image_type', ValidatorConstantsTypes::Small_Letters, ValidatorConstantsValidators::Optional],
        [self::IDENTIFY_TABLE_ID_COL_NAME, ValidatorConstantsTypes::Int, ValidatorConstantsValidators::Optional],
        ['title', ValidatorConstantsTypes::Name, ValidatorConstantsValidators::Optional],
        [ValidatorConstantsTypes::Status, ValidatorConstantsTypes::Status, ValidatorConstantsValidators::Optional],
        ['is_archived', ValidatorConstantsTypes::Bool, ValidatorConstantsValidators::Optional],
    ];

    // to use in add if child classes no have language_id
    protected array $child_classes = [];

    // to use in add if child classes have language_id
    protected array $child_classe_languages = [];

    protected string $table_destination_class = DbLanguage::class;

    private static self $instance;

    public static function obj(): self
    {
        if (empty(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function Record(): void
    {
        $image_type = $this->postValidator->Require('image_type', ValidatorConstantsTypes::Small_Letters);
        if(!in_array($image_type, AppFunctions::LunchScreenImageTypes())) {
            Json::Incorrect('image_type', AppFunctions::LunchScreenImageTypesErrorMessage());
        }
        parent::Record();
    }

    public function UpdateByPostedId(): void
    {
        $image_type = $this->postValidator->Optional('image_type', ValidatorConstantsTypes::Small_Letters);
        if(!empty($image_type) && !in_array($image_type, AppFunctions::LunchScreenImageTypes())) {
            Json::Incorrect('image_type', AppFunctions::LunchScreenImageTypesErrorMessage());
        }
        parent::UpdateByPostedId();
    }
}