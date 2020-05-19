<?php

namespace Wosh\Api;

class PrintService extends RpcService{

    /**
     * 打印接口
     *
     * @param $sn string 机器码
     * @param $content string 打印内容
     * @param $copies string 打印份数，默认为1
     * @param $copies $mode 打印模式：值为 0 或不指定则会检查打印机是否在线，如果不在线则不生成打印订单，直接返回设备不在线状态码；如果在线则生成打印订单，并返回打印订单号。值为 1 则直接生成打印订单，并返回打印订单号。
     * @return mixed
     */
    public function index($sn, $content, $copies = 1, $mode = 0)
    {
        return $this->client->call('api/openapi/xprinter/print', array('sn' => $sn, 'content' => $content, 'copies' => $copies, 'mode' => $mode));
    }
}
