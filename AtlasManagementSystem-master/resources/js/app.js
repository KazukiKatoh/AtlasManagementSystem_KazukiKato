require('./bootstrap');
<script>
    // ページが読み込まれた後に実行される処理
    document.addEventListener("DOMContentLoaded", function () {
        // メインカテゴリーをクリックした時の処理
        const mainCategories = document.querySelectorAll(".main_categories");
        mainCategories.forEach(function (mainCategory) {
            mainCategory.addEventListener("click", function () {
                const subCategories = mainCategory.querySelector(".sub_categories");
                if (subCategories.style.display === "none") {
                    subCategories.style.display = "block";
                } else {
                    subCategories.style.display = "none";
                }
            });
        });
    });
</script>
