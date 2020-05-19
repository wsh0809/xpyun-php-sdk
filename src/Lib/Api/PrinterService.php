<?php

namespace Wosh\Api;

class PrinterService extends RpcService{

    /**
     * 添加打印机
     *
     * @param $sn string 打印机编号
     * @param $name string 打印机名称
     * @param $idcode string 打印机识别码
     * @param $cardno string 流量卡卡号
     * @return mixed
     */
    public function addPrinter($sn, $name,  $idcode = '', $cardno = '')
    {
        $printer = array(
            'sn' => $sn,
            'name' => $name,
            'idcode' => $idcode,
            'cardno' => $cardno,
        );
        $params['items'][] = $printer;
        return $this->client->call('api/openapi/xprinter/addPrinters', $params);
    }

    /**
     * 批量添加打印机
     *
     * @param $items [{"cardno":"流量卡号码","idcode":"打印机识别码","name":"打印机名称","sn":"打印机编号"}] 打印机配置对象数组
     * @remark deprecated 打印机编号 sn 和名称 name 字段为必填项，每次最多添加50台
     * @return mixed
     */
    public function addPrinters($items)
    {
        $params['items'] = $items;
        return $this->client->call('api/openapi/xprinter/addPrinters', $params);
    }


    /**
     * 设置内置语音接口
     * 注意: 仅支持K4-WA、K4-GAD、K4-WGEAD型号
     *
     * @param $sn string 机器码
     * @param $voiceType string 声音类型： 0真人语音（大） 1真人语音（中） 2真人语音（小） 3 嘀嘀声 4 静音
     * @return mixed
     */
    public function setVoice($sn, $voiceType)
    {
        $params = array(
            'sn' => $sn,
            'voiceType' => $voiceType,
        );
        return $this->client->call('api/openapi/xprinter/setVoiceType', $params);
    }


    /**
     * 删除终端授权接口
     *
     * @param $sn string 打印机编号
     * @return mixed
     */
    public function deletePrinter($sn)
    {
        return $this->client->call('openapi/xprinter/delPrinters', array('snlist' => [$sn]));
    }

    /**
     * 删除终端授权接口
     *
     * @param $snlist string 打印机编号集合，类型为字符串数组
     * @return mixed
     */
    public function deletePrinters($snlist)
    {
        return $this->client->call('openapi/xprinter/delPrinters', array('snlist' => $snlist));
    }


    /**
     * 修改打印机信息
     *
     * @param $sn string 打印机编号
     * @param $name string 打印机名字
     * @param $cardno string 打印机流量卡号码
     * @return mixed
     */
    public function updPrinter($sn, $name, $cardno = '')
    {
        return $this->client->call('api/openapi/xprinter/updPrinter', array('sn' => $sn, 'name' => $name, 'cardno' => $cardno));
    }


    /**
     * 清空待打印队列
     *
     * @param $sn string 机器码
     * @return mixed
     */
    public function delPrinterQueue($sn)
    {
        return $this->client->call('api/openapi/xprinter/delPrinterQueue', array('sn' => $sn));
    }


    /**
     * 查询订单是否打印成功
     *
     * @param $orderId string 订单编号，由“打印订单”接口返回
     * @return mixed
     */
    public function queryOrderState($orderId)
    {
        return $this->client->call('api/openapi/xprinter/queryOrderState', array('orderId' => $orderId));
    }


    /**
     * 查询指定打印机某天的订单统计数
     *
     * @param $sn string 打印机编码
     * @param $date string 查询日期，格式yy-MM-dd，如：2019-08-15
     * @return mixed
     */
    public function queryOrderStatis($sn, $date)
    {
        return $this->client->call('api/openapi/xprinter/queryOrderStatis', array('sn' => $sn, 'date' => $date));
    }


    /**
     * 获取指定打印机状态
     *
     * @param $sn string 打印机编码
     * @return mixed
     */
    public function queryPrinterStatus($sn)
    {
        return $this->client->call('api/openapi/xprinter/queryPrinterStatus', array('sn' => $sn));
    }

}
