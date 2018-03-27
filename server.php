<?php
$server = new swoole_websocket_server("0.0.0.0", 9501);

$server->on('open', function (swoole_websocket_server $server, $request) {
    echo "server: handshake success with fd{$request->fd}\n";
});

$server->on('message', function (swoole_websocket_server $server, $frame) {
    echo "receive from {$frame->fd}:{$frame->data},opcode:{$frame->opcode},fin:{$frame->finish}\n";

      //遍历所有连接，循环广播
    foreach($server->connections as $fd){
        //如果是某个客户端，自己发的则加上isnew属性，否则不加
        if($frame->fd == $fd){
            $server->push($frame->fd, $frame->data.',"isnew":""');
        }else{
            $server->push($fd, "{$frame->data}");
        }
    }
    //$server->push($frame->fd, "{$frame->data}");
});

$server->on('close', function ($ser, $fd) {
    echo "client {$fd} closed\n";
});

$server->start();