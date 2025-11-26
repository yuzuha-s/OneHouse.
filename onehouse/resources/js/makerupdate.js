document.addEventListener("DOMContentLoaded", () => {
    const stars = document.querySelectorAll('input[name="star[]"]');
    const starValueInput = document.querySelector('input[name="star_value"]');

    // ページ読み込み時、既存の値を反映
    let initialStarValue = parseInt(starValueInput.value) || 0;
    colorStarsUp(initialStarValue - 1);

    // 星をクリックしたとき
    stars.forEach((checkbox, index) => {
        checkbox.addEventListener("change", () => {
            // hidden の値を更新
            starValueInput.value = index + 1;

            // チェック状態を全星に反映
            stars.forEach((star, i) => {
                star.checked = i <= index;
            });

            // 星の色を更新
            colorStarsUp(index);
        });
    });

    function colorStarsUp(index) {
        stars.forEach((star, i) => {
            const svg = star.nextElementSibling;
            if (!svg) return;

            if (i <= index) {
                svg.outerHTML = `
                    <svg xmlns="http://www.w3.org/2000/svg" height="60px" viewBox="0 -960 960 960" width="60px" fill="#FFE173" stroke="#E6C200" stroke-width="50">
                        <path d="m305-704 112-145q12-16 28.5-23.5T480-880q18 0 34.5 7.5T543-849l112 145 170 57q26 8 41 29.5t15 47.5q0 12-3.5 24T866-523L756-367l4 164q1 35-23 59t-56 24q-2 0-22-3l-179-50-179 50q-5 2-11 2.5t-11 .5q-32 0-56-24t-23-59l4-165L95-523q-8-11-11.5-23T80-570q0-25 14.5-46.5T135-647l170-57Z"></path>
                    </svg>`;
            } else {
                svg.outerHTML = `
                    <svg xmlns="http://www.w3.org/2000/svg" height="60px" viewBox="0 -960 960 960" width="60px" fill="#FFFFFF" stroke="#8C8C8C" stroke-width="50">
                        <path d="m305-704 112-145q12-16 28.5-23.5T480-880q18 0 34.5 7.5T543-849l112 145 170 57q26 8 41 29.5t15 47.5q0 12-3.5 24T866-523L756-367l4 164q1 35-23 59t-56 24q-2 0-22-3l-179-50-179 50q-5 2-11 2.5t-11 .5q-32 0-56-24t-23-59l4-165L95-523q-8-11-11.5-23T80-570q0-25 14.5-46.5T135-647l170-57Z"></path>
                    </svg>`;
            }
        });
    }
});
