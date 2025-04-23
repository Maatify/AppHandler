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
use JetBrains\PhpStorm\NoReturn;
use Maatify\AppController\Contracts\AppRedisLunchInfoInterface;
use Maatify\Json\Json;
use Maatify\LanguagePortalHandler\DBHandler\ParentLanguageSliderHandler;
use Maatify\LanguagePortalHandler\Language\DbLanguage;
use Maatify\LanguagePortalHandler\Tables\LanguageTable;
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
        [LanguageTable::IDENTIFY_TABLE_ID_COL_NAME, ValidatorConstantsTypes::Int, ValidatorConstantsValidators::Require],
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

    // Singleton instance getter
    public static function obj(?AppRedisLunchInfoInterface $appRedisLunchInfo): self
    {
        return self::$instance ??= new self($appRedisLunchInfo);
    }

    public function __construct(private readonly ?AppRedisLunchInfoInterface $appRedisLunchInfo)
    {
        parent::__construct();
    }

    #[NoReturn] public function Record(): void
    {
        $image_type = $this->postValidator->Require('image_type', ValidatorConstantsTypes::Small_Letters);
        if(!in_array($image_type, AppFunctions::LunchScreenImageTypes())) {
            Json::Incorrect('image_type', AppFunctions::LunchScreenImageTypesErrorMessage());
        }
        parent::SilentRecord();
        $this->success(__LINE__);
    }

    #[NoReturn] public function UpdateByPostedId(): void
    {
        $image_type = $this->postValidator->Optional('image_type', ValidatorConstantsTypes::Small_Letters);
        if(!empty($image_type) && !in_array($image_type, AppFunctions::LunchScreenImageTypes())) {
            Json::Incorrect('image_type', AppFunctions::LunchScreenImageTypesErrorMessage());
        }
        parent::UpdateByPostedIdSilent();
        $this->success(__LINE__);
    }

    #[NoReturn] public function SwitchByKey(string $key): void
    {
        parent::SwitchByKeySilent($key);
        $this->success(__LINE__);
    }

    #[NoReturn] public function SwitchStatus(): void
    {
        parent::SwitchStatusSilent();
        $this->success(__LINE__);
    }

    #[NoReturn] public function UploadImage(): void
    {
        parent::UploadImageSilent();
        $this->success(__LINE__);
    }

    #[NoReturn] private function success(int $line): void
    {
        if(!empty($this->appRedisLunchInfo)) {
            $this->appRedisLunchInfo->deleteLunchSlider();
        }
        Json::Success(line: $this->class_name . $line);
    }
}