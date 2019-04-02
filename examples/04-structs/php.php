<?php declare(strict_types=1); namespace ct_92027;
class testA {
    public int $a;
    public int $b;
}
function add(int $p_0, int $p_1): int {
    $l_0 = new \ct_92027\testA;
main:
    $l_0->a = $p_0;
    $l_0->b = $p_1;
    $t_3 = $l_0->a;
    $t_4 = $l_0->b;
    $t_5 = $t_3 + $t_4;
    return $t_5;
}
