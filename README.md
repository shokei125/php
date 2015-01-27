# php
if (headers_sent()) {
    print_r(headers_list());
    die('cannot send location header (anymore)');
}

リダイレクトのエラー処理の対応
