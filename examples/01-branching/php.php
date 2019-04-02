<?php declare(strict_types=1); namespace ct_22481;
function add1or2(int $p_0, int $p_1): int {
main:
    $t_5 = $p_0 > 0;
    if ($t_5) {
            $bs_0 = $p_1;
    goto ifTrue;

    } else {
            $bs_1 = $p_1;
    goto ifFalse;

    }
ifTrue:
    $ba_6 = $bs_0;
    $t_7 = $ba_6 + 1;
    return $t_7;
ifFalse:
    $ba_8 = $bs_1;
    $t_9 = $ba_8 + 2;
    return $t_9;
}
