@extends('layout.index')

@section('ttitle', 'default')

@section('content')

@endsection

@section('aside')
    <h1>データベース確認画面</h1>
    <div class="marker-form">
        <div class="form-left">
            <h1>User/Profile</h1>
            <table>
                <thead>
                    <tr>
                        <th>プロフィールID</th>
                        <th>ユーザーID</th>
                        <th>ユーザー名</th>
                        <th>メールアドレス</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->profile->id ?? '' }}</td>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>

                        </tr>
                    @endforeach --}}
                </tbody>
            </table>

            <h1>makers</h1>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>プロフィールID</th>
                        <th>メーカー名</th>
                        <th>営業担当</th>
                        <th>オプション</th>
                        <th>星</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @foreach ($makers as $maker)
                        @if ($maker->profile->id == 1)
                            <tr>
                                <td> {{ $maker->id }} </td>
                                <td>{{ $maker->profile->id }}</td>
                                <td> {{ $maker->name }} </td>
                                <td> {{ $maker->sales }} </td>
                                <td> {{ $maker->option }} </td>
                                <td> {{ $maker->star }} </td>

                            </tr>
                        @endif
                    @endforeach --}}
                </tbody>
            </table>


            <h1>makers_feature </h1>
            <table>
                <thead>
                    <tr>
                        <th>メーカーID</th>
                        <th>メーカー名</th>
                        <th>カテゴリー名</th>
                        <th>タグ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($makers as $maker)
                        @foreach ($maker->features as $feature)
                            <tr>
                                <td>{{ $maker->id }}</td>
                                <td>{{ $maker->name }}</td>
                                <td>{{ $feature->category->name ?? '未分類' }}</td>
                                <td>{{ $feature->tag }}</td>
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="form-right">
            <h1>loan_simulations</h1>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>プロフィールID</th>
                        <th>借入額</th>
                        <th>年利</th>
                        <th>返済期間</th>
                        <th>年齢</th>
                        <th>収入</th>
                        <th>支出</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                    </tr>
                </tbody>
            </table>

            <h1>landlogs</h1>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>プロフィールID</th>
                        <th>住所</th>
                        <th>土地面積</th>
                        <th>容積率</th>
                        <th>建ぺい率</th>
                        <th>階数</th>
                        <th>建築可能最大面積</th>
                        <th>坪単価</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                    </tr>
                </tbody>
            </table>

            <h1>checklists</h1>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>プロフィールID</th>
                        <th>フェーズ</th>
                        <th>進捗</th>
                        <th>リスト</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>


@endsection
