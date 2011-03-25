JSON/XML形式の東京電力の電力使用状況
================================

概要
----

[JSON/XML形式の東京電力の電力使用状況β](http://tepco.phper.jp)のソースコードです。

インストール
----------

[phper.jp](http://phper.jp)を使ったインストールは下記のようになります。

    git clone git://github.com/tumf/tepco.git
    cd tepco
    phper create
    phper servers:add
    git push phper master
    phper open

JSONサンプル
-----------

    {"capacity":3850,
    "banner":"2011\/3\/25 9:30 UPDATE",
    "trend":{
      "2011-03-25T00:00:00+09:00":{"today":2990,"yesterday":2920},
      "2011-03-25T01:00:00+09:00":{"today":2850,"yesterday":2780},
      "2011-03-25T02:00:00+09:00":{"today":2770,"yesterday":2690},
      "2011-03-25T03:00:00+09:00":{"today":2710,"yesterday":2630},
      "2011-03-25T04:00:00+09:00":{"today":2700,"yesterday":2610},
      "2011-03-25T05:00:00+09:00":{"today":2830,"yesterday":2750},
      "2011-03-25T06:00:00+09:00":{"today":3100,"yesterday":3060},
      "2011-03-25T07:00:00+09:00":{"today":3350,"yesterday":3290},
      （中略)
      "timestamp":"2011-03-25T10:15:49+09:00","version":1
    }
    
