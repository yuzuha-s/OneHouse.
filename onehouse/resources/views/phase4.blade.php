@extends('layout.index')

@section('ttitle', 'phase4')

@section('content')

@endsection

@section('aside')

    <div class="marker-edit wrapper">
        <div class="list">
            <div class="list-header wrapper">
                <div class="list-nav">
                    <svg xmlns="http://www.w3.org/2000/svg" height="50px" viewBox="0 -960 960 960" width="50px"
                        fill="#1f1f1f">
                        <path
                            d="M628.92-531.44v-1.51 1.51-158.25 158.25ZM185.95-163.8q-16.21 7.52-31.08-2.1Q140-175.51 140-193.8v-523.53q0-11.85 6.35-21.27 6.34-9.42 17.39-13.66l190.98-66.2 251.23 87.79 168.1-65.94q16.21-7.11 31.08 1.73Q820-786.05 820-768.15v327.53q-10.03-15.38-22.5-28.44-12.47-13.07-27.76-23.86v-249.9l-140.82 53.13v158.25q-13.43 1.21-25.8 3.35-12.38 2.14-24.45 6.14v-167.74l-197.34-67.8v517.41L185.95-163.8Zm4.31-54.05 140.82-53.64v-486l-140.82 47.23v492.41Zm454.2-4.38q38.59 0 64.71-25.73 26.11-25.73 26.32-65.3.2-38.59-26.12-64.8-26.32-26.22-64.91-26.22-38.59 0-64.81 26.22-26.21 26.21-26.21 64.8 0 38.85 26.21 64.94 26.22 26.09 64.81 26.09Zm0 50.25q-58.33 0-99.81-41.47-41.47-41.47-41.47-99.81 0-58.74 41.47-100.01 41.48-41.27 99.81-41.27 58.74 0 100.01 41.27t41.27 100.01q0 22.88-6.48 43.2-6.49 20.32-18.93 37.55L860-133.49 826.9-100l-99.41-99q-17.64 13.38-38.3 20.2-20.65 6.82-44.73 6.82ZM331.08-757.49v486-486Z" />
                    </svg>
                    <h3>land size</h3>
                </div>

                <div class="list-nav">
                    <div class="validate">
                        <svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960" width="40px"
                            fill="#576bf5">
                            <path
                                d="M422-297.33 704.67-580l-49.34-48.67L422-395.33l-118-118-48.67 48.66L422-297.33ZM480-80q-82.33 0-155.33-31.5-73-31.5-127.34-85.83Q143-251.67 111.5-324.67T80-480q0-83 31.5-156t85.83-127q54.34-54 127.34-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 82.33-31.5 155.33-31.5 73-85.5 127.34Q709-143 636-111.5T480-80Zm0-66.67q139.33 0 236.33-97.33t97-236q0-139.33-97-236.33t-236.33-97q-138.67 0-236 97-97.33 97-97.33 236.33 0 138.67 97.33 236 97.33 97.33 236 97.33ZM480-480Z" />
                        </svg>
                        <p>建てられる範囲とコストが出ました！</p>
                    </div>
                </div>

            </div>


            <div class="land-form wrapper">
                <div class="land-left">
                    <form action="" method="">

                        <div class="land-land-left-fix">
                            <div class="form-contant">
                                <label for="">住所</label>
                                <textarea name="" id=""></textarea>
                            </div>
                        </div>

                        <div class="land-left-fix">
                            <div class="form-contant">
                                <label for="">土地面積(㎡)</label>
                                <div class="land-form-row"><input type="text"><span>㎡</span>
                                </div>
                            </div>

                            <div class="form-contant">
                                <label for="">階数(1～3階)</label>
                                <div class="land-form-row"><input type="text"><span>階</span></div>
                            </div>
                        </div>

                        <div class="land-left-fix">
                            <div class="form-contant">
                                <label for="">容積率(%)</label>
                                <div class="land-form-row"><input type="text"><span>%</span></div>
                            </div>
                            <div class="form-contant">
                                <label for="">建ぺい率(%)</label>
                                <div class="land-form-row"> <input type="text"><span>%</span></div>
                            </div>
                        </div>

                        <div class="land-left-fix">
                            <div class="form-contant">
                                <label for="">坪単価(万円)</label>
                                <div class="land-form-row"> <input type="text"><span>万円/坪</span></div>
                            </div>

                            <div class="form-contact">
                                <div class="land-form-row">
                                    <div class="calculate"><button type="submit">計算する</button><span></span></div>
                                </div>
                            </div>


                        </div>
                    </form>
                </div>

                <div class="land-right">
                    <div class="land-card">
                        <div class="card-inner wrapper">
                            <label>建築可能面積</label>
                            <div class="land-right-valiable">
                                <div class="form-row">
                                    <div class="form-valiable">33</div>
                                    <span>㎡</span>
                                </div>

                                <div class="form-row">
                                    <div class="form-valiable">33</div>
                                    <span>坪</span>
                                </div>
                            </div>
                        </div>


                        <div class="wrapper">
                            <input type="range" id="volume" name="volume" min="0"
                                max="100" value="50">
                            <span id="value">50</span>
                        </div>


                        <div class="card-inner wrapper">
                            <label>建築費用</label>
                            <div class="land-right-valiable">
                                <div class="form-row">
                                    <div class="form-valiable">78</div>
                                    <span>万円</span>
                                </div>
                            </div>
                        </div>


                        <div class="register"><button type="submit">登録する</button></div>
                    </div>

                </div>
            </div>


            <div class="land-list">
                <div class="list-header wrapper">
                    <div class="list-nav">
                        <div>
                            <button><svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960"
                                    width="40px" fill="#1f1f1f">
                                    <path
                                        d="M280-200v-80h284q63 0 109.5-40T720-420q0-60-46.5-100T564-560H312l104 104-56 56-200-200 200-200 56 56-104 104h252q97 0 166.5 63T800-420q0 94-69.5 157T564-200H280Z" />
                                </svg></button>
                            <button><svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960"
                                    width="40px" fill="#1f1f1f">
                                    <path
                                        d="M282.98-140q-25.71 0-44.14-18.43t-18.43-44.14v-532.05H180v-50.25h174.05v-30.51h251.9v30.51H780v50.25h-40.41v532.05q0 25.79-18.39 44.18T677.02-140H282.98Zm406.35-594.62H270.67v532.05q0 5.39 3.59 8.85t8.72 3.46h394.04q4.62 0 8.47-3.84 3.84-3.85 3.84-8.47v-532.05ZM379.54-273.23h50.25v-379.08h-50.25v379.08Zm150.67 0h50.25v-379.08h-50.25v379.08ZM270.67-734.62v544.36V-734.62Z" />
                                </svg></button>
                        </div>
                    </div>

                </div>

                <div class="table-wrapper">
                    <table>
                        <thead>
                            <tr>
                                <th><label class="checkbox-btn">
                                        <input type="checkbox" name="" value="">
                                    </label></th>
                                <th>9/18(土)</th>
                                <th>板橋区〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇</th>
                                <th>60㎡</th>
                                <th>18坪</th>
                                <th>5400万円</th>


                            </tr>
                        </thead>
                        <tbody>
                            <tr>

                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>








@endsection
