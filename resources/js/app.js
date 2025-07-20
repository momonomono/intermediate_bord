import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

const close = document.querySelector("#js-close-button");
const background = document.querySelector("#js-form__bg");
const buttonShow = document.querySelector("#js-button__show-form");

// 入力フォームポップアップのバツボタンをクリックしたときの処理
close.addEventListener("click", () => {
    background.classList.add("js-hidden");

    
    const errMsg = document.querySelectorAll(".js-errMsg");
    errMsg.forEach((msg) => {
        msg.innerHTML = "";
    });
});

// 入力フォームポップアップの表示ボタンをクリックした時の処理
buttonShow.addEventListener("click", () => {
    background.classList.remove("js-hidden");
});

// 画面をロードした時の処理
document.addEventListener("DOMContentLoaded", () => {

    // エラーメッセージが保管してるdivからデータを取り出す
    const errorsDiv = document.querySelector("#validation-errors");
    const errors = JSON.parse(errorsDiv.dataset.errors || '{}');
    
    // バリデーションが存在する時に表示
    if (Object.keys(errors).length > 0) {
        background.classList.remove("js-hidden");
    }     
});

const selecter = document.querySelectorAll(".js-todolist-selecter");
selecter.forEach( (el) => {
    el.addEventListener("change", () => {
            const selecterId = el.getAttribute("data-id");
            const selecterVal = el.value;

            axios.post("/selecter", {
                post_id: selecterId,
                post_status: selecterVal
            }, {
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                }
            }).then(res => {
                console.log(res.data);
            })
            .catch(err => {
                console.error('エラー:', err);
            });
    });
});