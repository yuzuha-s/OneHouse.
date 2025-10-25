# OneHouse.

## ディレクトリ構成

docs/
|完了 ☑|ファイルリンク|ファイル| |
|:----:|----|----|---|
| ☑ |[アプリテーマ](docs/focus.md) |focus.md |※のちのち要件定義に一本化する |
| ☑ |[要件定義](docs/requirements.md)　　　|requirements.md |
| ☑ |[業務フロー](docs/business_flow.md)　|business_flow.md |
| |[システム構成図](docs/architecture.md)　|architecture.md |
|☑ |[テーブル定義書](docs/database_schema.md)　|database_schema.md |
|☑|[画面遷移図・ワイヤーフレーム](docs/screen_transition.md)　|screen_transition.md |

---

## コア機能進捗

|           ⏳ 進捗            | コア機能                          | アクセスページ |     |
| :--------------------------: | --------------------------------- | -------------- | --- |
|  残り単体テスト ＋ UI 調整   | 住宅ローンシミレーショ ApexCharts | /phase3        |     |
| 新規作成の form ボタンの実装 | メーカー訪問記録機能              | /phase2        |
|                              | 建物面積計算                      | /phase4        |

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

## UI 　ライブラリなど

チャート

- ApexCharts

認証

- Laravel Breeze

チェックリスト

[チェックリスト登録項目](docs/lib/checklist.md)
