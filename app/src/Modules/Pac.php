<?php
//
namespace App\Modules;
//
use App\Primitives\BigQueryConnection as Connection;
//
class Pac extends Connection{
    
    public function index(){

        $query=
        "SELECT
        CAST(NET_AMOUNT AS FLOAT64) AS NET_AMOUNT,
        TRX_CODE,
        BUSINESS_DATE,
        TC_SUBGROUP,
        TC_GROUP,
        BILL_NO,
        FISCAL_BILL_NO,
        TRAN_ACTION_ID,
        ROOM,
        TAX_INCLUSIVE_YN,
        CAST(SUBSTR(BUSINESS_DATE,6,2)AS INT64) AS MONTH
      FROM
        `pit-analytics-2019.PIT_SISTEMAS.Pac_2018_Lte`
        WHERE
          TC_GROUP IN (SELECT DISTINCT(TC_GROUP) FROM `pit-analytics-2019.PIT_SISTEMAS.PAC_GROUP` ORDER BY TC_GROUP)
          AND
          TC_SUBGROUP IN (SELECT DISTINCT(TC_SUBGROUP) FROM `pit-analytics-2019.PIT_SISTEMAS.PAC_GROUP` ORDER BY TC_SUBGROUP)
          AND
          TRX_CODE IN (SELECT DISTINCT(TRX_CODE) FROM `pit-analytics-2019.PIT_SISTEMAS.PAC_GROUP` ORDER BY TRX_CODE)
      ORDER BY
        BUSINESS_DATE";
        return $this->bigquery->query($query);

    }

    public function date(){

        $query="SELECT DISTINCT(BUSINESS_DATE) AS BUSINESS_DATE FROM  `pit-analytics-2019.PIT_SISTEMAS.Pac_2018_Lte` ORDER BY BUSINESS_DATE;";
        return $this->bigquery->query($query);
 
    }

    public function billNo(){

        $query="SELECT DISTINCT(BILL_NO) AS BILL_NO FROM `pit-analytics-2019.PIT_SISTEMAS.Pac_2018_Lte` ORDER BY BILL_NO;";
        return $this->bigquery->query($query);

    }

    public function room(){

        $query="SELECT DISTINCT(ROOM) AS ROOM FROM `pit-analytics-2019.PIT_SISTEMAS.Pac_2018_Lte` ORDER BY ROOM;";
        return $this->bigquery->query($query);

    }

    public function trxCode(){

        $query="SELECT DISTINCT(TRX_CODE) AS TRX_CODE FROM `pit-analytics-2019.PIT_SISTEMAS.Pac_2018_Lte` ORDER BY TRX_CODE;";
        return $this->bigquery->query($query);

    }

    public function fiscalBillNo(){

        $query="SELECT DISTINCT(FISCAL_BILL_NO) AS FISCAL_BILL_NO FROM `pit-analytics-2019.PIT_SISTEMAS.Pac_2018_Lte` ORDER BY FISCAL_BILL_NO;";
        return $this->bigquery->query($query);

    }

}

?>