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
    CAST(NET_AMOUNT AS FLOAT64) AS NET_AMOUNT, TRX_CODE, BUSINESS_DATE, TC_SUBGROUP, BILL_NO, FISCAL_BILL_NO, TRAN_ACTION_ID, ROOM CAST(SUBSTR(BUSINESS_DATE,6,2)AS INT64) AS MONTH 
    FROM 
    `pit-analytics-2019.PIT_SISTEMAS.Pac_2018_Lte`
    ORDER BY BUSINESS_DATE";
    return $this->bigquery->query($query);

  }

}

?>