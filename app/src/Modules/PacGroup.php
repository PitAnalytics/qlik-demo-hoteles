<?php
//
namespace App\Modules;
//
use App\Primitives\BigQueryConnection as Connection;
//
class PacGroup extends Connection{
    
  public function tcGroup(){

    $query=
    "SELECT DISTINCT(TC_GROUP) FROM `pit-analytics-2019.PIT_SISTEMAS.PAC_GROUP` ORDER BY(TC_GROUP)";
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