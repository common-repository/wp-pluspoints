function showLink(a){a=jQuery(a).attr("href");window.open(a,"_blank");return false}function externalLinks(){for(var a=jQuery("a"),b=0;b<a.length;b++){var c=a[b];jQuery(c).attr("href")&&jQuery(c).attr("rel")=="wppp_external"&&jQuery(c).click(function(){return showLink(this)})}}
function buildTotals(){for(var a=jQuery(".wppp_total"),b=0;b<a.length;b++){var c=0,d,e,f=a[b],h=jQuery(f).attr("rel"),g=jQuery(f).attr("title");jQuery(".plusPoints strong").each(function(){if(jQuery(this).attr("rel")==h)c+=parseInt(jQuery(this).text(),10)});d=Math.round(c/g*100);switch(true){case d<"90":e="green";break;case d>"99":e="red";break;default:e="orange"}jQuery(f).prepend('You have used <strong class="'+e+'">'+c+"</strong> of your <strong>"+g+"</strong> ("+d+"%) daily points.")}}
jQuery(function(){buildTotals();externalLinks()});