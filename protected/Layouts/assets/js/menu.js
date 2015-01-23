$(document).ready(function(){
    var url = window.location.href;
    url = url.replace(/^(http:\/\/)?(www\.)?[^\/]+/, '');
    $('.nav a[href="'+url+'"]').parent().addClass('active');
});