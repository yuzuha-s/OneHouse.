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
                            @for ($i = 0; $i < 5; $i++)
                                <label for="" class="star-check">
                                    <input type="checkbox" name="star[]" value="{{ $i }}" {{ in_array($i, old('star', [])) ? 'checked' : ''}}>
                                    <svg xmlns="http://www.w3.org/2000/svg" height="50px" viewBox="0 -960 960 960"
                                        width="50px" fill="#1f1f1f">
                                        <path
                                            d="m294.48-718.13 111.78-145q14.26-18.26 33.46-27.18 19.21-8.91 40.16-8.91 20.95 0 40.27 8.91 19.33 8.92 33.59 27.18l111.78 145 169.65 57q30.53 9.69 47.5 34.87 16.98 25.17 16.98 54.56 0 14.02-4.02 28.05-4.03 14.02-13.24 26.87L773.52-361.33l4 163.42q1 40.48-27.8 68.24-28.81 27.76-68.15 27.76-1.44 0-22.57-2.44l-179-49.43-179 49.43q-5.57 2-11.57 2.5t-11.56.5q-38.56 0-67.47-27.95-28.92-27.96-27.36-68.61l4-163.87-109-155q-9.2-12.82-13.23-26.79-4.03-13.98-4.03-27.96 0-29.12 16.76-54.3 16.76-25.17 47.29-35.3l169.65-57Zm64.61 90.48-185.52 62.3 120.6 171.09-4.56 182.52L480-263.91l190.96 52.61-4.57-182.96 120.04-169.09-186.08-64.3-119.78-158.22-121.48 158.22ZM480-498.87Z" />
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
                            <input type="text" name="sales" value="{{ old('salse') }}">
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
                                                <input type="checkbox" name="features[]" value="{{ $feature->id }}">
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
                                                <input type="checkbox" name="features[]" value="{{ $feature->id }}">
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
                                                <input type="checkbox" name="features[]" value="{{ $feature->id }}">
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
                                                <input type="checkbox" name="features[]" value="{{ $feature->id }}">
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
                                                <input type="checkbox" name="features[]" value="{{ $feature->id }}">
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
                                                <input type="checkbox" name="features[]" value="{{ $feature->id }}">
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
