document.addEventListener('DOMContentLoaded', function () {
    const speed = 0.5; // 更慢的滚动速度，更小的值
    const fps = 60;
    const delay = 1000 / fps;

    function scrollWrapper(wrapper, direction) {
        // 为了实现无缝滚动，复制滚动内容
        wrapper.innerHTML += wrapper.innerHTML;

        const totalWidth = wrapper.scrollWidth / 2; // 获取单倍内容宽度
        let currentPosition = 0;

        const move = () => {
            // 更新当前位置
            currentPosition += (direction === 'left' ? -speed : speed);

            // 重置位置到起点以实现无缝滚动
            if (direction === 'left' && Math.abs(currentPosition) >= totalWidth) {
                currentPosition += totalWidth;
            } else if (direction === 'right' && currentPosition >= 0) {
                currentPosition -= totalWidth;
            }

            wrapper.style.transform = `translateX(${currentPosition}px)`;
        };

        setInterval(move, delay);
    }

    // 获取滚动容器
    const position1 = document.querySelector('.position1');
    const position2 = document.querySelector('.position2');
    const position3 = document.querySelector('.position3');

    // 应用滚动效果
    scrollWrapper(position1, 'left'); // 从左到右滚动
    scrollWrapper(position2, 'right'); // 从右到左滚动
    scrollWrapper(position3, 'left');
});
