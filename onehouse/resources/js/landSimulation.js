function init() {
    setupInitialState();
    setupEventListeners();
}

function setupInitialState() {}

function setupEventListeners() {
    const calculateBtn = document.getElementById("calculate-btn");
    const editBtn = document.querySelectorAll(".edit-row");
    const range = document.getElementById("range");
    const tuboValue = document.getElementById("value");
    const builableAreaValue = document.querySelector(".builable_area");
    const buildingCostValue = document.querySelector(".building_cost");
    const builableTuboValue = document.querySelector(".builable_area_Tubo");
    const maxFloorAreaValue = document.querySelector(".maxfloor_area");
    let currentPricePerTsubo = 0;

    // range と連動
    range.addEventListener("input", (e) => {
        const tubo = parseFloat(e.target.value) || 0;
        tuboValue.textContent = tubo;
        builableAreaValue.textContent = (tubo * 3.3).toFixed(1);
        buildingCostValue.textContent = Math.floor(
            tubo * currentPricePerTsubo
        ).toLocaleString();
        builableTuboValue.textContent = tubo;
    });

    // land-calculateボタン押下時の建築可能面積の結果表示
    const handleCalculate = () => {
        const tuboInput = document.querySelector(
            'input[name="builable_area_Tubo"]'
        );
        const tubo = parseFloat(tuboInput.value) || 0;

        tuboValue.textContent = tubo;
        builableAreaValue.textContent = (tubo * 3.3).toFixed(1);
        buildingCostValue.textContent = Math.floor(
            tubo * currentPricePerTsubo
        ).toLocaleString();
        builableTuboValue.textContent = tubo;

        const landArea =
            parseFloat(
                document.querySelector('input[name="landarea"]').value
            ) || 0;
        const far =
            parseInt(document.querySelector('input[name="far"]').value) || 0;
        const bcr =
            parseInt(document.querySelector('input[name="bcr"]').value) || 0;
        const pricePerTsubo =
            parseInt(
                document.querySelector('input[name="pricePerTsubo"]').value
            ) || 0;
        currentPricePerTsubo = pricePerTsubo;

        if (landArea <= 0 || far <= 0 || bcr <= 0 || pricePerTsubo <= 0) {
            showInputMessage("inputerror");
            range.max = 0;
            range.value = 0;
            tuboValue.textContent = 0;
            builableAreaValue.textContent = 0;
            return;
        }

        // 建築可能面積 ㎡
        const maxFloorArea = landArea * (bcr / 100);
        const builable_area = maxFloorArea * (far / 100);
        // 建築可能面積 坪
        const builable_area_Tubo = builable_area / 3.3;
        // 建築費用
        const building_cost = builable_area_Tubo * pricePerTsubo;
        // 計算結果表示
        builableAreaValue.textContent = Math.floor(builable_area);
        maxFloorAreaValue.textContent = Math.floor(maxFloorArea);
        builableTuboValue.textContent = Math.floor(builable_area_Tubo);
        buildingCostValue.textContent = Math.floor(building_cost);

        // const tbody = document.querySelector("tbody");

        document.getElementById("builable_area_hidden").value =
            Math.floor(builable_area);

        range.max = Math.floor(builable_area_Tubo);
        range.value = range.max;
        tuboValue.textContent = range.value;
    };
    calculateBtn.addEventListener("click", () => {
        handleCalculate();
        const errors = document.querySelectorAll(".error");
        errors.forEach((error) => {
            error.style.display = "none";
        });
    });

    // edit-row button押下時のバリデーション・UI更新
    const handleEdit = (e) => {
        if (e.target.closest(".edit-row")) {
            const btn = e.target.closest(".edit-row");
            const tr = btn.closest("tr");
            tr.style.backgroundColor = "rgba(97, 198, 223, 0.3)";

            document.querySelector('textarea[name="address"]').value =
                tr.dataset.address;
            document.querySelector('input[name="landarea"]').value =
                tr.dataset.landarea;
            document.querySelector('input[name="floor"]').value =
                tr.dataset.floor;
            document.querySelector('input[name="far"]').value = tr.dataset.far;
            document.querySelector('input[name="bcr"]').value = tr.dataset.bcr;
            document.querySelector('input[name="pricePerTsubo"]').value =
                tr.dataset.price;
            document.querySelector("input[name=id]").value = tr.dataset.id;
            showUpdateMessage("update");
        }
    };

    editBtn.forEach((btn) =>
        btn.addEventListener("click", (e) => {
            handleEdit(e);
        })
    );
}
// バリデーションメッセージの表示
function showUpdateMessage(type) {
    const validate = document.querySelector(".validate-wrapper");
    validate.innerHTML = "";
    if (type === "update") {
        validate.innerHTML = `<div class = "validate">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960" width="40px"
                                        fill="#576bf5">
                                        <path d="M422-297.33 704.67-580l-49.34-48.67L422-395.33l-118-118-48.67 48.66L422-297.33ZM480-80q-82.33 0-155.33-31.5-73-31.5-127.34-85.83Q143-251.67 111.5-324.67T80-480q0-83 31.5-156t85.83-127q54.34-54 127.34-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 82.33-31.5 155.33-31.5 73-85.5 127.34Q709-143 636-111.5T480-80Zm0-66.67q139.33 0 236.33-97.33t97-236q0-139.33-97-236.33t-236.33-97q-138.67 0-236 97-97.33 97-97.33 236.33 0 138.67 97.33 236 97.33 97.33 236 97.33ZM480-480Z"/>
                                    </svg>
            <p>情報を更新中！</p></div>`;
        validate.style.display = "block";
        setTimeout(() => {
            validate.style.display = "none";
        }, 5000);
    }
}

