$(window).load(function() {
 //   setTimeout(function() {
 	/*NProgress.inc();*/
    NProgress.done();
   // }, 3000);
});

$(document).ready(function() {
    NProgress.start();
    NProgress.set(0.3);
    /*NProgress.inc();*/
});
