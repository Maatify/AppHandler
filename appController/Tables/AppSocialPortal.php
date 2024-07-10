<?php
/**
 * Created by Maatify.dev
 * User: Maatify.dev
 * Date: 2024-07-10
 * Time: 9:34 AM
 * https://www.Maatify.dev
 */

namespace Maatify\AppController\Tables;

use App\DB\Handler\ParentClassHandler;
use Maatify\Json\Json;
use Maatify\PostValidatorV2\ValidatorConstantsTypes;
use Maatify\PostValidatorV2\ValidatorConstantsValidators;

class AppSocialPortal extends ParentClassHandler
{
    public const TABLE_NAME                 = AppSocial::TABLE_NAME;
    public const TABLE_ALIAS                = AppSocial::TABLE_ALIAS;
    public const IDENTIFY_TABLE_ID_COL_NAME = AppSocial::IDENTIFY_TABLE_ID_COL_NAME;
    public const LOGGER_TYPE                = AppSocial::LOGGER_TYPE;
    public const LOGGER_SUB_TYPE            = AppSocial::LOGGER_SUB_TYPE;
    public const COLS                       = AppSocial::COLS;

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
        ['email', ValidatorConstantsTypes::Email, ValidatorConstantsValidators::Optional],
        ['facebook', ValidatorConstantsTypes::String, ValidatorConstantsValidators::Optional],
        ['twitter', ValidatorConstantsTypes::String, ValidatorConstantsValidators::Optional],
        ['instagram', ValidatorConstantsTypes::String, ValidatorConstantsValidators::Optional],
        ['linkedin', ValidatorConstantsTypes::String, ValidatorConstantsValidators::Optional],
        ['youtube', ValidatorConstantsTypes::String, ValidatorConstantsValidators::Optional],
        ['whatsapp', ValidatorConstantsTypes::String, ValidatorConstantsValidators::Optional],
        ['about_us', ValidatorConstantsTypes::String, ValidatorConstantsValidators::Optional],
        ['privacy_policy', ValidatorConstantsTypes::String, ValidatorConstantsValidators::Optional],
        ['returns_refunds_policy', ValidatorConstantsTypes::String, ValidatorConstantsValidators::Optional],
        ['dev_name', ValidatorConstantsTypes::String, ValidatorConstantsValidators::Optional],
        ['dev_url', ValidatorConstantsTypes::String, ValidatorConstantsValidators::Optional],
        ['android_app', ValidatorConstantsTypes::String, ValidatorConstantsValidators::Optional],
        ['ios_app', ValidatorConstantsTypes::String, ValidatorConstantsValidators::Optional],
        ['huawei_app', ValidatorConstantsTypes::String, ValidatorConstantsValidators::Optional],
        ['android_agent_app', ValidatorConstantsTypes::String, ValidatorConstantsValidators::Optional],
        ['ios_agent_app', ValidatorConstantsTypes::String, ValidatorConstantsValidators::Optional],
        ['huawei_agent_app', ValidatorConstantsTypes::String, ValidatorConstantsValidators::Optional],
    ];



    public function AppView(): void
    {
        $result = $this->RowThisTableByID(1);
        unset($result[self::IDENTIFY_TABLE_ID_COL_NAME]);

        Json::Success(
            $result,

            line: $this->class_name . __LINE__
        );
    }

    public function UpdateByPostedId(): void
    {
        $_POST[self::IDENTIFY_TABLE_ID_COL_NAME] = 1;
        parent::UpdateByPostedId();
    }
}