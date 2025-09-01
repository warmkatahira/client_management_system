// 背景グラデーションをゆっくり動かすアニメーション
const background = document.getElementById('animated-background');
let position = 0;
let direction = 1; // 1 = 右, -1 = 左

function animateBackground() {
    position += direction * 1.0; // 小さいほどゆっくり
    if (position > 100 || position < 0) direction *= -1; // 端で反転
    background.style.backgroundPosition = `${position}% 50%`;
    requestAnimationFrame(animateBackground);
}

animateBackground();

// ロゴスクロール用
$(function() {
    const $slider = $('.logo-slider');
    const $items = $slider.children();
    let totalWidth = 0;
    // 元の画像幅合計を計算
    $items.each(function() {
        totalWidth += $(this).outerWidth(true);
    });
    let left = 0;
    let speed = 1; // pxずつスクロール。値を大きくすると速くなる
    function scrollSlider() {
        left -= speed;
        if (Math.abs(left) >= totalWidth / 2) { // 元画像分の幅でリセット
            left = 0;
        }
        $slider.css('left', left + 'px');
        requestAnimationFrame(scrollSlider);
    }
    scrollSlider();
});