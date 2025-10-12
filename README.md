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

## 環境構築

- プログラミング言語
  - PHP 8.3.4
- フレームワーク
  - Laravel12
- データベース
  - MySQL
- フロントエンド
  - HTML/CSS
  - Bootstrap
  - JavaScript,Vue.js
- インフラ
  - AWS
  - Apache ? →インフラで学ぶだろう　ローカル開発では不要
- バージョン管理
  - Git/GitHub
- CI/CD
  - PHP Code Sniffer
  - ES Lint
  - Prettier

## UI 　ライブラリなど

全体画面

- Tabler または
- dminLTE  
  https://adminlte.io/themes/v3/

カレンダー

- FullCalendar

チャート

- ApexCharts

認証

- Laravel Breeze

チェックリスト

[チェックリスト登録項目](docs/lib/checklist.md)

シングルページにする
