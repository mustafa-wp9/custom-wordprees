class Search {
    // 1. تعريف المتغيرات
    constructor() {
        this.openButton = document.querySelectorAll(".js-search-trigger");
        this.closeButton = document.querySelector(".search-overlay__close");
        this.searchOverlay = document.querySelector(".search-overlay");
        this.searchField = document.querySelector("#search-term");
        this.resultsDiv = document.querySelector("#search-overlay__results");
        this.isOverlayOpen = false;
        this.isSpinnerVisible = false;
        this.previousValue;
        this.typingTimer;
        this.events();
    }

    // 2. تعريف الأحداث
    events() {
        this.openButton.forEach(el => {
            el.addEventListener("click", e => {
                e.preventDefault();
                this.openOverlay();
            });
        });

        this.closeButton.addEventListener("click", () => this.closeOverlay());
        document.addEventListener("keydown", e => this.keyPressDispatcher(e));
        this.searchField.addEventListener("keyup", () => this.typingLogic());
    }

    // 3. الوظائف

    // فتح نافذة البحث
    openOverlay() {
        this.searchOverlay.classList.add("search-overlay--active");
        document.body.classList.add("body-no-scroll");
        this.searchField.value = "";
        setTimeout(() => this.searchField.focus(), 301);
        this.isOverlayOpen = true;
    }

    // إغلاق نافذة البحث
    closeOverlay() {
        this.searchOverlay.classList.remove("search-overlay--active");
        document.body.classList.remove("body-no-scroll");
        this.isOverlayOpen = false;
    }

    // التحكم في المفاتيح
    keyPressDispatcher(e) {
        if (e.keyCode === 83 && !this.isOverlayOpen && document.activeElement.tagName != "INPUT" && document.activeElement.tagName != "TEXTAREA") {
            this.openOverlay();
        }
        if (e.keyCode === 27 && this.isOverlayOpen) {
            this.closeOverlay();
        }
    }

    // منطق البحث
    typingLogic() {
        if (this.searchField.value != this.previousValue) {
            clearTimeout(this.typingTimer);

            if (this.searchField.value) {
                if (!this.isSpinnerVisible) {
                    this.resultsDiv.innerHTML = '<div class="spinner-loader"></div>';
                    this.isSpinnerVisible = true;
                }
                this.typingTimer = setTimeout(this.getResults.bind(this), 750);
            } else {
                this.resultsDiv.innerHTML = "";
                this.isSpinnerVisible = false;
            }
        }
        this.previousValue = this.searchField.value;
    }

    // جلب نتائج البحث
    async getResults() {
        try {
            const response = await fetch(customData.root_url + '/wp-json/custom/v1/search?term=' + this.searchField.value);
            const results = await response.json();
            this.resultsDiv.innerHTML = `
                <div class="row">
                    <div class="one-third">
                        <h2 class="search-overlay__section-title">المقالات</h2>
                        ${results.posts.length ? '<ul class="link-list min-list">' : '<p>لا توجد نتائج.</p>'}
                            ${results.posts.map(item => `<li><a href="${item.permalink}">${item.title}</a></li>`).join('')}
                        ${results.posts.length ? '</ul>' : ''}
                    </div>
                    <div class="one-third">
                        <h2 class="search-overlay__section-title">الصفحات</h2>
                        ${results.pages.length ? '<ul class="link-list min-list">' : '<p>لا توجد نتائج.</p>'}
                            ${results.pages.map(item => `<li><a href="${item.permalink}">${item.title}</a></li>`).join('')}
                        ${results.pages.length ? '</ul>' : ''}
                    </div>
                </div>
            `;
            this.isSpinnerVisible = false;
        } catch (e) {
            this.resultsDiv.innerHTML = '<p>حدث خطأ في البحث.</p>';
        }
    }
}

export default Search;
