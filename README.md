# php
if (headers_sent()) {
    print_r(headers_list());
    die('cannot send location header (anymore)');
}

リダイレクトのエラー処理の対応


http://rewish.jp/blog/tech/php_www_url


strpos — 文字列内の部分文字列が最初に現れる場所を見つける
implode — 配列要素を文字列により連結する
str_split — 文字列を配列に変換する
