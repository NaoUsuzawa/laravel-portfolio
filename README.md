# Go Nippon - A travel-sharing application for foreign visitors to Japan 
### 日本語版はこの下にあります ⬇️

---

# 🇺🇸 English Version

**Go Nippon** is a travel-sharing application for foreign visitors to Japan.  
It allows users to share posts, explore trip maps, send direct messages, and view analytics, making Japan travel experiences more fun and interactive.

---

## 🙋‍♀️ My Role (Team Development)
This application was developed as a **team project** during my IT study abroad program, where I gained experience in team-based web development using Laravel.

My main responsibilities included:
- Implementing the **notification feature**, including backend logic, database design, and data handling
- Developing **admin-side functions** using PHP (Laravel)
- Designing and implementing the **Admin UI**
- Creating the **Analytics UI** to visualize application data
- Collaborating with team members using GitHub (pull requests & code reviews)

---

## 🚀 Tech Stack

- **Backend / Frontend**: Laravel + Blade  
- **Authentication**: Laravel/UI (Email Verification & Google Login)
- **Async Communication**: JavaScript (Ajax)
- **UI Design**: Bootstrap
- **Media Uploads**: Multiple images & video support

---
## ⚙️ Environment Setup

```bash
# 1. Clone the repository
git clone https://github.com/NaoUsuzawa/laravel-portfolio.git

# 2. Move into the project directory
cd laravel-portfolio

# 3. Install PHP dependencies
composer install

# 4. Install JavaScript dependencies
npm install

# 5. Create environment file
cp .env.example .env

# 6. Generate application key
php artisan key:generate

# 7. Run database migrations
php artisan migrate

# 8. Start development servers
npm run dev
php artisan serve

# 9. Access the application at:
http://127.0.0.1:8000 
```
---

## ✨ Main Features

### 🔐 Auth / User
- User Registration / Login  
- Email Verification  
- Google Login  
- Profile Editing  
- Follow / Follower System  

---

## 🏠 Home (Feed)
Browse posts with multiple filters:

- Newest  
- Favorite order  
- Follower posts only  
- Most liked  
- Category ranking  
- Prefecture post ranking  
- Keyword / category / prefecture search  

Actions on posts:
- Like  
- Add to Favorites  

---

## 📝 Posts
- Create / Edit / Delete posts  
- Support for **multiple images**  
- Support for **video uploads**  
- On Show Post page:  
  - Like  
  - Favorite  
  - Comment  
  - Reply to comments  

---

## 👤 Profile
- Edit profile  
- View your favorite posts  
- View your own posts  
- **Travel completion rate by prefecture**  
- **Achievement badges** earned from traveling  

---

## 🗾 Trip Map
- Display a full map of Japan  
- Prefectures you've visited are automatically colored  
- Completion rate visualization  
- Sort by prefectures  

---

## 💬 DM (Direct Message)
- DM with followers / following users  
- Read/unread message indicator  
- Non-blocking asynchronous UI  

---

## 📢 Notification
- Like notification function

---

## 📊 Analytics
Visualize your activity:

### 👀 View
- Profile visitors  
- Post views  

### 💬 Interact
- Likes received  
- Favorites received  
- Comments received  

### 👥 Follower
- Follower count trend  
- Followers by country  

---

## 🛠 Admin Panel
- Manage users (show / hide)  
- Manage posts (show / hide)  
- Manage categories (add / edit / delete)

---

## 🧩 Design & Architecture

