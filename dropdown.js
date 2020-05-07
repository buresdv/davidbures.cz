$(document).ready(function() {
    $('.dropdownToggle').on('click', function() {
        $(this).toggleClass('dropdownExpanded');
        $(this).next().slideToggle();
    });
});