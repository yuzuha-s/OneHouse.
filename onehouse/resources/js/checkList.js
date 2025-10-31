document.addEventListener("DOMContentLoaded", () => {
    const addBtn = document.querySelector(".add_button");
    const form = document.getElementById("form-list");
    const tbody = document.querySelector("tbody");

    const validate = document.querySelector(".validate-wrapper");

    // checkedの場合
    const rows = document.querySelectorAll("tbody tr");
    rows.forEach((tr) => {
        const checkbox = tr.querySelector("input[name='checked']");
        if (checkbox && checkbox.checked) {
            tr.classList.add("checked");
            const registerBtn = tr.querySelector(".register-list button");
            const deleteBtn = tr.querySelector(".delete-list button");

            if (registerBtn) registerBtn.disabled = true;
            if (deleteBtn) deleteBtn.disabled = true;
        }
    });

    addBtn.addEventListener("click", (e) => {
        e.preventDefault();
        const tr = document.createElement("tr");
        tr.innerHTML = `
  <td></td>
  <td><input type="text" placeholder="ここに入力" class="checklist_input" name="list" value=""></td>
    <td></td>
  <td><form action=""><button type="button" class="register-list">
                            <svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960" width="40px" fill="#ffff"><path d="M380.67-331.33 158.33-553.67l47.67-47L380.67-426l374-374 47 47.67-421 421ZM200-160v-66.67h560V-160H200Z"/></svg></button></form></td>

                          <td>
                            <form action="" id="form-list"><button type="button" class="delete-list"><svg xmlns="http://www.w3.org/2000/svg"
                                        height="40px" viewBox="0 -960 960 960" width="40px" fill="#8C8C8C">
                                        <path
                                            d="M282.98-140q-25.71 0-44.14-18.43t-18.43-44.14v-532.05H180v-50.25h174.05v-30.51h251.9v30.51H780v50.25h-40.41v532.05q0 25.79-18.39 44.18T677.02-140H282.98Zm406.35-594.62H270.67v532.05q0 5.39 3.59 8.85t8.72 3.46h394.04q4.62 0 8.47-3.84 3.84-3.85 3.84-8.47v-532.05ZM379.54-273.23h50.25v-379.08h-50.25v379.08Zm150.67 0h50.25v-379.08h-50.25v379.08ZM270.67-734.62v544.36V-734.62Z" />
                                    </svg></button></form>
                        </td>
  `;
        tbody.appendChild(tr);
    });

    // 登録ボタンの処理
    // 保存ボタンが押されたら
    tbody.addEventListener("click", (e) => {
        if (e.target.closest(".register-list")) {
            const tr = e.target.closest("tr");
            const input = tr.querySelector(".checklist_input");
            const list = input.value.trim();
            // バリデーション表示
            if (!list) {
                validate.innerHTML = `<div class = "validate"> <svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960" width="40px" fill="#576bf5"><path d="M479.99-280q15.01 0 25.18-10.15 10.16-10.16 10.16-25.17 0-15.01-10.15-25.18-10.16-10.17-25.17-10.17-15.01 0-25.18 10.16-10.16 10.15-10.16 25.17 0 15.01 10.15 25.17Q464.98-280 479.99-280Zm-31.32-155.33h66.66V-684h-66.66v248.67ZM480.18-80q-82.83 0-155.67-31.5-72.84-31.5-127.18-85.83Q143-251.67 111.5-324.56T80-480.33q0-82.88 31.5-155.78Q143-709 197.33-763q54.34-54 127.23-85.5T480.33-880q82.88 0 155.78 31.5Q709-817 763-763t85.5 127Q880-563 880-480.18q0 82.83-31.5 155.67Q817-251.67 763-197.46q-54 54.21-127 85.84Q563-80 480.18-80Zm.15-66.67q139 0 236-97.33t97-236.33q0-139-96.87-236-96.88-97-236.46-97-138.67 0-236 96.87-97.33 96.88-97.33 236.46 0 138.67 97.33 236 97.33 97.33 236.33 97.33ZM480-480Z"/></svg><p>空欄です</p></div>`;

                validate.style.display = "block";
                setTimeout(() => {
                    validate.style.display = "none";
                }, 3000);
                return;
            }

            // 成功のメッセージ
            validate.innerHTML = `<div class = "validate"> 
            <svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960" width="40px"
                fill="#576bf5">
                <path d="M422-297.33 704.67-580l-49.34-48.67L422-395.33l-118-118-48.67 48.66L422-297.33ZM480-80q-82.33 0-155.33-31.5-73-31.5-127.34-85.83Q143-251.67 111.5-324.67T80-480q0-83 31.5-156t85.83-127q54.34-54 127.34-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 82.33-31.5 155.33-31.5 73-85.5 127.34Q709-143 636-111.5T480-80Zm0-66.67q139.33 0 236.33-97.33t97-236q0-139.33-97-236.33t-236.33-97q-138.67 0-236 97-97.33 97-97.33 236.33 0 138.67 97.33 236 97.33 97.33 236 97.33ZM480-480Z"/>
            </svg>
            <p>登録が完了しました</p></div>
        `;
            validate.style.display = "block";
            input.disabled = true;
            setTimeout(() => {
                validate.style.display = "none";
            }, 3000);

            // リストを更新する
            const editBtn = tr.querySelectorAll("td");
            editBtn[0].innerHTML = `<label class="switch">
                                        <input type="checkbox" name="checked" value="{{ $checkList->checked }}">
                                        <span class="slider"></span>
                                    </label>`;

            editBtn[3].innerHTML = `<form action=""><button type="button" class="edit-list">
                           <svg xmlns="http://www.w3.org/2000/svg" height="40px"
                                    viewBox="0 -960 960 960" width="40px" fill="#8C8C8C">
                                    <path
                                        d="M284-286h68l250-249.33-68-69.34-250 250V-286Zm339.33-270.67 40-40.66q6.67-6.67 7-15 .34-8.34-7-15.67l-38-37.33q-7.33-7.34-15.33-7-8 .33-14.67 7l-40 39.33 68 69.33ZM186.67-120q-27.5 0-47.09-19.58Q120-159.17 120-186.67v-586.66q0-27.5 19.58-47.09Q159.17-840 186.67-840h192.66q7.67-35.33 35.84-57.67Q443.33-920 480-920t64.83 22.33Q573-875.33 580.67-840h192.66q27.5 0 47.09 19.58Q840-800.83 840-773.33v586.66q0 27.5-19.58 47.09Q800.83-120 773.33-120H186.67Zm0-66.67h586.66v-586.66H186.67v586.66Zm293.33-608q13.67 0 23.5-9.83t9.83-23.5q0-13.67-9.83-23.5t-23.5-9.83q-13.67 0-23.5 9.83t-9.83 23.5q0 13.67 9.83 23.5t23.5 9.83Zm-293.33 608v-586.66 586.66Z" />
                                </svg></button></form>

                                
`;

            validate.style.display = "block";
            input.disabled = true;
        } else if (e.target.closest(".edit-list")) {
            const tr = e.target.closest("tr");
            const input = tr.querySelector(".checklist_input");
            input.disabled = false;
            const editBtn = tr.querySelectorAll("td");
            editBtn[3].innerHTML = `<form action=""><button type="button" class="register-list">
                            <svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960" width="40px" fill="#ffff"><path d="M380.67-331.33 158.33-553.67l47.67-47L380.67-426l374-374 47 47.67-421 421ZM200-160v-66.67h560V-160H200Z"/></svg></button></form>
`;
        } else if (e.target.closest(".delete-list")) {
            const tr = e.target.closest("tr");
            if (confirm("本当に削除しますか？")) {
                tr.remove();
                validate.innerHTML = `<div class = "validate"> 
            <svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960" width="40px"
                fill="#576bf5">
                <path d="M422-297.33 704.67-580l-49.34-48.67L422-395.33l-118-118-48.67 48.66L422-297.33ZM480-80q-82.33 0-155.33-31.5-73-31.5-127.34-85.83Q143-251.67 111.5-324.67T80-480q0-83 31.5-156t85.83-127q54.34-54 127.34-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 82.33-31.5 155.33-31.5 73-85.5 127.34Q709-143 636-111.5T480-80Zm0-66.67q139.33 0 236.33-97.33t97-236q0-139.33-97-236.33t-236.33-97q-138.67 0-236 97-97.33 97-97.33 236.33 0 138.67 97.33 236 97.33 97.33 236 97.33ZM480-480Z"/>
            </svg>
            <p>削除しました</p></div>
        `;
                validate.style.display = "block";
                setTimeout(() => {
                    validate.style.display = "none";
                }, 3000);
            }
        }
    });

    // チェックが入ったら背景色をオフにする
    tbody.addEventListener("click", (e) => {
        if (e.target.matches("input[name='checked']")) {
            const tr = e.target.closest("tr");
            const registerBtn = tr.querySelector(".register-list button");
            const deleteBtn = tr.querySelector(".delete-list button");

            if (e.target.checked) {
                tr.classList.add("checked");
                if (registerBtn) registerBtn.disabled = true;
                if (deleteBtn) deleteBtn.disabled = true;
            } else {
                tr.classList.remove("checked");
                if (registerBtn) registerBtn.disabled = false;
                if (deleteBtn) deleteBtn.disabled = false;
            }
        }
    });
});

// チェックtrue/falseの状態管理
// リスト行追加
// 登録ボタンが押されたら
// 削除ボタンが押されたら
// メッセージ(成功・更新・入力値なし・削除完了)
