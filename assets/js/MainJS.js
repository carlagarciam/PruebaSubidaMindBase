function moveLine(myLine) {

    var myDistance = myLine.offset().left - $('.nav__menu').offset().left;
    var myWidth = myLine.width();
    var myColor = myLine.parent().data("color");

    $('.nav__line').css({
        'background-color': myColor,
        'width': myWidth + 'px',
        'transform': 'translateX(' + myDistance + 'px)'
    });

}


if ($('.w--current p').length > 0) {
    moveLine($('.w--current p'));
}


window.onresize = function () {

    if ($('.w--current p').length > 0) {
        moveLine($('.w--current p'));
    }

}


$(".nav__link").mouseenter(function () {
    moveLine($(this).find('p'));
});
$(".nav__link").mouseleave(function () {

    if ($('.w--current p').length > 0) {
        moveLine($('.w--current p'));
    } else {
        $('.nav__line').css('width', '0px');
    }


});

const noise = () => {
    let canvas, ctx;
    let wWidth, wHeight;
    let noiseData = [];
    let frame = 0;
    let loopTimeout;
    // Create Noise
    const createNoise = () => {
        const idata = ctx.createImageData(wWidth, wHeight);
        const buffer32 = new Uint32Array(idata.data.buffer);
        const len = buffer32.length;
        for (let i = 0; i < len; i++) {
            if (Math.random() < 0.1) {
                buffer32[i] = 0xff000000;
            }
        }
        noiseData.push(idata);
    };
    // Play Noise
    const paintNoise = () => {
        if (frame === 9) {
            frame = 0;
        } else {
            frame++;
        }
        ctx.putImageData(noiseData[frame], 0, 0);
    };
    // Loop
    const loop = () => {
        paintNoise(frame);
        loopTimeout = window.setTimeout(() => {
            window.requestAnimationFrame(loop);
        }, (1000 / 25));
    };
    // Setup
    const setup = () => {
        wWidth = window.innerWidth;
        wHeight = window.innerHeight;
        canvas.width = wWidth;
        canvas.height = wHeight;
        for (let i = 0; i < 10; i++) {
            createNoise();
        }
        loop();
    };
    // Reset
    let resizeThrottle;
    const reset = () => {
        window.addEventListener('resize', () => {
            window.clearTimeout(resizeThrottle);
            resizeThrottle = window.setTimeout(() => {
                window.clearTimeout(loopTimeout);
                setup();
            }, 200);
        }, false);
    };
    // Init
    const init = (() => {
        canvas = document.getElementById('noise');
        ctx = canvas.getContext('2d');
        setup();
    })();
};
noise();


var tricksWord = document.getElementsByClassName("tricks");
for (var i = 0; i < tricksWord.length; i++) {

    var wordWrap = tricksWord.item(i);
    wordWrap.innerHTML = wordWrap.innerHTML.replace(/(^|<\/?[^>]+>|\s+)([^\s<]+)/g, '$1<span class="tricksword">$2</span>');

}

var tricksLetter = document.getElementsByClassName("tricksword");
for (var i = 0; i < tricksLetter.length; i++) {

    var letterWrap = tricksLetter.item(i);
    letterWrap.innerHTML = letterWrap.textContent.replace(/\S/g, "<span class='letter'>$&</span>");

}

var fadeUp = anime.timeline({
    loop: false,
    autoplay: false,
});

fadeUp
    .add({
        targets: '.fade-up .letter',
        translateY: [100, 0],
        translateZ: 0,
        opacity: [0, 1],
        easing: "easeOutExpo",
        duration: 1400,
        delay: (el, i) => 300 + 40 * i
    });


fadeUp.play();

