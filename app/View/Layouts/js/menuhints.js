


$(document).ready(function ()
{
var els = document.getElementsByAttribute('data-tooltip');
for (var i=0,len=els.length; i<len; i+=1) {
if (els[i].tagName.toLowerCase() !== 'rect' && els[i].tagName.toLowerCase() !== 'arc' && els[i].tagName.toLowerCase() !== 'path' && els[i].tagName.toLowerCase() !== 'circle') {
var func;
els[i].addEventListener('mouseover', func = function (e)
{

var $menu = $('div#navigation-top-bar-dropdown');
if ($menu) {
$menu.hide();
}
var obj       = e.target,
$obj      = $(obj),
xy        = $obj.offset(),
objWidth  = $obj.width(),
objHeight = $obj.height(),
isSocial  = $obj.get(0).getAttribute('data-tooltip-social') === 'true' ? true : false;



var div = $('<div class="navigationMenuhint">').css({
position: 'absolute',
left: xy.left + (objWidth / 2) + 'px',
top: $(obj).position().top + objHeight + (isSocial ? 15 : 15) + 'px',
padding: '9px',
backgroundColor: 'black',
color: 'white',
textAlign: 'center',
fontWeight: 'bold',
fontFamily: 'Arial',
fontSize: '90%',
boxShadow: '0px 0px 3px gray',
borderRadius: '2px',
zIndex: 9999
}).html(obj.getAttribute('data-tooltip'))
.appendTo($(document.body))
.get(0);

document.body.__menuhint__ = div;

div.style.width = div.offsetWidth  + 'px';

var user_specified_width = parseFloat($obj.get(0).getAttribute('data-tooltip-width'));
if (user_specified_width) {
div.style.width = user_specified_width + 'px';
}

div.style.left = parseFloat(div.style.left) - (div.offsetWidth / 2) + 'px';

if (div.offsetLeft <= 5) {
div.style.left = '5px';
}

if ((div.offsetLeft + div.offsetWidth)  >= document.body.offsetWidth) {
div.style.left  = '';
div.style.right = '5px';
}
}, false);
els[i].addEventListener('click', func, false)
}
if (els[i].getAttribute('data-autohide') !== 'false') {




els[i].addEventListener('mouseout', function (e)
{
var $hint = $(document.body.__menuhint__);
$hint.hide();
$hint.remove();
document.body.__menuhint__ = null;
}, false);

} else {
window.addEventListener('click', function (e)
{
var $hints = $('div.navigationMenuhint');
$hints.hide();
$hints.remove();
document.body.__menuhint__ = null;
}, false)
}
}
});



window.addEventListener('resize', function (e)
{
if (document.body.__menuhint__) {
$(document.body.__menuhint__).hide();
$(document.body.__menuhint__).remove();
}
}, false);






document.getElementsByAttribute =
Element.prototype.getElementsByAttribute = function(attr) {
var nodeList = this.getElementsByTagName('*');
var nodeArray = [];
for (var i = 0, elem; elem = nodeList[i]; i++) {
if ( elem.getAttribute(attr) ) nodeArray.push(elem);
}
return nodeArray;
};
