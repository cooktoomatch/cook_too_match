const pathArr = location.pathname.split('/');

if (pathArr[1] === "") {
    $('.top').addClass('active');
} else if (pathArr[1] === "login") {
    $('.login').addClass('active');
} else if (pathArr[1] === "register") {
    $('.register').addClass('active');
}