### 🎨 Figma UI Design
- [View Figma Design](https://www.figma.com/design/odwXTf4hT5fwNlIyziwAfJ/Go-Nippon?node-id=4-3356&t=Da3AIvyDdeiQq3fx-1)

### 📸 Images
- [Login](readme_images/login.png)
- [Home](readme_images/home.png)
- [Show Post](readme_images/showpost.png)
- [Edit Post](readme_images/editpost.png)
- [Favorite Post](readme_images/favorite.png)
- [Profile](readme_images/profile.png)
- [Follower](readme_images/follower.png)
- [Trip Map](readme_images/tripmap.png)
- [DM](readme_images/dm.png)
- [Analytics](readme_images/analytics.png)
- [Admin](readme_images/admin.png)


<br>

This project helped me gain hands-on experience in team development and backend-focused feature implementation using Laravel.


---

# 🇯🇵 日本語版

**Go Nippon（ゴー・ニッポン）** は、日本を訪れる外国人向けの旅行体験共有アプリです。  
投稿を共有したり、旅行マップで旅の記録を確認したり、ダイレクトメッセージを送ったり、アナリティクスで旅の成果を見たりして、日本での旅行をより楽しく便利にします。

---

## 🙋‍♀️ 担当範囲（チーム開発）
本アプリは IT留学中にチームで開発したプロジェクトです。

私は主に以下の機能を担当しました：
- 通知機能の実装（バックエンド処理・DB設計・データ管理）
- 管理者向け機能の開発（Laravel / PHP）
- 管理画面（Admin UI）の設計・実装
- データを可視化する Analytics UI の実装
- GitHub を用いたチーム開発（PR・レビュー）

---

## 🚀 使用技術

- **バックエンド / フロント**: Laravel + Blade  
- **認証**: Laravel/UI（メール認証 & Google Login）
- **非同期通信**: JavaScript（Ajax）
- **デザイン**: Bootstrap  
- **画像・動画投稿**: 複数枚の画像 & 動画に対応

---

## ⚙️ 環境構築手順

```bash
# 1. リポジトリをクローン
git clone https://github.com/NaoUsuzawa/laravel-portfolio.git

# 2. プロジェクトフォルダへ移動
cd laravel-portfolio

# 3. PHPライブラリをインストール
composer install

# 4. JavaScriptライブラリをインストール
npm install

# 5. 環境設定ファイル作成
cp .env.example .env

# 6. アプリケーションキー生成
php artisan key:generate

# 7. マイグレーション実行
php artisan migrate

# 8. 開発サーバー起動
npm run dev
php artisan serve

# 9. ブラウザでアプリを確認
http://127.0.0.1:8000 にアクセス
```
---

## ✨ 主な機能

### 🔐 認証 / ユーザー
- 登録 / ログイン  
- メール認証  
- Google ログイン  
- プロフィール編集  
- フォロー / フォロワー機能  

---

## 🏠 Home（ホーム）
投稿を次の条件で表示可能：

- 新しい順  
- お気に入り順  
- フォロワー投稿のみ  
- いいね順  
- カテゴリー別ランキング  
- 都道府県別投稿数ランキング  
- キーワード・カテゴリ・都道府県検索  

投稿へのアクション：
- いいね  
- お気に入り追加  

---

## 📝 投稿
- 投稿作成 / 編集 / 削除  
- 複数枚の画像投稿  
- 動画投稿  
- 投稿詳細ページでは：  
  - いいね  
  - お気に入り  
  - コメント  
  - コメントへのリプライ  

---

## 👤 プロフィール
- プロフィール編集  
- お気に入り投稿一覧  
- 自分の投稿一覧  
- **訪れた都道府県の達成率表示**  
- **達成バッジの獲得状況**  

---

## 🗾 Trip Map（日本地図）
- 日本地図を表示  
- 訪れた都道府県を自動色付け  
- 達成率の可視化  
- 都道府県別ソート  

---

## 💬 DM（ダイレクトメッセージ）
- フォロー / フォロワーと DM  
- 既読表示あり  
- 非同期でスムーズな UI  

---

## 📢 Notification（通知）
- いいねに関する通知機能

---

## 📊 Analytics（アナリティクス）
ユーザーのアクションを可視化：

### 👀 View  
- プロフィール訪問数  
- 投稿閲覧数  

### 💬 Interact  
- いいね数  
- お気に入り数  
- コメント数  

### 👥 Follower  
- フォロワー数推移  
- フォロワーの国別割合  

---

## 🛠 Admin（管理画面）
- ユーザー管理（表示 / 非表示）  
- 投稿管理（表示 / 非表示）  
- カテゴリー管理（追加・編集・削除）  

---

## 🧩 デザイン　& イメージ

### 🎨 Figma UI デザイン
- [View Figma Design](https://www.figma.com/design/odwXTf4hT5fwNlIyziwAfJ/Go-Nippon?node-id=4-3356&t=Da3AIvyDdeiQq3fx-1)

### 📸 イメージ
- [ログイン画面](readme_images/login.png)
- [ホーム画面](readme_images/home.png)
- [投稿表示画面](readme_images/showpost.png)
- [投稿編集画面](readme_images/editpost.png)
- [お気に入り投稿画面](readme_images/favorite.png)
- [プロフィール画面](readme_images/profile.png)
- [フォロワー画面](readme_images/follower.png)
- [旅行マップ画面](readme_images/tripmap.png)
- [ダイレクトメッセージ画面](readme_images/dm.png)
- [分析画面](readme_images/analytics.png)
- [管理画面](readme_images/admin.png)


<br>

本プロジェクトを通して、Laravel を用いたバックエンド開発やチーム開発の実践的な経験を積むことができました。


---

## 💼 Portfolio / My Project

### Go Nippon
A travel-sharing application for foreign visitors to Japan.  
GitHub: [https://github.com/NaoUsuzawa/laravel-portfolio](https://github.com/NaoUsuzawa/laravel-portfolio)

本プロジェクトは IT 留学中にチームで開発したもので、Laravel を用いたバックエンド開発やチーム開発の実践的な経験を積むことができました。
