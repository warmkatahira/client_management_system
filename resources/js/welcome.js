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