const o=document.getElementById("animated-background");let n=0,t=1;function e(){n+=t*1,(n>100||n<0)&&(t*=-1),o.style.backgroundPosition=`${n}% 50%`,requestAnimationFrame(e)}e();
