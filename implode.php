<?php
    function implodeArray($arrayData)
    {
        $result='';
        for ($i=0; $i <sizeof($arrayData) ; $i++) {
            if(substr($arrayData[$i],0,7)=='convert')
            {
                $result=$result." ".$arrayData[$i];
            }
            else
            {
                $result=$result."'".$arrayData[$i]."'";
            }
            if($i<sizeof($arrayData)-1)
            {
                $result=$result.",";
            }
        }
        return $result;
    }
?>