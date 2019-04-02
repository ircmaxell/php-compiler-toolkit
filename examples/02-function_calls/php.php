<?php declare(strict_types=1); namespace ct_64245;
function add(int $p_0, int $p_1): int {
main:
    $t_2 = $p_0 + $p_1;
    return $t_2;
}
function add2(int $p_0, int $p_1): int {
main:
    $t_2 = add($p_0, $p_1);
    $t_3 = add($t_2, $p_1);
    return $t_3;
}
