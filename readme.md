# 手順

```
$ git clone {this repository}
$ cd {this repository}
$ composer update
$ composer require abraham/twitteroauth
$ vim vender/abraham/twitteroauth/src/TwitterOAuth.php
private oAuthRequest ⇒　public oAuthRequestに変更
$ php artisan serve
```

# URL

1. タイムライン表示（うまのものですが。）
```
http://tk2-410-46264.vs.sakura.ne.jp:8000/usertimeline
```
1. ハッシュタグで検索
```
http://tk2-410-46264.vs.sakura.ne.jp:8000/searchword/キャンプ
↑ searchword/のあとに、検索したいハッシュタグを入力してください
```
