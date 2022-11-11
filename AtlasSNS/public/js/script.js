// 2022年10月29日 ヘッダー/アコーディオンメニューの設置
// addClassはCSSを追加
// removeClassはcssを削除
// toggleClassはクラスの追加とクラスの削除を交互に行う
$('.menu-btn').click(function(){
    $(this).toggleClass('is-open');
    $(this).siblings('.menu').toggleClass('is-open');
});