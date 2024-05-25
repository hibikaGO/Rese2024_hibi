# アプリケーション名：Rese
飲食店のWEB予約アプリケーション

## アプリケーションURL

## 機能一覧
・会員登録機能
・ログイン機能  
・飲食店一覧表示
・飲食店一覧表示にて検索機能（エリア、ジャンル、店名による絞り込み）
・飲食店詳細画面表示
・ユーザー用ページ表示
・ユーザー情報取得
・お気に入り機能（追加、削除）
・お気に入り情報取得
・予約機能（予約、予約内容確認、削除）

#ER図
![Rese](https://github.com/hibikaGO/Rese2024_hibi/assets/145337159/45bdede0-127c-45c0-a9de-863d0ff4e4a6)


## 使用技術
Laravel 8.x  
Mysql 8.0.26  
PHP 8.2.11

## 環境構築
 Dockerビルド  
 
 1.git clone git@github.com:hibikaGO/Rese2024_hibi.git
 2.docker-compose up -d --build  

 Laravel環境構築  
 
 1.docker-conpose exec php bash  
 2.coposer install  
 3.env.exampleファイルから.envを作成しMysqlの環境変数を変更  
 4.php aritisan key:generate  
 5.php aritisan migrate  
 6.php artisan db:seed  
