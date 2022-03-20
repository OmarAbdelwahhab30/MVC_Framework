<?php

namespace PHPMVC\lib;

use PHPMVC\models\IndexModel;

class Paginator extends AbstractController
{


    /*
     *
     * There is join or not
     * */

    /**
     * records per page
     */
    public  const   RECORDS_PER_PAGE =4;
    /**
     * @var mixed
     */
    private $ModelHelper;
    /**
     * @var false|float
     */
    private $RecordsNum;

    public $PagesNum;


    public $JoinTablesNum;
    private $PageParameter;

    private $TableName;

    public $JoinInfo = array();

    protected $Data = array();

    public function __construct($tablename,$columnname,$condition,$PageNumber,$JoinInfo = array())
    {
        $this->ModelHelper = (new \PHPMVC\models\IndexModel)->CountTableRows($tablename,$columnname,$condition);

        $this->RecordsNum = $this->ModelHelper->count;

        $this->PagesNum = ceil($this->RecordsNum / self::RECORDS_PER_PAGE);

        $this->PageParameter = $PageNumber;

        $this->TableName = $tablename;

        $this->JoinTablesNum = $JoinInfo['TablesNum'];

        $this->JoinInfo = $JoinInfo;

        $this->PaginationController();

    }

    public function PaginationController()
    {
        $FromWhichRecord = ($this->PageParameter - 1) * self::RECORDS_PER_PAGE ;
        $Data = (new \PHPMVC\models\IndexModel)->PaginationHelper($this->TableName,$FromWhichRecord,$this->JoinInfo);
        $this->Data = $Data;
    }

    public function Paginate()
    {
        return $this->Data;
    }

    public function GetPagesNum()
    {
        return $this->PagesNum;
    }

}