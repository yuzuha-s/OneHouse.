document.addEventListener("DOMContentLoaded", () => {
    // 読み込み後にふわっと表示（インだけ）
    requestAnimationFrame(() => {
        document.body.classList.add("fade-in");
    });
});
