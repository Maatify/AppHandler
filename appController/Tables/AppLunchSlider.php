<?php
/**
 * @PHP       Version >= 8.2
 * @copyright ©2023 Maatify.dev
 * @author    Mohamed Abdulalim (megyptm) <mohamed@maatify.dev>
 * @since     2024-07-10 1:03 PM
 * @link      https://www.maatify.dev Maatify.com
 * @link      https://github.com/Maatify/AppHandler  view project on GitHub
 * @Maatify   AppHandler :: AppLunchSlider
 */

namespace Maatify\AppController\Tables;

use App\DB\DBS\DbConnector;
use Maatify\LanguagePortalHandler\Tables\LanguageTable;

class AppLunchSlider extends DbConnector
{
    public const        TABLE_NAME                 = "app_lunch_slider";
    public const        TABLE_ALIAS                = '';
    public const        IDENTIFY_TABLE_ID_COL_NAME = 'slider_id';
    public const        LOGGER_TYPE                = self::TABLE_NAME;
    public const        LOGGER_SUB_TYPE            = '';
    public const        COLS                       = [
        self::IDENTIFY_TABLE_ID_COL_NAME          => 1,
        LanguageTable::IDENTIFY_TABLE_ID_COL_NAME => 1,
        'image_type'                              => 0,
        'image'                                   => 0,
        'title'                                   => 0,
        'description'                             => 0,
        'sort'                                    => 1,
        'status'                                  => 1,
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
}