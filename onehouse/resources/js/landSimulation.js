document.addEventListener("DOMContentLoaded", () => {
    const calculateBtn = document.getElementById("calculate-btn");
    const range = document.getElementById("range");
    const tuboValue = document.getElementById("value");
    const validate = document.querySelector(".list-nav-validate");

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

    function calculate() {
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
        // const floor = document.querySelector('input[name="floor"]').value || 0;

        currentPricePerTsubo = pricePerTsubo;

        // バリデーション
        if (landArea <= 0 || far <= 0 || bcr <= 0 || pricePerTsubo <= 0) {
            validate.innerHTML = `<div class="error"><p>値を入力してください</p></div>`;
            validate.style.display = "block";
            setTimeout(() => {
                validate.style.display = "none";
            }, 3000);
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
        buildingCostValue.textContent =
            Math.floor(building_cost);

        document.getElementById("builable_area_hidden").value =
            Math.floor(builable_area);

        // range の設定
        range.max = Math.floor(builable_area_Tubo);
        range.value = range.max;
        tuboValue.textContent = range.value;

        // 成功メッセージ
        validate.innerHTML = `<div class="validate">
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

    calculateBtn.addEventListener("click", (e) => {
        // e.preventDefault();
        calculate();
    });
});
