# OneHouse.

## ディレクトリ構成

docs/
|変更あり|ファイルリンク|ファイル| |
|:----:|----|----|---|
| |[アプリテーマ](docs/focus.md) |focus.md |※のちのち要件定義に一本化する |
| |[要件定義](docs/requirements.md)　　　|requirements.md |
| 〇 |[業務フロー](docs/business_flow.md)　|business_flow.md |
| |[システム構成図](docs/architecture.md)　|architecture.md |
|〇 |[テーブル定義書](docs/database_schema.md)　|database_schema.md |
|〇|[画面遷移図・ワイヤーフレーム](docs/screen_transition.md)　|screen_transition.md |

---

## コア機能進捗

| 静的解析 |            ⏳ 進捗            | コア機能                          | アクセスページ |     |
| :------: | :---------------------------: | --------------------------------- | -------------- | --- |
|          |   残り単体テスト ＋ UI 調整   | 住宅ローンシミレーショ ApexCharts | /phase3        |     |
|          |   残り単体テスト ＋ UI 調整   | メーカー訪問記録機能              | /phase2        |
|          |   残り単体テスト ＋ UI 調整   | 建物面積計算                      | /phase4        |
|          | 残り単体テスト ＋ UI 調整 | チェックリスト機能                | /phase1.5      |

## 環境構築

- プログラミング言語
  - PHP 8.3.4
- フレームワーク
  - Laravel12
- データベース
  - MySQL
- フロントエンド
  - HTML/CSS
  - JavaScript、Vue.js
- インフラ
  - AWS
  - Apache ? → インフラで学ぶだろう　ローカル開発では不要
- バージョン管理
  - Git/GitHub
- CI/CD
  - PHP Code Sniffer
  - ES Lint
  - Prettier
- チャート
  - ApexCharts
- 認証

  - Laravel Breeze

- チェックリスト
  [チェックリスト登録項目](docs/lib/checklist.md)


## コア機能のmust want

- must
- [ ]  コア機能が完成し、ユーザーが試しに使える状態であること
- [ ]  コア機能部分のページの見た目が整っている
- [x]  GitHub でプルリクベースで開発
- [ ]  静的解析ツールの全チェックが通っている


- want
- [ ] スマホ及びPC両方のデザイン対応ができている
- [ ] ストレスなく使え、UI/UXが良い
- [ ] デザインが綺麗
- [ ] コードの可読性が高い
- [ ] コア機能の充実/付属的な機能の作成
- [ ] テストコードが書かれている

