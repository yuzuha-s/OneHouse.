## テーブル定義書 / ER 図

![alt text](/docs/images/ER.png)

### users

ユーザー名　メールアドレス　パスワード

| カラム名   | データ型     | キー | NOT NULL | デォルト値 |
| ---------- | ------------ | ---- | -------- | ---------- |
| id         | BIGINT       | PK   |          |
| name       | VARCHAR(50)  |      |          |
| email      | VARCHAR(50)  |      |          |
| password   | VARCHAR(100) |      |          |
| created_at | TIMESTAMP    |      |
| updated_at | TIMESTAMP    |      |

### phase 　

フェーズ番号　作成日　更新日

| カラム名 | データ型 | キー | NOT NULL |
| -------- | -------- | ---- | -------- |
| id       | BIGINT   | PK   |
| number   | BIGINT   |

### profile

ユーザー ID 　フェーズ

| カラム名   | データ型  | キー | NOT NULL |
| ---------- | --------- | ---- | -------- |
| id         | bigint    | PK   |
| user_id    | bigint    | FK   |
| phase_id   | bigint    | FK   |
| created_at | timestamp |
| updated_at | timestamp |

### calendars

日付　タイトル　場所

| カラム名   | データ型     | キー | NOT NULL |
| ---------- | ------------ | ---- | -------- |
| id         | BIGINT       | PK   |
| profile_id | BIGINT       | FK   |
| date       | DATE         |
| title      | VARCHAR(100) |
| location   | VARCHAR(100) |      | NOT NULL |

### makers 　

メーカー名　営業担当者　オプション　 ★5 つ

| カラム名   | データ型     | キー | NOT NULL |
| ---------- | ------------ | ---- | -------- |
| id         | BIGINT       | PK   |
| profile_id | BIGINT       | FK   |
| name       | VARCHAR(20)  |      |
| sales      | VARCHAR(20)  |      | NOT NULL |
| option     | VARCHAR(100) |      | NOT NULL |
| star       | BIGINT       |      |          |

### makers_features 　

※中間テーブル

| カラム名    | データ型 | キー | NOT NULL |
| ----------- | -------- | ---- | -------- |
| marker_id   | BIGINT   | FK   |
| feature_tag | BIGINT   | FK   |


FOREIGN KEY (maker_id) REFERENCES makers(id),  
FOREIGN KEY (feature_id) REFERENCES features(id)  

### features

カテゴリー　タグ名

| カラム名    | データ型     | キー | NOT NULL |
| ----------- | ------------ | ---- | -------- |
| id          | BIGINT       | PK   |          |
| category_id | VARCHAR(100) | FK   |
| tag         | VARCHAR(100) |

### categories

| カラム名 | データ型     | キー | NOT NULL |
| -------- | ------------ | ---- | -------- |
| id       | BIGINT       | PK   |          |
| name     | VARCHAR(100) |

### lifeplanlogs

年齢　収入　支出　※貯蓄残高も

| カラム名   | データ型 | キー     | NOT NULL |
| ---------- | -------- | -------- | -------- |
| id         | BIGINT   | PK       |          |
| profile_id | BIGINT   | FK       |
| age        | BIGINT   |
| income     | BIGINT   |
| expense    | BIGINT   |
| balance    | BIGINT   | NOT NULL |

### landlogs

住所　容積率 建ぺい率 土地面積 階層～ 3 階まで

| カラム名   | データ型      | キー | NOT NULL |
| ---------- | ------------- | ---- | -------- |
| id         | BIGINT        | PK   |          |
| profile_id | BIGINT        | FK   |
| address    | VARCHAR(255)  |
| landarea   | DECIMAL(10,2) |
| far        | DECIMAL(10,2) |
| bcr        | DECIMAL(10,2) |
| floor_id   | INT           | FK   |          |

### floors

| カラム名 | データ型 | キー | NOT NULL |
| -------- | -------- | ---- | -------- |
| id       | BIGINT   | PK   |          |
| floor    | INT      |

### memologs

メモ

| カラム名   | データ型     | キー | NOT NULL |
| ---------- | ------------ | ---- | -------- |
| id         | BIGINT       | PK   |          |
| profile_id | BIGINT       | FK   |
| memo       | VARCHAR(255) |
| created_at | TIMESTAMP    |      |
| updated_at | TIMESTAMP    |      |

### bookmark_type

| カラム名 | データ型 | キー | NOT NULL |
| -------- | -------- | ---- | -------- |
| id       | bigint   | PK   |
| name     | varchar  |

name :  1=calendars, 2=makers, 3=landlogs, 4=memologs

### bookmarks

カレンダー　メーカー　土地　メモ

| カラム名         | データ型 | キー | NOT NULL |
| ---------------- | -------- | ---- | -------- |
| id               | BIGINT   | PK   |          |
| profile_id       | BIGINT   | FK   |
| bookmark_type_id | bigint   |
| reference_id     | bigint   |

reference_id  : bookmark_type_idに応じた対象テーブルのID

calendar_id
markers_id
landlogs_id
memologs_id
