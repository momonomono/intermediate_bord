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

    // バツボタンを押した際,エラーメッセージを見えなくする
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
    const metaTag = document.querySelector("meta[name='error-message']");
    const errors = JSON.parse(metaTag.content);
    console.log(errors.length);

    // バリデーションが存在する時に表示
    if (errors.length > 0) {
        background.classList.remove("js-hidden");
    }     
});

// 編集するボタンが押された場合
const editButton = document.querySelectorAll(".js-button-edit");
editButton.forEach((el) => {
    el.addEventListener("click", ()=>{
        // 入力フォームの_methodをpatchに変更する
        const formMethod = document.querySelector("#js-todo-method");
        formMethod.value = "patch";


        // 入力フォームにtodolistのidを挿入
        const todoId = el.getAttribute("data-id");
        const editId = document.querySelector("#js-todo-id");
        editId.value = todoId;


        // 入力フォームのInputにtodolistのタイトル、タスクの内容を挿入する
        const title = document.querySelector(`.js-title-${todoId}`);
        const detail = document.querySelector(`.js-detail-${todoId}`);
        
        const inputForTitle = document.querySelector("#js-form-title");
        const inputForDetail = document.querySelector("#js-form-detail");

        inputForTitle.value = title.textContent;
        inputForDetail.value = detail.textContent;

        
        // 入力フォームを表示させる
        background.classList.remove("js-hidden");
    });
})

// セレクターが変更された場合
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
            })
            .catch(err => {
                console.error('エラー:', err);
            });
    });
});