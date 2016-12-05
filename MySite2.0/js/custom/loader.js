$(window).load(function() {
    setTimeout(function() {
    NProgress.done();
    }, 3000).delay(500);
});

$(document).ready(function() {
    NProgress.start().delay(500);

});
