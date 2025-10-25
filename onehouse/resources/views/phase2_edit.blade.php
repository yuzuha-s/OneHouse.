@extends('layout.index')

@section('ttitle', 'phase2 | edit')

@section('content')

@endsection

@section('aside')

    <form action="{{ route('store') }}" method="POST" id="maker-form">
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
                        @error('star')
                            <div class="error">{{ $message }}</div>
                        @enderror
                        <div class="star-rating">
                            @for ($i = 1; $i <= 5; $i++)
                                <label for="" class="star-check">
                                    <input type="checkbox" name="star[]" value="{{ $i }}"
                                        @if (in_array($i, old('star', []))) checked @endif>
                                    <svg xmlns="http://www.w3.org/2000/svg" height="50px" viewBox="0 -960 960 960"
                                        width="50px" fill="#FFFFFF" stroke="#8C8C8C" stroke-width="50">
                                        <path
                                            d="m305-704 112-145q12-16 28.5-23.5T480-880q18 0 34.5 7.5T543-849l112 145 170 57q26 8 41 29.5t15 47.5q0 12-3.5 24T866-523L756-367l4 164q1 35-23 59t-56 24q-2 0-22-3l-179-50-179 50q-5 2-11 2.5t-11 .5q-32 0-56-24t-23-59l4-165L95-523q-8-11-11.5-23T80-570q0-25 14.5-46.5T135-647l170-57Z">
                                        </path>
                                    </svg>
                                </label>
                            @endfor
                        </div>

                        <div class="register">
                            <button type="submit">登録する</button>
                        </div>
                    </div>

                </div>


                <div class="marker-form wrapper">
                    <div class="maker-left">
                        <div class="form-contant">
                            <label>メーカー名</label><input type="text" name="name" value="{{ old('name') }}">
                        </div>
                        @error('name')
                            <div class="error">{{ $message }}</div>
                        @enderror
                        <div class="form-contant">
                            <label>担当者名</label>
                            <input type="text" name="sales" value="{{ old('sales') }}">
                        </div>

                        <div class="form-contant">
                            <label>オプション</label>
                            <textarea name="option">{{ old('option') }}</textarea>
                        </div>

                        <div class="form-contant">
                            <label>ブランド</label>
                            <div class="form-button">
                                @foreach ($features as $feature)
                                    @if ($feature->category->id === 1)
                                        <div class="">
                                            <label>
                                                <input type="checkbox" name="features[]" value="{{ $feature->id }}"
                                                    @if (in_array($feature->id, old('features', []))) checked @endif>
                                                {{ $feature->tag }}
                                            </label>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>


                    </div>

                    <div class="maker-right">
                        <div class="form-contant">
                            <label>工法・構造</label>
                            <div class="form-button">
                                @foreach ($features as $feature)
                                    @if ($feature->category->id === 2)
                                        <div class="">
                                            <label>
                                                <input type="checkbox" name="features[]" value="{{ $feature->id }}"
                                                    @if (in_array($feature->id, old('features', []))) checked @endif>
                                                {{ $feature->tag }}
                                            </label>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>

                        <div class="form-contant">
                            <label>耐熱性能・省エネ性</label>
                            <div class="form-button">
                                @foreach ($features as $feature)
                                    @if ($feature->category->id === 3)
                                        <div class="">
                                            <label>
                                                <input type="checkbox" name="features[]" value="{{ $feature->id }}"
                                                    @if (in_array($feature->id, old('features', []))) checked @endif>
                                                {{ $feature->tag }}
                                            </label>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>

                        <div class="form-contant">
                            <label>耐震性</label>
                            <div class="form-button">
                                @foreach ($features as $feature)
                                    @if ($feature->category->id === 4)
                                        <div class="">
                                            <label>
                                                <input type="checkbox" name="features[]" value="{{ $feature->id }}"
                                                    @if (in_array($feature->id, old('features', []))) checked @endif>
                                                {{ $feature->tag }}
                                            </label>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>

                        <div class="form-contant">
                            <label>保証・アフターサービス</label>
                            <div class="form-button">
                                @foreach ($features as $feature)
                                    @if ($feature->category->id === 5)
                                        <div class="">
                                            <label>
                                                <input type="checkbox" name="features[]" value="{{ $feature->id }}"
                                                    @if (in_array($feature->id, old('features', []))) checked @endif>
                                                {{ $feature->tag }}
                                            </label>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>

                        <div class="form-contant">
                            <label>デザイン間取りの自由度</label>
                            <div class="form-button">
                                @foreach ($features as $feature)
                                    @if ($feature->category->id === 6)
                                        <div class="">
                                            <label>
                                                <input type="checkbox" name="features[]" value="{{ $feature->id }}"
                                                    @if (in_array($feature->id, old('features', []))) checked @endif>
                                                {{ $feature->tag }}
                                            </label>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>


    </form>

    @vite('resources/js/checked.js')
@endsection
