<?php
/**
 * Created by Maatify.dev
 * User: Maatify.dev
 * Date: 2024-07-10
 * Time: 9:32 AM
 * https://www.Maatify.dev
 */

namespace Maatify\AppController\Tables;

use App\DB\Handler\ParentClassHandler;
use Maatify\Json\Json;
use Maatify\PostValidatorV2\ValidatorConstantsTypes;
use Maatify\PostValidatorV2\ValidatorConstantsValidators;

class AppPhonesPortal extends ParentClassHandler
{
    public const TABLE_NAME                 = AppPhones::TABLE_NAME;
    public const TABLE_ALIAS                = AppPhones::TABLE_ALIAS;
    public const IDENTIFY_TABLE_ID_COL_NAME = AppPhones::IDENTIFY_TABLE_ID_COL_NAME;
    public const LOGGER_TYPE                = AppPhones::LOGGER_TYPE;
    public const LOGGER_SUB_TYPE            = AppPhones::LOGGER_SUB_TYPE;
    public const COLS                       = AppPhones::COLS;

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
        ['phone', ValidatorConstantsTypes::String, ValidatorConstantsValidators::Require],
    ];

    protected array $cols_to_edit = [
        ['phone', ValidatorConstantsTypes::Int, ValidatorConstantsValidators::Optional],
    ];

    protected array $cols_to_filter = [
        [self::IDENTIFY_TABLE_ID_COL_NAME, ValidatorConstantsTypes::Int, ValidatorConstantsValidators::Optional],
        ['phone', ValidatorConstantsTypes::Bool, ValidatorConstantsValidators::Optional],
    ];

    public function Record(): void
    {
        $phone = $this->postValidator->Require('phone', ValidatorConstantsTypes::Phone);
        if($this->CheckPhoneExist($phone)){
            Json::Exist('phone', 'Phone number already exists', $this->class_name . __LINE__);
        }else{
            parent::Record();
        }
    }

    public function AllPaginationThisTableFilter(string $order_with_asc_desc = ''): void
    {
        parent::AllPaginationThisTableFilter($order_with_asc_desc ? '' : ' ORDER BY sort ASC');
    }

    public function UpdateByPostedId(): void
    {
        $phone = $this->postValidator->Require('phone', ValidatorConstantsTypes::Phone);
        if($this->CheckPhoneExist($phone)){
            Json::Exist('phone', 'Phone number already exists', $this->class_name . __LINE__);
        }else{
            parent::UpdateByPostedId();
        }
    }



    private function CheckPhoneExist(string $phone): bool
    {
        return $this->RowIsExistThisTable('`phone` = ? ', [$phone]);
    }
}