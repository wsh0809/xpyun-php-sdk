# xpyun-sdk  芯烨云热敏打印机SDK PHP版

## Requirement

```
PHP >= 5.4
```

## Installing

```shell
$ composer require wosh/xpyun-sdk -vvv
```

若composer失败，请换到国内镜像  
```shell
composer config -g repo.packagist composer https://mirrors.aliyun.com/composer/
```

# Usage
  1. 接口类Lib/Api/*.php，集成了所有的芯烨云接口
  2. 配置类Lib/Config/XpyConfig.php
  3. 接口调用类Lib/Protocol/XpyRpcClient.php，包括了sha1工具函数，Sign工具函数，可以直接用这个类直接进行接口调用
  4. 若觉的好用，大佬们请在<a href= 'https://github.com/wsh0809/xpyun-php-sdk'>GitHub</a>上给小曲一个Star，在此先感谢各位大佬了！
  
```php
<?php
//composer下加载方式
include_once __DIR__ . "/vendor/autoload.php";

//gitHub下载加载方式
include_once __DIR__ . "src/Lib/Autoloader.php";

//初始化配置
use Wosh\Config\XpyConfig;
$config = new XpyConfig('你的应用账号', '你的应用密钥');

//授权打印机(他加过请跳过该步骤)
use Wosh\Api\PrinterService;
$printer = new PrinterService($config);
$data = $printer->addPrinter('打印机编号', '打印机名字', '打印机识别码', '流量卡号码');
var_dump($data);


//调取文本打印
use Wosh\Api\PrintService;
$print = new PrintService($config);
$data = $print->index('打印机编号','打印内容排版可看Demo下的callback.php','打印次数');
var_dump($data);

```
