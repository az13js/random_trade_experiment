<?php
/*
交易实验
假设存在若干个初始存款为 M 的个体，它们每一轮交易都随机地向其它个体中的一个交付 X 元。
那么经过若干轮交易后它们的存款会呈现怎样的分布？其中 M 和 X 是确定的常量。
*/

define('N',         10); // 个体数量
define('M',         100); // 初始存款
define('X',         1); // 交易金额
define('TRADE_NUM', 2000); // 交易次数

// 初始化所有个体以及存款
$individual_deposit = [];
for ($i = 0; $i < N; $i++) {
    $individual_deposit[] = M;
}

// 开始交易过程
for ($i = 0; $i < TRADE_NUM; $i++) {
    for ($j = 0; $j < N; $j++) {
        $individual_deposit[$j] -= X;
        $table = array_fill(0, N, null);
        unset($table[$j]);
        $individual_deposit[array_rand($table)] += X;
    }
}

// 打印所有个体的存款
print_r($individual_deposit);
