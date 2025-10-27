## テーブル定義書 / ER 図

[データ](/docs/date.sql)はこちら
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

### profiles

ユーザー ID 　フェーズ

| カラム名   | データ型  | キー | NOT NULL |
| ---------- | --------- | ---- | -------- |
| id         | bigint    | PK   |
| user_id    | bigint    | FK   |
| created_at | timestamp |
| updated_at | timestamp |

### makers 　

メーカー名　営業担当者　オプション　 ★5 つ

| カラム名   | データ型     | キー | NOT NULL |
| ---------- | ------------ | ---- | -------- |
| id         | BIGINT       | PK   |
| profile_id | BIGINT       | FK   |
| name       | VARCHAR(20)  |      |
| sales      | VARCHAR(20)  |      | NOT NULL |
| option     | VARCHAR(100) |      | NOT NULL |
| star       | INT          |      |          |

### categories

ブランド力 工法・構造 耐熱性・省エネ性  
耐震性 保証・アフターサービス デザイン・間取り自由祖
| カラム名 | データ型 | キー | NOT NULL |
| -------- | ------------ | ---- | -------- |
| id | BIGINT | PK | |
| name | VARCHAR(100) |

### features

カテゴリー　タグ名

| カラム名    | データ型     | キー | NOT NULL |
| ----------- | ------------ | ---- | -------- |
| id          | BIGINT       | PK   |          |
| category_id | VARCHAR(100) | FK   |
| tag         | VARCHAR(100) |

### makers_feature 　

※中間テーブル

| カラム名   | データ型 | キー | NOT NULL |
| ---------- | -------- | ---- | -------- |
| marker_id  | BIGINT   | FK   |
| feature_id | BIGINT   | FK   |

FOREIGN KEY (maker_id) REFERENCES makers(id),  
FOREIGN KEY (feature_id) REFERENCES features(id)

### loan_simulations

借入金額 年利 返済期間 年齢　年収　毎月の支出

| カラム名   | データ型     | キー | NOT NULL |
| ---------- | ------------ | ---- | -------- |
| id         | BIGINT       | PK   |          |
| profile_id | BIGINT       | FK   |
| loan       | BIGINT       |      |
| rate       | DECIMAL(5,2) |      |
| loan_term  | INT          |      |
| age        | INT          |
| income     | BIGINT       |
| expense    | BIGINT       |
| created_at | timestamp    |
| updated_at | timestamp    |

### landlogs

住所　容積率 建ぺい率 土地面積 階層～ 3 階まで 坪単価

| カラム名       | データ型      | キー | NOT NULL |
| -------------- | ------------- | ---- | -------- |
| id             | BIGINT        | PK   |          |
| profile_id     | BIGINT        | FK   |
| address        | VARCHAR(255)  |
| landarea       | DECIMAL(10,2) |
| far            | TINYINT       |
| bcr            | TINYINT       |
| floor          | INT           |      |          |
| buildable_area | DECIMAL(10,2) |
| range          | BIGINT        |      |

### phases

フェーズ リスト

| カラム名 | データ型     | キー | NOT NULL |
| -------- | ------------ | ---- | -------- |
| id       | BIGINT       | PK   |          |
| phase    | INT          |      | NOT NULL |
| list     | VARCHAR(255) |

### checklists

チェックリスト

| カラム名   | データ型  | キー | NOT NULL | デォルト値    |
| ---------- | --------- | ---- | -------- | ------------- |
| id         | BIGINT    | PK   |          |
| profile_id | BIGINT    | FK   |
| phases_id  | BIGINT    | FK   |          |
| checked    | BOOLEAN   |      |          | DEFAULT FALSE |
| created_at | TIMESTAMP |      |
| updated_at | TIMESTAMP |      |
