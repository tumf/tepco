# language: ja
フィーチャ: 現在ののデータファイルを各フォーマットで出力する
  
  シナリオ: 現在のhtmlファイルを取得する
    前提 ブラウザを利用する
    もし  "/current.html"にアクセスする
    ならば  "時"が25回"tr"タグ内に見つかる

  シナリオ: 現在のjsonファイルを取得する
    前提 ブラウザを利用する
    もし  "/current.json"にアクセスする
    ならば  json形式が返ってくる

  シナリオ: 現在のxmlファイルを取得する
    前提 ブラウザを利用する
    もし  "/current.xml"にアクセスする
    ならば  xml形式が返ってくる
