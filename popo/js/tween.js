$(function () {

    TweenMax.fromTo('.section .title', 2, {
        x: -300,
        // y: -30,
        opacity: 0,
        scale: 1
    }, {
        x: 0,
        // y: 0,
        // ease: Elastic.easeOut.config(1, 0.3),
        opacity: 1,
        scale: 1.5
    });

    TweenMax.fromTo('.section .desc', 1, {
        x: -300,
        // y: -30,
        // opacity: 0
    }, {
        x: 0,
        delay: 0.5,
        // y: 0,
        // ease: Bounce.easeOut ,
        // opacity: 1
    });






})