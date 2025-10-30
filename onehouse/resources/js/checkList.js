document.addEventListener("DOMContentLoaded", () => {
    const addBtn = document.querySelector(".add_button");
    const tbody = document.querySelector("tbody");

    addBtn.addEventListener("click", (e) => {
      e.preventDefault();
        const tr = document.createElement("tr");
        tr.innerHTML = `
  <td></td>
  <td><input type="text" placeholder="ここに入力" class="checklist_input" name="list" value=""></td>
    <td></td>
  <td><form action=""><button type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960" width="40px" fill="#1f1f1f"><path d="M380.67-331.33 158.33-553.67l47.67-47L380.67-426l374-374 47 47.67-421 421ZM200-160v-66.67h560V-160H200Z"/></svg></button></form></td>
                         
                          <td>
                            <form action=""><button type="submit"><svg xmlns="http://www.w3.org/2000/svg"
                                        height="40px" viewBox="0 -960 960 960" width="40px" fill="#8C8C8C">
                                        <path
                                            d="M282.98-140q-25.71 0-44.14-18.43t-18.43-44.14v-532.05H180v-50.25h174.05v-30.51h251.9v30.51H780v50.25h-40.41v532.05q0 25.79-18.39 44.18T677.02-140H282.98Zm406.35-594.62H270.67v532.05q0 5.39 3.59 8.85t8.72 3.46h394.04q4.62 0 8.47-3.84 3.84-3.85 3.84-8.47v-532.05ZM379.54-273.23h50.25v-379.08h-50.25v379.08Zm150.67 0h50.25v-379.08h-50.25v379.08ZM270.67-734.62v544.36V-734.62Z" />
                                    </svg></button></form>
                        </td>
  `;
        tbody.appendChild(tr);
    });
});
