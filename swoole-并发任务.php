<?php
Co\run(function(){
    $chan = new Swoole\Coroutine\Channel(2);
    Swoole\Coroutine::create(function () use ($chan) {
        for($i = 0; $i < 100; $i++) {
            $chan->push(['index' => $i]);
        }
    });

    for($i=1;$i<=10;$i++){
        Swoole\Coroutine::create(function () use ($chan) {
            while($data = $chan->pop()) {
                co::sleep(1);
                print_r($data);
            }
        });
    }

});
