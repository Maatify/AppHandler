<?php
/**
 * Created by Maatify.dev
 * User: Maatify.dev
 * Date: 2024-07-10
 * Time: 9:40 AM
 * https://www.Maatify.dev
 */

namespace Maatify\AppController\Tables;

use App\DB\Handler\ParentClassHandler;
use Maatify\Json\Json;
use Maatify\PostValidatorV2\ValidatorConstantsTypes;
use Maatify\PostValidatorV2\ValidatorConstantsValidators;

class AppVersionsPortal extends ParentClassHandler
{
    public const TABLE_NAME                 = AppVersions::TABLE_NAME;
    public const TABLE_ALIAS                = AppVersions::TABLE_ALIAS;
    public const IDENTIFY_TABLE_ID_COL_NAME = AppVersions::IDENTIFY_TABLE_ID_COL_NAME;
    public const LOGGER_TYPE                = AppVersions::LOGGER_TYPE;
    public const LOGGER_SUB_TYPE            = AppVersions::LOGGER_SUB_TYPE;
    public const COLS                       = AppVersions::COLS;

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

    protected array $cols_to_add = [
        ['version_no', ValidatorConstantsTypes::Int, ValidatorConstantsValidators::Require],
        ['name', ValidatorConstantsTypes::String, ValidatorConstantsValidators::Require],
        ['status', ValidatorConstantsTypes::Bool, ValidatorConstantsValidators::AcceptEmpty],
        ['app_type_id', ValidatorConstantsTypes::Int, ValidatorConstantsValidators::Require],
    ];

    protected array $cols_to_edit = [
        ['version_no', ValidatorConstantsTypes::Int, ValidatorConstantsValidators::Optional],
        ['name', ValidatorConstantsTypes::String, ValidatorConstantsValidators::Optional],
        ['status', ValidatorConstantsTypes::Bool, ValidatorConstantsValidators::Optional],
        ['app_type_id', ValidatorConstantsTypes::Int, ValidatorConstantsValidators::Optional],
    ];

    protected array $cols_to_filter = [
        [self::IDENTIFY_TABLE_ID_COL_NAME, ValidatorConstantsTypes::Int, ValidatorConstantsValidators::Optional],
        ['version_no', ValidatorConstantsTypes::Int, ValidatorConstantsValidators::Optional],
        ['name', ValidatorConstantsTypes::String, ValidatorConstantsValidators::Optional],
        ['status', ValidatorConstantsTypes::Bool, ValidatorConstantsValidators::Optional],
        ['app_type_id', ValidatorConstantsTypes::Int, ValidatorConstantsValidators::Optional],
    ];

    public function Record(): void
    {
        $app_type_id = $this->postValidator->Require('app_type_id', ValidatorConstantsTypes::Int);
        $version_no = $this->postValidator->Require('version_no', ValidatorConstantsTypes::Int);
        if (! in_array($app_type_id, AppType::ALL_APPS)) {
            Json::Incorrect('app_type_id');
        } else {
            $this->CheckExist($version_no, $app_type_id);
            parent::Record();
        }
    }

    public function CheckExist(int $version_no, int $app_type_id): void
    {
        if ($this->RowIsExistThisTable('`version_no` = ? AND `app_type_id` = ?', [$version_no, $app_type_id])) {
            Json::Exist('version_no', 'Version Number AND app_type_id Is Already exist', $this->class_name . __LINE__);
        }
    }

    public function AllPaginationThisTableFilter(string $order_with_asc_desc = ''): void
    {
        [$join, $cols] = AppType::obj()->InnerJoinThisTableByIdentifyId($this->tableName);

        Json::Success(
            $this->ArrayPaginationThisTableFilter("`$this->tableName` " . $join, "`$this->tableName`.*, " . $cols, order_with_asc_desc: $order_with_asc_desc)
        );
    }

    public function UpdateByPostedId(): void
    {
        $this->ValidatePostedTableId();
        $app_type_id = $this->postValidator->Optional('app_type_id', ValidatorConstantsTypes::Int);
        $version_no = $this->postValidator->Optional('version_no', ValidatorConstantsTypes::Int);
        if(!isset($_POST['app_type_id']) || $_POST['app_type_id'] != $this->current_row['app_type_id']) {
            $app_type_id = $this->current_row['app_type_id'];
        }
        if(!isset($_POST['version_no']) || $_POST['version_no'] != $this->current_row['version_no']) {
            $app_type_id = $this->current_row['version_no'];
        }else{
            $this->CheckExist($version_no, $app_type_id);
        }

        parent::UpdateByPostedId();
    }
}