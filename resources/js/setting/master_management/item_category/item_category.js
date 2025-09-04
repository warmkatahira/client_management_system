// ＋/－のボタンが押下されたら
$('.toggle_detail_btn').on("click",function(){
    // 要素を取得
    const $btn = $(this);
    const $toggleDetailRow = $btn.closest('tr').next('.toggle_detail');
    // hiddenクラスを変更
    $toggleDetailRow.toggleClass('hidden');
    // hiddenクラスを持っている/持っていないで処理を分岐
    if($toggleDetailRow.hasClass('hidden')){
        $btn.html('<i class="las la-plus"></i>')
            .removeClass('bg-btn-cancel')
            .addClass('bg-btn-enter');
    }else{
        $btn.html('<i class="las la-minus"></i>')
            .removeClass('bg-btn-enter')
            .addClass('bg-btn-cancel');
    }
});