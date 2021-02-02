<?php ini_set("memory_limit" , "-1"); ?>
<?php ini_set("max_execution_time" , "50000"); ?>
<?php
    function primeFactors($num) {
        $base = intval($num/2);
        $pf = array();
        $pn = null;
        for($i=2;$i <= $base;$i++) {
            $pn[] = $i;
            while($num % $i == 0)
            {
                $pf[] = $i;
                $num = $num/$i;
            }
        }
        return $pf;
    } 
?>
<?php
    $primeForLoopOne = array();
    $compositeForLoopOne = array();
    $primeForLoopTwo = array();
    $compositeForLoopTwo = array();

    for ($i=5; $i<=100000 ; $i++) { 
        if ($i % 2 == 0) {
            $compositeForLoopOne[] = $i;
        }
        else {
            $primeForLoopOne[] = $i;
        }
    }
    
    foreach ($primeForLoopOne as $key => $value) {
        $k = (int)$value**0.5;
        for ($j=3 ; $j<=$k ; $j++) { 
            if ($j % 2 != 0) {
                if ($value % $j == 0) {
                    $compositeForLoopTwo[] = $value;
                    continue 2;
                }
            }
        }
        $primeForLoopTwo[] = $value;
    }
    $finalCompositeArray = array_merge($compositeForLoopOne, $compositeForLoopTwo);
    sort($finalCompositeArray);
    $primeFactors = array();
    $final_time = array();
    foreach ($finalCompositeArray as $key => $value) {
        $start_time = microtime(true);
        $primeFactors[$value] = primeFactors($value);
        $end_time = microtime(true);
        $final_time[$value] = ($end_time - $start_time);
    }

    file_put_contents('primebankq2.txt', var_export($primeForLoopTwo, true));

    file_put_contents('primefactorsq2.txt', var_export($primeFactors, true));

    file_put_contents('timebankq2.txt', var_export($final_time, true));
?>