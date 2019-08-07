<?php
//
namespace App\Modules;
//
use App\Primitives\BigQueryConnection as Connection;
//
class PacGroup extends Connection{
    
  public function tcGroup(){

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
       AND
      BUSINESS_DATE IN (SELECT DISTINCT(BUSINESS_DATE) FROM `pit-analytics-2019.PIT_SISTEMAS.Pac_2018_Lte` ORDER BY BUSINESS_DATE)
  ORDER BY
    BUSINESS_DATE";
    return $this->bigquery->query($query);

  }

  public function trxCode(){

    $query=
    "SELECT TRX_CODE, DESCRIPTION FROM `pit-analytics-2019.PIT_SISTEMAS.PAC_GROUP` ORDER BY(TRX_CODE)";
    return $this->bigquery->query($query);

  }

  public function tcSubgroup(){

    $query=
    "SELECT DISTINCT(TC_SUBGROUP) FROM `pit-analytics-2019.PIT_SISTEMAS.PAC_GROUP` ORDER BY(TC_SUBGROUP)";
    return $this->bigquery->query($query);

  }

  public function taxInclusiveYn(){

    $query=
    "SELECT DISTINCT(TAX_INCLUSIVE_YN) FROM `pit-analytics-2019.PIT_SISTEMAS.PAC_GROUP` ORDER BY(TAX_INCLUSIVE_YN)";
    return $this->bigquery->query($query);

  }

}

?>