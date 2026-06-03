# relation-app-practice

## 概要
Laravel Tutorial リレーション

## 使用技術
- PHP 8.x
- Laravel 10.x
- Eloquent ORM (hasMany / belongsTo / belongsToMany)
- MySQL

## 学んだこと
- 中間テーブルとは、中間テーブルの作り方
- リレーションの設定の仕方
- belongsToMany,hasMany,belongsToの使い分け
- コントローラーに渡される$requestに含まれているもの
- クエリパラメーターを設定して$requestのメンバーを追加する 

## 動作確認
コンテナを起動
```
./vendor/bin/sail up -d
```
http://localhost/posts にアクセス
