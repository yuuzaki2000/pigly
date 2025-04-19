# pigly
Laravel環境構築
1．docker-compose exec php bash
2. composer install
3. 「.env.example」ファイルを「.env」ファイルに名称を変更。または新しく、.envファイルを作成。
4. .envに以下の環境変数を追加
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel_db
DB_USERNAME=laravel_user
DB_PASSWORD=laravel_pass

5. アプリケーションキーの作成
   php artisan key:generate
6. マイグレーションの実行
   php artisan migrate
7. シーディングの実行
   php artisan db:seed
8. ダミーデータの詳細
   初期データとして、1名のuserのダミーデータを作成
   名前：hanako   メールアドレス：hanako0813@gmail.com
   パスワード: hanako0813
使用技術（実行環境）
・PHP 7.4.9
・Laravel 8.83.29
・MySQL　8.0.26
・nginx 1.21.1
テーブル設定

![スクリーンショット 2025-04-19 215516](https://github.com/user-attachments/assets/f1a540b6-1fe6-41fd-a4d6-ea17db756204)

![スクリーンショット 2025-04-19 215537](https://github.com/user-attachments/assets/ef7959fa-a5b0-4369-962a-fd4784361857)

![スクリーンショット 2025-04-19 215554](https://github.com/user-attachments/assets/2dafc596-b1a5-4c42-b711-3e8d32ce2599)