function showInputMessage(type) {
    const validate = document.querySelector(".validate-wrapper");
    validate.innerHTML = "";
    if (type === "inputerror") {
        validate.innerHTML = `<div class = "validate"> <svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960" width="40px" fill="#576bf5"><path d="M479.99-280q15.01 0 25.18-10.15 10.16-10.16 10.16-25.17 0-15.01-10.15-25.18-10.16-10.17-25.17-10.17-15.01 0-25.18 10.16-10.16 10.15-10.16 25.17 0 15.01 10.15 25.17Q464.98-280 479.99-280Zm-31.32-155.33h66.66V-684h-66.66v248.67ZM480.18-80q-82.83 0-155.67-31.5-72.84-31.5-127.18-85.83Q143-251.67 111.5-324.56T80-480.33q0-82.88 31.5-155.78Q143-709 197.33-763q54.34-54 127.23-85.5T480.33-880q82.88 0 155.78 31.5Q709-817 763-763t85.5 127Q880-563 880-480.18q0 82.83-31.5 155.67Q817-251.67 763-197.46q-54 54.21-127 85.84Q563-80 480.18-80Zm.15-66.67q139 0 236-97.33t97-236.33q0-139-96.87-236-96.88-97-236.46-97-138.67 0-236 96.87-97.33 96.88-97.33 236.46 0 138.67 97.33 236 97.33 97.33 236.33 97.33ZM480-480Z"/></svg><p>計算には土地面積・容積率・建ぺい率・坪単価を入力してください。</p></div>`;
        validate.style.display = "block";

        setTimeout(() => {
            validate.style.display = "none";
        }, 3000);
        return;
    } else if (type === "calculateSuccess") {
        validate.innerHTML = `<div class = "validate">
            <svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960" width="40px"
                fill="#576bf5">
                <path d="M422-297.33 704.67-580l-49.34-48.67L422-395.33l-118-118-48.67 48.66L422-297.33ZM480-80q-82.33 0-155.33-31.5-73-31.5-127.34-85.83Q143-251.67 111.5-324.67T80-480q0-83 31.5-156t85.83-127q54.34-54 127.34-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 82.33-31.5 155.33-31.5 73-85.5 127.34Q709-143 636-111.5T480-80Zm0-66.67q139.33 0 236.33-97.33t97-236q0-139.33-97-236.33t-236.33-97q-138.67 0-236 97-97.33 97-97.33 236.33 0 138.67 97.33 236 97.33 97.33 236 97.33ZM480-480Z"/>
            </svg>
            <p>建てられる範囲とコストが出ました！</p></div>
        `;
        validate.style.display = "block";
        setTimeout(() => {
            validate.style.display = "none";
        }, 3000);
    }
}
document.addEventListener("DOMContentLoaded", init);
