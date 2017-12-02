


window.addEventListener('mousedown', function (e)
{        
if ($('div#navigation-top-bar div#navigation-top-bar-dropdown').css('display') !== 'hidden') {
$('div#navigation-top-bar div#navigation-top-bar-dropdown').fadeOut(200);
}
}, false);



window.addEventListener('resize', function (e)
{        
if ($('div#navigation-top-bar div#navigation-top-bar-dropdown').css('display') !== 'hidden') {
$('div#navigation-top-bar div#navigation-top-bar-dropdown').fadeOut(200);
}
}, false);



function positionNavigationTopBarDropdown()
{
if ($('div#navigation-top-bar div#navigation-top-bar-dropdown').css('display') === 'none') {
var $moreLink = $('span#navigation-top-bar-more-link'),
$menu     = $('div#navigation-top-bar div#navigation-top-bar-dropdown'),
offset   = $moreLink.offset(),
width    = $moreLink.width(),
height   = $moreLink.height(),
pointerH = 15

$menu.css({
top: offset.top + pointerH + height + 'px',
left: offset.left - ($menu.width() / 2) + (width / 2) + 'px'
});

$menu.fadeIn(200)
navigationDropdownMenu = true;
}
}
