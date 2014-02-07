Online.Net API for PHP 5.3+
===

[![Build Status](https://travis-ci.org/Atriedes/OnlineNet-PHP-API-Library.png?branch=master)](https://travis-ci.org/Atriedes/OnlineNet-PHP-API-Library)
[![Scrutinizer Quality Score](https://scrutinizer-ci.com/g/Atriedes/OnlineNet-PHP-API-Library/badges/quality-score.png?s=8390d2d2a4b934cd5da3078a4f542c5de0070af5)](https://scrutinizer-ci.com/g/Atriedes/OnlineNet-PHP-API-Library/)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/fb8e164d-e0e5-4997-93f7-834192838d3d/mini.png)](https://insight.sensiolabs.com/projects/fb8e164d-e0e5-4997-93f7-834192838d3d)

[Online](http://www.online.net) API wrapper for PHP 5.3+

### Installation
---

This library can installed through [compose](http://getcomposer.org/)

```
$ php composer.phar require jowy/online:@stable
```

### Usage
---

```php
<?php

use Online\Online;

$online = new Online('your-api-token-here');

$abuse = $online->abuse();
$network = $online->network();
$server = $online->server();
$storage = $online->storage();
$user = $online->user();

// Get user info
$user->getUserInfo();

// Get all server id
$server->getAllServerId();

// Get abuse list
$abuse->getAbuseList();

// Get ddos alert
$network->getDdosAlert();

// Get Rpnsync backup
$storage->getRpnSyncBackup();
```

### List All Function
---

#### Abuse
---

- `getAbuseList($count = 10, $minId = 0, $maxId = 10)`
- `getAbuseDetail($abuseId)`
- `replyAbuse($abuseId, $answer, $solution)`

### Network
---

- `getDdosAlert($targetIp, $count = 10, $midId = 0, $maxId = 10)`
- `getDdosAlertDetail($alertId)`

### Storage
---

- `getRpnRsyncBackup()`
- `editRpnRsyncBackup($name, $password = 'default')`
- `getRpnSan()`
- `addServerToRpnSan($iqnSuffix, $serverId)`
- `removeServerInRpnSan($iqnSuffix, $serverId)`

### User
---

- `getUserInfo()`

### Server
---

- `getAllServerId()`
- `getServerDetail($serverId)`
- `editServerHostname($serverId, $hostname = 'default')`
- `createBmcSession($serverId, $authorizationIP)`
- `deleteBmcSession($sessionId)`
- `getBmcSessionDetail($sessionId)`
- `bootServerNormal($serverId)`
- `bootServerRescue($serverId)`
- `bootServerTest($serverId)`
- `rebootServer($serverId)`
- `enableHardwareWatch($serverId)`
- `disableHardwareWatch($serverId)`
- `getRescueImages($serverId)`
- `getBackupServer($serverId)`
- `editBackupServer($serverId, $password = 'default', $autoLogin = true, $acl = false)`
- `getFailoverIp()`
- `deleteFailoverMac($failoverIp)`
- `editFailoverIp($failoverIp, $destination)`
- `generateMac($failoverIp, $type)`
- `editIp($ip, $reverse, $destination = null)`
