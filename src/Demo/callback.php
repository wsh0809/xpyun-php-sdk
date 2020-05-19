<?php
use Wosh\Api\PrintService;

$printer = new \Wosh\Api\PrinterService($config);
$sn = '';   //机器码

$res = $printer->addPrinter($sn, 'onedo');
/**文本接口开始**/
$print = new PrintService($config);
//58mm排版 排版指令详情请看 https://www.xpyun.net/open/index.html
$content = "<B><C>**#1 美团**</C></B>";
$content .= str_repeat('.', 32);
$content .= "<B><C>--在线支付--</C></B>";
$content .= "<B><C>张周兄弟烧烤</C></B>";
$content .= "<L>订单时间:". date("Y-m-d H:i") . "<BR></L>";
$content .= "<L>订单编号:40807050607030</L><BR>";
$content .= str_repeat('*', 14) . "商品" . str_repeat("*", 14);
$content .= "烤土豆(超级辣)x3  5.96<BR>";
$content .= "烤豆干(超级辣)x2  3.88<BR>";
$content .= "烤鸡翅(超级辣)x3  17.96<BR>";
$content .= "烤排骨(香辣)x3    12.44<BR>";
$content .= "烤韭菜(超级辣)x3  8.96<BR>";
$content .= str_repeat('.', 32);
$content .= "<QR>这是二维码内容</QR>";
$content .= "<R>小计:￥82</R>\n";
$content .= "<R>折扣:￥４ </R>\n";
$content .= str_repeat('*', 32);
$content .= "<R>订单总价:￥78 </R>\n";
$content .= "<B><C>**#1 完**</C></B>";


try{
    var_dump($print->index($sn, $content));
}catch (Exception $e) {
    echo $e->getMessage();
}
/**文本接口结束**/
