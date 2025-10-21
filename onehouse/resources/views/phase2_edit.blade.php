@extends('layout.index')

@section('ttitle', 'phase2 | edit')

@section('content')

@endsection

@section('aside')

    <form action="{{ route('store') }}" method="POST">
        @csrf
        <div class="marker-edit wrapper">
            <div class="list">
                <div class="list-header wrapper">
                    <div class="list-nav">
                        <svg xmlns="http://www.w3.org/2000/svg" height="50px" viewBox="0 -960 960 960" width="50px"
                            fill="#1f1f1f">
                            <path
                                d="M692.87-615.85h61.03v-61.02h-61.03v61.02Zm0 165.29h61.03v-61.03h-61.03v61.03Zm0 164.87h61.03v-61.03h-61.03v61.03ZM640.92-140v-50.26h208.82v-579.48H460.51v99.1l-50.25-35.54V-820H900v680H640.92ZM60-140v-365.13l255.54-182.41 255.13 182.33V-140H367.28v-190.41H263.79V-140H60Zm50.26-50.26h103.28v-190.41h204v190.41h102.87v-289.33L315.54-625.03 110.26-479.24v288.98Zm530.66-352.56ZM417.54-190.26v-190.41h-204v190.41-190.41h204v190.41Z" />
                        </svg>
                        <h3>marker</h3>
                    </div>
                    <div class="list-nav">
                        <div class="star-rating">
                            <span data-value="1"> <svg xmlns="http://www.w3.org/2000/svg" height="50px"
                                    viewBox="0 -960 960 960" width="50px" fill='#FFE173'>
                                    <path
                                        d="m305-704 112-145q12-16 28.5-23.5T480-880q18 0 34.5 7.5T543-849l112 145 170 57q26 8 41 29.5t15 47.5q0 12-3.5 24T866-523L756-367l4 164q1 35-23 59t-56 24q-2 0-22-3l-179-50-179 50q-5 2-11 2.5t-11 .5q-32 0-56-24t-23-59l4-165L95-523q-8-11-11.5-23T80-570q0-25 14.5-46.5T135-647l170-57Z" />
                                </svg></span>
                            <span data-value="2"><svg xmlns="http://www.w3.org/2000/svg" height="50px"
                                    viewBox="0 -960 960 960" width="50px" fill='#FFE173'>
                                    <path
                                        d="m305-704 112-145q12-16 28.5-23.5T480-880q18 0 34.5 7.5T543-849l112 145 170 57q26 8 41 29.5t15 47.5q0 12-3.5 24T866-523L756-367l4 164q1 35-23 59t-56 24q-2 0-22-3l-179-50-179 50q-5 2-11 2.5t-11 .5q-32 0-56-24t-23-59l4-165L95-523q-8-11-11.5-23T80-570q0-25 14.5-46.5T135-647l170-57Z" />
                                </svg></span>
                            <span data-value="3"><svg xmlns="http://www.w3.org/2000/svg" height="50px"
                                    viewBox="0 -960 960 960" width="50px" fill='#FFE173'>
                                    <path
                                        d="m305-704 112-145q12-16 28.5-23.5T480-880q18 0 34.5 7.5T543-849l112 145 170 57q26 8 41 29.5t15 47.5q0 12-3.5 24T866-523L756-367l4 164q1 35-23 59t-56 24q-2 0-22-3l-179-50-179 50q-5 2-11 2.5t-11 .5q-32 0-56-24t-23-59l4-165L95-523q-8-11-11.5-23T80-570q0-25 14.5-46.5T135-647l170-57Z" />
                                </svg></span>
                            <span data-value="4"><svg xmlns="http://www.w3.org/2000/svg" height="50px"
                                    viewBox="0 -960 960 960" width="50px" fill='#FFE173'>
                                    <path
                                        d="m305-704 112-145q12-16 28.5-23.5T480-880q18 0 34.5 7.5T543-849l112 145 170 57q26 8 41 29.5t15 47.5q0 12-3.5 24T866-523L756-367l4 164q1 35-23 59t-56 24q-2 0-22-3l-179-50-179 50q-5 2-11 2.5t-11 .5q-32 0-56-24t-23-59l4-165L95-523q-8-11-11.5-23T80-570q0-25 14.5-46.5T135-647l170-57Z" />
                                </svg></span>
                            <span data-value="5"><svg xmlns="http://www.w3.org/2000/svg" height="50px"
                                    viewBox="0 -960 960 960" width="50px" fill='#FFE173'>
                                    <path
                                        d="m305-704 112-145q12-16 28.5-23.5T480-880q18 0 34.5 7.5T543-849l112 145 170 57q26 8 41 29.5t15 47.5q0 12-3.5 24T866-523L756-367l4 164q1 35-23 59t-56 24q-2 0-22-3l-179-50-179 50q-5 2-11 2.5t-11 .5q-32 0-56-24t-23-59l4-165L95-523q-8-11-11.5-23T80-570q0-25 14.5-46.5T135-647l170-57Z" />
                                </svg></span>
                        </div>

                        <div class="register">
                            <button type="submit">登録する</button>
                        </div>
                    </div>

                </div>


                <div class="marker-form wrapper">
                    <div class="form-left">
                        <div class="form-contant"><label>メーカー名</label><input type="text" name="name"
                                value="{{ old('name') }}"></div>
                        @error('name')
                            <div class="error">{{ $message }}</div>
                        @enderror
                        <div class="form-contant">
                            <label>担当者名</label>
                            <input type="text" name="sales" value="{{ old('salse') }}">
                        </div>
                        <div class="form-contant">
                            <label>ブランド力</label>
                            <div class="button-group">

                                <label for="brand1" class="brand-btn">
                                    信頼性
                                    <input type="radio" name="brand" value="信頼性" class="hidden"
                                        {{ old('brand', $maker->brand ?? '') == '信頼性' ? 'checked' : '' }} />
                                </label>

                                <label for="brand2" class="brand-btn">
                                    実績
                                    <input type="radio" name="brand" value="実績" class="hidden"
                                        {{ old('brand', $maker->brand ?? '') == '実績' ? 'checked' : '' }} />
                                </label>

                                <label for="brand3" class="brand-btn">
                                    品質
                                    <input type="radio" name="brand" value="品質" class="hidden"
                                        {{ old('brand', $maker->brand ?? '') == '品質' ? 'checked' : '' }} />
                                </label>
                            </div>

                        </div>
                        <div class="form-contant">
                            <label for="">標準仕様・オプション・特典など</label>
                            <textarea name="" id="" class="option"></textarea>
                        </div>
                    </div>
                    <div class="form-right">
                        <div class="form-contant"><label for="">工法・構造</label>
                            <div class="button-group"> <button class="method">木造</button>
                                <button class="method">鉄骨</button>
                                <button class="method">RC造</button>
                                <button class="method">ハイブリッド工法</button>
                            </div>

                        </div>


                        <div class="form-contant"><label for="">耐熱性能・省エネ性</label>
                            <div class="button-group"> <button class="heat-energy">等級6以上</button>
                                <button class="heat-energy">等級5以上</button>
                                <button class="heat-energy">等級4以上</button>
                                <button class="heat-energy">等級3以下</button>
                            </div>

                        </div>


                        <div class="form-contant"> <label for="">耐震性</label>
                            <div class="button-group"> <button class="earthquake">等級3</button>
                                <button class="earthquake">等級2</button>
                                <button class="earthquake">等級1</button>
                            </div>

                        </div>


                        <div class="form-contant"><label for="">保証・アフターサービス</label>
                            <div class="button-group"> <button class="after-servise">保証あり</button>
                                <button class="after-servise">アフターサービスあり</button>
                            </div>

                        </div>


                        <div class="form-contant"> <label for="">デザイン間取りの自由度</label>
                            <div class="button-group">
                                <button class="design">規格型</button>
                                <button class="design">セミオーダー</button>
                                <button class="design">フルオーダー</button>
                                <button class="design">外観デザイン</button>
                                <button class="design">内装デザイン</button>
                                <button class="design">ステップフロア可</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </form>


@endsection
