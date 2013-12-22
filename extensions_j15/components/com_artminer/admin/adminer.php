<?php
/** Adminer - Compact MySQL management
* @link http://www.adminer.org/
* @author Jakub Vrana, http://php.vrana.cz/
* @copyright 2007 Jakub Vrana
* @license http://www.apache.org/licenses/LICENSE-2.0 Apache License, Version 2.0
*/error_reporting(E_ERROR); $Mc=(!ereg('^(unsafe_raw)?$',ini_get("filter.default"))||ini_get("filter.default_flags"));if($Mc){foreach(array('_GET','_POST','_COOKIE','_SERVER')as$b){$id=filter_input_array(constant("INPUT$b"),FILTER_UNSAFE_RAW);if($id){$$b=$id;}}}if(isset($_GET["file"])){header("Expires: ".gmdate("D, d M Y H:i:s",time()+365*24*60*60)." GMT");if($_GET["file"]=="favicon.ico"){header("Content-Type: image/x-icon");echo
base64_decode("AAABAAEAEBAQAAEABAAoAQAAFgAAACgAAAAQAAAAIAAAAAEABAAAAAAAwAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA////AAAA/wBhTgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAABEQAAAAAAERExAAAAARERExEAABERMREzMQABExMRERMRAAExMRETMRAAATERERMRAAABExERExAAAAETERExEAAAATERETERERARMRETESESEBMTETESEREQExEzESEREhETMxEREhERIREREAARISIRAAAAAAERERD/4z8A/wM/APgDAADAAwAAgAMAAIAHAACADwAAgB8AAIAfAACAAQAAAAEAAAABAAAAAAAAAAAAAAcAAAD/gQAA");}elseif($_GET["file"]=="default.css"){header("Content-Type: text/css");echo'body{color:#000;background:#fff;line-height:1.25em;font-family:Verdana,Arial,Helvetica,sans-serif;margin:0;font-size:90%;}a{color:blue;}a:visited{color:navy;}a:hover{color:red;}h1{font-size:100%;margin:0;padding:.8em 1em;border-bottom:1px solid #999;font-weight:normal;color:#777;background:#eee;}h1 .h1{font-size:150%;color:#777;text-decoration:none;font-style:italic;}h2{font-size:150%;margin:0 0 20px -18px;padding:.8em 1em;border-bottom:1px solid #000;color:#000;font-weight:normal;background:#ddf;}h3{font-weight:normal;font-size:130%;margin:.8em 0;}table{margin:0 20px .8em 0;border:0;border-top:1px solid #999;border-left:1px solid #999;font-size:90%;}td,th{margin-bottom:1em;border:0;border-right:1px solid #999;border-bottom:1px solid #999;padding:.2em .3em;}th{background:#eee;text-align:left;}thead th{text-align:center;}fieldset{display:inline;vertical-align:top;padding:.5em .8em;margin:0 .5em .5em 0;border:1px solid #999;}p{margin:0 20px 1em 0;}img{vertical-align:middle;border:0;}code{background:#eee;}.js .hidden{display:none;}.nowrap{white-space:nowrap;}.wrap{white-space:normal;}.error{color:red;background:#fee;}.message{color:green;background:#efe;}.error,.message{padding:.5em .8em;margin:0 20px 1em 0;}.char{color:#007F00;}.date{color:#7F007F;}.enum{color:#007F7F;}.binary{color:red;}.odd td{background:#F5F5F5;}.time{color:Silver;font-size:70%;float:right;margin-top:-3em;}.function{text-align:right;}tr:hover td{background:#ddf;}thead tr:hover td{background:transparent;}#menu{position:absolute;margin:10px 0 0;padding:0 0 30px 0;top:2em;left:0;width:19em;overflow:auto;overflow-y:hidden;white-space:nowrap;}#menu p{padding:.8em 1em;margin:0;border-bottom:1px solid #ccc;}#menu form{margin:0;}#content{margin:2em 0 0 21em;padding:10px 20px 20px 0;}#lang{position:absolute;top:0;left:0;line-height:1.8em;padding:.3em 1em;}#breadcrumb{white-space:nowrap;position:absolute;top:0;left:21em;background:#eee;height:2em;line-height:1.8em;padding:0 1em;margin:0 0 0 -18px;}#version{color:red;}#schema{margin-left:60px;position:relative;}#schema .table{border:1px solid Silver;padding:0 2px;cursor:move;position:absolute;}#schema .references{position:absolute;}';}elseif($_GET["file"]=="functions.js"){header("Content-Type: text/javascript");?>
document.body.className='js';function toggle(id){var el=document.getElementById(id);el.className=(el.className=='hidden'?'':'hidden');return true;}
function verify_version(){document.cookie='adminer_version=0';var script=document.createElement('script');script.src='https://adminer.svn.sourceforge.net/svnroot/adminer/trunk/version.js';document.body.appendChild(script);}
function form_check(el,name){var elems=el.form.elements;for(var i=0;i<elems.length;i++){if(name.test(elems[i].name)){elems[i].checked=el.checked;}}}
function form_uncheck(id){document.getElementById(id).checked=false;}
function select_add_row(field){var row=field.parentNode.cloneNode(true);var selects=row.getElementsByTagName('select');for(var i=0;i<selects.length;i++){selects[i].name=selects[i].name.replace(/[a-z]\[[0-9]+/,'$&1');selects[i].selectedIndex=0;}
var inputs=row.getElementsByTagName('input');if(inputs.length){inputs[0].name=inputs[0].name.replace(/[a-z]\[[0-9]+/,'$&1');inputs[0].value='';inputs[0].className='';}
field.parentNode.parentNode.appendChild(row);field.onchange=function(){};}
function body_load(){var jush_root='https://jush.svn.sourceforge.net/svnroot/jush/trunk/';var script=document.createElement('script');script.src=jush_root+'jush.js';script.onload=function(){jush.style(jush_root+'jush.css');jush.highlight_tag('pre');jush.highlight_tag('code');}
script.onreadystatechange=function(){if(script.readyState=='loaded'||script.readyState=='complete'){script.onload();}}
document.body.appendChild(script);}
var added='.',row_count;function re_escape(s){return s.replace(/[\[\]\\^$*+?.(){|}]/,'\\$&');}
function idf_escape(s){return'`'+s.replace(/`/,'``')+'`';}
function editing_name_change(field){var name=field.name.substr(0,field.name.length-7);var type=field.form[name+'[type]'];var opts=type.options;var table=re_escape(field.value);var column='';var match;if((match=/(.+)_(.+)/.exec(table))||(match=/(.*[a-z])([A-Z].*)/.exec(table))){table=match[1];column=match[2];}
var plural='(?:e?s)?';var tab_col=table+plural+'_?'+column;var re=new RegExp('(^'+idf_escape(table+plural)+'\\.'+idf_escape(column)+'$'
+'|^'+idf_escape(tab_col)+'\\.'
+'|^'+idf_escape(column+plural)+'\\.'+idf_escape(table)+'$'
+')|\\.'+idf_escape(tab_col)+'$','i');var candidate;for(var i=opts.length;i--;){if(opts[i].value.substr(0,1)!='`'){if(i==opts.length-2&&candidate&&!match[1]&&name=='fields[1]'){return false;}
break;}
if(match=re.exec(opts[i].value)){if(candidate){return false;}
candidate=i;}}
if(candidate){opts.selectedIndex=candidate;type.onchange();}}
function editing_add_row(button,allowed){if(allowed&&row_count>=allowed){return false;}
var match=/([0-9]+)(\.[0-9]+)?/.exec(button.name);var x=match[0]+(match[2]?added.substr(match[2].length):added)+'1';var row=button.parentNode.parentNode;var row2=row.cloneNode(true);var tags=row.getElementsByTagName('select');var tags2=row2.getElementsByTagName('select');for(var i=0;i<tags.length;i++){tags2[i].name=tags[i].name.replace(/([0-9.]+)/,x);tags2[i].selectedIndex=tags[i].selectedIndex;}
tags=row.getElementsByTagName('input');tags2=row2.getElementsByTagName('input');var ret=tags2[0];for(var i=0;i<tags.length;i++){if(tags[i].name=='auto_increment_col'){tags2[i].value=x;tags2[i].checked=false;}
tags2[i].name=tags[i].name.replace(/([0-9.]+)/,x);if(/\[(orig|field|comment)/.test(tags[i].name)){tags2[i].value='';}}
tags[0].onchange=function(){editing_name_change(tags[0]);};row.parentNode.insertBefore(row2,row.nextSibling);added+='0';row_count++;return ret;}
function editing_remove_row(button){var field=button.form[button.name.replace(/drop_col(.+)/,'fields$1[field]')];field.parentNode.removeChild(field);button.parentNode.parentNode.style.display='none';return true;}
function editing_type_change(type){var name=type.name.substr(0,type.name.length-6);var text=type.options[type.selectedIndex].text;for(var i=0;i<type.form.elements.length;i++){var el=type.form.elements[i];if(el.name==name+'[collation]'){el.className=(/(char|text|enum|set)$/.test(text)?'':'hidden');}
if(el.name==name+'[unsigned]'){el.className=(/(int|float|double|decimal)$/.test(text)?'':'hidden');}}}
function column_comments_click(checked){var trs=document.getElementById('edit-fields').getElementsByTagName('tr');for(var i=0;i<trs.length;i++){trs[i].getElementsByTagName('td')[5].className=(checked?'':'hidden');}}
function partition_by_change(el){var partition_table=/RANGE|LIST/.test(el.options[el.selectedIndex].text);el.form['partitions'].className=(partition_table||!el.selectedIndex?'hidden':'');document.getElementById('partition-table').className=(partition_table?'':'hidden');}
function partition_name_change(el){var row=el.parentNode.parentNode.cloneNode(true);row.firstChild.firstChild.value='';el.parentNode.parentNode.parentNode.appendChild(row);el.onchange=function(){};}
function foreign_add_row(field){var row=field.parentNode.parentNode.cloneNode(true);var selects=row.getElementsByTagName('select');for(var i=0;i<selects.length;i++){selects[i].name=selects[i].name.replace(/\]/,'1$&');selects[i].selectedIndex=0;}
field.parentNode.parentNode.parentNode.appendChild(row);field.onchange=function(){};}
function indexes_add_row(field){var row=field.parentNode.parentNode.cloneNode(true);var spans=row.getElementsByTagName('span');row.getElementsByTagName('td')[1].innerHTML='<span>'+spans[spans.length-1].innerHTML+'</span>';var selects=row.getElementsByTagName('select');for(var i=0;i<selects.length;i++){selects[i].name=selects[i].name.replace(/indexes\[[0-9]+/,'$&1');selects[i].selectedIndex=0;}
var input=row.getElementsByTagName('input')[0];input.name=input.name.replace(/indexes\[[0-9]+/,'$&1');input.value='';field.parentNode.parentNode.parentNode.appendChild(row);field.onchange=function(){};}
function indexes_add_column(field){var column=field.parentNode.cloneNode(true);var select=column.getElementsByTagName('select')[0];select.name=select.name.replace(/\]\[[0-9]+/,'$&1');select.selectedIndex=0;var input=column.getElementsByTagName('input')[0];input.name=input.name.replace(/\]\[[0-9]+/,'$&1');input.value='';field.parentNode.parentNode.appendChild(column);field.onchange=function(){};}
var that,x,y,em,table_pos;function schema_mousedown(el,event){that=el;x=event.clientX-el.offsetLeft;y=event.clientY-el.offsetTop;}
function schema_mousemove(ev){if(that!==undefined){ev=ev||event;var left=(ev.clientX-x)/em;var top=(ev.clientY-y)/em;var divs=that.getElementsByTagName('div');var line_set={};for(var i=0;i<divs.length;i++){if(divs[i].className=='references'){var div2=document.getElementById((divs[i].id.substr(0,4)=='refs'?'refd':'refs')+divs[i].id.substr(4));var ref=(table_pos[divs[i].title]?table_pos[divs[i].title]:[div2.parentNode.offsetTop/em,0]);var left1=-1;var is_top=true;var id=divs[i].id.replace(/^ref.(.+)-.+/,'$1');if(divs[i].parentNode!=div2.parentNode){left1=Math.min(0,ref[1]-left)-1;divs[i].style.left=left1+'em';divs[i].getElementsByTagName('div')[0].style.width=-left1+'em';var left2=Math.min(0,left-ref[1])-1;div2.style.left=left2+'em';div2.getElementsByTagName('div')[0].style.width=-left2+'em';is_top=(div2.offsetTop+ref[0]*em>divs[i].offsetTop+top*em);}
if(!line_set[id]){var line=document.getElementById(divs[i].id.replace(/^....(.+)-[0-9]+$/,'refl$1'));var shift=ev.clientY-y-that.offsetTop;line.style.left=(left+left1)+'em';if(is_top){line.style.top=(line.offsetTop+shift)/em+'em';}
if(divs[i].parentNode!=div2.parentNode){line=line.getElementsByTagName('div')[0];line.style.height=(line.offsetHeight+(is_top?-1:1)*shift)/em+'em';}
line_set[id]=true;}}}
that.style.left=left+'em';that.style.top=top+'em';}}
function schema_mouseup(ev){if(that!==undefined){ev=ev||event;table_pos[that.firstChild.firstChild.firstChild.data]=[(ev.clientY-y)/em,(ev.clientX-x)/em];that=undefined;var date=new Date();date.setMonth(date.getMonth()+1);var s='';for(var key in table_pos){s+='_'+key+':'+Math.round(table_pos[key][0]*10000)/10000+'x'+Math.round(table_pos[key][1]*10000)/10000;}
document.cookie='adminer_schema='+encodeURIComponent(s.substr(1))+'; expires='+date+'; path='+location.pathname+location.search;}}<?php
}else{header("Content-Type: image/gif");switch($_GET["file"]){case"plus.gif":echo
base64_decode("R0lGODdhEgASAKEAAO7u7gAAAJmZmQAAACwAAAAAEgASAAACIYSPqcvtD00I8cwqKb5v+q8pIAhxlRmhZYi17iPE8kzLBQA7");break;case"cross.gif":echo
base64_decode("R0lGODdhEgASAKEAAO7u7gAAAJmZmQAAACwAAAAAEgASAAACI4SPqcvtDyMKYdZGb355wy6BX3dhlOEx57FK7gtHwkzXNl0AADs=");break;case"up.gif":echo
base64_decode("R0lGODdhEgASAKEAAO7u7gAAAJmZmQAAACwAAAAAEgASAAACIISPqcvtD00IUU4K730T9J5hFTiKEXmaYcW2rgDH8hwXADs=");break;case"down.gif":echo
base64_decode("R0lGODdhEgASAKEAAO7u7gAAAJmZmQAAACwAAAAAEgASAAACIISPqcvtD00I8cwqKb5bV/5cosdMJtmcHca2lQDH8hwXADs=");break;case"arrow.gif":echo
base64_decode("R0lGODlhCAAKAIAAAICAgP///yH5BAEAAAEALAAAAAAIAAoAAAIPBIJplrGLnpQRqtOy3rsAADs=");break;}}exit;}if(!isset($_SERVER["REQUEST_URI"])){$_SERVER["REQUEST_URI"]=$_SERVER["ORIG_PATH_INFO"].(strlen($_SERVER["QUERY_STRING"])?"?$_SERVER[QUERY_STRING]":"");}if(!ini_get("session.auto_start")){session_name("adminer_sid");session_set_cookie_params(0,preg_replace('~\\?.*~','',$_SERVER["REQUEST_URI"]));session_start();}if(get_magic_quotes_gpc()){$ia=array(&$_GET,&$_POST,&$_COOKIE);while(list($f,$b)=each($ia)){foreach($b
as$qa=>$S){unset($ia[$f][$qa]);if(is_array($S)){$ia[$f][stripslashes($qa)]=$S;$ia[]=&$ia[$f][stripslashes($qa)];}else{$ia[$f][stripslashes($qa)]=($Mc?$S:stripslashes($S));}}}unset($ia);}set_magic_quotes_runtime(false);define("ME",preg_replace('~^[^?]*/([^?]*).*~','\\1',$_SERVER["REQUEST_URI"]).'?'.(strlen($_GET["server"])?'server='.urlencode($_GET["server"]).'&':'').(strlen($_GET["db"])?'db='.urlencode($_GET["db"]).'&':''));$Da=array("RESTRICT","CASCADE","SET NULL","NO ACTION");$Wa="2.0.0";function
get_dbh(){global$d;return$d;}function
idf_escape($Y){return"`".str_replace("`","``",$Y)."`";}function
idf_unescape($Y){return
str_replace("``","`",$Y);}function
bracket_escape($Y,$vd=false){static$md=array(':'=>':1',']'=>':2','['=>':3');return
strtr($Y,($vd?array_flip($md):$md));}function
h($ra){return
htmlspecialchars($ra,ENT_QUOTES);}function
optionlist($td,$ud=null,$Lc=false){$i="";foreach($td
as$qa=>$S){if(is_array($S)){$i.='<optgroup label="'.h($qa).'">';}foreach((is_array($S)?$S:array($qa=>$S))as$f=>$b){$i.='<option'.($Lc||is_string($f)?' value="'.h($f).'"':'').(($Lc||is_string($f)?(string)$f:$b)===$ud?' selected':'').'>'.h($b);}if(is_array($S)){$i.='</optgroup>';}}return$i;}function
get_vals($l,$J=0){global$d;$i=array();$e=$d->query($l);if($e){while($a=$e->fetch_row()){$i[]=$a[$J];}$e->free();}return$i;}function
unique_idf($a,$s){foreach($s
as$q){if($q["type"]=="PRIMARY"||$q["type"]=="UNIQUE"){$i=array();foreach($q["columns"]as$f){if(!isset($a[$f])){continue
2;}$i[]=urlencode("where[".bracket_escape($f)."]")."=".urlencode($a[$f]);}return$i;}}$i=array();foreach($a
as$f=>$b){if(!preg_match('~^(COUNT\\((\\*|(DISTINCT )?`(?:[^`]+|``)+`)\\)|(AVG|GROUP_CONCAT|MAX|MIN|SUM)\\(`(?:[^`]+|``)+`\\))$~',$f)){$i[]=(isset($b)?urlencode("where[".bracket_escape($f)."]")."=".urlencode($b):"null%5B%5D=".urlencode($f));}}return$i;}function
where($w){global$d;$i=array();foreach((array)$w["where"]as$f=>$b){$f=bracket_escape($f,"back");$i[]=(preg_match('~^[A-Z0-9_]+\\(`(?:[^`]+|``)+`\\)$~',$f)?$f:idf_escape($f))." = BINARY ".$d->quote($b);}foreach((array)$w["null"]as$f){$f=bracket_escape($f,"back");$i[]=(preg_match('~^[A-Z0-9_]+\\(`(?:[^`]+|``)+`\\)$~',$f)?$f:idf_escape($f))." IS NULL";}return
implode(" AND ",$i);}function
where_check($b){parse_str($b,$xd);return
where($xd);}function
where_link($g,$J,$n){return"&where%5B$g%5D%5Bcol%5D=".urlencode($J)."&where%5B$g%5D%5Bop%5D=%3D&where%5B$g%5D%5Bval%5D=".urlencode($n);}function
redirect($_,$ea=null){if(isset($ea)){$_SESSION["messages"][]=$ea;}if(strlen(SID)){$_.=(strpos($_,"?")===false?"?":"&").SID;}header("Location: ".(strlen($_)?$_:"."));exit;}function
query_redirect($l,$_,$ea,$wd=true,$yd=true,$cb=false){global$d,$m,$p;$Pb="";if($l){$Pb=$p->messageQuery($l);}if($yd){$cb=!$d->query($l);}if($cb){$m=h($d->error).$Pb;return
false;}if($wd){redirect($_,$ea.$Pb);}return
true;}function
queries($l=null){global$d;static$Jc=array();if(!isset($l)){return
implode(";\n",$Jc);}$Jc[]=$l;return$d->query($l);}function
remove_from_uri($O=""){$O="($O|".session_name().")";return
preg_replace("~\\?$O=[^&]*&~",'?',preg_replace("~\\?$O=[^&]*\$|&$O=[^&]*~",'',$_SERVER["REQUEST_URI"]));}function
pagination($eb){return" ".($eb==$_GET["page"]?$eb+1:'<a href="'.h(remove_from_uri("page").($eb?"&page=$eb":"")).'">'.($eb+1)."</a>");}function
get_file($f){if(isset($_POST["files"][$f])){$C=strlen($_POST["files"][$f]);return($C&&$C<4?intval($_POST["files"][$f]):base64_decode($_POST["files"][$f]));}return(!$_FILES[$f]||$_FILES[$f]["error"]?$_FILES[$f]["error"]:file_get_contents($_FILES[$f]["tmp_name"]));}function
upload_error($m){$Kc=($m==UPLOAD_ERR_INI_SIZE?ini_get("upload_max_filesize"):null);return
lang(0).($Kc?" ".lang(1,$Kc):"");}function
odd($U=' class="odd"'){static$g=0;if(!$U){$g=-1;}return($g++%
2?$U:'');}function
select($e,$oa=null){if(!$e->num_rows){echo"<p class='message'>".lang(2)."\n";}else{echo"<table cellspacing='0' class='nowrap'>\n";$ab=array();$s=array();$r=array();$Qc=array();$ma=array();odd('');for($g=0;$a=$e->fetch_row();$g++){if(!$g){echo"<thead><tr>";for($F=0;$F<count($a);$F++){$c=$e->fetch_field();if(strlen($c->orgtable)){if(!isset($s[$c->orgtable])){$s[$c->orgtable]=array();foreach(indexes($c->orgtable,$oa)as$q){if($q["type"]=="PRIMARY"){$s[$c->orgtable]=array_flip($q["columns"]);break;}}$r[$c->orgtable]=$s[$c->orgtable];}if(isset($r[$c->orgtable][$c->orgname])){unset($r[$c->orgtable][$c->orgname]);$s[$c->orgtable][$c->orgname]=$F;$ab[$F]=$c->orgtable;}}if($c->charsetnr==63){$Qc[$F]=true;}$ma[$F]=$c->type;echo"<th>".h($c->name);}echo"</thead>\n";}echo"<tr".odd().">";foreach($a
as$f=>$b){if(!isset($b)){$b="<i>NULL</i>";}else{if($Qc[$f]&&!is_utf8($b)){$b="<i>".lang(3,strlen($b))."</i>";}elseif(!strlen(trim($b," \t"))){$b="&nbsp;";}else{$b=nl2br(h($b));if($ma[$f]==254){$b="<code>$b</code>";}}if(isset($ab[$f])&&!$r[$ab[$f]]){$v="edit=".urlencode($ab[$f]);foreach($s[$ab[$f]]as$pb=>$F){$v.="&where".urlencode("[".bracket_escape($pb)."]")."=".urlencode($a[$F]);}$b="<a href='".h(ME.$v)."'>$b</a>";}}echo"<td>$b";}}echo"</table>\n";}$e->free();}function
is_utf8($b){return(preg_match('~~u',$b)&&!preg_match('~[\\0-\\x8\\xB\\xC\\xE-\\x1F]~',$b));}function
shorten_utf8($ra,$C=80,$_d=""){preg_match("~^((?:.|\n){0,$C})(.|\n)?~u",$ra,$j);return
h($j[1]).$_d.($j[2]?"<em>...</em>":"");}function
friendly_url($b){return
preg_replace('~[^a-z0-9_]~i','-',$b);}function
hidden_fields($ia,$Ga=array()){while(list($f,$b)=each($ia)){if(is_array($b)){foreach($b
as$qa=>$S){$ia[$f."[$qa]"]=$S;}}elseif(!in_array($f,$Ga)){echo'<input type="hidden" name="'.h($f).'" value="'.h($b).'">';}}}function
column_foreign_keys($o){$i=array();foreach(foreign_keys($o)as$D){foreach($D["source"]as$b){$i[$b][]=$D;}}return$i;}function
input($c,$n,$x){global$ma,$p;$h=h(bracket_escape($c["field"]));echo"<td class='function'>";if($c["type"]=="enum"){echo"&nbsp;<td>".(isset($_GET["select"])?" <label><input type='radio' name='fields[$h]' value='-1' checked><em>".lang(4)."</em></label>":"");if($c["null"]||isset($_GET["default"])){echo" <label><input type='radio' name='fields[$h]' value=''".(($c["null"]?isset($n):strlen($n))||isset($_GET["select"])?'':' checked').'>'.($c["null"]?'<em>NULL</em>':'').'</label>';}if(!isset($_GET["default"])){echo"<input type='radio' name='fields[$h]' value='0'".($n===0?' checked':'').'>';}preg_match_all("~'((?:[^']+|'')*)'~",$c["length"],$G);foreach($G[1]as$g=>$b){$b=stripcslashes(str_replace("''","'",$b));$ca=(is_int($n)?$n==$g+1:$n===$b);echo" <label><input type='radio' name='fields[$h]' value='".(isset($_GET["default"])?(strlen($b)?h($b):" "):$g+1)."'".($ca?' checked':'').'>'.h($b).'</label>';}}else{$Fa=(isset($_GET["select"])?array("orig"=>lang(4)):array())+$p->editFunctions($c);$Vb=array_search("",$Fa)+(isset($_GET["select"])?1:0);$hb=($Vb?" onchange=\"var f = this.form['function[".addcslashes($h,"\r\n'\\")."]']; if ($Vb > f.selectedIndex) f.selectedIndex = $Vb;\"":"");echo(count($Fa)>1?"<select name='function[$h]'>".optionlist($Fa,$x)."</select>":(strlen($Fa[0])?h($Fa[0]):"&nbsp;")).'<td>';$Rc=$p->editInput($_GET["edit"],$c," name='fields[$h]'$hb",$n);if(strlen($Rc)){echo$Rc;}elseif($c["type"]=="set"){preg_match_all("~'((?:[^']+|'')*)'~",$c["length"],$G);foreach($G[1]as$g=>$b){$b=stripcslashes(str_replace("''","'",$b));$ca=(is_int($n)?($n>>$g)&1:in_array($b,explode(",",$n),true));echo" <label><input type='checkbox' name='fields[$h][$g]' value='".(isset($_GET["default"])?h($b):1<<$g)."'".($ca?' checked':'')."$hb>".h($b).'</label>';}}elseif(strpos($c["type"],"text")!==false){echo"<textarea name='fields[$h]' cols='50' rows='12'$hb>".h($n).'</textarea>';}elseif(ereg('binary|blob',$c["type"])){echo(ini_get("file_uploads")?"<input type='file' name='$h'$hb>":lang(5));}else{$Yc=(!ereg('int',$c["type"])&&preg_match('~^([0-9]+)(,([0-9]+))?$~',$c["length"],$j)?($j[1]+($j[3]?1:0)+($j[2]&&!$c["unsigned"]?1:0)):($ma[$c["type"]]?$ma[$c["type"]]+($c["unsigned"]?0:1):0));echo"<input name='fields[$h]' value='".h($n)."'".($Yc?" maxlength='$Yc'":"")."$hb>";}}}function
process_input($c){global$d,$p;$Y=bracket_escape($c["field"]);$x=$_POST["function"][$Y];$n=$_POST["fields"][$Y];if($c["type"]=="enum"?$n==-1:$x=="orig"){return
false;}elseif($c["type"]=="enum"||$c["auto_increment"]?!strlen($n):$x=="NULL"){return"NULL";}elseif($c["type"]=="enum"){return(isset($_GET["default"])?$d->quote($n):intval($n));}elseif($c["type"]=="set"){return(isset($_GET["default"])?$d->quote(implode(",",(array)$n)):array_sum((array)$n));}elseif(ereg('binary|blob',$c["type"])){$Ea=get_file($Y);if(!is_string($Ea)){return
false;}return"_binary".$d->quote($Ea);}else{return$p->processInput($c,$n,$x);}}function
dump_csv($a){foreach($a
as$f=>$b){if(preg_match("~[\"\n,]~",$b)||(isset($b)&&!strlen($b))){$a[$f]='"'.str_replace('"','""',$b).'"';}}echo
implode(",",$a)."\n";}function
is_email($zd){$Vc='[-a-z0-9!#$%&\'*+/=?^_`{|}~]';$Tc='[a-z0-9]([-a-z0-9]{0,61}[a-z0-9])';return
eregi("^$Vc+(\\.$Vc+)*@($Tc?\\.)+$Tc\$",$zd);}function
email_header($sd){return"=?UTF-8?B?".base64_encode($sd)."?=";}$Ta=array('en'=>'English','cs'=>'Čeština','sk'=>'Slovenčina','nl'=>'Nederlands','es'=>'Español','de'=>'Deutsch','zh'=>'简体中文','fr'=>'Français','it'=>'Italiano','et'=>'Eesti','ru'=>'Русский язык',);function
lang($Y,$Rb=null){global$Z,$X;$Sa=$X[$Y];if(is_array($Sa)&&$Sa){$fb=($Rb==1?0:((!$Rb||$Rb>=5)&&ereg('cs|sk|ru',$Z)?2:1));$Sa=$Sa[$fb];}$Uc=func_get_args();array_shift($Uc);return
vsprintf((isset($Sa)?$Sa:$Y),$Uc);}function
switch_lang(){global$Z,$Ta;echo"<form action=''>\n<div id='lang'>";hidden_fields($_GET,array('lang'));echo
lang(6).": <select name='lang' onchange='this.form.submit();'>";foreach($Ta
as$Pc=>$b){echo"<option value='$Pc'".($Z==$Pc?" selected":"").">$b";}echo"</select>\n<noscript><div style='display: inline;'><input type='submit' value='".lang(7)."'></div></noscript>\n</div>\n</form>\n";}if(isset($_GET["lang"])){$_COOKIE["adminer_lang"]=$_GET["lang"];$_SESSION["lang"]=$_GET["lang"];}$Z="en";if(isset($Ta[$_COOKIE["adminer_lang"]])){setcookie("adminer_lang",$_COOKIE["adminer_lang"],gmmktime(0,0,0,gmdate("n")+1),preg_replace('~\\?.*~','',$_SERVER["REQUEST_URI"]));$Z=$_COOKIE["adminer_lang"];}elseif(isset($Ta[$_SESSION["lang"]])){$Z=$_SESSION["lang"];}else{$nb=array();preg_match_all('~([-a-z]+)(;q=([0-9.]+))?~',str_replace("_","-",strtolower($_SERVER["HTTP_ACCEPT_LANGUAGE"])),$G,PREG_SET_ORDER);foreach($G
as$j){$nb[$j[1]]=(isset($j[3])?$j[3]:1);}arsort($nb);foreach($nb
as$f=>$Vd){if(isset($Ta[$f])){$Z=$f;break;}$f=preg_replace('~-.*~','',$f);if(!isset($nb[$f])&&isset($Ta[$f])){$Z=$f;break;}}}switch($Z){case"cs":$X=array('Nepodařilo se nahrát soubor.','Maximální povolená velikost souboru je %sB.','Žádné řádky.',array('%d bajt','%d bajty','%d bajtů'),'původní','Nahrávání souborů není povoleno.','Jazyk','Vybrat','Adminer','Server','Uživatel','Heslo','Struktura tabulky','Upravit','Vypsat','Funkce','Agregace','Vyhledat','BOOL','(kdekoliv)','Seřadit','sestupně','Limit','Délka textů','Akce','SQL příkaz','Export','Odhlásit','databáze','Žádné tabulky.','vypsat','Vytvořit novou tabulku','Žádná MySQL extenze','Není dostupná žádná z podporovaných PHP extenzí (%s).','Čísla','Datum a čas','Řetězce','Binární','Seznamy','Neplatný token CSRF. Odešlete formulář znovu.','Odhlášení proběhlo v pořádku.','Přihlásit se','Neplatné přihlašovací údaje.','Session proměnné musí být povolené.','Session vypršela, přihlašte se prosím znovu.','Databáze','Nesprávná databáze.','Vybrat databázi','Vytvořit novou databázi','Oprávnění','Seznam procesů','Proměnné','Verze MySQL: %s přes PHP extenzi %s','Přihlášen jako: %s','Cizí klíče','porovnávání','IN-OUT','Název sloupce','Název parametru','Typ','Délka','Volby','NULL','Auto Increment','Komentář','Přidat další','Odebrat','Přesunout nahoru','Přesunout dolů','otevřít','uložit','SQL','CSV','Opravdu?','Příliš velká POST data. Zmenšete data nebo zvyšte hodnotu konfigurační direktivy "post_max_size".','Pohled','Tabulka','Pozměnit pohled','Pozměnit tabulku','Výchozí hodnoty','Vypsat tabulku','Nová položka','Indexy','Pozměnit indexy','Změnit','Přidat cizí klíč','Triggery','Přidat trigger','Schéma databáze','Export','Výstup','Formát','Tabulky','Data','~ %s','Vytvořit uživatele','upravit','Chyba v dotazu',array('%d řádek','%d řádky','%d řádků'),'%.3f s',array('Příkaz proběhl v pořádku, byl změněn %d záznam.','Příkaz proběhl v pořádku, byly změněny %d záznamy.','Příkaz proběhl v pořádku, bylo změněno %d záznamů.'),'Žádné příkazy k vykonání.','Provést','Zastavit při chybě','Nahrání souboru','Spustit soubor','Historie','Vyčistit','Výchozí hodnoty byly nastaveny.','Položka byla aktualizována.','Položka byla vložena.','Vložit','Při změně aktuální čas','Uložit','Uložit a pokračovat v editaci','Uložit a vložit další','Tabulka byla změněna.','Tabulka byla vytvořena.','Vytvořit tabulku','Byl překročen maximální povolený počet polí. Zvyšte prosím %s a %s.','Název tabulky','úložiště','Zobrazit komentáře sloupců','Rozdělit podle','Oddíly','Název oddílu','Hodnoty','Indexy byly změněny.','Typ indexu','Sloupec (délka)','Databáze byla odstraněna.','Databáze byla vytvořena.','Databáze byla přejmenována.','Databáze byla změněna.','Pozměnit databázi','Vytvořit databázi','Odstranit','Zavolat',array('Procedura byla zavolána, byl změněn %d záznam.','Procedura byla zavolána, byly změněny %d záznamy.','Procedura byla zavolána, bylo změněno %d záznamů.'),'Cizí klíč byl odstraněn.','Cizí klíč byl změněn.','Cizí klíč byl vytvořen.','Zdrojové a cílové sloupce musí mít stejný datový typ, nad cílovými sloupci musí být definován index a odkazovaná data musí existovat.','Cizí klíč','Cílová tabulka','Změnit','Zdroj','Cíl','Při smazání','Při změně','Přidat sloupec','Pohled byl odstraněn.','Pohled byl změněn.','Pohled byl vytvořen.','Vytvořit pohled','Název','Událost byla odstraněna.','Událost byla změněna.','Událost byla vytvořena.','Pozměnit událost','Vytvořit událost','Začátek','Konec','Každých','Stav','Po dokončení zachovat','Procedura byla odstraněna.','Procedura byla změněna.','Procedura byla vytvořena.','Změnit funkci','Změnit proceduru','Vytvořit funkci','Vytvořit proceduru','Návratový typ','Trigger byl odstraněn.','Trigger byl změněn.','Trigger byl vytvořen.','Změnit trigger','Vytvořit trigger','Čas','Událost','Uživatel byl odstraněn.','Uživatel byl změněn.','Uživatel byl vytvořen.','Zahašované','Sloupec','Procedura','Povolit','Zakázat',array('Byl ukončen %d proces.','Byly ukončeny %d procesy.','Bylo ukončeno %d procesů.'),'Ukončit',array('Byl ovlivněn %d záznam.','Byly ovlivněny %d záznamy.','Bylo ovlivněno %d záznamů.'),array('Byl importován %d záznam.','Byly importovány %d záznamy.','Bylo importováno %d záznamů.'),'Nepodařilo se vypsat tabulku','Vztahy','Stránka','celý výsledek','Klonovat','Smazat','Import CSV','Import','Tabulky byly vyprázdněny.','Tabulky byly přesunuty','Tabulky byly odstraněny.','Tabulky a pohledy','Úložiště','Porovnávání','Velikost dat','Velikost indexů','Volné místo','Řádků',' ','Analyzovat','Optimalizovat','Zkontrolovat','Opravit','Vyprázdnit','Přesunout do jiné databáze','Přesunout','Procedury a funkce','Události','Plán','V daný čas','Editor');break;case"de":$X=array('Hochladen von Datei fehlgeschlagen.','Maximal erlaubte Dateigrösse ist %sB.','Keine Daten.',array('%d Byte','%d Bytes'),'Original','Importieren von Dateien abgeschaltet.','Sprache','Benutzung','Adminer','Server','Benutzer','Passwort','Tabellenstruktur','Ändern','Daten zeigen von','Funktionen','Agregationen','Suchen','BOOL','(beliebig)','Ordnen','absteigend','Begrenzung','Textlänge','Aktion','SQL-Query','Export','Abmelden','Datenbank','Keine Tabellen.','zeigen','Neue Tabelle','Keine MySQL-Erweiterungen installiert','Keine der unterstützten PHP-Erweiterungen (%s) ist vorhanden.','Zahlen','Datum oder Zeit','Zeichenketten','Binär','Listen','CSRF Token ungültig. Bitte die Formulardaten erneut abschicken.','Abmeldung erfolgreich.','Login','Ungültige Anmelde-Informationen.','Sitzungen müssen aktiviert sein.','Sitzungsdauer abgelaufen, bitte erneut anmelden.','Datenbank','Datenbank ungültig.','Datenbank auswählen','Neue Datenbank','Rechte','Prozessliste','Variablen','Version MySQL: %s, mit PHP-Erweiterung %s','Angemeldet als: %s','Fremdschlüssel','Kollation','IN-OUT','Spaltenname','Name des Parameters','Typ','Länge','Optionen','NULL','Auto-Inkrement','Kommentar','Hinzufügen','Entfernen','Nach oben','Nach unten','anzeigen','Datei','SQL','CSV','Sind Sie sicher ?','POST data zu gross. Reduzieren Sie die Grösse oder vergrössern Sie den Wert "post_max_size" in der Konfiguration.','View','Tabelle','View ändern','Tabelle ändern','Vorgabewerte festlegen','Tabelle auswählen','Neuer Datensatz','Indizes','Indizes ändern','Ändern','Fremdschlüssel hinzufügen','Trigger','Trigger hinzufügen','Datenbankschema','Exportieren','Ergebnis','Format','Tabellen','Daten','~ %s','Neuer Benutzer','ändern','Fehler in der SQL-Abfrage',array('%d Datensatz','%d Datensätze'),'%.3f s',array('Abfrage ausgeführt, %d Datensatz betroffen.','Abfrage ausgeführt, %d Datensätze betroffen.'),'Kein Kommando vorhanden.','Ausführen','Bei Fehler anhaltan','Datei importieren','Datei ausführen','History','Entleeren','Standard Vorgabewerte sind erstellt worden.','Datensatz geändert.','Datensatz hinzugefügt.','Hinzufügen','ON UPDATE CURRENT_TIMESTAMP','Speichern','Speichern und weiter bearbeiten','Speichern und nächsten hinzufügen','Tabelle geändert.','Tabelle erstellt.','Neue Tabelle erstellen','Die maximal erlaubte Anzahl der Felder ist überschritten. Bitte %s und %s erhöhen.','Name der Tabelle','Motor','Spaltenkommentare zeigen','Partitionieren um','Partitionen','Name der Partition','Werte','Indizes geändert.','Index-Typ','Spalte (Länge)','Datenbank entfernt.','Datenbank erstellt.','Datenbank umbenannt.','Datenbank geändert.','Datenbank ändern','Neue Datenbank','Entfernen','Aufrufen',array('Kommando SQL ausgeführt, %d Datensatz betroffen.','Kommando SQL ausgeführt, %d Datensätze betroffen.'),'Fremdschlüssel entfernt.','Fremdschlüssel geändert.','Fremdschlüssel erstellt.','Spalten des Ursprungs und des Zieles müssen vom gleichen Datentyp sein, es muss unter den Zielspalten ein Index existieren und die referenzierten Daten müssen existieren.','Fremdschlüssel','Zieltabelle','Ändern','Ursprung','Ziel','ON DELETE','ON UPDATE','Spalte hinzufügen','View entfernt.','View geändert.','View erstellt.','Neue View erstellen','Name','Ereignis entfernt.','Ereignis geändert.','Ereignis erstellt.','Ereignis ändern','Ereignis erstellen','Start','Ende','Jede','Status','Nach der Ausführung erhalten','Prozedur entfernt.','Prozedur geändert.','Prozedur erstellt.','Funktion ändern','Prozedur ändern','Neue Funktion','Neue Prozedur','Typ des Rückgabewertes','Trigger entfernt.','Trigger geändert.','Trigger erstellt.','Trigger ändern','Trigger hinzufügen','Zeitpunkt','Ereignis','Benutzer entfernt.','Benutzer geändert.','Benutzer erstellt.','Hashed','Spalte','Rutine','Erlauben','Verbieten',array('%d Prozess gestoppt.','%d Prozesse gestoppt.'),'Anhalten',array('%d Artikel betroffen.','%d Artikel betroffen.'),array('%d Datensatz importiert.','%d Datensätze wurden importiert.'),'Auswahl der Tabelle fehlgeschlagen','Relationen','Seite','Gesamtergebnis','Klonen','Entfernen','Importiere CSV','Importieren','Tabellen sind entleert worden (truncate).','Tabellen verschoben.','Tabellen wurden entfernt (drop).','Tabellen und Views','Motor','Collation','Datengrösse','Indexgrösse','Freier Bereich','Datensätze',' ','Analysieren','Optimisieren','Prüfen','Reparieren','Entleeren (truncate)','In andere Datenbank verschieben','Verschieben','Prozeduren','Ereignisse','Zeitplan','Zur angegebenen Zeit',array('%d e-mail abgeschickt.','%d e-mails abgeschickt.'));break;case"en":$X=array('Unable to upload a file.','Maximum allowed file size is %sB.','No rows.',array('%d byte','%d bytes'),'original','File uploads are disabled.','Language','Use','Adminer','Server','Username','Password','Table structure','Edit','Select','Functions','Aggregation','Search','BOOL','(anywhere)','Sort','descending','Limit','Text length','Action','SQL command','Dump','Logout','database','No tables.','select','Create new table','No MySQL extension','None of the supported PHP extensions (%s) are available.','Numbers','Date and time','Strings','Binary','Lists','Invalid CSRF token. Send the form again.','Logout successful.','Login','Invalid credentials.','Session support must be enabled.','Session expired, please login again.','Database','Invalid database.','Select database','Create new database','Privileges','Process list','Variables','MySQL version: %s through PHP extension %s','Logged as: %s','Foreign keys','collation','IN-OUT','Column name','Parameter name','Type','Length','Options','NULL','Auto Increment','Comment','Add next','Remove','Move up','Move down','open','save','SQL','CSV','Are you sure?','Too big POST data. Reduce the data or increase the "post_max_size" configuration directive.','View','Table','Alter view','Alter table','Default values','Select table','New item','Indexes','Alter indexes','Alter','Add foreign key','Triggers','Add trigger','Database schema','Export','Output','Format','Tables','Data','~ %s','Create user','edit','Error in query',array('%d row','%d rows'),'%.3f s',array('Query executed OK, %d row affected.','Query executed OK, %d rows affected.'),'No commands to execute.','Execute','Stop on error','File upload','Run file','History','Clear','Default values have been set.','Item has been updated.','Item has been inserted.','Insert','ON UPDATE CURRENT_TIMESTAMP','Save','Save and continue edit','Save and insert next','Table has been altered.','Table has been created.','Create table','Maximum number of allowed fields exceeded. Please increase %s and %s.','Table name','engine','Show column comments','Partition by','Partitions','Partition name','Values','Indexes have been altered.','Index Type','Column (length)','Database has been dropped.','Database has been created.','Database has been renamed.','Database has been altered.','Alter database','Create database','Drop','Call',array('Routine has been called, %d row affected.','Routine has been called, %d rows affected.'),'Foreign key has been dropped.','Foreign key has been altered.','Foreign key has been created.','Source and target columns must have the same data type, there must be an index on the target columns and referenced data must exist.','Foreign key','Target table','Change','Source','Target','ON DELETE','ON UPDATE','Add column','View has been dropped.','View has been altered.','View has been created.','Create view','Name','Event has been dropped.','Event has been altered.','Event has been created.','Alter event','Create event','Start','End','Every','Status','On completion preserve','Routine has been dropped.','Routine has been altered.','Routine has been created.','Alter function','Alter procedure','Create function','Create procedure','Return type','Trigger has been dropped.','Trigger has been altered.','Trigger has been created.','Alter trigger','Create trigger','Time','Event','User has been dropped.','User has been altered.','User has been created.','Hashed','Column','Routine','Grant','Revoke',array('%d process has been killed.','%d processes have been killed.'),'Kill',array('%d item has been affected.','%d items have been affected.'),array('%d row has been imported.','%d rows have been imported.'),'Unable to select the table','Relations','Page','whole result','Clone','Delete','CSV Import','Import','Tables have been truncated.','Tables have been moved.','Tables have been dropped.','Tables and views','Engine','Collation','Data Length','Index Length','Data Free','Rows',',','Analyze','Optimize','Check','Repair','Truncate','Move to other database','Move','Routines','Events','Schedule','At given time',array('%d e-mail has been sent.','%d e-mails have been sent.'));break;case"es":$X=array('No posible importar archivo.','Tamaño máximo de archivo es %sB.','No existen registros.',array('%d byte','%d bytes'),'original','Importación de archivos deshablilitado.','Idioma','Usar','Adminer','Servidor','Usuario','Contraseña','Estructura de la Tabla','Modificar','Mostrar Registros','Funciones','Agregaciones','Buscar','BOOL','(donde sea)','Ordenar','descendiente','Limit','Longitud de texto','Acción','Comando SQL','Export','Logout','base de datos','No existen tablas.','registros','Nueva tabla','No hay extension MySQL','Ninguna de las extensiones PHP soportadas (%s) está disponible.','Números','Fecha y hora','Cadena','Binario','Listas','Token CSRF inválido. Vuelva a enviar los datos del formulario.','Salida exitosa.','Login','Autenticación fallada.','Deben estar habilitadas las sesiones.','Sesión expirada, favor loguéese de nuevo.','Base de datos','Base de datos inválida.','Seleccionar Base de datos','Nueva Base de datos','Privilegios','Lista de procesos','Variables','Versión MySQL: %s a través de extensión PHP %s','Logeado como: %s','Claves foráneas','colación','IN-OUT','Nombre de columna','Nombre de Parametro','Tipo','Longitud','Opciones','NULL','Auto increment','Comentario','Agregar','Eliminar','Mover arriba','Mover abajo','mostrar','archivo','SQL','CSV','Está seguro?','POST data demasiado grande. Reduzca el tamaño o aumente la directiva de configuración "post_max_size".','Vistas','Tabla','Modificar vista','Modificar tabla','Valores predeterminados','Seleccionar tabla','Nuevo Registro','Indices','Modificar indices','Modificar','Agregar clave foránea','Triggers','Agregar trigger','Esquema de base de datos','Exportar','Salida','Formato','Tablas','Datos','~ %s','Crear Usuario','modificar','Error en consulta',array('%d registro','%d registros'),'%.3f s',array('Consulta ejecutada, %d registro afectado.','Consulta ejecutada, %d registros afectados.'),'No hay comando para ejecutar.','Ejecutar','Parar en caso de error','Importar archivo','Ejecutar Archivo','History','Vaciar','Valores predeterminados establecidos.','Registro modificado.','Registro insertado.','Agregar','ON UPDATE CURRENT_TIMESTAMP','Guardar','Guardar y continuar editando','Guardar e insertar otro','Tabla modificada.','Tabla creada.','Crear tabla','Cantida máxima de campos permitidos excedidos. Favor aumente %s y %s.','Nombre de tabla','motor','Mostrar comentario de columnas','Particionar por','Particiones','Nombre de Partición','Valores','Indices modificados.','Tipo de índice','Columna (longitud)','Base de datos eliminada.','Base de datos creada.','Base de datos renombrada.','Base de datos modificada.','Modificar Base de datos','Crear Base de datos','Eliminar','Llamar',array('Consulta ejecutada, %d registro afectado.','Consulta ejecutada, %d registros afectados.'),'Clave foránea eliminada.','Clave foránea modificada.','Clave foránea creada.','Las columnas de origen y destino deben ser del mismo tipo, debe existir un índice entre las columnas del destino y el registro referenciado debe existir.','Clave foránea','Tabla destino','Modificar','Origen','Destino','ON DELETE','ON UPDATE','Agregar columna','Vista eliminada.','Vista modificada.','Vista creada.','Cear vista','Nombre','Evento eliminado.','Evento modificado.','Evento creado.','Modificar Evento','Crear Evento','Inicio','Fin','Cada','Estado','Al completar preservar','Procedimiento eliminado.','Procedimiento modificado.','Procedimiento creado.','Modificar Función','Modificar procedimiento','Crear función','Crear procedimiento','Tipo de valor retornado','Trigger eliminado.','Trigger modificado.','Trigger creado.','Modificar Trigger','Agregar Trigger','Tiempo','Evento','Usuario eliminado.','Usuario modificado.','Usuario creado.','Hash','Columna','Rutina','Conceder','Impedir',array('%d proceso detenido.','%d procesos detenidos.'),'Detener',array('%d ítem afectado.','%d itemes afectados.'),array('%d registro importado.','%d registros importados.'),'No posible seleccionar la tabla','Relaciones','Página','resultado completo','Clonar','Eliminar','Importar CSV','Importar','Tablas vaciadas (truncate).','Se movieron las tablas.','Tablas eliminadas.','Tablas y vistas','Motor','Colación','Longitud de datos','Longitud de índice','Espacio libre','Registros',' ','Analizar','Optimizar','Comprobar','Reparar','Vaciar','Mover a otra base de datos','Mover','Procedimientos','Eventos','Agendamiento','A hora determinada',array('%d email enviado.','%d emails enviados.'));break;case"et":$X=array('Faili üleslaadimine pole võimalik.','Maksimaalne failisuurus %sB.','Sissekanded puuduvad.',array('%d bait','%d baiti'),'originaal','Failide üleslaadimine on keelatud.','Keel','Kasuta','Andmebaasi haldaja','Server','Kasutajanimi','Parool','Tabeli struktuur','Muuda','Kuva','Funktsioonid','Liitmine','Otsi','Jah/Ei (BOOL)','(vahet pole)','Sorteeri','kahanevalt','Piira','Teksti pikkus','Tegevus','SQL-Päring','Ekspordi','Logi välja','andmebaas','Tabeleid ei leitud.','kuva','Loo uus tabel','Ei leitud MySQL laiendust','Serveris pole ühtegi toetatud PHP laiendustest (%s).','Numbrilised','Kuupäev ja kellaaeg','Tekstid','Binaar','Listid','Sobimatu CSRF, palun postitage vorm uuesti.','Väljalogimine õnnestus.','Logi sisse','Ebakorrektsed andmed.','Sessioonid peavad olema lubatud.','Sessioon on aegunud, palun logige uuesti sisse.','Andmebaas','Tundmatu andmebaas.','Vali andmebaas','Loo uus andmebaas','Õigused','Protsesside nimekiri','Muutujad','MySQL versioon: %s, kasutatud PHP moodul: %s','Sisse logitud: %s','Võõrvõtmed (foreign key)','tähetabel','IN-OUT','Veeru nimi','Parameetri nimi','Tüüp','Pikkus','Valikud','NULL','Automaatselt suurenev','Kommentaar','Lisa järgmine','Eemalda','Liiguta ülespoole','Liiguta allapoole','näita brauseris','salvesta failina','SQL','CSV','Kas oled kindel?','POST-andmete maht on liialt suur. Palun vähendage andmeid või suurendage "post_max_size" php-seadet.','Vaata','Tabel','Muuda vaadet (VIEW)','Muuda tabeli struktuuri','Vaikimisi väärtused','Vali tabel','Lisa kirje','Indeksid','Muuda indekseid','Muuda','Lisa võõrvõti','Päästikud (trigger)','Lisa päästik (TRIGGER)','Andmebaasi skeem','Ekspordi','Väljund','Formaat','Tabelid','Andmed','~ %s','Loo uus kasutaja','muuda','Päringus esines viga',array('%d rida','%d rida'),'%.3f s',array('Päring õnnestus, mõjutatatud ridu: %d.','Päring õnnestus, mõjutatatud ridu: %d.'),'Käsk puudub.','Käivita','Peatuda vea esinemisel','Faili üleslaadimine','Käivita fail','Ajalugu','Puhasta','Vaimimisi väärtused on edukalt määratud.','Uuendamine õnnestus.','Lisamine õnnestus.','Sisesta','ON UPDATE CURRENT_TIMESTAMP','Salvesta','Salvesta ja jätka muutmist','Salvesta ja lisa järgmine','Tabeli andmed on edukalt muudetud.','Tabel on edukalt loodud.','Loo uus tabel','Maksimaalne väljade arv ületatud. Palun suurendage %s ja %s.','Tabeli nimi','andmebaasimootor','Kuva veeru kommentaarid','Partitsiooni','Partitsioonid','Partitsiooni nimi','Väärtused','Indeksite andmed on edukalt uuendatud.','Indeksi tüüp','Veerg (pikkus)','Andmebaas on edukalt kustutatud.','Andmebaas on edukalt loodud.','Andmebaas on edukalt ümber nimetatud.','Andmebaasi struktuuri uuendamine õnnestus.','Muuda andmebaasi','Loo uus andmebaas','Kustuta','Käivita',array('Protseduur täideti edukalt, mõjutatud ridu: %d.','Protseduur täideti edukalt, mõjutatud ridu: %d.'),'Võõrvõti on edukalt kustutatud.','Võõrvõtme andmed on edukalt muudetud.','Võõrvõri on edukalt loodud.','Lähte- ja sihtveerud peavad eksisteerima ja omama sama andmetüüpi, sihtveergudel peab olema määratud indeks ning viidatud andmed peavad eksisteerima.','Võõrvõti','Siht-tabel','Muuda','Allikas','Sihtkoht','ON DELETE','ON UPDATE','Lisa veerg','Vaade (VIEW) on edukalt kustutatud.','Vaade (VIEW) on edukalt muudetud.','Vaade (VIEW) on edukalt loodud.','Loo uus vaade (VIEW)','Nimi','Sündmus on edukalt kustutatud.','Sündmuse andmed on edukalt uuendatud.','Sündmus on edukalt loodud.','Muuda sündmuse andmeid','Loo uus sündmus (EVENT)','Alusta','Lõpeta','Iga','Staatus','Lõpetamisel jäta sündmus alles','Protseduur on edukalt kustutatud.','Protseduuri andmed on edukalt muudetud.','Protseduur on edukalt loodud.','Muuda funktsiooni','Muuda protseduuri','Loo uus funktsioon','Loo uus protseduur','Tagastustüüp','Päästik on edukalt kustutatud.','Päästiku andmed on edukalt uuendatud.','Uus päästik on edukalt loodud.','Muuda päästiku andmeid','Loo uus päästik (TRIGGER)','Aeg','Sündmus','Kasutaja on edukalt kustutatud.','Kasutaja andmed on edukalt muudetud.','Kasutaja on edukalt lisatud.','Häshitud (Hashed)','Veerg','Protseduur','Anna','Eemalda',array('Protsess on edukalt peatatud (%d).','Valitud protsessid (%d) on edukalt peatatud.'),'Peata',array('Mõjutatud kirjeid: %d.','Mõjutatud kirjeid: %d.'),array('Imporditi %d rida.','Imporditi %d rida.'),'Tabeli valimine ebaõnnestus','Seosed','Lehekülg','Täielikud tulemused','Kloon','Kustuta','Impordi CSV','Impordi','Validud tabelid on edukalt tühjendatud.','Valitud tabelid on edukalt liigutatud.','Valitud tabelid on edukalt kustutatud.','Tabelid ja vaated','Implementatsioon','Tähetabel','Andmete pikkus','Indeksi pikkus','Vaba ruumi','Ridu',',','Analüüsi','Optimeeri','Kontrolli','Paranda','Tühjenda','Liiguta teise andmebaasi','Liiguta','Protseduurid','Sündmused (EVENTS)','Ajakava','Antud ajahetkel',array('Saadetud kirju: %d.','Saadetud kirju: %d.'));break;case"fr":$X=array('Impossible d\'importer le fichier.','Taille maximale des fichiers est de %sB.','Aucun résultat',array('%d octet','%d octets'),'original','Importation de fichier désactivé.','Langues','Utiliser','Adminer','Serveur','Utilisateur','Mot de passe','Structure de la table','Modifier','Select','Fonctions','Agrégation','Rechercher','BOOL','(n\'importe où)','Ordonner','décroissant','Limit','Longueur du texte','Action','Requête SQL','Exporter','Déconnexion','base de données','Aucunes tables.','select','Créer une table','Extension MySQL introuvable','Aucune des extensions PHP supportées (%s) n\'est disponible.','Nombres','Date et heure','Chaînes','Binaires','Listes','Token CSRF invalide. Veuillez réenvoyer le formulaire.','Aurevoir!','Authentification','Authentification échouée','Veuillez activer les sessions.','Session expirée, veuillez vous authentifier à nouveau.','Base de données','Base de donnée invalide','Selectionner la base de donnée','Créer une base de donnée','Privilège','Liste de processus','Variables','Version de MySQL: %s utilisant l\'extension %s','Authentifié en tant que %s','Clé éxterne','collation','IN-OUT','Nom de la colonne','Nom du Paramêtre','Type','Longeur','Options','NULL','Auto increment','Commentaire','Ajouter le prochain','Effacer','Déplacer vers le haut','Déplacer vers le bas','ouvrir','sauvegarder','SQL','CVS','Êtes-vous certain?','Donnée POST trop grande . Réduire la taille des données ou modifier le "post_max_size" dans la configuration de PHP.','Vue','Table','Modifier une vue','Modifier la table','Valeurs par défaut','Selectionner la table','Nouvel élément','Index','Modifier les index','Modifier','Ajouter une clé externe','Triggers','Ajouter un trigger','Schéma de la base de données','Exporter','Sortie','Formatter','Tables','Donnée','~ %s','Créer un utilisateur','modifier','Erreur dans la requête',array('%d ligne','%d lignes'),'%.3f s',array('Requête exécutée, %d ligne affectée.','Requête exécutée, %d lignes affectées.'),'Aucune commande à exécuter.','Exécuter','Arrêt sur erreur','Importer un fichier','Executer le fichier','Historique','Effacer','Valeur par défaut établie .','Élément modifié.','Élément inseré.','Insérer','ON UPDATE CURRENT_TIMESTAMP','Sauvegarder','Sauvegarder et continuer l\'édition','Sauvegarder et insérer le prochain','Table modifiée','Table créée.','Créer une table','Le nombre de champs maximum est dépassé. Veuillez augmenter %s et %s','Nom de la table','moteur','Voir les commentaires sur les colonnes','Partitionné par','Partitions','Nom de la partition','Valeurs','Index modifiés.','Type d\'index','Colonne (longueur)','Base de données effacée.','Base de données créée.','Base de données renommée.','Base de données modifiée.','Modifier la base de données','Créer une base de données','Effacer','Appeler',array('Routine exécutée, %d ligne modifiée.','Routine exécutée, %d lignes modifiées.'),'Clé externe effacée.','Clé externe modifiée.','Clé externe créée.','Les colonnes selectionnées et les colonnes de destination doivent être du même type, il doit y avoir un index sur les colonnes de destination et les données de référence doivent exister.','Clé externe','Table visée','Modifier','Source','Cible','ON DELETE','ON UPDATE','Ajouter une colonne','Vue effacée.','Vue modifiée.','Vue créée.','Créer une vue','Nom','L\'évènement a été supprimé.','L\'évènement a été modifié.','L\'évènement a été créé.','Modifier un évènement','Créer un évènement','Démarrer','Terminer','Chaque','Status','Conserver quand complété','Procédure éliminée.','Procédure modifiée.','Procédure créée.','Modifier la fonction','Modifier la procédure','Créer une fonction','Créer une procédure','Type de retour','Trigger éliminé.','Trigger modifié.','Trigger créé.','Modifier un trigger','Ajouter un trigger','Temps','Évènement','Utilisateur éffacé.','Utilisateur modifié.','Utilisateur créé.','Haché','Colonne','Routine','Grant','Revoke',array('%d processus arrêté.','%d processus arrêtés.'),'Arrêter',array('%d élément ont été modifié.','%d éléments ont été modifié.'),array('%d ligne a été importé','%d lignes ont été importé'),'Impossible de sélectionner la table','Relations','Page','résultat entier','Cloner','Effacer','Importation CVS','Importer','Les tables ont été tronquées','Les tables ont été déplacées','Les tables ont été effacées','Tables et vues','Moteur','Collation','Longeur des données','Longeur de l\'index','Vide','Rangés',',','Analyser','Opitimiser','Vérifier','Réparer','Tronquer','Déplacer dans une autre base de données','Déplacer','Routines','Évènement','Horaire','À un moment précis',array('%d message a été envoyé.','%d messages ont été envoyés.'));break;case"it":$X=array('Caricamento del file non riuscito.','La dimensione massima del file è %sB.','Nessuna riga.',array('%d byte','%d bytes'),'originale','Caricamento file disabilitato.','Lingua','Usa','Adminer','Server','Utente','Password','Struttura tabella','Modifica','Seleziona','Funzioni','Aggregazione','Cerca','BOOL','(ovunque)','Ordina','discendente','Limite','Lunghezza testo','Azione','Comando SQL','Dump','Esci','database','No tabelle.','seleziona','Crea nuova tabella','Estensioni MySQL non presenti','Nessuna delle estensioni PHP supportate (%s) disponibile.','Numeri','Data e ora','Stringhe','Binari','Liste','Token CSRF non valido. Reinvia la richiesta.','Uscita effettuata con successo.','Autenticazione','Credenziali non valide.','Le sessioni devono essere abilitate.','Sessione scaduta, autenticarsi di nuovo.','Database','Database non valido.','Seleziona database','Crea nuovo database','Privilegi','Elenco processi','Variabili','Versione MySQL: %s via estensione PHP %s','Autenticato come: %s','Chiavi esterne','collazione','IN-OUT','Nome colonna','Nome parametro','Tipo','Lunghezza','Opzioni','NULL','Auto incremento','Commento','Aggiungi altro','Rimuovi','Sposta su','Sposta giu','apri','salva','SQL','CSV','Sicuro?','Troppi dati via POST. Ridurre i dati o aumentare la direttiva di configurazione "post_max_size".','Vedi','Tabella','Modifica vista','Modifica tabella','Valori predefiniti','Scegli tabella','Nuovo elemento','Indici','Modifica indici','Modifica','Aggiungi foreign key','Trigger','Aggiungi trigger','Schema database','Esporta','Risultato','Formato','Tabelle','Dati','~ %s','Crea utente','modifica','Errore nella query',array('%d riga','%d righe'),'%.3f s',array('Esecuzione della query OK, %d riga interessata.','Esecuzione della query OK, %d righe interessate.'),'Nessun commando da eseguire.','Esegui','Stop su errore','Caricamento file','Esegui file','Storico','Pulisci','Valore predefinito impostato.','Elemento aggiornato.','Elemento inserito.','Inserisci','ON UPDATE CURRENT_TIMESTAMP','Salva','Salva e continua','Salva e inserisci un altro','Tabella modificata.','Tabella creata.','Crea tabella','Troppi campi. Per favore aumentare %s e %s.','Nome tabella','motore','Mostra i commenti delle colonne','Partiziona per','Partizioni','Nome partizione','Valori','Indici modificati.','Tipo indice','Colonna (lunghezza)','Database eliminato.','Database creato.','Database rinominato.','Database modificato.','Modifica database','Crea database','Elimina','Chiama',array('Routine chiamata, %d riga interessata.','Routine chiamata, %d righe interessate.'),'Foreign key eliminata.','Foreign key modificata.','Foreign key creata.','Le colonne sorgente e destinazione devono essere dello stesso tipo e ci deve essere un indice sulla colonna di destinazione e sui dati referenziati.','Foreign key','Tabella obiettivo','Cambia','Sorgente','Obiettivo','ON DELETE','ON UPDATE','Aggiungi colonna','Vista eliminata.','Vista modificata.','Vista creata.','Crea vista','Nome','Evento eliminato.','Evento modificato.','Evento creato.','Modifica evento','Crea evento','Inizio','Fine','Ogni','Stato','Al termine preservare','Routine eliminata.','Routine modificata.','Routine creata.','Modifica funzione','Modifica procedura','Crea funzione','Crea procedura','Return type','Trigger eliminato.','Trigger modificato.','Trigger creato.','Modifica trigger','Crea trigger','Orario','Evento','Utente eliminato.','Utente modificato.','Utente creato.','Hashed','Colonna','Routine','Permetti','Revoca',array('%d processo interrotto.','%d processi interrotti.'),'Interrompi',array('Il risultato consiste in %d elemento','Il risultato consiste in %d elementi'),array('%d riga importata.','%d righe importate.'),'Selezione della tabella non riuscita','Relazioni','Pagina','intero risultato','Clona','Elimina','Importa da CSV','Importa','Le tabelle sono state svuotate.','Le tabelle sono state spostate.','Le tabelle sono state eliminate.','Tabelle e viste','Motore','Collazione','Lunghezza dato','Lunghezza indice','Dati liberi','Righe','.','Analizza','Ottimizza','Controlla','Ripara','Svuota','Sposta in altro database','Sposta','Routine','Eventi','Pianifica','A tempo prestabilito',array('%d e-mail inviata.','%d e-mail inviate.'));break;case"nl":$X=array('Onmogelijk bestand te uploaden.','Maximum toegelaten bestandsgrootte is %sB.','Geen rijen.',array('%d byte','%d bytes'),'origineel','Bestanden uploaden is uitgeschakeld.','Taal','Gebruik','Adminer','Server','Gebruikersnaam','Wachtwoord','Tabelstructuur','Bewerk','Kies','Functies','Totalen','Zoeken','BOOL','(overal)','Sorteren','Aflopend','Beperk','Tekst lengte','Acties','SQL opdracht','Exporteer','Uitloggen','database','Geen tabellen.','kies','Nieuwe tabel','Geen MySQL extensie','Geen geldige PHP extensies beschikbaar (%s).','Getallen','Datum en tijd','Tekst','Binaire gegevens','Lijsten','Ongeldig CSRF token. Verstuur het formulier opnieuw.','Uitloggen geslaagd.','Inloggen','Ongeldige logingegevens.','Sessies moeten geactiveerd zijn.','Uw sessie is verlopen. Gelieve opnieuw in te loggen.','Database','Ongeldige database.','Database selecteren','Nieuwe database','Rechten','Proceslijst','Variabelen','MySQL versie: %s met PHP extensie %s','Aangemeld als: %s','Foreign keys','collation','IN-OUT','Kolomnaam','Parameternaam','Type','Lengte','Opties','NULL','Auto nummering','Commentaar','Volgende toevoegen','Verwijderen','Omhoog','Omlaag','openen','opslaan','SQL','CSV','Weet u het zeker?','POST-data is te groot. Verklein de hoeveelheid data of verhoog de "post_max_size" configuratie.','View','Tabel','View aanpassen','Tabel aanpassen','Standaard waarden','Selecteer tabel','Nieuw item','Indexen','Indexen aanpassen','Aanpassen','Foreign key aanmaken','Triggers','Trigger aanmaken','Database schema','Exporteren','Uitvoer','Formaat','Tabellen','Data','~ %s','Gebruiker aanmaken','bewerk','Fout in query',array('%d rij','%d rijen'),'%.3f s',array('Query uitgevoerd, %d rij geraakt.','Query uitgevoerd, %d rijen geraakt.'),'Geen opdrachten uit te voeren.','Uitvoeren','Stoppen bij fout','Bestand uploaden','Bestand uitvoeren','Geschiedenis','Wissen','Standaard waarde ingesteld.','Item aangepast.','Item toegevoegd.','Toevoegen','ON UPDATE CURRENT_TIMESTAMP','Opslaan','Opslaan en verder bewerken','Opslaan, daarna toevoegen','Tabel aangepast.','Tabel aangemaakt.','Tabel aanmaken','Maximum aantal velden bereikt. Verhoog %s en %s.','Tabelnaam','engine','Kolomcommentaar weergeven','Partitioneren op','Partities','Partitie naam','Waarden','Index aangepast.','Index type','Kolom (lengte)','Database verwijderd.','Database aangemaakt.','Database hernoemd.','Database aangepast.','Database aanpassen','Database aanmaken','Verwijderen','Uitvoeren',array('Procedure uitgevoerd, %d rij geraakt.','Procedure uitgevoerd, %d rijen geraakt.'),'Foreign key verwijderd.','Foreign key aangepast.','Foreign key aangemaakt.','Bron- en doelkolommen moeten van hetzelfde data type zijn, er moet een index bestaan op de gekozen kolommen en er moet gerelateerde data bestaan.','Foreign key','Doeltabel','Veranderen','Bron','Doel','ON DELETE','ON UPDATE','Kolom toevoegen','View verwijderd.','View aangepast.','View aangemaakt.','View aanmaken','Naam','Event werd verwijderd.','Event werd aangepast.','Event werd aangemaakt.','Event aanpassen','Event aanmaken','Start','Stop','Iedere','Status','Bewaren na voltooiing','Procedure verwijderd.','Procedure aangepast.','Procedure aangemaakt.','Functie aanpassen','Procedure aanpassen','Functie aanmaken','Procedure aanmaken','Return type','Trigger verwijderd.','Trigger aangepast.','Trigger aangemaakt.','Trigger aanpassen','Trigger aanmaken','Time','Event','Gebruiker verwijderd.','Gebruiker aangepast.','Gebruiker aangemaakt.','Gehashed','Kolom','Routine','Toekennen','Intrekken',array('%d proces gestopt.','%d processen gestopt.'),'Stoppen',array('%d item aangepast.','%d items aangepast.'),array('%d rij werd geïmporteerd.','%d rijen werden geïmporteerd.'),'Onmogelijk tabel te selecteren','Relaties','Pagina','volledig resultaat','Dupliceer','Verwijderen','CSV Import','Importeren','Tabellen werden geleegd.','Tabellen werden verplaatst.','Tabellen werden verwijderd.','Tabellen en views','Engine','Collatie','Data lengte','Index lengte','Data Vrij','Rijen','.','Analyseer','Optimaliseer','Controleer','Herstel','Legen','Verplaats naar andere database','Verplaats','Procedures','Events','Schedule','Op aangegeven tijd',array('%d e-mail verzonden.','%d e-mails verzonden.'));break;case"ru":$X=array('Не удалось загрузить файл на сервер.','Максимальный разрешенный размер файла - %sB.','Нет записей.',array('%d байт','%d байта','%d байтов'),'исходный','Загрузка файлов на сервер запрещена.','Язык','Выбрать','Adminer','Сервер','Имя пользователя','Пароль','Структура таблицы','Редактировать','Выбрать','Функции','Агрегация','Поиск','Булев тип','(в любом месте)','Сортировать','по убыванию','Лимит','Длина текста','Действие','SQL запрос','Дамп','Выйти','база данных','В базе данных нет таблиц.','выбрать','Создать новую таблицу','Нет MySQL расширений','Не доступно ни одного расширения из поддерживаемых (%s).','Число','Дата и время','Строки','Двоичный тип','Списки','Недействительный CSRF токен. Отправите форму ещё раз.','Вы успешно покинули систему.','Войти','Неправильное имя пользователя или пароль.','Сессии должны быть включены.','Срок действия сесси истек, нужно снова войти в систему.','База данных','Плохая база данных.','Выбрать базу данных','Создать новую базу данных','Полномочия','Список процессов','Переменные','Версия MySQL: %s с PHP-расширением %s','Вы вошли как: %s','Внешние ключи','режим сопоставления','IN-OUT','Название поля','Название параметра','Тип','Длина','Действие','NULL','Автоматическое приращение','Комментарий','Добавить еще','Удалить','Переместить вверх','Переместить вниз','открыть','сохранить','SQL','CSV','Вы уверены?','Слишком большой объем POST-данных. Пошлите меньший объем данных или увеличьте параметр конфигурационной директивы "post_max_size".','Представление','Таблица','Изменить представление','Изменить таблицу','Значения по умолчанию','Выбрать данные из таблицы','Новая запись','Индексы','Изменить индексы','Изменить','Добавить внешний ключ','Триггеры','Добавить триггер','Схема базы данных','Експорт','Выходные данные','Формат','Таблицы','Данные','~ %s','Создать пользователя','редактировать','Ошибка в запросe',array('%d строка','%d строки','%d строк'),'%.3f s',array('Запрос завершен, изменена %d запись.','Запрос завершен, изменены %d записи.','Запрос завершен, изменено %d записей.'),'Нет команд для выполнения.','Выполнить','Остановить при ошибке','Загрузить файл на сервер','Запустить файл','История','Очистить','Были установлены значения по умолчанию.','Запись обновлена.','Запись вставлена.','Вставить','ПРИ ИЗМЕНЕНИИ ТЕКУЩЕГО TIMESTAMP','Сохранить','Сохранить и продолжить редактирование','Сохранить и вставить еще','Таблица была изменена.','Таблица была создана.','Создать таблицу','Достигнуто максимальное значение количества доступных полей. Увеличьте %s и %s.','Название таблицы','тип','Показать комментарии к колонке','Разделить по','Разделы','Название раздела','Параметры','Индексы изменены.','Тип индекса','Колонка (длина)','База данных была удалена.','База данных была создана.','База данных была переименована.','База данных была изменена.','Изменить базу данных','Создать базу данных','Удалить','Вызвать',array('Была вызвана процедура, %d запись была изменена.','Была вызвана процедура, %d записи было изменено.','Была вызвана процедура, %d записей было изменено.'),'Внешний ключ был удален.','Внешний ключ был изменен.','Внешний ключ был создан.','Колонки должны иметь одинаковые типы данных, в результирующей колонке должен быть индекс, данные для импорта должны существовать.','Внешний ключ','Результирующая таблица','Изменить','Источник','Цель','При стирании','При обновлении','Добавить колонку','Представление было удалено.','Представление было изменено.','Представление было создано.','Создать представление','Название','Событие было удалено.','Событие было изменено.','Событие было создано.','Изменить событие','Создать событие','Начало','Конец','Каждые','Состояние','После завершения сохранить','Процедура была удалена.','Процедура была изменена.','Процедура была создана.','Изменить функцию','Изменить процедуру','Создать функцию','Создать процедуру','Возвращаемый тип','Триггер был удален.','Триггер был изменен.','Триггер был создан.','Изменить триггер','Создать триггер','Время','Событие','Пользователь был удален.','Пользователь был изменен.','Пользователь был создан.','Хешировано','Колонка','Процедура','Позволить','Запретить',array('Был завершен %d процесс.','Было завершено %d процесса.','Было завершёно %d процессов.'),'Завершить',array('Была изменена %d запись.','Были изменены %d записи.','Было изменено %d записей.'),array('Импортирована %d строка.','Импортировано %d строки.','Импортировано %d строк.'),'Не удалось получить данные из таблицы','Реляции','Страница','весь результат','Клонировать','Стереть','Импорт CSV','Импорт','Таблицы были очищены.','Таблицы были перемещены.','Таблицы были удалены.','Таблицы и представления','Тип','Режим сопоставления','Объём данных','Объём индексов','Свободное место','Строк',' ','Анализировать','Оптимизировать','Проверить','Исправить','Очистить','Переместить в другою базу данных','Переместить','Хранимые процедуры и функции','События','Расписание','В данное время',array('Было отправлено %d письмо.','Было отправлено %d письма.','Было отправлено %d писем.'));break;case"sk":$X=array('Súbor sa nepodarilo nahrať.','Maximálna povolená veľkosť súboru je %sB.','Žiadne riadky.',array('%d bajt','%d bajty','%d bajtov'),'originál','Nahrávánie súborov nie je povolené.','Jazyk','Vybrať','Adminer','Server','Používateľ','Heslo','Štruktúra tabuľky','Upraviť','Vypísať','Funkcie','Agregácia','Vyhľadať','BOOL','(kdekoľvek)','Zotriediť','zostupne','Limit','Dĺžka textov','Akcia','SQL príkaz','Export','Odhlásiť','databáza','Žiadne tabuľky.','vypísať','Vytvoriť novú tabuľku','Žiadne MySQL rozšírenie','Nie je dostupné žiadne z podporovaných rozšírení (%s).','Čísla','Dátum a čas','Reťazce','Binárne','Zoznamy','Neplatný token CSRF. Odošlite formulár znova.','Odhlásenie prebehlo v poriadku.','Prihlásiť sa','Neplatné prihlasovacie údaje.','Session premenné musia byť povolené.','Session vypršala, prihláste sa prosím znova.','Databáza','Nesprávna databáza.','Vybrať databázu','Vytvoriť novú databázu','Oprávnenia','Zoznam procesov','Premenné','Verzia MySQL: %s cez PHP rozšírenie %s','Prihlásený ako: %s','Cudzie kľúče','porovnávanie','IN-OUT','Názov stĺpca','Názov parametra','Typ','Dĺžka','Voľby','NULL','Auto Increment','Komentár','Pridať ďalší','Odobrať','Presunúť hore','Presunúť dolu','otvoriť','uložiť','SQL','CSV','Naozaj?','Príliš veľké POST dáta. Zmenšite dáta alebo zvýšte hodnotu konfiguračej direktívy "post_max_size".','Pohľad','Tabuľka','Zmeniť pohľad','Zmeniť tabuľku','Východzie hodnoty','Vypísať tabuľku','Nová položka','Indexy','Zmeniť indexy','Zmeniť','Pridať cudzí kľúč','Triggery','Pridať trigger','Schéma databázy','Export','Výstup','Formát','Tabuľky','Dáta','~ %s','Vytvoriť používateľa','upraviť','Chyba v dotaze',array('%d riadok','%d riadky','%d riadkov'),'%.3f s',array('Príkaz prebehol v poriadku, bol zmenený %d záznam.','Príkaz prebehol v poriadku boli zmenené %d záznamy.','Príkaz prebehol v poriadku bolo zmenených %d záznamov.'),'Žiadne príkazy na vykonanie.','Vykonať','Zastaviť pri chybe','Nahranie súboru','Spustiť súbor','História','Vyčistiť','Východzie hodnoty boli nastavené.','Položka bola aktualizovaná.','Položka bola vložená.','Vložiť','Pri zmene aktuálny čas','Uložiť','Uložiť a pokračovať v úpravách','Uložiť a vložiť ďalší','Tabuľka bola zmenená.','Tabuľka bola vytvorená.','Vytvoriť tabuľku','Bol prekročený maximálny počet povolených polí. Zvýšte prosím %s a %s.','Názov tabuľky','úložisko','Zobraziť komentáre stĺpcov','Rozdeliť podľa','Oddiely','Názov oddielu','Hodnoty','Indexy boli zmenené.','Typ indexu','Stĺpec (dĺžka)','Databáza bola odstránená.','Databáza bola vytvorená.','Databáza bola premenovaná.','Databáza bola zmenená.','Zmeniť databázu','Vytvoriť databázu','Odstrániť','Zavolať',array('Procedúra bola zavolaná, bol zmenený %d záznam.','Procedúra bola zavolaná, boli zmenené %d záznamy.','Procedúra bola zavolaná, bolo zmenených %d záznamov.'),'Cudzí kľúč bol odstránený.','Cudzí kľúč bol zmenený.','Cudzí kľúč bol vytvorený.','Zdrojové a cieľové stĺpce musia mať rovnaký datový typ, nad cieľovými stĺpcami musí byť definovaný index a odkazované dáta musia existovať.','Cudzí kľúč','Cieľová tabuľka','Zmeniť','Zdroj','Cieľ','ON DELETE','ON UPDATE','Pridať stĺpec','Pohľad bol odstránený.','Pohľad bol zmenený.','Pohľad bol vytvorený.','Vytvoriť pohľad','Názov','Udalosť bola odstránená.','Udalosť bola zmenená.','Udalosť bola vytvorená.','Upraviť udalosť','Vytvoriť udalosť','Začiatok','Koniec','Každých','Stav','Po dokončení zachovat','Procedúra bola odstránená.','Procedúra bola zmenená.','Procedúra bola vytvorená.','Zmeniť funkciu','Zmeniť procedúru','Vytvoriť funkciu','Vytvoriť procedúru','Návratový typ','Trigger bol odstránený.','Trigger bol zmenený.','Trigger bol vytvorený.','Zmeniť trigger','Vytvoriť trigger','Čas','Udalosť','Používateľ bol odstránený.','Používateľ bol zmenený.','Používateľ bol vytvorený.','Zahašované','Stĺpec','Procedúra','Povoliť','Zakázať',array('Bol ukončený %d proces.','Boli ukončené %d procesy.','Bolo ukončených %d procesov.'),'Ukončiť','%d položiek bolo ovplyvnených.',array('Bol importovaný %d záznam.','Boli importované %d záznamy.','Bolo importovaných %d záznamov.'),'Tabuľku sa nepodarilo vypísať','Vzťahy','Stránka','celý výsledok','Klonovať','Zmazať','Import CSV','Import','Tabuľka bola vyprázdnená','Tabuľka bola presunutá','Tabuľka bola odstránená','Tabuľky a pohľady','Typ','Porovnávanie','Veľkosť dát','Veľkosť indexu','Voľné miesto','Riadky',' ','Analyzovať','Optimalizovať','Skontrolovať','Opraviť','Vyprázdniť','Presunúť do inej databázy','Presunúť','Procedúry','Udalosti','Plán','V stanovený čas','Editor');break;case"zh":$X=array('不能上传文件。','最多允许的文件大小为 %sB','没有行。','%d 字节','原始','文件上传被禁用。','语言','使用','Adminer','服务器','用户名','密码','表结构','编辑','选择','函数','集合','搜索','BOOL','（任意位置）','排序','降序','限定','文本长度','动作','SQL命令','导入/导出','注销','数据库','没有表。','选择','创建新表','没有MySQL扩展','没有支持的 PHP 扩展可用（%s）。','数字','日期时间','字符串','二进制','列表','无效 CSRF 令牌。重新发送表单。','注销成功。','登录','无效凭据。','会话必须被启用。','会话已过期，请重新登录。','数据库','无效数据库。','选择数据库','创建新数据库','权限','进程列表','变量','MySQL 版本：%s 通过 PHP 扩展 %s','登录为：%s','外键','校对','IN-OUT','列名','参数名','类型','长度','选项','NULL','自动增量','注释','添加下一个','移除','上移','下移','打开','保存','SQL','CVS','你确定吗？','太大的 POST 数据。减少数据或者增加 “post_max_size” 配置命令。','视图','表','更改视图','更改表','默认值','选择表','新建项','索引','更改索引','更改','添加外键','触发器','创建触发器','数据库概要','导出','输出','格式','表','数据','~ %s','创建用户','编辑','查询出错','%d 行','%.3f 秒','执行查询OK，%d 行受影响','没有命令执行。','执行','出错时停止','文件上传','运行文件','历史','清除','默认值已设置。','已更新项目。','已插入项目。','插入','ON UPDATE CURRENT_TIMESTAMP','保存','保存并继续编辑','保存并插入下一个','已更改表。','已创建表。','创建表','超过最多允许的字段数量。请增加 %s 和 %s 。','表名','引擎','显示列注释','分区类型','分区','分区名','值','已更改索引。','索引类型','列（长度）','已丢弃数据库。','已创建数据库。','已重命名数据库。','已更改数据库。','更改数据库','创建数据库','丢弃','调用','子程序被调用，%d 行被影响','已删除外键。','已更改外键。','已创建外键。','源列和目标列必须具有相同的数据类型，在目标列上必须有一个索引并且引用的数据必须存在。','外键','目标表','更改','源','目标','ON DELETE','ON UPDATE','增加列','已丢弃视图。','已更改视图。','已创建视图。','创建视图','名称','已丢弃事件。','已更改事件。','已创建事件。','更改事件','创建事件','开始','结束','每','状态','完成后保存','已丢弃子程序。','已更改子程序。','已创建子程序。','更改函数','更改过程','创建函数','创建过程','返回类型','已丢弃触发器。','已更改触发器。','已创建触发器。','更改触发器','创建触发器','时间','事件','已丢弃用户。','已更改用户。','已创建用户。','Hashed','列','子程序','授权','废除','%d 个进程被终止','终止','%d 个项目受到影响。','%d 行已导入。','不能选择该表','关联信息','页面','所有结果','克隆','删除','CSV 导入','导入','已清空表。','已转移表。','已丢弃表。','表和视图','引擎','校对','数据长度','索引长度','数据空闲','行数',',','分析','优化','检查','修复','清空','转移到其它数据库','转移','子程序','事件','调度','在指定时间','%d 封邮件已发送。');break;}class
Adminer{var$functions=array("char_length","from_unixtime","hex","lower","round","sec_to_time","time_to_sec","unix_timestamp","upper");var$grouping=array("avg","count","distinct","group_concat","max","min","sum");var$operators=array("=","<",">","<=",">=","!=","LIKE","REGEXP","IN","IS NULL","NOT LIKE","NOT REGEXP","NOT IN","IS NOT NULL");function
name(){return
lang(8);}function
credentials(){return
array($_GET["server"],$_SESSION["usernames"][$_GET["server"]],$_SESSION["passwords"][$_GET["server"]]);}function
database(){return$_GET["db"];}function
loginForm($y){echo'<table cellspacing="0">
<tr><th>'.lang(9);echo'<td><input name="server" value="'.h($_GET["server"]);echo'">
<tr><th>'.lang(10);echo'<td><input name="username" value="'.h($y);echo'">
<tr><th>'.lang(11);echo'<td><input type="password" name="password">
</table>
';}function
login($Pd,$ga){return
true;}function
tableName($Sc){return
h($Sc["Name"]);}function
fieldName($c,$la=0){return'<span title="'.h($c["full_type"]).'">'.h($c["field"]).'</span>';}function
selectLinks($Sc){return'<a href="'.h(ME).'table='.urlencode($_GET['select']).'">'.lang(12).'</a>';}function
backwardKeys($o){return
array();}function
selectQuery($l){return"<p><code class='jush-sql'>".h($l)."</code> <a href='".h(ME)."sql=".urlencode($l)."'>".lang(13)."</a>\n";}function
rowDescription($o){return"";}function
rowDescriptions($V,$Sd){return$V;}function
selectVal($b,$v,$c){$i=($c["type"]=="char"?"<code>$b</code>":$b);if(ereg('blob|binary',$c["type"])&&!is_utf8($b)){$i=lang(3,strlen($b));}return($v?"<a href='$v'>$i</a>":$i);}function
editVal($b,$c){return$b;}function
selectColumnsPrint($t,$r){echo'<fieldset><legend><a href="#fieldset-select" onclick="return !toggle(\'fieldset-select\');">'.lang(14)."</a></legend><div id='fieldset-select'".($t?"":" class='hidden'").">\n";$g=0;$Wc=array(lang(15)=>$this->functions,lang(16)=>$this->grouping);foreach($t
as$f=>$b){$b=$_GET["columns"][$f];echo"<div><select name='columns[$g][fun]'><option>".optionlist($Wc,$b["fun"])."</select>"."<select name='columns[$g][col]'><option>".optionlist($r,$b["col"],true)."</select></div>\n";$g++;}echo"<div><select name='columns[$g][fun]' onchange='this.nextSibling.onchange();'><option>".optionlist($Wc)."</select>"."<select name='columns[$g][col]' onchange='select_add_row(this);'><option>".optionlist($r,null,true)."</select></div>\n";echo"</div></fieldset>\n";}function
selectSearchPrint($w,$r,$s){echo'<fieldset><legend><a href="#fieldset-search" onclick="return !toggle(\'fieldset-search\');">'.lang(17)."</a></legend><div id='fieldset-search'".($w?"":" class='hidden'").">\n";foreach($s
as$g=>$q){if($q["type"]=="FULLTEXT"){echo"(<i>".implode("</i>, <i>",array_map('h',$q["columns"]))."</i>) AGAINST"." <input name='fulltext[$g]' value='".h($_GET["fulltext"][$g])."'>";echo"<label><input type='checkbox' name='boolean[$g]' value='1'".(isset($_GET["boolean"][$g])?" checked":"").">".lang(18)."</label>"."<br>\n";}}$g=0;foreach((array)$_GET["where"]as$b){if(strlen("$b[col]$b[val]")&&in_array($b["op"],$this->operators)){echo"<div><select name='where[$g][col]'><option value=''>".lang(19).optionlist($r,$b["col"],true)."</select>"."<select name='where[$g][op]'>".optionlist($this->operators,$b["op"])."</select>";echo"<input name='where[$g][val]' value='".h($b["val"])."'></div>\n";$g++;}}echo"<div><select name='where[$g][col]' onchange='select_add_row(this);'><option value=''>".lang(19).optionlist($r,null,true)."</select>"."<select name='where[$g][op]'>".optionlist($this->operators)."</select>";echo"<input name='where[$g][val]'></div>\n"."</div></fieldset>\n";}function
selectOrderPrint($la,$r,$s){echo'<fieldset><legend><a href="#fieldset-sort" onclick="return !toggle(\'fieldset-sort\');">'.lang(20)."</a></legend><div id='fieldset-sort'".($la?"":" class='hidden'").">\n";$g=0;foreach((array)$_GET["order"]as$f=>$b){if(isset($r[$b])){echo"<div><select name='order[$g]'><option>".optionlist($r,$b,true)."</select>"."<label><input type='checkbox' name='desc[$g]' value='1'".(isset($_GET["desc"][$f])?" checked":"").">".lang(21)."</label></div>\n";$g++;}}echo"<div><select name='order[$g]' onchange='select_add_row(this);'><option>".optionlist($r,null,true)."</select>"."<label><input type='checkbox' name='desc[$g]' value='1'>".lang(21)."</label></div>\n";echo"</div></fieldset>\n";}function
selectLimitPrint($R){echo"<fieldset><legend>".lang(22)."</legend><div>";echo"<input name='limit' size='3' value='".h($R)."'>"."</div></fieldset>\n";}function
selectLengthPrint($xa){if(isset($xa)){echo"<fieldset><legend>".lang(23)."</legend><div>".'<input name="text_length" size="3" value="'.h($xa).'">';echo"</div></fieldset>\n";}}function
selectActionPrint(){echo"<fieldset><legend>".lang(24)."</legend><div>"."<input type='submit' value='".lang(14)."'>";echo"</div></fieldset>\n";}function
selectEmailPrint($Wd){}function
selectColumnsProcess($r,$s){$t=array();$P=array();foreach((array)$_GET["columns"]as$f=>$b){if($b["fun"]=="count"||(isset($r[$b["col"]])&&(!$b["fun"]||in_array($b["fun"],$this->functions)||in_array($b["fun"],$this->grouping)))){$t[$f]=apply_sql_function($b["fun"],(isset($r[$b["col"]])?idf_escape($b["col"]):"*"));if(!in_array($b["fun"],$this->grouping)){$P[]=$t[$f];}}}return
array($t,$P);}function
selectSearchProcess($k,$s){global$d;$i=array();foreach($s
as$g=>$q){if($q["type"]=="FULLTEXT"&&strlen($_GET["fulltext"][$g])){$i[]="MATCH (".implode(", ",array_map('idf_escape',$q["columns"])).") AGAINST (".$d->quote($_GET["fulltext"][$g]).(isset($_GET["boolean"][$g])?" IN BOOLEAN MODE":"").")";}}foreach((array)$_GET["where"]as$b){if(strlen("$b[col]$b[val]")&&in_array($b["op"],$this->operators)){$Ba=process_length($b["val"]);$hc=" $b[op]".(ereg('NULL$',$b["op"])?"":(ereg('IN$',$b["op"])?" (".(strlen($Ba)?$Ba:"NULL").")":" ".$this->processInput($k[$b["col"]],$b["val"])));if(strlen($b["col"])){$i[]=idf_escape($b["col"]).$hc;}else{$Oa=array();foreach($k
as$h=>$c){if(is_numeric($b["val"])||!ereg('int|float|double|decimal',$c["type"])){$Oa[]=$h;}}$i[]=($Oa?"(".implode("$hc OR ",array_map('idf_escape',$Oa))."$hc)":"0");}}}return$i;}function
selectOrderProcess($k,$s){$i=array();foreach((array)$_GET["order"]as$f=>$b){if(isset($k[$b])||preg_match('~^[A-Z0-9_]+\\(`(?:[^`]+|``)+`\\)$~',$b)){$i[]=idf_escape($b).(isset($_GET["desc"][$f])?" DESC":"");}}return$i;}function
selectLimitProcess(){return(isset($_GET["limit"])?$_GET["limit"]:"30");}function
selectLengthProcess(){return(isset($_GET["text_length"])?$_GET["text_length"]:"100");}function
selectEmailProcess($w){return
false;}function
messageQuery($l){$ec="sql-".count($_SESSION["messages"]);$_SESSION["history"][$_GET["server"]][$_GET["db"]][]=$l;return" <a href='#$ec' onclick=\"return !toggle('$ec');\">".lang(25)."</a><div id='$ec' class='hidden'><pre class='jush-sql'>".h($l).'</pre><a href="'.h(ME.'sql=&history='.(count($_SESSION["history"][$_GET["server"]][$_GET["db"]])-1)).'">'.lang(13).'</a></div>';}function
editFunctions($c){$i=array("");if(!isset($_GET["default"])){if(ereg('char|date|time',$c["type"])){$i=(ereg('char',$c["type"])?array("","md5","sha1","password","uuid"):array("","now"));}if(!isset($_GET["call"])&&(isset($_GET["select"])||where($_GET))){if(ereg('int|float|double|decimal',$c["type"])){$i=array("","+","-");}if(ereg('date',$c["type"])){$i[]="+ interval";$i[]="- interval";}if(ereg('time',$c["type"])){$i[]="addtime";$i[]="subtime";}}}if($c["null"]||isset($_GET["default"])){array_unshift($i,"NULL");}return$i;}function
editInput($o,$c,$Td,$n){return'';}function
processInput($c,$n,$x=""){global$d;$h=$c["field"];$i=$d->quote($n);if(ereg('^(now|uuid)$',$x)){$i="$x()";}elseif(ereg('^[+-]$',$x)){$i=idf_escape($h)." $x $i";}elseif(ereg('^[+-] interval$',$x)){$i=idf_escape($h)." $x ".(preg_match("~^([0-9]+|'[0-9.: -]') [A-Z_]+$~i",$n)?$n:$i);}elseif(ereg('^(addtime|subtime)$',$x)){$i="$x(".idf_escape($h).", $i)";}elseif(ereg('^(md5|sha1|password)$',$x)){$i="$x($i)";}elseif(ereg('date|time',$c["type"])&&$n=="CURRENT_TIMESTAMP"){$i=$n;}return$i;}function
navigation($ub){global$d;if($ub!="auth"){$wa=get_databases();echo'<form action="" method="post">
<p>
<a href="'.h(ME);echo'sql=">'.lang(25);echo'</a>
<a href="'.h(ME);echo'dump='.urlencode(isset($_GET["table"])?$_GET["table"]:$_GET["select"]);echo'">'.lang(26);echo'</a>
<input type="hidden" name="token" value="'.$_SESSION["tokens"][$_GET["server"]];echo'">
<input type="submit" name="logout" value="'.lang(27);echo'">
</p>
</form>
<form action="">
<p>';if(strlen($_GET["server"])){echo'<input type="hidden" name="server" value="'.h($_GET["server"]);echo'">';}if($wa){echo'<select name="db" onchange="this.form.submit();"><option value="">('.lang(28);echo')'.optionlist($wa,$_GET["db"]);echo'</select>
';}else{echo'<input name="db" value="'.h($_GET["db"]);echo'">
';}if(isset($_GET["sql"])){echo'<input type="hidden" name="sql" value="">';}if(isset($_GET["schema"])){echo'<input type="hidden" name="schema" value="">';}if(isset($_GET["dump"])){echo'<input type="hidden" name="dump" value="">';}echo'<input type="submit" value="'.lang(7);echo'"'.($wa?" class='hidden'":"");echo'>
</p>
</form>
';if($ub!="db"&&strlen($_GET["db"])){$e=$d->query("SHOW TABLES");if(!$e->num_rows){echo"<p class='message'>".lang(29)."\n";}else{echo"<p>\n";while($a=$e->fetch_row()){echo'<a href="'.h(ME).'select='.urlencode($a[0]).'">'.lang(30).'</a> '.'<a href="'.h(ME).'table='.urlencode($a[0]).'">'.$this->tableName(array("Name"=>$a[0]))."</a><br>\n";}}$e->free();echo'<p><a href="'.h(ME).'create=">'.lang(31)."</a>\n";}}}}$p=(function_exists('adminer_object')?adminer_object():new
Adminer);function
page_header($jc,$m="",$ac=array(),$ob=""){global$Z,$Wa,$p;header("Content-Type: text/html; charset=utf-8");echo'<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html lang="'.$Z;echo'">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Content-Script-Type" content="text/javascript">
<meta name="robots" content="noindex">
<title>'.$jc.(strlen($ob)?": ".h($ob):"").(strlen($_GET["server"])&&$_GET["server"]!="localhost"?h("- $_GET[server]"):"")." - ".$p->name();echo '</title>
<link rel="shortcut icon" type="image/x-icon" href="'.h(preg_replace("~\\?.*~","",$_SERVER["REQUEST_URI"]))."?file=favicon.ico&amp;version=2.0.0";
if (isset($_GET['cssfile'])) $_SESSION['cssfile'] = $_GET["cssfile"];
if (!$_SESSION['cssfile']) {
  $_SESSION['cssfile'] = 'administrator/components/com_artadminer/css/adminer1.css';
}
echo '">
<link rel="stylesheet" type="text/css" href="'.$_SESSION['cssfile'];echo'">
';echo'
<style>body {
    margin: 0; 
    line-height: 1.25em;
    font-size: 11pt; }
body, select, option, optgroup, button {
    font-family: Calibri, Arial, Helvetica, sans-serif; } /* IE6 */
input[type="submit"], input[type="reset"], input[type="button"], input[type="file"] {
    font-family: Calibri, Arial, Helvetica, sans-serif; }
input, textarea, pre, code, samp, kbd, var {
    font-family: Consolas, "Courier New", monospace;
    font-size: 10pt; } /* FF3 */

a { 
    color: #007; }
a:visited { 
    color: #707; }
a:hover { 
    text-decoration: none; }
h1 a:visited { 
    color: #007; }

table { 
    margin: 0 12px 12px 0; 
    border: 1px #BBB solid;
    font-size: 90%; }
th {
    text-align: left; }
td, th {
	background-color: #FFF;
    padding: 1px 2px;
    border: 1px #DDD solid;
    border-width: 1px 0px 0px 1px; }
tr:first-child td, tr:first-child th {
    border-top-width: 0; }
td:first-child, th:first-child {
    border-left-width: 0; }
thead td, thead th { 
    background-color: #DDD;
    border: none; 
    border-bottom: 1px #BBB solid; }
thead tr:hover td, thead tr:hover th {
	background-color: #DDD !important; }
tr:nth-child(2n) td, tr:nth-child(2n) th,
.odd td, .odd th {
    background-color: #DEF; }
tr:hover td, tr:hover th {
    background-color: #BCD; }

fieldset { 
    display: inline; 
    vertical-align: top; 
    padding: 8px 12px; 
    margin: 0 8px 12px 0; 
    border: none;
    background-color: #DEF;
    position: relative;     /* IEx */
    padding-top: 14px; }    /* IEx */
fieldset, x:-moz-any-link {
    padding-top: 4px; }     /* .FF3 */
fieldset {
    %padding-top: 14px;}    /* ..IE6+7 */
legend {
    font-weight: bold; 
    color: #000;
    background-color: #FFF;
    position: absolute;     /* IEx */
    top: -0.666em;          /* IEx */
    left: 0.666em;          /* IEx */
    padding: 0px 4px; }
input[name="limit"], input[name*="length"] {
    width: 3em; 
    xtext-align: right; }
input[name="text_length"] {
    width: 5em; }           /* ~FF3 */
select + input, select + select {
    margin-left: 2px; }
input + label input, select + label input {
    margin-left: 4px; }
td input[type="checkbox"]:first-child, td input[type="radio"]:first-child {
    margin-left: 2px; }
label:hover {
    text-decoration: underline; }
fieldset div {
    margin-bottom: 2px; }
input[name="Comment"] { /* !!! */
	width: 24em; }
input[name="Auto_increment"] { /* !!! */
	width: 6em; }

img { 
    vertical-align: middle; 
    margin: 0; 
    padding: 0; }
.error { 
    padding: 8px; 
    color: #F00; 
    background-color: #FEE; }
.message { 
    padding: 8px;  
    background-color: #DDD; }
.char { 
    color: #070; }
.date { 
    color: #707; }
.enum { 
    color: #077; }
.binary { 
    color: red; }
.jush-sql {
    padding: 2px 4px;
    margin-right: 4px;
    outline: 1px #BBB dashed;
    font-size: 9pt; }

#content { 
    margin: 28px 0 0 212px; 
    padding: 10px 20px 20px 0; }
h3 { 
    margin: 20px 0;
    font-weight: normal; 
    font-size: 130%; }

#lang { 
    height: 23px;
    width: 200px;
    display: block; 
    padding: 1px 0px; 
    position: absolute; 
    top: 0;
    left: 0;
    text-align: center; 
    background-color: #EEE;
	line-height: 1.25em; }
#lang select {
    font-size: 8pt; }

#breadcrumb { 
    margin: 0; 
    height: 21px;
    display: block; 
    position: absolute; 
    top: 0; 
    left: 212px;
    background-color: #DDD;
    padding: 2px 12px;
	line-height: 1.25em }

#menu {  
    position: absolute; 
    margin: 0;
    top: 38px; 
    left: 0; 
    width: 200px; 
    background-color: #DEF; }
#menu form { 
    margin: 0; }
#menu p { 
    padding-left: 8px;
    font-size: 10pt;
	border-bottom: none; }
#menu form p {
    padding-left: 0;
    text-align: center; }
h1 { 
    margin: 0; 
    color: #000;
    padding: 5px; 
    text-align: center;
    font-size: 14pt; 
	border-bottom: none; 
	background: transparent;
	font-style: italic; }
h1 .h1 {
	color: #000; }
h1 .h1:hover {
	text-decoration: underline; } 

h2 { 
    margin: 0;
    margin-bottom: 12px; 
    padding: 6px 12px;  
    font-weight: normal; 
    background-color: #BCD;
	border-bottom: none; }

#schema { 
    margin: 1.5em 0 0 220px;
    position: relative; }
#schema .table { 
    border: 1px solid #DDD;
    background-color: #DEF;
    padding: 0 2px; 
    cursor: move; 
    position: absolute; }
#schema .references { 
    position: absolute; }

.js .hidden {
	display: inline; }
.js td.hidden, .js input.hidden {
	display: none; }
legend a {
	color: #000;
	text-decoration: none;
	cursor: default; }
legend a:hover {
	color: black; }
code {
	background: transparent; }

fieldset, legend, h2, table, .error, .message {
    -moz-border-radius: 5px;
	-khtml-border-radius: 5px;
	-webkit-border-radius: 5px;
	border-radius: 5px; }
#breadcrumb, #lang, #menu {
    -moz-border-radius-bottomright: 5px;
	-khtml-border-bottom-right-radius: 5px;
	-webkit-border-bottom-right-radius: 5px;
	border-bottom-right-radius: 5px; }
#breadcrumb {
    -moz-border-radius-bottomleft: 5px;
	-khtml-border-bottom-left-radius: 5px;
	-webkit-border-bottom-left-radius: 5px;
	border-bottom-left-radius: 5px; }
#menu {
    -moz-border-radius-topright: 5px;
	-khtml-border-top-right-radius: 5px;
	-webkit-border-top-right-radius: 5px;
	border-bottom-top-radius: 5px; }
</style>
<body onload="body_load();'.(isset($_COOKIE["adminer_version"])?"":" verify_version();");echo'">
<script type="text/javascript" src="'.h(preg_replace("~\\?.*~","",$_SERVER["REQUEST_URI"]))."?file=functions.js&amp;version=2.0.0";echo'"></script>

<div id="content">
';if(isset($ac)){$v=substr(preg_replace('~db=[^&]*&~','',ME),0,-1);echo'<p id="breadcrumb"><a href="'.(strlen($v)?h($v):".").'">'.(isset($_GET["server"])?h($_GET["server"]):lang(9)).'</a> &raquo; ';if(is_array($ac)){if(strlen($_GET["db"])){echo'<a href="'.h(substr(ME,0,-1)).'">'.h($_GET["db"]).'</a> &raquo; ';}foreach($ac
as$f=>$b){$ib=(is_array($b)?$b[1]:$b);if(strlen($ib)){echo'<a href="'.h(ME."$f=").urlencode(is_array($b)?$b[0]:$b).'">'.h($ib).'</a> &raquo; ';}}}echo"$jc\n";}echo"<h2>$jc".(strlen($ob)?": ".h($ob):"")."</h2>\n";if($_SESSION["messages"]){echo"<div class='message'>".implode("</div>\n<div class='message'>",$_SESSION["messages"])."</div>\n";$_SESSION["messages"]=array();}$wa=&$_SESSION["databases"][$_GET["server"]];if(strlen($_GET["db"])&&$wa&&!in_array($_GET["db"],$wa,true)){$wa=null;}if(isset($wa)&&!isset($_GET["sql"])){session_write_close();}if($m){echo"<div class='error'>$m</div>\n";}}function
page_footer($ub=false){global$Wa,$p;echo'</div>

';switch_lang();echo'<div id="menu">
<h1><a href="http://www.artetics.com/ARTools/art-adminer" class="h1" title="Art Adminer - Smart Database Tool for Joomla!">Art Adminer</a> &nbsp; ';echo'
</h1>
';$p->navigation($ub);echo'</div>
';}if(extension_loaded('pdo')){class
Min_PDO
extends
PDO{var$_result,$server_info,$affected_rows,$error;function
__construct(){}function
dsn($Ad,$y,$ga){set_exception_handler('auth_error');parent::__construct($Ad,$y,$ga);restore_exception_handler();$this->setAttribute(13,array('Min_PDOStatement'));}function
select_db($Sb){return$this->query("USE ".idf_escape($Sb));}function
query($l){$e=parent::query($l);if(!$e){$Ld=$this->errorInfo();$this->error=$Ld[2];return
false;}$this->_result=$e;if(!$e->columnCount()){$this->affected_rows=$e->rowCount();return
true;}$e->num_rows=$e->rowCount();return$e;}function
multi_query($l){return$this->query($l);}function
store_result(){return($this->_result->columnCount()?$this->_result:true);}function
next_result(){return$this->_result->nextRowset();}function
result($e,$c=0){if(!$e){return
false;}$a=$e->fetch();return$a[$c];}function
quote($ra){return
parent::quote($ra);}}class
Min_PDOStatement
extends
PDOStatement{var$_offset=0,$num_rows;function
fetch_assoc(){return$this->fetch(2);}function
fetch_row(){return$this->fetch(3);}function
fetch_field(){$a=(object)$this->getColumnMeta($this->_offset++);$a->orgtable=$a->table;$a->orgname=$a->name;$a->charsetnr=(in_array("blob",$a->flags)?63:0);return$a;}function
free(){}}}if(extension_loaded("mysqli")){class
Min_DB
extends
MySQLi{var$extension="MySQLi";function
Min_DB(){parent::init();}function
connect($ba,$y,$ga){list($Dd,$yb)=explode(":",$ba,2);return@$this->real_connect((strlen($ba)?$Dd:ini_get("mysqli.default_host")),(strlen("$ba$y")?$y:ini_get("mysqli.default_user")),(strlen("$ba$y$ga")?$ga:ini_get("mysqli.default_pw")),null,(is_numeric($yb)?$yb:ini_get("mysqli.default_port")),(!is_numeric($yb)?$yb:null));}function
result($e,$c=0){if(!$e){return
false;}$a=$e->fetch_array();return$a[$c];}function
quote($ra){return"'".$this->escape_string($ra)."'";}}}elseif(extension_loaded("mysql")){class
Min_DB{var$extension="MySQL",$_link,$_result,$server_info,$affected_rows,$error;function
connect($ba,$y,$ga){$this->_link=@mysql_connect((strlen($ba)?$ba:ini_get("mysql.default_host")),(strlen("$ba$y")?$y:ini_get("mysql.default_user")),(strlen("$ba$y$ga")?$ga:ini_get("mysql.default_password")),true,131072);if($this->_link){$this->server_info=mysql_get_server_info($this->_link);}else{$this->error=mysql_error();}return(bool)$this->_link;}function
quote($ra){return"'".mysql_real_escape_string($ra,$this->_link)."'";}function
select_db($Sb){return
mysql_select_db($Sb,$this->_link);}function
query($l){$e=@mysql_query($l,$this->_link);if(!$e){$this->error=mysql_error($this->_link);return
false;}elseif($e===true){$this->affected_rows=mysql_affected_rows($this->_link);return
true;}return
new
Min_Result($e);}function
multi_query($l){return$this->_result=$this->query($l);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($e,$c=0){if(!$e){return
false;}return
mysql_result($e->_result,0,$c);}}class
Min_Result{var$_result,$_offset=0,$num_rows;function
Min_Result($e){$this->_result=$e;$this->num_rows=mysql_num_rows($e);}function
fetch_assoc(){return
mysql_fetch_assoc($this->_result);}function
fetch_row(){return
mysql_fetch_row($this->_result);}function
fetch_field(){$a=mysql_fetch_field($this->_result,$this->_offset++);$a->orgtable=$a->table;$a->orgname=$a->name;$a->charsetnr=($a->blob?63:0);return$a;}function
free(){return
mysql_free_result($this->_result);}}}elseif(extension_loaded("pdo_mysql")){class
Min_DB
extends
Min_PDO{var$extension="PDO_MySQL";function
connect($ba,$y,$ga){$this->dsn("mysql:host=".str_replace(":",";unix_socket=",preg_replace('~:([0-9])~',';port=\\1',$ba)),$y,$ga);$this->server_info=$this->result($this->query("SELECT VERSION()"));return
true;}}}else{page_header(lang(32),lang(33,'MySQLi, MySQL, PDO_MySQL'),null);page_footer("auth");exit;}function
connect(){global$p;$d=new
Min_DB;$Wb=$p->credentials();if($d->connect($Wb[0],$Wb[1],$Wb[2])){$d->query("SET SQL_QUOTE_SHOW_CREATE=1");$d->query("SET NAMES utf8");return$d;}return$d->error;}function
get_databases($Cd=true){$i=&$_SESSION["databases"][$_GET["server"]];if(!isset($i)){$i=get_vals("SHOW DATABASES");if($Cd){ob_flush();flush();}}return$i;}function
table_status($h=""){global$d;$i=array();$e=$d->query("SHOW TABLE STATUS".(strlen($h)?" LIKE ".$d->quote(addcslashes($h,"%_")):""));while($a=$e->fetch_assoc()){$i[$a["Name"]]=$a;}$e->free();return(strlen($h)?$i[$h]:$i);}function
table_status_referencable(){$i=array();foreach(table_status()as$h=>$a){if($a["Engine"]=="InnoDB"){$i[$h]=$a;}}return$i;}function
fields($o){global$d;$i=array();$e=$d->query("SHOW FULL COLUMNS FROM ".idf_escape($o));if($e){while($a=$e->fetch_assoc()){preg_match('~^([^( ]+)(?:\\((.+)\\))?( unsigned)?( zerofill)?$~',$a["Type"],$j);$i[$a["Field"]]=array("field"=>$a["Field"],"full_type"=>$a["Type"],"type"=>$j[1],"length"=>$j[2],"unsigned"=>ltrim($j[3].$j[4]),"default"=>(strlen($a["Default"])||ereg("char",$j[1])?$a["Default"]:null),"null"=>($a["Null"]=="YES"),"auto_increment"=>($a["Extra"]=="auto_increment"),"on_update"=>(preg_match('~^on update (.+)~',$a["Extra"],$j)?$j[1]:""),"collation"=>$a["Collation"],"privileges"=>array_flip(explode(",",$a["Privileges"])),"comment"=>$a["Comment"],"primary"=>($a["Key"]=="PRI"),);}$e->free();}return$i;}function
indexes($o,$oa=null){global$d;if(!is_object($oa)){$oa=$d;}$i=array();$e=$oa->query("SHOW INDEX FROM ".idf_escape($o));if($e){while($a=$e->fetch_assoc()){$i[$a["Key_name"]]["type"]=($a["Key_name"]=="PRIMARY"?"PRIMARY":($a["Index_type"]=="FULLTEXT"?"FULLTEXT":($a["Non_unique"]?"INDEX":"UNIQUE")));$i[$a["Key_name"]]["columns"][$a["Seq_in_index"]]=$a["Column_name"];$i[$a["Key_name"]]["lengths"][$a["Seq_in_index"]]=$a["Sub_part"];}$e->free();}return$i;}function
foreign_keys($o){global$d,$Da;static$W='(?:[^`]+|``)+';$i=array();$e=$d->query("SHOW CREATE TABLE ".idf_escape($o));if($e){$Bd=$d->result($e,1);$e->free();preg_match_all("~CONSTRAINT `($W)` FOREIGN KEY \\(((?:`$W`,? ?)+)\\) REFERENCES `($W)`(?:\\.`($W)`)? \\(((?:`$W`,? ?)+)\\)(?: ON DELETE (".implode("|",$Da)."))?(?: ON UPDATE (".implode("|",$Da)."))?~",$Bd,$G,PREG_SET_ORDER);foreach($G
as$j){preg_match_all("~`($W)`~",$j[2],$N);preg_match_all("~`($W)`~",$j[5],$ua);$i[$j[1]]=array("db"=>idf_unescape(strlen($j[4])?$j[3]:$j[4]),"table"=>idf_unescape(strlen($j[4])?$j[4]:$j[3]),"source"=>array_map('idf_unescape',$N[1]),"target"=>array_map('idf_unescape',$ua[1]),"on_delete"=>$j[6],"on_update"=>$j[7],);}}return$i;}function
view($h){global$d;return
array("select"=>preg_replace('~^(?:[^`]+|`[^`]*`)* AS ~U','',$d->result($d->query("SHOW CREATE VIEW ".idf_escape($h)),1)));}function
collations(){global$d;$i=array();$e=$d->query("SHOW COLLATION");while($a=$e->fetch_assoc()){$i[$a["Charset"]][]=$a["Collation"];}$e->free();ksort($i);foreach($i
as$f=>$b){sort($i[$f]);}return$i;}function
escape_string($b){global$d;return
substr($d->quote($b),1,-1);}function
table_comment(&$a){if($a["Engine"]=="InnoDB"){$a["Comment"]=preg_replace('~(?:(.+); )?InnoDB free: .*~','\\1',$a["Comment"]);}}function
information_schema($B){global$d;return($d->server_info>=5&&$B=="information_schema");}$ma=array();$cc=array();foreach(array(lang(34)=>array("tinyint"=>3,"smallint"=>5,"mediumint"=>8,"int"=>10,"bigint"=>20,"float"=>12,"double"=>21,"decimal"=>66),lang(35)=>array("date"=>10,"datetime"=>19,"timestamp"=>19,"time"=>10,"year"=>4),lang(36)=>array("char"=>255,"varchar"=>65535,"tinytext"=>255,"text"=>65535,"mediumtext"=>16777215,"longtext"=>4294967295),lang(37)=>array("binary"=>255,"varbinary"=>65535,"tinyblob"=>255,"blob"=>65535,"mediumblob"=>16777215,"longblob"=>4294967295),lang(38)=>array("enum"=>65535,"set"=>64),)as$f=>$b){$ma+=$b;$cc[$f]=array_keys($b);}$Ua=array("unsigned","zerofill","unsigned zerofill");$Ga=array("server","username","password");$Za=session_name();if(ini_get("session.use_trans_sid")&&isset($_POST[$Za])){$Ga[]=$Za;}if(isset($_POST["server"])){if(isset($_COOKIE[$Za])||isset($_POST[$Za])){session_regenerate_id();$_SESSION["usernames"][$_POST["server"]]=$_POST["username"];$_SESSION["passwords"][$_POST["server"]]=$_POST["password"];$_SESSION["tokens"][$_POST["server"]]=rand(1,1e6);if(count($_POST)==count($Ga)){$_=((string)$_GET["server"]===$_POST["server"]?remove_from_uri():preg_replace('~^[^?]*/([^?]*).*~','\\1',$_SERVER["REQUEST_URI"]).(strlen($_POST["server"])?'?server='.urlencode($_POST["server"]):''));if(!isset($_COOKIE[$Za])){$_.=(strpos($_,"?")===false?"?":"&").SID;}header("Location: ".(strlen($_)?$_:"."));exit;}if($_POST["token"]){$_POST["token"]=$_SESSION["tokens"][$_POST["server"]];}}$_GET["server"]=$_POST["server"];}elseif(isset($_POST["logout"])){if($_POST["token"]!=$_SESSION["tokens"][$_GET["server"]]){page_header(lang(27),lang(39));page_footer("db");exit;}else{foreach(array("usernames","passwords","databases","tokens","history")as$b){unset($_SESSION[$b][$_GET["server"]]);}redirect(substr(ME,0,-1),lang(40));}}function
auth_error($Hc=null){global$Ga,$d,$p;$y=$_SESSION["usernames"][$_GET["server"]];unset($_SESSION["usernames"][$_GET["server"]]);page_header(lang(41),(isset($y)?h($Hc?$Hc->getMessage():(is_string($d)?$d:lang(42))):(isset($_POST["server"])?lang(43):($_POST?lang(44):""))),null);echo"<form action='' method='post'>\n";$p->loginForm($y);echo"<p>\n";hidden_fields($_POST,$Ga);foreach($_FILES
as$f=>$b){echo'<input type="hidden" name="files['.h($f).']" value="'.($b["error"]?$b["error"]:base64_encode(file_get_contents($b["tmp_name"]))).'">';}echo"<input type='submit' value='".lang(41)."'>\n</form>\n";page_footer("auth");}$y=&$_SESSION["usernames"][$_GET["server"]];if(!isset($y)){$y=$_GET["username"];}$d=(isset($y)?connect():'');if(is_string($d)||!$p->login($y,$_SESSION["passwords"][$_GET["server"]])){auth_error();exit;}unset($y);function
connect_error(){global$d,$Wa;if(strlen($_GET["db"])){page_header(lang(45).": ".h($_GET["db"]),lang(46),false);}else{page_header(lang(47),"",null);foreach(array('database'=>lang(48),'privileges'=>lang(49),'processlist'=>lang(50),'variables'=>lang(51),)as$f=>$b){echo"<p><a href='".h(ME)."$f='>$b</a>\n";}echo"<p>".lang(52,"<b".($d->server_info<4.1?" class='binary'":"").">$d->server_info</b>","<b>$d->extension</b>")."\n"."<p>".lang(53,"<b>".h($d->result($d->query("SELECT USER()")))."</b>")."\n";}page_footer("db");}if(!(strlen($_GET["db"])?$d->select_db($_GET["db"]):isset($_GET["sql"])||isset($_GET["dump"])||isset($_GET["database"])||isset($_GET["processlist"])||isset($_GET["privileges"])||isset($_GET["user"])||isset($_GET["variables"]))){if(strlen($_GET["db"])){unset($_SESSION["databases"][$_GET["server"]]);}connect_error();exit;}function
referencable_primary($Fd){$i=array();foreach(table_status_referencable()as$da=>$o){if($da!=$Fd){foreach(fields($da)as$c){if($c["primary"]){if($i[$da]){unset($i[$da]);break;}$i[$da]=$c;}}}}return$i;}function
edit_type($f,$c,$Q,$A=array()){global$cc,$Ua,$Ia;echo'<td><select name="'.$f;echo'[type]" onchange="editing_type_change(this);">'.optionlist($cc+($A?array(lang(54)=>$A):array()),$c["type"]);echo'</select>
<td><input name="'.$f;echo'[length]" value="'.h($c["length"]);echo'" size="3">
<td>'."<select name='$f"."[collation]'".(ereg('(char|text|enum|set)$',$c["type"])?"":" class='hidden'").'><option value="">('.lang(55).')'.optionlist($Q,$c["collation"]).'</select>';echo($Ua?" <select name='$f"."[unsigned]'".(!$c["type"]||ereg('(int|float|double|decimal)$',$c["type"])?"":" class='hidden'").'><option>'.optionlist($Ua,$c["unsigned"]).'</select>':'');}function
process_length($C){global$ta;return(preg_match("~^\\s*(?:$ta)(?:\\s*,\\s*(?:$ta))*\\s*\$~",$C)&&preg_match_all("~$ta~",$C,$G)?implode(",",$G[0]):preg_replace('~[^0-9,+-]~','',$C));}function
process_type($c,$Qa="COLLATE"){global$d,$ta,$Ua;return" $c[type]".($c["length"]&&!ereg('^date|time$',$c["type"])?"(".process_length($c["length"]).")":"").(ereg('int|float|double|decimal',$c["type"])&&in_array($c["unsigned"],$Ua)?" $c[unsigned]":"").(ereg('char|text|enum|set',$c["type"])&&$c["collation"]?" $Qa ".$d->quote($c["collation"]):"");}function
type_class($K){if(ereg('char|text',$K)){return" class='char'";}elseif(ereg('date|time|year',$K)){return" class='date'";}elseif(ereg('binary|blob',$K)){return" class='binary'";}elseif(ereg('enum|set',$K)){return" class='enum'";}}function
edit_fields($k,$Q,$K="TABLE",$ad=0,$A=array()){global$Ia;$Pa=false;foreach($k
as$c){if(strlen($c["comment"])){$Pa=true;}}echo'<thead><tr>
';if($K=="PROCEDURE"){echo'<td>'.lang(56);}echo'<th>'.($K=="TABLE"?lang(57):lang(58));echo'<td>'.lang(59);echo'<td>'.lang(60);echo'<td>'.lang(61);if($K=="TABLE"){echo'<td>'.lang(62);echo'<td><input type="radio" name="auto_increment_col" value="">'.lang(63);echo'<td'.($Pa?"":" class='hidden'");echo'>'.lang(64);}echo'<td>'."<input type='image' name='add[0]' src='".h(preg_replace("~\\?.*~","",$_SERVER["REQUEST_URI"]))."?file=plus.gif&amp;version=2.0.0' alt='+' title='".lang(65)."'>";echo'<script type="text/javascript">row_count = '.count($k);echo';</script>
</thead>
';foreach($k
as$g=>$c){$g++;$Oc=(isset($_POST["add"][$g-1])||(isset($c["field"])&&!$_POST["drop_col"][$g]));echo'<tr'.($Oc?"":" style='display: none;'");echo'>
';if($K=="PROCEDURE"){echo'<td><select name="fields['.$g;echo'][inout]">'.optionlist($Ia,$c["inout"]);echo'</select>';}echo'<th>';if($Oc){echo'<input name="fields['.$g;echo'][field]" value="'.h($c["field"]);echo'" onchange="'.(strlen($c["field"])||count($k)>1?"":"editing_add_row(this, $ad); ");echo'editing_name_change(this);" maxlength="64">';}echo'<input type="hidden" name="fields['.$g;echo'][orig]" value="'.h($c[($_POST?"orig":"field")]);echo'">
';edit_type("fields[$g]",$c,$Q,$A);if($K=="TABLE"){echo'<td><input type="checkbox" name="fields['.$g;echo'][null]" value="1"';if($c["null"]){echo' checked';}echo'>
<td><input type="radio" name="auto_increment_col" value="'.$g;echo'"';if($c["auto_increment"]){echo' checked';}echo'>
<td'.($Pa?"":" class='hidden'");echo'><input name="fields['.$g;echo'][comment]" value="'.h($c["comment"]);echo'" maxlength="255">
';}echo"<td class='nowrap'><input type='image' name='add[$g]' src='".h(preg_replace("~\\?.*~","",$_SERVER["REQUEST_URI"]))."?file=plus.gif&amp;version=2.0.0' alt='+' title='".lang(65)."' onclick='var x = editing_add_row(this, $ad); if (x) { x.focus(); x.onchange = function () { }; } return !x;'>"."&nbsp;<input type='image' name='drop_col[$g]' src='".h(preg_replace("~\\?.*~","",$_SERVER["REQUEST_URI"]))."?file=cross.gif&amp;version=2.0.0' alt='x' title='".lang(66)."' onclick='return !editing_remove_row(this);'>";echo"&nbsp;<input type='image' name='up[$g]' src='".h(preg_replace("~\\?.*~","",$_SERVER["REQUEST_URI"]))."?file=up.gif&amp;version=2.0.0' alt='^' title='".lang(67)."'>"."&nbsp;<input type='image' name='down[$g]' src='".h(preg_replace("~\\?.*~","",$_SERVER["REQUEST_URI"]))."?file=down.gif&amp;version=2.0.0' alt='v' title='".lang(68)."'>";echo"\n\n";}return$Pa;}function
process_fields(&$k){ksort($k);$na=0;if($_POST["up"]){$db=0;foreach($k
as$f=>$c){if(key($_POST["up"])==$f){unset($k[$f]);array_splice($k,$db,0,array($c));break;}if(isset($c["field"])){$db=$na;}$na++;}}if($_POST["down"]){$Qb=false;foreach($k
as$f=>$c){if(isset($c["field"])&&$Qb){unset($k[key($_POST["down"])]);array_splice($k,$na,0,array($Qb));break;}if(key($_POST["down"])==$f){$Qb=$c;}$na++;}}$k=array_values($k);if($_POST["add"]){array_splice($k,key($_POST["add"]),0,array(array()));}}function
normalize_enum($j){return"'".str_replace("'","''",addcslashes(stripcslashes(str_replace($j[0]{0}.$j[0]{0},$j[0]{0},substr($j[0],1,-1))),'\\'))."'";}function
routine($h,$K){global$d,$ta,$Ia;$Nc=array("bit"=>"tinyint","bool"=>"tinyint","boolean"=>"tinyint","integer"=>"int","double precision"=>"float","real"=>"float","dec"=>"decimal","numeric"=>"decimal","fixed"=>"decimal","national char"=>"char","national varchar"=>"varchar");$Zc="([a-z]+)(?:\\s*\\(((?:[^'\")]*|$ta)+)\\))?\\s*(zerofill\\s*)?(unsigned(?:\\s+zerofill)?)?(?:\\s*(?:CHARSET|CHARACTER\\s+SET)\\s*['\"]?([^'\"\\s]+)['\"]?)?";$W="\\s*(".($K=="FUNCTION"?"":implode("|",$Ia)).")?\\s*(?:`((?:[^`]+|``)*)`\\s*|\\b(\\S+)\\s+)$Zc";$M=$d->result($d->query("SHOW CREATE $K ".idf_escape($h)),2);preg_match("~\\(((?:$W\\s*,?)*)\\)".($K=="FUNCTION"?"\\s*RETURNS\\s+$Zc":"")."\\s*(.*)~is",$M,$j);$k=array();preg_match_all("~$W\\s*,?~is",$j[1],$G,PREG_SET_ORDER);foreach($G
as$O){$h=str_replace("``","`",$O[2]).$O[3];$fc=strtolower($O[4]);$k[$h]=array("field"=>$h,"type"=>(isset($Nc[$fc])?$Nc[$fc]:$fc),"length"=>preg_replace_callback("~$ta~s",'normalize_enum',$O[5]),"unsigned"=>strtolower(preg_replace('~\\s+~',' ',trim("$O[7] $O[6]"))),"inout"=>strtoupper($O[1]),"collation"=>strtolower($O[8]),);}if($K!="FUNCTION"){return
array("fields"=>$k,"definition"=>$j[10]);}$Gd=array("type"=>$j[10],"length"=>$j[11],"unsigned"=>$j[13],"collation"=>$j[14]);return
array("fields"=>$k,"returns"=>$Gd,"definition"=>$j[15]);}function
dump_table($o,$z,$za=false){global$d;if($_POST["format"]=="csv"){echo"\xef\xbb\xbf";if($z){dump_csv(array_keys(fields($o)));}}elseif($z){$e=$d->query("SHOW CREATE TABLE ".idf_escape($o));if($e){if($z=="DROP+CREATE"){echo"DROP ".($za?"VIEW":"TABLE")." IF EXISTS ".idf_escape($o).";\n";}$M=$d->result($e,1);$e->free();echo($z!="CREATE+ALTER"?$M:($za?substr_replace($M," OR REPLACE",6,0):substr_replace($M," IF NOT EXISTS",12,0))).";\n\n";}if($z=="CREATE+ALTER"&&!$za){$l="SELECT COLUMN_NAME, COLUMN_DEFAULT, IS_NULLABLE, COLLATION_NAME, COLUMN_TYPE, EXTRA, COLUMN_COMMENT FROM information_schema.COLUMNS WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = ".$d->quote($o)." ORDER BY ORDINAL_POSITION";echo'DELIMITER ;;
CREATE PROCEDURE adminer_alter () BEGIN
	DECLARE _column_name, _collation_name, _column_type, after varchar(64) DEFAULT \'\';
	DECLARE _column_default longtext;
	DECLARE _is_nullable char(3);
	DECLARE _extra varchar(20);
	DECLARE _column_comment varchar(255);
	DECLARE done, set_after bool DEFAULT 0;
	DECLARE add_columns text DEFAULT \'';$k=array();$e=$d->query($l);$Aa="";while($a=$e->fetch_assoc()){$a["default"]=(isset($a["COLUMN_DEFAULT"])?$d->quote($a["COLUMN_DEFAULT"]):"NULL");$a["after"]=$d->quote($Aa);$a["alter"]=escape_string(idf_escape($a["COLUMN_NAME"])." $a[COLUMN_TYPE]".($a["COLLATION_NAME"]?" COLLATE $a[COLLATION_NAME]":"").(isset($a["COLUMN_DEFAULT"])?" DEFAULT $a[default]":"").($a["IS_NULLABLE"]=="YES"?"":" NOT NULL").($a["EXTRA"]?" $a[EXTRA]":"").($a["COLUMN_COMMENT"]?" COMMENT ".$d->quote($a["COLUMN_COMMENT"]):"").($Aa?" AFTER ".idf_escape($Aa):" FIRST"));echo", ADD $a[alter]";$k[]=$a;$Aa=$a["COLUMN_NAME"];}$e->free();echo'\';
	DECLARE columns CURSOR FOR '.$l;echo';
	DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = 1;
	SET @alter_table = \'\';
	OPEN columns;
	REPEAT
		FETCH columns INTO _column_name, _column_default, _is_nullable, _collation_name, _column_type, _extra, _column_comment;
		IF NOT done THEN
			SET set_after = 1;
			CASE _column_name';foreach($k
as$a){echo"
				WHEN ".$d->quote($a["COLUMN_NAME"])." THEN
					SET add_columns = REPLACE(add_columns, ', ADD $a[alter]', '');
					IF NOT (_column_default <=> $a[default]) OR _is_nullable != '$a[IS_NULLABLE]' OR _collation_name != '$a[COLLATION_NAME]' OR _column_type != '$a[COLUMN_TYPE]' OR _extra != '$a[EXTRA]' OR _column_comment != ".$d->quote($a["COLUMN_COMMENT"])." OR after != $a[after] THEN
						SET @alter_table = CONCAT(@alter_table, ', MODIFY $a[alter]');
					END IF;";}?>

				ELSE
					SET @alter_table = CONCAT(@alter_table, ', DROP ', _column_name);
					SET set_after = 0;
			END CASE;
			IF set_after THEN
				SET after = _column_name;
			END IF;
		END IF;
	UNTIL done END REPEAT;
	CLOSE columns;
	IF @alter_table != '' OR add_columns != '' THEN
		SET @alter_table = CONCAT('ALTER TABLE <?php echo
idf_escape($o);echo'\', SUBSTR(CONCAT(add_columns, @alter_table), 2));
		PREPARE alter_command FROM @alter_table;
		EXECUTE alter_command;
		DROP PREPARE alter_command;
	END IF;
END;;
DELIMITER ;
CALL adminer_alter;
DROP PROCEDURE adminer_alter;

';}}}function
dump_data($o,$z,$t=""){global$d,$nd;if($z){if($_POST["format"]!="csv"&&$z=="TRUNCATE+INSERT"){echo"TRUNCATE ".idf_escape($o).";\n";}$e=$d->query(($t?$t:"SELECT * FROM ".idf_escape($o)));if($e){$k=fields($o);$C=0;while($a=$e->fetch_assoc()){if($_POST["format"]=="csv"){dump_csv($a);}else{$bb="INSERT INTO ".idf_escape($o)." (".implode(", ",array_map('idf_escape',array_keys($a))).") VALUES";$Fb=array();foreach($a
as$f=>$b){$Fb[$f]=(isset($b)?(ereg('int|float|double|decimal',$k[$f]["type"])?$b:$d->quote($b)):"NULL");}$U=implode(",\t",$Fb);if($z=="INSERT+UPDATE"){$u=array();foreach($Fb
as$f=>$b){$u[]=idf_escape($f)." = $b";}echo"$bb ($U) ON DUPLICATE KEY UPDATE ".implode(", ",$u).";\n";}else{$U="\n($U)";if(!$C){echo$bb.$U;$C=strlen($bb)+strlen($U);}else{$C+=2+strlen($U);if($C<$nd){echo", $U";}else{echo";\n$bb$U";$C=strlen($bb)+strlen($U);}}}}}if($_POST["format"]!="csv"&&$z!="INSERT+UPDATE"&&$e->num_rows){echo";\n";}$e->free();}}}function
dump_headers($od,$Id=false){$Gb=(strlen($od)?friendly_url($od):"dump");$_a=($_POST["format"]=="sql"?"sql":($Id?"tar":"csv"));header("Content-Type: ".($_a=="tar"?"application/x-tar":($_a=="sql"||$_POST["output"]!="file"?"text/plain":"text/csv"))."; charset=utf-8");if($_POST["output"]=="file"){header("Content-Disposition: attachment; filename=$Gb.$_a");}return$_a;}$pd="<select name='output'><option value='text'>".lang(69)."<option value='file'>".lang(70)."</select>";$qd="<select name='format'><option value='sql'>".lang(71)."<option value='csv'>".lang(72)."</select>";$nd=1048576;$sa=" onclick=\"return confirm('".lang(73)."');\"";$I=$_SESSION["tokens"][$_GET["server"]];$m=($_POST?($_POST["token"]==$I?"":lang(39)):($_SERVER["REQUEST_METHOD"]!="POST"?"":lang(74)));$ta='\'(?:\'\'|[^\'\\\\]+|\\\\.)*\'|"(?:""|[^"\\\\]+|\\\\.)*"';$Ia=array("IN","OUT","INOUT");if(isset($_GET["download"])){header("Content-Type: application/octet-stream");header("Content-Disposition: attachment; filename=".friendly_url("$_GET[download]-".implode("_",$_GET["where"])).".".friendly_url($_GET["field"]));echo$d->result($d->query("SELECT ".idf_escape($_GET["field"])." FROM ".idf_escape($_GET["download"])." WHERE ".where($_GET)." LIMIT 1"));exit;}elseif(isset($_GET["table"])){$e=$d->query("SHOW COLUMNS FROM ".idf_escape($_GET["table"]));if(!$e){$m=h($d->error);}$ya=($e?table_status($_GET["table"]):array());$za=!isset($ya["Rows"]);page_header(($e&&$za?lang(75):lang(76)).": ".h($_GET["table"]),$m);if($e){$ld=true;echo"<table cellspacing='0'>\n";while($a=$e->fetch_assoc()){if(!$a["auto_increment"]){$ld=false;}echo"<tr><th>".h($a["Field"])."<td>".h($a["Type"]).($a["Null"]=="YES"?" <i>NULL</i>":"")."\n";}echo"</table>\n";$e->free();echo"<p>";if($za){echo'<a href="'.h(ME).'view='.urlencode($_GET["table"]).'">'.lang(77).'</a>';}else{echo'<a href="'.h(ME).'create='.urlencode($_GET["table"]).'">'.lang(78).'</a>'.($ld?'':' <a href="'.h(ME).'default='.urlencode($_GET["table"]).'">'.lang(79).'</a>');}echo' <a href="'.h(ME).'select='.urlencode($_GET["table"]).'">'.lang(80).'</a>'.' <a href="'.h(ME).'edit='.urlencode($_GET["table"]).'">'.lang(81).'</a>';if(!$za){echo"<h3>".lang(82)."</h3>\n";$s=indexes($_GET["table"]);if($s){echo"<table cellspacing='0'>\n";foreach($s
as$q){ksort($q["columns"]);$Ya=array();foreach($q["columns"]as$f=>$b){$Ya[]="<i>".h($b)."</i>".($q["lengths"][$f]?"(".$q["lengths"][$f].")":"");}echo"<tr><th>$q[type]<td>".implode(", ",$Ya)."\n";}echo"</table>\n";}echo'<p><a href="'.h(ME).'indexes='.urlencode($_GET["table"]).'">'.lang(83)."</a>\n";if($ya["Engine"]=="InnoDB"){echo"<h3>".lang(54)."</h3>\n";$A=foreign_keys($_GET["table"]);if($A){echo"<table cellspacing='0'>\n";foreach($A
as$h=>$D){$v=(strlen($D["db"])?"<strong>".h($D["db"])."</strong>.":"").h($D["table"]);echo"<tr>"."<th><i>".implode("</i>, <i>",array_map('h',$D["source"]))."</i>";echo"<td><a href='".h(strlen($D["db"])?preg_replace('~db=[^&]*~',"db=".urlencode($D["db"]),ME):ME)."table=".urlencode($D["table"])."'>$v</a>"."(<em>".implode("</em>, <em>",array_map('h',$D["target"]))."</em>)";echo"<td>".(!strlen($D["db"])?'<a href="'.h(ME.'foreign='.urlencode($_GET["table"]).'&name='.urlencode($h)).'">'.lang(84).'</a>':'&nbsp;');}echo"</table>\n";}echo'<p><a href="'.h(ME).'foreign='.urlencode($_GET["table"]).'">'.lang(85)."</a>\n";}if($d->server_info>=5){echo"<h3>".lang(86)."</h3>\n";$e=$d->query("SHOW TRIGGERS LIKE ".$d->quote(addcslashes($_GET["table"],"%_")));if($e->num_rows){echo"<table cellspacing='0'>\n";while($a=$e->fetch_assoc()){echo"<tr valign='top'><td>$a[Timing]<td>$a[Event]<th>".h($a["Trigger"])."<td><a href='".h(ME.'trigger='.urlencode($_GET["table"]).'&name='.urlencode($a["Trigger"]))."'>".lang(84)."</a>\n";}echo"</table>\n";}$e->free();echo'<p><a href="'.h(ME).'trigger='.urlencode($_GET["table"]).'">'.lang(87)."</a>\n";}}}}elseif(isset($_GET["schema"])){page_header(lang(88),"",array(),$_GET["db"]);$pa=array();$kd=array();preg_match_all('~([^:]+):([-0-9.]+)x([-0-9.]+)(_|$)~',$_COOKIE["adminer_schema"],$G,PREG_SET_ORDER);foreach($G
as$g=>$j){$pa[$j[1]]=array($j[2],$j[3]);$kd[]="\n\t'".addcslashes($j[1],"\r\n'\\")."': [ $j[2], $j[3] ]";}$Na=0;$ed=-1;$ka=array();$dd=array();$cd=array();foreach(table_status()as$a){if(!isset($a["Engine"])){continue;}$fb=0;$ka[$a["Name"]]["fields"]=array();foreach(fields($a["Name"])as$h=>$c){$fb+=1.25;$c["pos"]=$fb;$ka[$a["Name"]]["fields"][$h]=$c;}$ka[$a["Name"]]["pos"]=($pa[$a["Name"]]?$pa[$a["Name"]]:array($Na,0));if($a["Engine"]=="InnoDB"){foreach(foreign_keys($a["Name"])as$b){if(!$b["db"]){$L=$ed;if($pa[$a["Name"]][1]||$pa[$a["Name"]][1]){$L=min($pa[$a["Name"]][1],$pa[$b["table"]][1])-1;}else{$ed-=.1;}while($cd[(string)$L]){$L-=.0001;}$ka[$a["Name"]]["references"][$b["table"]][(string)$L]=array($b["source"],$b["target"]);$dd[$b["table"]][$a["Name"]][(string)$L]=$b["target"];$cd[(string)$L]=true;}}}$Na=max($Na,$ka[$a["Name"]]["pos"][0]+2.5+$fb);}echo'<div id="schema" style="height: '.$Na;echo'em;">
<script type="text/javascript">
table_pos = {'.implode(",",$kd)."\n";echo'};
em = document.getElementById(\'schema\').offsetHeight / '.$Na;echo';
document.onmousemove = schema_mousemove;
document.onmouseup = schema_mouseup;
</script>
';foreach($ka
as$h=>$o){echo"<div class='table' style='top: ".$o["pos"][0]."em; left: ".$o["pos"][1]."em;' onmousedown='schema_mousedown(this, event);'>".'<a href="'.h(ME).'table='.urlencode($h).'"><strong>'.h($h)."</strong></a><br>\n";foreach($o["fields"]as$c){$b='<span'.type_class($c["type"]).' title="'.h($c["full_type"].($c["null"]?" ".lang(62):'')).'">'.h($c["field"]).'</span>';echo($c["primary"]?"<em>$b</em>":$b)."<br>\n";}foreach((array)$o["references"]as$Ma=>$kb){foreach($kb
as$L=>$_b){$mb=$L-$pa[$h][1];$g=0;foreach($_b[0]as$N){echo"<div class='references' title='".h($Ma)."' id='refs$L-".($g++)."' style='left: $mb"."em; top: ".$o["fields"][$N]["pos"]."em; padding-top: .5em;'><div style='border-top: 1px solid Gray; width: ".(-$mb)."em;'></div></div>\n";}}}foreach((array)$dd[$h]as$Ma=>$kb){foreach($kb
as$L=>$r){$mb=$L-$pa[$h][1];$g=0;foreach($r
as$ua){echo"<div class='references' title='".h($Ma)."' id='refd$L-".($g++)."' style='left: $mb"."em; top: ".$o["fields"][$ua]["pos"]."em; height: 1.25em; background: url(".h(preg_replace("~\\?.*~","",$_SERVER["REQUEST_URI"]))."?file=arrow.gif&amp;version=2.0.0) no-repeat right center;'><div style='height: .5em; border-bottom: 1px solid Gray; width: ".(-$mb)."em;'></div></div>\n";}}}echo"</div>\n";}foreach($ka
as$h=>$o){foreach((array)$o["references"]as$Ma=>$kb){foreach($kb
as$L=>$_b){$Ab=$Na;$Nb=-10;foreach($_b[0]as$f=>$N){$bd=$o["pos"][0]+$o["fields"][$N]["pos"];$fd=$ka[$Ma]["pos"][0]+$ka[$Ma]["fields"][$_b[1][$f]]["pos"];$Ab=min($Ab,$bd,$fd);$Nb=max($Nb,$bd,$fd);}echo"<div class='references' id='refl$L' style='left: $L"."em; top: $Ab"."em; padding: .5em 0;'><div style='border-right: 1px solid Gray; margin-top: 1px; height: ".($Nb-$Ab)."em;'></div></div>\n";}}}echo'</div>
';}elseif(isset($_GET["dump"])){function
tar_file($Gb,$Mb){$i=pack("a100a8a8a8a12a12",$Gb,644,0,0,decoct(strlen($Mb)),decoct(time()));$gd=8*32;for($g=0;$g<strlen($i);$g++){$gd+=ord($i{$g});}$i.=sprintf("%06o",$gd)."\0 ";return$i.str_repeat("\0",512-strlen($i)).$Mb.str_repeat("\0",511-(strlen($Mb)+511)%
512);}function
dump_triggers($o,$z){global$d;if($_POST["format"]!="csv"&&$z&&$d->server_info>=5){$e=$d->query("SHOW TRIGGERS LIKE ".$d->quote(addcslashes($o,"%_")));if($e->num_rows){echo"\nDELIMITER ;;\n";while($a=$e->fetch_assoc()){echo"\n".($z=='CREATE+ALTER'?"DROP TRIGGER IF EXISTS ".idf_escape($a["Trigger"]).";;\n":"")."CREATE TRIGGER ".idf_escape($a["Trigger"])." $a[Timing] $a[Event] ON ".idf_escape($a["Table"])." FOR EACH ROW\n$a[Statement];;\n";}echo"\nDELIMITER ;\n";}$e->free();}}if($_POST){$_a=dump_headers((strlen($_GET["dump"])?$_GET["dump"]:$_GET["db"]),(!strlen($_GET["db"])||count((array)$_POST["tables"]+(array)$_POST["data"])>1));if($_POST["format"]!="csv"){echo"SET NAMES utf8;\n"."SET foreign_key_checks = 0;\n";echo"SET time_zone = ".$d->quote($d->result($d->query("SELECT @@time_zone"))).";\n"."\n";}$z=$_POST["db_style"];foreach((strlen($_GET["db"])?array($_GET["db"]):(array)$_POST["databases"])as$B){if($d->select_db($B)){if($_POST["format"]!="csv"&&ereg('CREATE',$z)&&($e=$d->query("SHOW CREATE DATABASE ".idf_escape($B)))){if($z=="DROP+CREATE"){echo"DROP DATABASE IF EXISTS ".idf_escape($B).";\n";}$M=$d->result($e,1);echo($z=="CREATE+ALTER"?preg_replace('~^CREATE DATABASE ~','\\0IF NOT EXISTS ',$M):$M).";\n";$e->free();}if($z&&$_POST["format"]!="csv"){echo"USE ".idf_escape($B).";\n\n";$ja="";if($d->server_info>=5){foreach(array("FUNCTION","PROCEDURE")as$T){$e=$d->query("SHOW $T STATUS WHERE Db = ".$d->quote($B));while($a=$e->fetch_assoc()){$ja.=($z!='DROP+CREATE'?"DROP $T IF EXISTS ".idf_escape($a["Name"]).";;\n":"").$d->result($d->query("SHOW CREATE $T ".idf_escape($a["Name"])),2).";;\n\n";}$e->free();}}if($d->server_info>=5.1){$e=$d->query("SHOW EVENTS");while($a=$e->fetch_assoc()){$ja.=($z!='DROP+CREATE'?"DROP EVENT IF EXISTS ".idf_escape($a["Name"]).";;\n":"").$d->result($d->query("SHOW CREATE EVENT ".idf_escape($a["Name"])),3).";;\n\n";}$e->free();}echo($ja?"DELIMITER ;;\n\n$ja"."DELIMITER ;\n\n":"");}if($_POST["table_style"]||$_POST["data_style"]){$jb=array();foreach(table_status()as$a){$o=(!strlen($_GET["db"])||in_array($a["Name"],(array)$_POST["tables"]));$jd=(!strlen($_GET["db"])||in_array($a["Name"],(array)$_POST["data"]));if($o||$jd){if(isset($a["Engine"])){if($_a=="tar"){ob_start();}dump_table($a["Name"],($o?$_POST["table_style"]:""));if($jd){dump_data($a["Name"],$_POST["data_style"]);}if($o){dump_triggers($a["Name"],$_POST["table_style"]);}if($_a=="tar"){echo
tar_file((strlen($_GET["db"])?"":"$B/")."$a[Name].csv",ob_get_clean());}elseif($_POST["format"]!="csv"){echo"\n";}}elseif($_POST["format"]!="csv"){$jb[]=$a["Name"];}}}foreach($jb
as$Hd){dump_table($Hd,$_POST["table_style"],true);}}if($z=="CREATE+ALTER"&&$_POST["format"]!="csv"){$l="SELECT TABLE_NAME, ENGINE, TABLE_COLLATION, TABLE_COMMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA = DATABASE()";echo'DELIMITER ;;
CREATE PROCEDURE adminer_drop () BEGIN
	DECLARE _table_name, _engine, _table_collation varchar(64);
	DECLARE _table_comment varchar(64);
	DECLARE done bool DEFAULT 0;
	DECLARE tables CURSOR FOR '.$l;echo';
	DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = 1;
	OPEN tables;
	REPEAT
		FETCH tables INTO _table_name, _engine, _table_collation, _table_comment;
		IF NOT done THEN
			CASE _table_name';$e=$d->query($l);while($a=$e->fetch_assoc()){$tb=$d->quote($a["ENGINE"]=="InnoDB"?preg_replace('~(?:(.+); )?InnoDB free: .*~','\\1',$a["TABLE_COMMENT"]):$a["TABLE_COMMENT"]);echo"
				WHEN ".$d->quote($a["TABLE_NAME"])." THEN
					".(isset($a["ENGINE"])?"IF _engine != '$a[ENGINE]' OR _table_collation != '$a[TABLE_COLLATION]' OR _table_comment != $tb THEN
						ALTER TABLE ".idf_escape($a["TABLE_NAME"])." ENGINE=$a[ENGINE] COLLATE=$a[TABLE_COLLATION] COMMENT=$tb;
					END IF":"BEGIN END").";";}$e->free();?>

				ELSE
					SET @alter_table = CONCAT('DROP TABLE `', REPLACE(_table_name, '`', '``'), '`');
					PREPARE alter_command FROM @alter_table;
					EXECUTE alter_command; -- returns "can't return a result set in the given context" with MySQL extension
					DROP PREPARE alter_command;
			END CASE;
		END IF;
	UNTIL done END REPEAT;
	CLOSE tables;
END;;
DELIMITER ;
CALL adminer_drop;
DROP PROCEDURE adminer_drop;
<?php
}}}exit;}page_header(lang(89),"",(strlen($_GET["export"])?array("table"=>$_GET["export"]):array()),$_GET["db"]);echo'
<form action="" method="post">
<table cellspacing="0">
';$hd=array('USE','DROP+CREATE','CREATE');$oc=array('DROP+CREATE','CREATE');$Od=array('TRUNCATE+INSERT','INSERT','INSERT+UPDATE');if($d->server_info>=5){$hd[]='CREATE+ALTER';$oc[]='CREATE+ALTER';}echo"<tr><th>".lang(90)."<td><input type='hidden' name='token' value='$I'>$pd\n"."<tr><th>".lang(91)."<td>$qd\n";echo"<tr><th>".lang(45)."<td><select name='db_style'><option>".optionlist($hd,(strlen($_GET["db"])?'':'CREATE'))."</select>\n"."<tr><th>".lang(92)."<td><select name='table_style'><option>".optionlist($oc,'DROP+CREATE')."</select>\n";echo"<tr><th>".lang(93)."<td><select name='data_style'><option>".optionlist($Od,'INSERT')."</select>\n";echo'</table>
<p><input type="submit" value="'.lang(89);echo'">

<table cellspacing="0">
';if(strlen($_GET["db"])){$ca=(strlen($_GET["dump"])?"":" checked");echo"<thead><tr>"."<th style='text-align: left;'><label><input type='checkbox' id='check-tables'$ca onclick='form_check(this, /^tables\\[/);'>".lang(92)."</label>";echo"<th style='text-align: right;'><label>".lang(93)."<input type='checkbox' id='check-data'$ca onclick='form_check(this, /^data\\[/);'></label>"."</thead>\n";$jb="";foreach(table_status()as$a){$ca=(strlen($_GET["dump"])&&$a["Name"]!=$_GET["dump"]?'':" checked");$Ya="<tr><td><label><input type='checkbox' name='tables[]' value='".h($a["Name"])."'$ca onclick=\"form_uncheck('check-tables');\">".h($a["Name"])."</label>";if(!$a["Engine"]){$jb.="$Ya\n";}else{echo"$Ya<td align='right'><label>".($a["Engine"]=="InnoDB"&&$a["Rows"]?lang(94,$a["Rows"]):$a["Rows"])."<input type='checkbox' name='data[]' value='".h($a["Name"])."'$ca onclick=\"form_uncheck('check-data');\"></label>\n";}}echo$jb;}else{echo"<thead><tr><th style='text-align: left;'><label><input type='checkbox' id='check-databases' checked onclick='form_check(this, /^databases\\[/);'>".lang(45)."</label></thead>\n";foreach(get_databases()as$B){if(!information_schema($B)){echo'<tr><td><label><input type="checkbox" name="databases[]" value="'.h($B).'" checked onclick="form_uncheck(\'check-databases\');">'.h($B)."</label>\n";}}}echo'</table>
</form>
';}elseif(isset($_GET["privileges"])){page_header(lang(49));echo'<p><a href="'.h(ME).'user=">'.lang(95)."</a>";$e=$d->query("SELECT User, Host FROM mysql.user ORDER BY Host, User");if(!$e){echo'	<form action=""><p>
	';if(strlen($_GET["server"])){echo'<input type="hidden" name="server" value="'.h($_GET["server"]);echo'">';}echo'	'.lang(10);echo': <input name="user">
	'.lang(9);echo': <input name="host" value="localhost">
	<input type="hidden" name="grant" value="">
	<input type="submit" value="'.lang(13);echo'">
	</form>
';$e=$d->query("SELECT SUBSTRING_INDEX(CURRENT_USER, '@', 1) AS User, SUBSTRING_INDEX(CURRENT_USER, '@', -1) AS Host");}echo"<table cellspacing='0'>\n"."<thead><tr><th>&nbsp;<th>".lang(10)."<th>".lang(9)."</thead>\n";while($a=$e->fetch_assoc()){echo'<tr'.odd().'><td><a href="'.h(ME.'user='.urlencode($a["User"]).'&host='.urlencode($a["Host"])).'">'.lang(96).'</a><td>'.h($a["User"])."<td>".h($a["Host"])."\n";}echo"</table>\n";$e->free();}else{if(isset($_GET["default"])){$_GET["edit"]=$_GET["default"];}if(isset($_GET["select"])&&($_POST["edit"]||$_POST["clone"])&&!$_POST["save"]){$_GET["edit"]=$_GET["select"];}if(isset($_GET["callf"])){$_GET["call"]=$_GET["callf"];}if(isset($_GET["function"])){$_GET["procedure"]=$_GET["function"];}if(isset($_GET["sql"])){$La=&$_SESSION["history"][$_GET["server"]][$_GET["db"]];if(!$m&&$_POST["clear"]){$La=array();redirect(remove_from_uri("history"));}page_header(lang(25),$m);if(!$m&&$_POST){$l=(isset($_POST["file"])?get_file("sql_file"):$_POST["query"]);if(is_string($l)){@set_time_limit(0);$l=str_replace("\r","",$l);$l=rtrim($l);if(strlen($l)&&(!$La||end($La)!=$l)){$La[]=$l;}$Eb=";";$na=0;$qc=true;$pc="(\\s+|/\\*.*\\*/|(#|-- )[^\n]*\n|--\n)";$oa=(strlen($_GET["db"])?connect():null);if(is_object($oa)){$oa->select_db($_GET["db"]);}while(strlen($l)){if(!$na&&preg_match('~^\\s*DELIMITER\\s+(.+)~i',$l,$j)){$Eb=$j[1];$l=substr($l,strlen($j[0]));}elseif(preg_match('('.preg_quote($Eb).'|[\'`"]|/\\*|-- |#|$)',$l,$j,PREG_OFFSET_CAPTURE,$na)){if($j[0][0]&&$j[0][0]!=$Eb){$W=($j[0][0]=="-- "||$j[0][0]=="#"?'~.*~':($j[0][0]=="/*"?'~.*\\*/~sU':'~\\G([^\\\\'.$j[0][0].']+|\\\\.)*('.$j[0][0].'|$)~s'));preg_match($W,$l,$j,PREG_OFFSET_CAPTURE,$j[0][1]+1);$na=$j[0][1]+strlen($j[0][0]);}else{$qc=false;echo"<pre class='jush-sql'>".shorten_utf8(trim(substr($l,0,$j[0][1])))."</pre>\n";ob_flush();flush();$tc=explode(" ",microtime());if(!$d->multi_query(substr($l,0,$j[0][1]))){echo"<p class='error'>".lang(97).": ".h($d->error)."\n";if($_POST["error_stops"]){break;}}else{$lc=explode(" ",microtime());$g=0;do{$e=$d->store_result();if(!$g){echo"<p class='time'>".(is_object($e)?lang(98,$e->num_rows).", ":"").lang(99,max(0,$lc[0]-$tc[0]+$lc[1]-$tc[1]))."\n";$g++;}if(is_object($e)){select($e,$oa);}else{if(preg_match("~^$pc*(CREATE|DROP)$pc+(DATABASE|SCHEMA)\\b~isU",$l)){unset($_SESSION["databases"][$_GET["server"]]);}echo"<p class='message'>".lang(100,$d->affected_rows)."\n";}}while($d->next_result());}$l=substr($l,$j[0][1]+strlen($j[0][0]));$na=0;}}}if($qc){echo"<p class='message'>".lang(101)."\n";}}else{echo"<p class='error'>".upload_error($l)."\n";}}echo'
<form action="" method="post" enctype="multipart/form-data">
<p><textarea name="query" rows="20" cols="80" style="width: 98%;">'.h($_POST?$_POST["query"]:(strlen($_GET["history"])?$_SESSION["history"][$_GET["server"]][$_GET["db"]][$_GET["history"]]:$_GET["sql"]));echo'</textarea>
<p>
<input type="hidden" name="token" value="'.$I;echo'">
<input type="submit" value="'.lang(102);echo'">
<label><input type="checkbox" name="error_stops" value="1"'.($_POST["error_stops"]?" checked":"");echo'>'.lang(103);echo'</label>

<p>
';if(!ini_get("file_uploads")){echo
lang(5);}else{echo
lang(104);echo': <input type="file" name="sql_file">
<input type="submit" name="file" value="'.lang(105);echo'">
';}echo'
';if($La){echo"<fieldset><legend>".lang(106)."</legend>\n";foreach($La
as$f=>$b){echo'<a href="'.h(ME."sql=&history=$f").'">'.lang(13).'</a> <code class="jush-sql">'.shorten_utf8(ltrim(str_replace("\n"," ",preg_replace('~^(#|-- ).*~m','',$b))),80,"</code>")."<br>\n";}echo"<input type='submit' name='clear' value='".lang(107)."'>\n"."</fieldset>\n";}echo'
</form>
';}elseif(isset($_GET["edit"])){$w=(isset($_GET["select"])?"":where($_GET));$Xa=($w||$_POST["edit"]);$k=fields($_GET["edit"]);foreach($k
as$h=>$c){if((isset($_GET["default"])?$c["auto_increment"]||ereg('text|blob',$c["type"]):!isset($c["privileges"][$Xa?"update":"insert"]))||!strlen($p->fieldName($c))){unset($k[$h]);}}if($_POST&&!$m&&!isset($_GET["select"])){$_=$_SERVER["REQUEST_URI"];if(!$_POST["insert"]){$_=ME.(isset($_GET["default"])?"table=":"select=").urlencode($_GET["edit"]);$g=0;foreach((array)$_GET["set"]as$f=>$b){if($b==$_POST["fields"][$f]){$_.=where_link($g++,bracket_escape($f,"back"),$b);}}}$u=array();foreach($k
as$h=>$c){$b=process_input($c);if(!isset($_GET["default"])){if($b!==false||!$Xa){$u[]="\n".idf_escape($h)." = ".($b!==false?$b:"''");}}elseif($b!==false){if($c["type"]=="timestamp"&&$b!="NULL"){$u[]="\nMODIFY ".idf_escape($h)." timestamp".($c["null"]?" NULL":"")." DEFAULT $b".($_POST["on_update"][bracket_escape($h)]?" ON UPDATE CURRENT_TIMESTAMP":"");}else{$u[]="\nALTER ".idf_escape($h).($b=="NULL"?" DROP DEFAULT":" SET DEFAULT $b");}}}if(!$u){redirect($_);}if(isset($_GET["default"])){query_redirect("ALTER TABLE ".idf_escape($_GET["edit"]).implode(",",$u),$_,lang(108));}elseif($Xa){query_redirect("UPDATE ".idf_escape($_GET["edit"])." SET".implode(",",$u)."\nWHERE $w\nLIMIT 1",$_,lang(109));}else{query_redirect("INSERT INTO ".idf_escape($_GET["edit"])." SET".implode(",",$u),$_,lang(110));}}$da=$p->tableName(table_status($_GET["edit"]));page_header((isset($_GET["default"])?lang(79):($Xa?lang(13):lang(111))),$m,array((isset($_GET["default"])?"table":"select")=>array($_GET["edit"],$da)),$da);unset($a);if($_POST["save"]){$a=(array)$_POST["fields"];}elseif($w){$t=array();foreach($k
as$h=>$c){if(isset($c["privileges"]["select"])){$t[]=($_POST["clone"]&&$c["auto_increment"]?"'' AS ":($c["type"]=="enum"||$c["type"]=="set"?"1*".idf_escape($h)." AS ":"")).idf_escape($h);}}$a=array();if($t){$e=$d->query("SELECT ".implode(", ",$t)." FROM ".idf_escape($_GET["edit"])." WHERE $w LIMIT 1");$a=$e->fetch_assoc();$e->free();}}echo'
<form action="" method="post" enctype="multipart/form-data">
';if($k){unset($M);echo"<table cellspacing='0'>\n";foreach($k
as$h=>$c){echo"<tr><th>".$p->fieldName($c);$Dc=$_GET["set"][bracket_escape($h)];$n=(isset($a)?(strlen($a[$h])&&($c["type"]=="enum"||$c["type"]=="set")?intval($a[$h]):$a[$h]):($_POST["clone"]&&$c["auto_increment"]?"":(isset($_GET["select"])?false:(isset($Dc)?$Dc:$c["default"]))));if(!$_POST["save"]&&is_string($n)){$n=$p->editVal($n,$c);}$x=($_POST["save"]?(string)$_POST["function"][$h]:($w&&$c["on_update"]=="CURRENT_TIMESTAMP"?"now":($n===false?null:(isset($n)?'':'NULL'))));input($c,$n,$x);if(isset($_GET["default"])&&$c["type"]=="timestamp"){if(!isset($M)&&!$_POST){$M=$d->result($d->query("SHOW CREATE TABLE ".idf_escape($_GET["edit"])),1);}$ca=($_POST?$_POST["on_update"][bracket_escape($h)]:preg_match("~\n\\s*".preg_quote(idf_escape($h),'~')." timestamp.* on update CURRENT_TIMESTAMP~i",$M));echo'<label><input type="checkbox" name="on_update['.h(bracket_escape($h)).']" value="1"'.($ca?' checked':'').'>'.lang(112).'</label>';}echo"\n";}echo"</table>\n";}echo'<p>
<input type="hidden" name="token" value="'.$I;echo'">
<input type="hidden" name="save" value="1">
';if(isset($_GET["select"])){hidden_fields(array("check"=>(array)$_POST["check"],"clone"=>$_POST["clone"],"all"=>$_POST["all"]));}if($k){echo"<input type='submit' value='".lang(113)."'>\n";if(!isset($_GET["default"])&&!isset($_GET["select"])){echo"<input type='submit' name='insert' value='".($Xa?lang(114):lang(115))."'>\n";}}echo'</form>
';}elseif(isset($_GET["create"])){$uc=array('HASH','LINEAR HASH','KEY','LINEAR KEY','RANGE','LIST');$Ac=referencable_primary($_GET["create"]);$A=array();foreach($Ac
as$da=>$c){$A[idf_escape($da).".".idf_escape($c["field"])]=$da;}if(strlen($_GET["create"])){$Ob=fields($_GET["create"]);}if($_POST&&!$m&&!$_POST["add"]&&!$_POST["drop_col"]&&!$_POST["up"]&&!$_POST["down"]){$Hb=" PRIMARY KEY";if(strlen($_GET["create"])&&strlen($_POST["fields"][$_POST["auto_increment_col"]]["orig"])){foreach(indexes($_GET["create"])as$q){foreach($q["columns"]as$J){if($J===$_POST["fields"][$_POST["auto_increment_col"]]["orig"]){$Hb="";break
2;}}if($q["type"]=="PRIMARY"){$Hb=" UNIQUE";}}}$k=array();ksort($_POST["fields"]);$Aa="FIRST";foreach($_POST["fields"]as$f=>$c){$Lb=(isset($ma[$c["type"]])?$c:$Ac[$A[$c["type"]]]);if(strlen($c["field"])&&$Lb){$k[]="\n".(strlen($_GET["create"])?(strlen($c["orig"])?"CHANGE ".idf_escape($c["orig"])." ":"ADD "):"  ").idf_escape($c["field"]).process_type($Lb).($c["null"]?" NULL":" NOT NULL").(strlen($_GET["create"])&&strlen($c["orig"])&&isset($Ob[$c["orig"]]["default"])&&$c["type"]!="timestamp"?" DEFAULT ".$d->quote($Ob[$c["orig"]]["default"]):"").($f==$_POST["auto_increment_col"]?" AUTO_INCREMENT$Hb":"")." COMMENT ".$d->quote($c["comment"]).(strlen($_GET["create"])?" $Aa":"");$Aa="AFTER ".idf_escape($c["field"]);if(!isset($ma[$c["type"]])){$k[]=(strlen($_GET["create"])?" ADD":"")." FOREIGN KEY (".idf_escape($c["field"]).") REFERENCES ".idf_escape($A[$c["type"]])." (".idf_escape($Lb["field"]).")";}}elseif(strlen($c["orig"])){$k[]="\nDROP ".idf_escape($c["orig"]);}}$vb=($_POST["Engine"]?"ENGINE=".$d->quote($_POST["Engine"]):"").($_POST["Collation"]?" COLLATE ".$d->quote($_POST["Collation"]):"").(strlen($_POST["Auto_increment"])?" AUTO_INCREMENT=".intval($_POST["Auto_increment"]):"")." COMMENT=".$d->quote($_POST["Comment"]);if(in_array($_POST["partition_by"],$uc)){$Bb=array();if($_POST["partition_by"]=='RANGE'||$_POST["partition_by"]=='LIST'){foreach(array_filter($_POST["partition_names"])as$f=>$b){$n=$_POST["partition_values"][$f];$Bb[]="\nPARTITION ".idf_escape($b)." VALUES ".($_POST["partition_by"]=='RANGE'?"LESS THAN":"IN").(strlen($n)?" ($n)":" MAXVALUE");}}$vb.="\nPARTITION BY $_POST[partition_by]($_POST[partition])".($Bb?" (".implode(",",$Bb)."\n)":($_POST["partitions"]?" PARTITIONS ".intval($_POST["partitions"]):""));}elseif($d->server_info>=5.1&&strlen($_GET["create"])){$vb.="\nREMOVE PARTITIONING";}$_=ME."table=".urlencode($_POST["name"]);if(strlen($_GET["create"])){query_redirect("ALTER TABLE ".idf_escape($_GET["create"]).implode(",",$k).",\nRENAME TO ".idf_escape($_POST["name"]).",\n$vb",$_,lang(116));}else{$Jd=preg_replace('~\\?.*~','',$_SERVER["REQUEST_URI"]);setcookie("adminer_engine",$_POST["Engine"],gmmktime(0,0,0,gmdate("n")+1),$Jd);query_redirect("CREATE TABLE ".idf_escape($_POST["name"])." (".implode(",",$k)."\n) $vb",$_,lang(117));}}page_header((strlen($_GET["create"])?lang(78):lang(118)),$m,array("table"=>$_GET["create"]),$_GET["create"]);$yc=array();$e=$d->query("SHOW ENGINES");while($a=$e->fetch_assoc()){if($a["Support"]=="YES"||$a["Support"]=="DEFAULT"){$yc[]=$a["Engine"];}}$e->free();$a=array("Engine"=>$_COOKIE["adminer_engine"],"fields"=>array(array("field"=>"")),"partition_names"=>array(""),);if($_POST){$a=$_POST;if($a["auto_increment_col"]){$a["fields"][$a["auto_increment_col"]]["auto_increment"]=true;}process_fields($a["fields"]);}elseif(strlen($_GET["create"])){$a=table_status($_GET["create"]);table_comment($a);$a["name"]=$_GET["create"];$a["fields"]=array_values($Ob);if($d->server_info>=5.1){$Ka="FROM information_schema.PARTITIONS WHERE TABLE_SCHEMA = ".$d->quote($_GET["db"])." AND TABLE_NAME = ".$d->quote($_GET["create"]);$e=$d->query("SELECT PARTITION_METHOD, PARTITION_ORDINAL_POSITION, PARTITION_EXPRESSION $Ka ORDER BY PARTITION_ORDINAL_POSITION DESC LIMIT 1");list($a["partition_by"],$a["partitions"],$a["partition"])=$e->fetch_row();$e->free();$a["partition_names"]=array();$a["partition_values"]=array();$e=$d->query("SELECT PARTITION_NAME, PARTITION_DESCRIPTION $Ka AND PARTITION_NAME != '' ORDER BY PARTITION_ORDINAL_POSITION");while($zc=$e->fetch_assoc()){$a["partition_names"][]=$zc["PARTITION_NAME"];$a["partition_values"][]=$zc["PARTITION_DESCRIPTION"];}$e->free();$a["partition_names"][]="";}}$Q=collations();$gc=floor(extension_loaded("suhosin")?(min(ini_get("suhosin.request.max_vars"),ini_get("suhosin.post.max_vars"))-13)/8:0);if($gc&&count($a["fields"])>$gc){echo"<p class='error'>".h(lang(119,'suhosin.post.max_vars','suhosin.request.max_vars'))."\n";}echo'
<form action="" method="post" id="form">
<p>
'.lang(120);echo': <input name="name" maxlength="64" value="'.h($a["name"]);echo'">
<select name="Engine"><option value="">('.lang(121);echo')'.optionlist($yc,$a["Engine"]);echo'</select>
<select name="Collation"><option value="">('.lang(55);echo')'.optionlist($Q,$a["Collation"]);echo'</select>
<input type="submit" value="'.lang(113);echo'">
<table cellspacing="0" id="edit-fields">
';$Pa=edit_fields($a["fields"],$Q,"TABLE",$gc,$A);echo'</table>
<p>
'.lang(63);echo': <input name="Auto_increment" size="6" value="'.intval($a["Auto_increment"]);echo'">
'.lang(64);echo': <input name="Comment" value="'.h($a["Comment"]);echo'" maxlength="60">
<script type="text/javascript">
document.write(\'<label><input type="checkbox"';if($Pa){echo' checked';}echo' onclick="column_comments_click(this.checked);">'.lang(122);echo'<\\/label>\');
</script>
<p>
<input type="hidden" name="token" value="'.$I;echo'">
<input type="submit" value="'.lang(113);echo'">
';if($d->server_info>=5.1){$vc=ereg('RANGE|LIST',$a["partition_by"]);echo'<fieldset><legend>'.lang(123);echo'</legend>
<p>
<select name="partition_by" onchange="partition_by_change(this);"><option>'.optionlist($uc,$a["partition_by"]);echo'</select>
(<input name="partition" value="'.h($a["partition"]);echo'">)
'.lang(124);echo': <input name="partitions" size="2" value="'.h($a["partitions"]);echo'"'.($vc||!$a["partition_by"]?" class='hidden'":"");echo'>
<table cellspacing="0" id="partition-table"'.($vc?"":" class='hidden'");echo'>
<thead><tr><th>'.lang(125);echo'<th>'.lang(126);echo'</thead>
';foreach($a["partition_names"]as$f=>$b){echo'<tr>'.'<td><input name="partition_names[]" value="'.h($b).'"'.($f==count($a["partition_names"])-1?' onchange="partition_name_change(this);"':'').'>';echo'<td><input name="partition_values[]" value="'.h($a["partition_values"][$f]).'">';}echo'</table>
</fieldset>
';}echo'</form>
';}elseif(isset($_GET["indexes"])){$wc=array("PRIMARY","UNIQUE","INDEX","FULLTEXT");$s=indexes($_GET["indexes"]);if($_POST&&!$m&&!$_POST["add"]){$wb=array();foreach($_POST["indexes"]as$q){if(in_array($q["type"],$wc)){$r=array();$Tb=array();$u=array();ksort($q["columns"]);foreach($q["columns"]as$f=>$J){if(strlen($J)){$C=$q["lengths"][$f];$u[]=idf_escape($J).($C?"(".intval($C).")":"");$r[count($r)+1]=$J;$Tb[count($Tb)+1]=($C?$C:null);}}if($r){foreach($s
as$h=>$Ja){ksort($Ja["columns"]);ksort($Ja["lengths"]);if($q["type"]==$Ja["type"]&&$Ja["columns"]===$r&&$Ja["lengths"]===$Tb){unset($s[$h]);continue
2;}}$wb[]="\nADD $q[type]".($q["type"]=="PRIMARY"?" KEY":"")." (".implode(", ",$u).")";}}}foreach($s
as$h=>$Ja){$wb[]="\nDROP INDEX ".idf_escape($h);}if(!$wb){redirect(ME."table=".urlencode($_GET["indexes"]));}query_redirect("ALTER TABLE ".idf_escape($_GET["indexes"]).implode(",",$wb),ME."table=".urlencode($_GET["indexes"]),lang(127));}page_header(lang(82),$m,array("table"=>$_GET["indexes"]),$_GET["indexes"]);$k=array_keys(fields($_GET["indexes"]));$a=array("indexes"=>$s);if($_POST){$a=$_POST;if($_POST["add"]){foreach($a["indexes"]as$f=>$q){if(strlen($q["columns"][count($q["columns"])])){$a["indexes"][$f]["columns"][]="";}}$q=end($a["indexes"]);if($q["type"]||array_filter($q["columns"],'strlen')||array_filter($q["lengths"],'strlen')){$a["indexes"][]=array("columns"=>array(1=>""));}}}else{foreach($a["indexes"]as$f=>$q){$a["indexes"][$f]["columns"][]="";}$a["indexes"][]=array("columns"=>array(1=>""));}echo'
<form action="" method="post">
<table cellspacing="0">
<thead><tr><th>'.lang(128);echo'<th>'.lang(129);echo'</thead>
';$F=0;foreach($a["indexes"]as$q){echo"<tr><td><select name='indexes[$F][type]'".($F==count($a["indexes"])-1?" onchange='indexes_add_row(this);'":"")."><option>".optionlist($wc,$q["type"])."</select><td>\n";ksort($q["columns"]);foreach($q["columns"]as$g=>$J){echo"<span><select name='indexes[$F][columns][$g]'".($g==count($q["columns"])?" onchange='indexes_add_column(this);'":"")."><option>".optionlist($k,$J)."</select>"."<input name='indexes[$F][lengths][$g]' size='2' value='".h($q["lengths"][$g])."'> </span>\n";}echo"\n";$F++;}echo'</table>
<p>
<input type="hidden" name="token" value="'.$I;echo'">
<input type="submit" value="'.lang(113);echo'">
<noscript><p><input type="submit" name="add" value="'.lang(65);echo'"></noscript>
</form>
';}elseif(isset($_GET["database"])){if($_POST&&!$m&&!isset($_POST["add_x"])){if($_POST["drop"]){unset($_SESSION["databases"][$_GET["server"]]);query_redirect("DROP DATABASE ".idf_escape($_GET["db"]),substr(preg_replace('~db=[^&]*&~','',ME),0,-1),lang(130));}elseif($_GET["db"]!==$_POST["name"]){unset($_SESSION["databases"][$_GET["server"]]);$Ha=explode("\n",str_replace("\r","",$_POST["name"]));$cb=false;$db="";foreach($Ha
as$B){if(count($Ha)==1||strlen($B)){if(!queries("CREATE DATABASE ".idf_escape($B).($_POST["collation"]?" COLLATE ".$d->quote($_POST["collation"]):""))){$cb=true;}$db=$B;}}if(query_redirect(queries(),ME."db=".urlencode($db),lang(131),!strlen($_GET["db"]),false,$cb)){$e=$d->query("SHOW TABLES");while($a=$e->fetch_row()){if(!queries("RENAME TABLE ".idf_escape($a[0])." TO ".idf_escape($_POST["name"]).".".idf_escape($a[0]))){break;}}$e->free();if(!$a){queries("DROP DATABASE ".idf_escape($_GET["db"]));}query_redirect(queries(),preg_replace('~db=[^&]*&~','',ME)."db=".urlencode($_POST["name"]),lang(132),!$a,false,$a);}}else{if(!$_POST["collation"]){redirect(substr(ME,0,-1));}query_redirect("ALTER DATABASE ".idf_escape($_POST["name"])." COLLATE ".$d->quote($_POST["collation"]),substr(ME,0,-1),lang(133));}}page_header(strlen($_GET["db"])?lang(134):lang(135),$m,array(),$_GET["db"]);$Q=collations();$h=$_GET["db"];$Qa=array();if($_POST){$h=$_POST["name"];$Qa=$_POST["collation"];}elseif(!strlen($_GET["db"])){$e=$d->query("SHOW GRANTS");while($a=$e->fetch_row()){if(preg_match('~ ON (`(([^\\\\`]+|``|\\\\.)*)%`\\.\\*)?~',$a[0],$j)&&$j[1]){$h=stripcslashes(idf_unescape($j[2]));break;}}$e->free();}elseif(($e=$d->query("SHOW CREATE DATABASE ".idf_escape($_GET["db"])))){$M=$d->result($e,1);if(preg_match('~ COLLATE ([^ ]+)~',$M,$j)){$Qa=$j[1];}elseif(preg_match('~ CHARACTER SET ([^ ]+)~',$M,$j)){$Qa=$Q[$j[1]][0];}$e->free();}echo'
<form action="" method="post">
<p>
'.($_POST["add_x"]?'<textarea name="name" rows="10" cols="40">'.h($h).'</textarea><br>':'<input name="name" value="'.h($h).'" maxlength="64">')."\n";echo'<select name="collation"><option value="">('.lang(55);echo')'.optionlist($Q,$Qa);echo'</select>
<input type="hidden" name="token" value="'.$I;echo'">
<input type="submit" value="'.lang(113);echo'">
';if(strlen($_GET["db"])){echo"<input type='submit' name='drop' value='".lang(136)."'$sa>\n";}elseif(!$_POST["add_x"]){echo"<input type='image' name='add' src='".h(preg_replace("~\\?.*~","",$_SERVER["REQUEST_URI"]))."?file=plus.gif&amp;version=2.0.0' alt='+' title='".lang(65)."'>\n";}echo'</form>
';}elseif(isset($_GET["call"])){page_header(lang(137).": ".h($_GET["call"]),$m);$T=routine($_GET["call"],(isset($_GET["callf"])?"FUNCTION":"PROCEDURE"));$Ba=array();$ja=array();foreach($T["fields"]as$g=>$c){if(substr($c["inout"],-3)=="OUT"){$ja[$g]="@".idf_escape($c["field"])." AS ".idf_escape($c["field"]);}if(!$c["inout"]||substr($c["inout"],0,2)=="IN"){$Ba[]=$g;}}if(!$m&&$_POST){$_c=array();foreach($T["fields"]as$f=>$c){if(in_array($f,$Ba)){$b=process_input($c);if($b===false){$b="''";}if(isset($ja[$f])){$d->query("SET @".idf_escape($c["field"])." = $b");}}$_c[]=(isset($ja[$f])?"@".idf_escape($c["field"]):$b);}$e=$d->multi_query((isset($_GET["callf"])?"SELECT":"CALL")." ".idf_escape($_GET["call"])."(".implode(", ",$_c).")");if(!$e){echo"<p class='error'>".h($d->error)."\n";}else{do{$e=$d->store_result();if(is_object($e)){select($e);}else{echo"<p class='message'>".lang(138,$d->affected_rows)."\n";}}while($d->next_result());if($ja){select($d->query("SELECT ".implode(", ",$ja)));}}}echo'
<form action="" method="post">
';if($Ba){echo"<table cellspacing='0'>\n";foreach($Ba
as$f){$c=$T["fields"][$f];echo"<tr><th>".h($c["field"]);$n=$_POST["fields"][$f];if(strlen($n)&&($c["type"]=="enum"||$c["type"]=="set")){$n=intval($n);}input($c,$n,(string)$_POST["function"][$h]);echo"\n";}echo"</table>\n";}echo'<p>
<input type="hidden" name="token" value="'.$I;echo'">
<input type="submit" value="'.lang(137);echo'">
</form>
';}elseif(isset($_GET["foreign"])){if($_POST&&!$m&&!$_POST["add"]&&!$_POST["change"]&&!$_POST["change-js"]){if($_POST["drop"]){query_redirect("ALTER TABLE ".idf_escape($_GET["foreign"])."\nDROP FOREIGN KEY ".idf_escape($_GET["name"]),ME."table=".urlencode($_GET["foreign"]),lang(139));}else{$N=array_filter($_POST["source"],'strlen');ksort($N);$ua=array();foreach($N
as$f=>$b){$ua[$f]=$_POST["target"][$f];}query_redirect("ALTER TABLE ".idf_escape($_GET["foreign"]).(strlen($_GET["name"])?"\nDROP FOREIGN KEY ".idf_escape($_GET["name"]).",":"")."\nADD FOREIGN KEY (".implode(", ",array_map('idf_escape',$N)).") REFERENCES ".idf_escape($_POST["table"])." (".implode(", ",array_map('idf_escape',$ua)).")".(in_array($_POST["on_delete"],$Da)?" ON DELETE $_POST[on_delete]":"").(in_array($_POST["on_update"],$Da)?" ON UPDATE $_POST[on_update]":""),ME."table=".urlencode($_GET["foreign"]),(strlen($_GET["name"])?lang(140):lang(141)));$m=lang(142)."<br>$m";}}page_header(lang(143),$m,array("table"=>$_GET["foreign"]),$_GET["foreign"]);$a=array("table"=>$_GET["foreign"],"source"=>array(""));if($_POST){$a=$_POST;ksort($a["source"]);if($_POST["add"]){$a["source"][]="";}elseif($_POST["change"]||$_POST["change-js"]){$a["target"]=array();}}elseif(strlen($_GET["name"])){$A=foreign_keys($_GET["foreign"]);$a=$A[$_GET["name"]];$a["source"][]="";}$N=get_vals("SHOW COLUMNS FROM ".idf_escape($_GET["foreign"]));$ua=($_GET["foreign"]===$a["table"]?$N:get_vals("SHOW COLUMNS FROM ".idf_escape($a["table"])));echo'
<form action="" method="post">
<p>
'.lang(144);?>:
<select name="table" onchange="this.form['change-js'].value = '1'; this.form.submit();"><?php echo
optionlist(array_keys(table_status_referencable()),$a["table"]);echo'</select>
<input type="hidden" name="change-js" value="">
<noscript><p><input type="submit" name="change" value="'.lang(145);echo'"></noscript>
<table cellspacing="0">
<thead><tr><th>'.lang(146);echo'<th>'.lang(147);echo'</thead>
';$F=0;foreach($a["source"]as$f=>$b){echo"<tr>"."<td><select name='source[".intval($f)."]'".($F==count($a["source"])-1?" onchange='foreign_add_row(this);'":"")."><option>".optionlist($N,$b)."</select>";echo"<td><select name='target[".intval($f)."]'>".optionlist($ua,$a["target"][$f])."</select>";$F++;}echo'</table>
<p>
'.lang(148);echo': <select name="on_delete"><option>'.optionlist($Da,$a["on_delete"]);echo'</select>
'.lang(149);echo': <select name="on_update"><option>'.optionlist($Da,$a["on_update"]);echo'</select>
<p>
<input type="hidden" name="token" value="'.$I;echo'">
<input type="submit" value="'.lang(113);echo'">
';if(strlen($_GET["name"])){echo'<input type="submit" name="drop" value="'.lang(136);echo'"'.$sa;echo'>';}echo'<noscript><p><input type="submit" name="add" value="'.lang(150);echo'"></noscript>
</form>
';}elseif(isset($_GET["view"])){$va=false;if($_POST&&!$m){if(strlen($_GET["view"])){$va=query_redirect("DROP VIEW ".idf_escape($_GET["view"]),substr(ME,0,-1),lang(151),false,!$_POST["dropped"]);}query_redirect("CREATE VIEW ".idf_escape($_POST["name"])." AS\n$_POST[select]",ME."table=".urlencode($_POST["name"]),(strlen($_GET["view"])?lang(152):lang(153)));}page_header((strlen($_GET["view"])?lang(77):lang(154)),$m,array("table"=>$_GET["view"]),$_GET["view"]);$a=array();if($_POST){$a=$_POST;}elseif(strlen($_GET["view"])){$a=view($_GET["view"]);$a["name"]=$_GET["view"];}echo'
<form action="" method="post">
<p><textarea name="select" rows="10" cols="80" style="width: 98%;">'.h($a["select"]);echo'</textarea>
<p>
<input type="hidden" name="token" value="'.$I;echo'">
';if($va){echo'<input type="hidden" name="dropped" value="1">';}echo
lang(155);echo': <input name="name" value="'.h($a["name"]);echo'" maxlength="64">
<input type="submit" value="'.lang(113);echo'">
</form>
';}elseif(isset($_GET["event"])){$Bc=array("YEAR","QUARTER","MONTH","DAY","HOUR","MINUTE","WEEK","SECOND","YEAR_MONTH","DAY_HOUR","DAY_MINUTE","DAY_SECOND","HOUR_MINUTE","HOUR_SECOND","MINUTE_SECOND");$Xb=array("ENABLED"=>"ENABLE","DISABLED"=>"DISABLE","SLAVESIDE_DISABLED"=>"DISABLE ON SLAVE");if($_POST&&!$m){if($_POST["drop"]){query_redirect("DROP EVENT ".idf_escape($_GET["event"]),substr(ME,0,-1),lang(156));}elseif(in_array($_POST["INTERVAL_FIELD"],$Bc)&&isset($Xb[$_POST["STATUS"]])){$Cc="\nON SCHEDULE ".($_POST["INTERVAL_VALUE"]?"EVERY ".$d->quote($_POST["INTERVAL_VALUE"])." $_POST[INTERVAL_FIELD]".($_POST["STARTS"]?" STARTS ".$d->quote($_POST["STARTS"]):"").($_POST["ENDS"]?" ENDS ".$d->quote($_POST["ENDS"]):""):"AT ".$d->quote($_POST["STARTS"]))." ON COMPLETION".($_POST["ON_COMPLETION"]?"":" NOT")." PRESERVE";query_redirect((strlen($_GET["event"])?"ALTER EVENT ".idf_escape($_GET["event"]).$Cc.($_GET["event"]!=$_POST["EVENT_NAME"]?"\nRENAME TO ".idf_escape($_POST["EVENT_NAME"]):""):"CREATE EVENT ".idf_escape($_POST["EVENT_NAME"]).$Cc)."\n".$Xb[$_POST["STATUS"]]." COMMENT ".$d->quote($_POST["EVENT_COMMENT"])." DO\n$_POST[EVENT_DEFINITION]",substr(ME,0,-1),(strlen($_GET["event"])?lang(157):lang(158)));}}page_header((strlen($_GET["event"])?lang(159).": ".h($_GET["event"]):lang(160)),$m);$a=array();if($_POST){$a=$_POST;}elseif(strlen($_GET["event"])){$e=$d->query("SELECT * FROM information_schema.EVENTS WHERE EVENT_SCHEMA = ".$d->quote($_GET["db"])." AND EVENT_NAME = ".$d->quote($_GET["event"]));$a=$e->fetch_assoc();$e->free();}echo'
<form action="" method="post">
<table cellspacing="0">
<tr><th>'.lang(155);echo'<td><input name="EVENT_NAME" value="'.h($a["EVENT_NAME"]);echo'" maxlength="64">
<tr><th>'.lang(161);echo'<td><input name="STARTS" value="'.h("$a[EXECUTE_AT]$a[STARTS]");echo'">
<tr><th>'.lang(162);echo'<td><input name="ENDS" value="'.h($a["ENDS"]);echo'">
<tr><th>'.lang(163);echo'<td><input name="INTERVAL_VALUE" value="'.h($a["INTERVAL_VALUE"]);echo'" size="6"> <select name="INTERVAL_FIELD">'.optionlist($Bc,$a["INTERVAL_FIELD"]);echo'</select>
<tr><th>'.lang(164);echo'<td><select name="STATUS">'.optionlist($Xb,$a["STATUS"]);echo'</select>
<tr><th>'.lang(64);echo'<td><input name="EVENT_COMMENT" value="'.h($a["EVENT_COMMENT"]);echo'" maxlength="64">
<tr><th>&nbsp;<td><label><input type="checkbox" name="ON_COMPLETION" value="PRESERVE"'.($a["ON_COMPLETION"]=="PRESERVE"?" checked":"");echo'>'.lang(165);echo'</label>
</table>
<p><textarea name="EVENT_DEFINITION" rows="10" cols="80" style="width: 98%;">'.h($a["EVENT_DEFINITION"]);echo'</textarea>
<p>
<input type="hidden" name="token" value="'.$I;echo'">
<input type="submit" value="'.lang(113);echo'">
';if(strlen($_GET["event"])){echo'<input type="submit" name="drop" value="'.lang(136);echo'"'.$sa;echo'>';}echo'</form>
';}elseif(isset($_GET["procedure"])){$T=(isset($_GET["function"])?"FUNCTION":"PROCEDURE");$va=false;if($_POST&&!$m&&!$_POST["add"]&&!$_POST["drop_col"]&&!$_POST["up"]&&!$_POST["down"]){if(strlen($_GET["procedure"])){$va=query_redirect("DROP $T ".idf_escape($_GET["procedure"]),substr(ME,0,-1),lang(166),$_POST["drop"],!$_POST["dropped"]);}if(!$_POST["drop"]){$u=array();$k=(array)$_POST["fields"];ksort($k);foreach($k
as$c){if(strlen($c["field"])){$u[]=(in_array($c["inout"],$Ia)?"$c[inout] ":"").idf_escape($c["field"]).process_type($c,"CHARACTER SET");}}query_redirect("CREATE $T ".idf_escape($_POST["name"])." (".implode(", ",$u).")".(isset($_GET["function"])?" RETURNS".process_type($_POST["returns"],"CHARACTER SET"):"")."\n$_POST[definition]",substr(ME,0,-1),(strlen($_GET["procedure"])?lang(167):lang(168)));}}page_header((strlen($_GET["procedure"])?(isset($_GET["function"])?lang(169):lang(170)).": ".h($_GET["procedure"]):(isset($_GET["function"])?lang(171):lang(172))),$m);$Q=get_vals("SHOW CHARACTER SET");sort($Q);$a=array("fields"=>array());if($_POST){$a=$_POST;$a["fields"]=(array)$a["fields"];process_fields($a["fields"]);}elseif(strlen($_GET["procedure"])){$a=routine($_GET["procedure"],$T);$a["name"]=$_GET["procedure"];}echo'
<form action="" method="post" id="form">
<table cellspacing="0">
';edit_fields($a["fields"],$Q,$T);if(isset($_GET["function"])){echo'<tr><td>'.lang(173);echo
edit_type("returns",$a["returns"],$Q);}echo'</table>
<p><textarea name="definition" rows="10" cols="80" style="width: 98%;">'.h($a["definition"]);echo'</textarea>
<p>
<input type="hidden" name="token" value="'.$I;echo'">
';if($va){echo'<input type="hidden" name="dropped" value="1">';}echo
lang(155);echo': <input name="name" value="'.h($a["name"]);echo'" maxlength="64">
<input type="submit" value="'.lang(113);echo'">
';if(strlen($_GET["procedure"])){echo'<input type="submit" name="drop" value="'.lang(136);echo'"'.$sa;echo'>';}echo'</form>
';}elseif(isset($_GET["trigger"])){$Gc=array("BEFORE","AFTER");$mc=array("INSERT","UPDATE","DELETE");$va=false;if($_POST&&!$m){if(strlen($_GET["name"])){$va=query_redirect("DROP TRIGGER ".idf_escape($_GET["name"]),ME."table=".urlencode($_GET["trigger"]),lang(174),$_POST["drop"],!$_POST["dropped"]);}if(!$_POST["drop"]){if(in_array($_POST["Timing"],$Gc)&&in_array($_POST["Event"],$mc)){query_redirect("CREATE TRIGGER ".idf_escape($_POST["Trigger"])." $_POST[Timing] $_POST[Event] ON ".idf_escape($_GET["trigger"])." FOR EACH ROW\n$_POST[Statement]",ME."table=".urlencode($_GET["trigger"]),(strlen($_GET["name"])?lang(175):lang(176)));}}}page_header((strlen($_GET["name"])?lang(177).": ".h($_GET["name"]):lang(178)),$m,array("table"=>$_GET["trigger"]));$a=array("Trigger"=>"$_GET[trigger]_bi");if($_POST){$a=$_POST;}elseif(strlen($_GET["name"])){$e=$d->query("SHOW TRIGGERS WHERE `Trigger` = ".$d->quote($_GET["name"]));$a=$e->fetch_assoc();$e->free();}echo'
<form action="" method="post" id="form">
<table cellspacing="0">
<tr><th>'.lang(179);echo'<td><select name="Timing" onchange="if (/^'.h(preg_quote($_GET["trigger"],"/"));?>_[ba][iud]$/.test(this.form['Trigger'].value)) this.form['Trigger'].value = '<?php echo
h(addcslashes($_GET["trigger"],"\r\n'\\"));echo'_\' + this.value.charAt(0).toLowerCase() + this.form[\'Event\'].value.charAt(0).toLowerCase();">'.optionlist($Gc,$a["Timing"]);echo'</select>
<tr><th>'.lang(180);echo'<td><select name="Event" onchange="this.form[\'Timing\'].onchange();">'.optionlist($mc,$a["Event"]);echo'</select>
<tr><th>'.lang(155);echo'<td><input name="Trigger" value="'.h($a["Trigger"]);echo'" maxlength="64">
</table>
<p><textarea name="Statement" rows="10" cols="80" style="width: 98%;">'.h($a["Statement"]);echo'</textarea>
<p>
<input type="hidden" name="token" value="'.$I;echo'">
';if($va){echo'<input type="hidden" name="dropped" value="1">';}echo'<input type="submit" value="'.lang(113);echo'">
';if(strlen($_GET["name"])){echo'<input type="submit" name="drop" value="'.lang(136);echo'"'.$sa;echo'>';}echo'</form>
';}elseif(isset($_GET["user"])){$H=array(""=>array("All privileges"=>""));$e=$d->query("SHOW PRIVILEGES");while($a=$e->fetch_assoc()){foreach(explode(",",($a["Privilege"]=="Grant option"?"":$a["Context"]))as$zb){$H[$zb][$a["Privilege"]]=$a["Comment"];}}$e->free();$H["Server Admin"]+=$H["File access on server"];$H["Databases"]["Create routine"]=$H["Procedures"]["Create routine"];unset($H["Procedures"]["Create routine"]);$H["Columns"]=array();foreach(array("Select","Insert","Update","References")as$b){$H["Columns"][$b]=$H["Tables"][$b];}unset($H["Server Admin"]["Usage"]);foreach($H["Tables"]as$f=>$b){unset($H["Databases"][$f]);}function
grant($E,$H,$r,$qb){if(!$H){return
true;}if($H==array("ALL PRIVILEGES","GRANT OPTION")){return($E=="GRANT"?queries("$E ALL PRIVILEGES$qb WITH GRANT OPTION"):queries("$E ALL PRIVILEGES$qb")&&queries("$E GRANT OPTION$qb"));}return
queries("$E ".preg_replace('~(GRANT OPTION)\\([^)]*\\)~','\\1',implode("$r, ",$H).$r).$qb);}$Va=array();if($_POST){foreach($_POST["objects"]as$f=>$b){$Va[$b]=((array)$Va[$b])+((array)$_POST["grants"][$f]);}}$fa=array();$Zb="";if(isset($_GET["host"])&&($e=$d->query("SHOW GRANTS FOR ".$d->quote($_GET["user"])."@".$d->quote($_GET["host"])))){while($a=$e->fetch_row()){if(preg_match('~GRANT (.*) ON (.*) TO ~',$a[0],$j)&&preg_match_all('~ *([^(,]*[^ ,(])( *\\([^)]+\\))?~',$j[1],$G,PREG_SET_ORDER)){foreach($G
as$b){$fa["$j[2]$b[2]"][$b[1]]=true;if(ereg(' WITH GRANT OPTION',$a[0])){$fa["$j[2]$b[2]"]["GRANT OPTION"]=true;}}}if(preg_match("~ IDENTIFIED BY PASSWORD '([^']+)~",$a[0],$j)){$Zb=$j[1];}}$e->free();}if($_POST&&!$m){$Ra=(isset($_GET["host"])?$d->quote($_GET["user"])."@".$d->quote($_GET["host"]):"''");$ha=$d->quote($_POST["user"])."@".$d->quote($_POST["host"]);$dc=$d->quote($_POST["pass"]);if($_POST["drop"]){query_redirect("DROP USER $Ra",ME."privileges=",lang(181));}else{if($Ra==$ha){queries("SET PASSWORD FOR $ha = ".($_POST["hashed"]?$dc:"PASSWORD($dc)"));}else{$m=!queries(($d->server_info<5?"GRANT USAGE ON *.* TO":"CREATE USER")." $ha IDENTIFIED BY".($_POST["hashed"]?" PASSWORD":"")." $dc");}if(!$m){$lb=array();foreach($Va
as$aa=>$E){if(isset($_GET["grant"])){$E=array_filter($E);}$E=array_keys($E);if(isset($_GET["grant"])){$lb=array_diff(array_keys(array_filter($Va[$aa],'strlen')),$E);}elseif($Ra==$ha){$Fc=array_keys((array)$fa[$aa]);$lb=array_diff($Fc,$E);$E=array_diff($E,$Fc);unset($fa[$aa]);}if(preg_match('~^(.+)\\s*(\\(.*\\))?$~U',$aa,$j)&&(!grant("REVOKE",$lb,$j[2]," ON $j[1] FROM $ha")||!grant("GRANT",$E,$j[2]," ON $j[1] TO $ha"))){$m=true;break;}}}if(!$m&&isset($_GET["host"])){if($Ra!=$ha){queries("DROP USER $Ra");}elseif(!isset($_GET["grant"])){foreach($fa
as$aa=>$lb){if(preg_match('~^(.+)(\\(.*\\))?$~U',$aa,$j)){queries("REVOKE ".grant(array_keys($lb),$j[2])." ON $j[1] FROM $ha");}}}}query_redirect(queries(),ME."privileges=",(isset($_GET["host"])?lang(182):lang(183)),!$m,false,$m);if($Ra!=$ha){$d->query("DROP USER $ha");}}}page_header((isset($_GET["host"])?lang(10).": ".h("$_GET[user]@$_GET[host]"):lang(95)),$m,array("privileges"=>array('',lang(49))));if($_POST){$a=$_POST;$fa=$Va;}else{$a=$_GET+array("host"=>$d->result($d->query("SELECT SUBSTRING_INDEX(CURRENT_USER, '@', -1)")));$a["pass"]=$Zb;if(strlen($Zb)){$a["hashed"]=true;}$fa[""]=true;}echo'<form action="" method="post">
<table cellspacing="0">
<tr><th>'.lang(10);echo'<td><input name="user" maxlength="16" value="'.h($a["user"]);echo'">
<tr><th>'.lang(9);echo'<td><input name="host" maxlength="60" value="'.h($a["host"]);echo'">
<tr><th>'.lang(11);echo'<td><input id="pass" name="pass" value="'.h($a["pass"]);echo'">';if(!$a["hashed"]){?><script type="text/javascript">document.getElementById('pass').type = 'password';</script><?php }echo' <label><input type="checkbox" name="hashed" value="1"';if($a["hashed"]){echo' checked';}?> onclick="this.form['pass'].type = (this.checked ? 'text' : 'password');"><?php echo
lang(184);echo'</label>
</table>

';echo"<table cellspacing='0'>\n"."<thead><tr><th colspan='2'>".lang(49);$g=0;foreach($fa
as$aa=>$E){echo'<th>'.($aa!="*.*"?"<input name='objects[$g]' value='".h($aa)."' size='10'>":"<input type='hidden' name='objects[$g]' value='*.*' size='10'>*.*");$g++;}echo"</thead>\n";foreach(array(""=>"","Server Admin"=>lang(9),"Databases"=>lang(45),"Tables"=>lang(76),"Columns"=>lang(185),"Procedures"=>lang(186),)as$zb=>$ib){foreach((array)$H[$zb]as$gb=>$tb){echo"<tr".odd()."><td".($ib?">$ib<td":" colspan='2'").' lang="en" title="'.h($tb).'">'.h($gb);$g=0;foreach($fa
as$aa=>$E){$h="'grants[$g][".h(strtoupper($gb))."]'";$n=$E[strtoupper($gb)];if($zb=="Server Admin"&&$aa!=(isset($fa["*.*"])?"*.*":"")){echo"<td>&nbsp;";}elseif(isset($_GET["grant"])){echo"<td><select name=$h><option><option value='1'".($n?" selected":"").">".lang(187)."<option value='0'".($n=="0"?" selected":"").">".lang(188)."</select>";}else{echo"<td align='center'><input type='checkbox' name=$h value='1'".($n?" checked":"").($gb=="All privileges"?" id='grants-$g-all'":($gb=="Grant option"?"":" onclick=\"if (this.checked) form_uncheck('grants-$g-all');\"")).">";}$g++;}}}echo"</table>\n";echo'<p>
<input type="hidden" name="token" value="'.$I;echo'">
<input type="submit" value="'.lang(113);echo'">
';if(isset($_GET["host"])){echo'<input type="submit" name="drop" value="'.lang(136);echo'"'.$sa;echo'>';}echo'</form>
';}elseif(isset($_GET["processlist"])){if($_POST&&!$m){$xb=0;foreach((array)$_POST["kill"]as$b){if(queries("KILL ".intval($b))){$xb++;}}query_redirect(queries(),ME."processlist=",lang(189,$xb),$xb||!$_POST["kill"],false,!$xb&&$_POST["kill"]);}page_header(lang(50),$m);echo'
<form action="" method="post">
<table cellspacing="0">
';$e=$d->query("SHOW PROCESSLIST");for($g=0;$a=$e->fetch_assoc();$g++){if(!$g){echo"<thead><tr lang='en'><th>&nbsp;<th>".implode("<th>",array_keys($a))."</thead>\n";}echo"<tr".odd()."><td><input type='checkbox' name='kill[]' value='$a[Id]'><td>".implode("<td>",$a)."\n";}$e->free();echo'</table>
<p>
<input type="hidden" name="token" value="'.$I;echo'">
<input type="submit" value="'.lang(190);echo'">
</form>
';}elseif(isset($_GET["select"])){$ya=table_status($_GET["select"]);$s=indexes($_GET["select"]);$k=fields($_GET["select"]);$nc=array();$r=array();unset($xa);foreach($k
as$f=>$c){$h=$p->fieldName($c);if(isset($c["privileges"]["select"])&&strlen($h)){$r[$f]=html_entity_decode(strip_tags($h));if(ereg('text|blob',$c["type"])){$xa=$p->selectLengthProcess();}}$nc+=$c["privileges"];}function
apply_sql_function($x,$J){return($x?($x=="distinct"?"COUNT(DISTINCT ":strtoupper("$x("))."$J)":$J);}list($t,$P)=$p->selectColumnsProcess($r,$s);$w=$p->selectSearchProcess($k,$s);$la=$p->selectOrderProcess($k,$s);$R=$p->selectLimitProcess();$Ka=($t?implode(", ",$t):"*")." FROM ".idf_escape($_GET["select"]).($w?" WHERE ".implode(" AND ",$w):"");$ic=($P&&count($P)<count($t)?" GROUP BY ".implode(", ",$P):"").($la?" ORDER BY ".implode(", ",$la):"");if($_POST&&!$m){$sc="(".implode(") OR (",array_map('where_check',(array)$_POST["check"])).")";$Yb=($s["PRIMARY"]?($t?array_flip($s["PRIMARY"]["columns"]):array()):null);foreach($t
as$f=>$b){$b=$_GET["columns"][$f];if(!$b["fun"]){unset($Yb[$b["col"]]);}}if($_POST["export"]){dump_headers($_GET["select"]);dump_table($_GET["select"],"");if(!is_array($_POST["check"])||$Yb===array()){dump_data($_GET["select"],"INSERT","SELECT $Ka".(is_array($_POST["check"])?($w?" AND ":" WHERE ")."($sc)":"").$ic);}else{$Ec=array();foreach($_POST["check"]as$b){$Ec[]="(SELECT $Ka ".($w?"AND ":"WHERE ").where_check($b).$ic." LIMIT 1)";}dump_data($_GET["select"],"INSERT",implode(" UNION ALL ",$Ec));}exit;}if(!$p->selectEmailProcess($w)){if(!$_POST["import"]){$e=true;$Ub=0;$bc=($_POST["delete"]?($_POST["all"]&&!$w?"TRUNCATE ":"DELETE FROM "):($_POST["clone"]?"INSERT INTO ":"UPDATE ")).idf_escape($_GET["select"]);$u=array();if(!$_POST["delete"]){foreach($r
as$h=>$b){$b=process_input($k[$h]);if($_POST["clone"]){$u[]=($b!==false?$b:idf_escape($h));}elseif($b!==false){$u[]=idf_escape($h)." = $b";}}$bc.=($_POST["clone"]?"\nSELECT ".implode(", ",$u)."\nFROM ".idf_escape($_GET["select"]):" SET\n".implode(",\n",$u));}if($_POST["delete"]||$u){if($_POST["all"]||($Yb===array()&&$_POST["check"])){$e=queries($bc.($_POST["all"]?($w?"\nWHERE ".implode(" AND ",$w):""):"\nWHERE $sc"));$Ub=$d->affected_rows;}else{foreach((array)$_POST["check"]as$b){$e=queries($bc."\nWHERE ".where_check($b).(count($P)<count($t)?"":"\nLIMIT 1"));if(!$e){break;}$Ub+=$d->affected_rows;}}}query_redirect(queries(),remove_from_uri("page"),lang(191,$Ub),$e,false,!$e);}elseif(is_string($Ea=get_file("csv_file"))){$Ea=preg_replace("~^\xEF\xBB\xBF~",'',$Ea);$Oa="";$V=array();preg_match_all('~("[^"]*"|[^"\\n]+)+~',$Ea,$G);foreach($G[0]as$f=>$b){$a=array();preg_match_all('~(("[^"]*")+|[^,]*),~',"$b,",$kc);if(!$f&&!array_diff($kc[1],array_keys($k))){$Oa=" (".implode(", ",array_map('idf_escape',$kc[1])).")";}else{foreach($kc[1]as$pb){$a[]=(!strlen($pb)?"NULL":$d->quote(str_replace('""','"',preg_replace('~^"|"$~','',$pb))));}$V[]="\n(".implode(", ",$a).")";}}$e=queries("INSERT INTO ".idf_escape($_GET["select"])."$Oa VALUES".implode(",",$V));query_redirect(queries(),remove_from_uri("page"),lang(192,$d->affected_rows),$e,false,!$e);}else{$m=upload_error($Ea);}}}page_header(lang(14).": ".$p->tableName($ya),$m);$A=column_foreign_keys($_GET["select"]);echo"<p>";if(isset($nc["insert"])){$u="";foreach((array)$_GET["where"]as$b){if(count($A[$b["col"]])==1&&($b["op"]=="="||($b["op"]==""&&!ereg('[_%]',$b["val"])))){$u.="&set".urlencode("[".bracket_escape($b["col"])."]")."=".urlencode($b["val"]);}}echo'<a href="'.h(ME.'edit='.urlencode($_GET['select']).$u).'">'.lang(81).'</a> ';}echo$p->selectLinks($ya);if(!$r){echo"<p class='error'>".lang(193).($k?"":": ".h($d->error)).".\n";}else{echo"<form action='' id='form'>\n"."<div style='display: none;'>";echo(strlen($_GET["server"])?'<input type="hidden" name="server" value="'.h($_GET["server"]).'">':"").(strlen($_GET["db"])?'<input type="hidden" name="db" value="'.h($_GET["db"]).'">':"");echo'<input type="hidden" name="select" value="'.h($_GET["select"]).'">'."</div>\n";$p->selectColumnsPrint($t,$r);$p->selectSearchPrint($w,$r,$s);$p->selectOrderPrint($la,$r,$s);$p->selectLimitPrint($R);$p->selectLengthPrint($xa);$p->selectActionPrint($xa);echo"</form>\n";$l="SELECT ".(intval($R)&&$P&&count($P)<count($t)?"SQL_CALC_FOUND_ROWS ":"").$Ka.$ic.(strlen($R)?" LIMIT ".intval($R).(intval($_GET["page"])?" OFFSET ".($R*$_GET["page"]):""):"");echo$p->selectQuery($l);$e=$d->query($l);if(!$e){echo"<p class='error'>".h($d->error)."\n";}else{$rb=array();echo"<form action='' method='post' enctype='multipart/form-data'>\n";if(!$e->num_rows){echo"<p class='message'>".lang(2)."\n";}else{$V=array();while($a=$e->fetch_assoc()){$V[]=$a;}$e->free();$sb=(intval($R)&&$P&&count($P)<count($t)?$d->result($d->query(" SELECT FOUND_ROWS()")):count($V));$rd=$p->rowDescriptions($V,$A);$xc=$p->backwardKeys($_GET["select"]);$Ca=array_keys($xc);if($Ca){$Ca=array_filter(array_combine($Ca,array_map(array($p,'tableName'),array_map('table_status',$Ca))),'strlen');}echo"<table cellspacing='0' class='nowrap'>\n"."<thead><tr><td><input type='checkbox' id='all-page' onclick='form_check(this, /check/);'>";$Jb=array();reset($t);$la=1;foreach($V[0]as$f=>$b){$b=$_GET["columns"][key($t)];$c=$k[$t?$b["col"]:$f];$h=($c?$p->fieldName($c,$la):"*");if(strlen($h)){$la++;$Jb[$f]=$h;echo'<th><a href="'.h(remove_from_uri('(order|desc)[^=]*').'&order%5B0%5D='.urlencode($f).($_GET["order"]==array($f)&&!$_GET["desc"][0]?'&desc%5B0%5D=1':'')).'">'.apply_sql_function($b["fun"],$h)."</a>";}next($t);}echo($Ca?"<th>".lang(194):"")."</thead>\n";foreach($rd
as$Ib=>$a){$Kb=implode('&amp;',unique_idf($V[$Ib],$s));echo"<tr".odd()."><td><input type='checkbox' name='check[]' value='$Kb' onclick=\"this.form['all'].checked = false; form_uncheck('all-page');\">".(count($t)!=count($P)||information_schema($_GET["db"])?'':" <a href='".h(ME)."edit=".urlencode($_GET['select'])."&amp;$Kb'>".lang(96)."</a>");foreach($a
as$f=>$b){if(isset($Jb[$f])){if(strlen($b)&&(!isset($rb[$f])||strlen($rb[$f]))){$rb[$f]=(is_email($b)?$Jb[$f]:"");}$v="";$b=$p->editVal($b,$k[$f]);if(!isset($b)){$b="<i>NULL</i>";}else{if(ereg('blob|binary',$k[$f]["type"])&&strlen($b)){$v=h(ME.'download='.urlencode($_GET["select"]).'&field='.urlencode($f).'&').$Kb;}if(!strlen(trim($b," \t"))){$b="&nbsp;";}elseif(strlen($xa)&&ereg('blob|text',$k[$f]["type"])&&is_utf8($b)){$b=nl2br(shorten_utf8($b,max(0,intval($xa))));}else{$b=nl2br(h($b));}if(!$v){foreach((array)$A[$f]as$D){if(count($A[$f])==1||count($D["source"])==1){foreach($D["source"]as$g=>$N){$v.=where_link($g,$D["target"][$g],$V[$Ib][$N]);}$v=h((strlen($D["db"])?preg_replace('~([?&]db=)[^&]+~','\\1'.urlencode($D["db"]),ME):ME).'select='.urlencode($D["table"]).$v);break;}}}}if(!$v&&is_email($b)){$v="mailto:$b";}$b=$p->selectVal($b,$v,$k[$f]);echo"<td>$b";}}if($Ca){echo"<td>";foreach($Ca
as$o=>$h){foreach($xc[$o]as$r){$v=ME.'select='.urlencode($o);$g=0;foreach($r
as$J=>$b){$v.=where_link($g++,$J,$V[$Ib][$b]);}echo" <a href='".h($v)."'>$h</a>";}}}echo"\n";}echo"</table>\n";if(intval($R)&&count($P)>=count($t)){ob_flush();flush();$sb=$d->result($d->query("SELECT COUNT(*) FROM ".idf_escape($_GET["select"]).($w?" WHERE ".implode(" AND ",$w):"")));}echo"<p>";if(intval($R)&&$sb>$R){$Cb=floor(($sb-1)/$R);echo
lang(195).":".pagination(0).($_GET["page"]>3?" ...":"");for($g=max(1,$_GET["page"]-2);$g<min($Cb,$_GET["page"]+3);$g++){echo
pagination($g);}echo($_GET["page"]+3<$Cb?" ...":"").pagination($Cb);}echo" (".lang(98,$sb).') <label><input type="checkbox" name="all" value="1">'.lang(196)."</label>\n".(information_schema($_GET["db"])?"":"<fieldset><legend>".lang(13)."</legend><div><input type='submit' name='edit' value='".lang(13)."'> <input type='submit' name='clone' value='".lang(197)."'> <input type='submit' name='delete' value='".lang(198)."'$sa></div></fieldset>\n");echo"<fieldset><legend>".lang(89)."</legend><div>$pd $qd <input type='submit' name='export' value='".lang(89)."'></div></fieldset>\n";}echo"<fieldset><legend>".lang(199)."</legend><div><input type='hidden' name='token' value='$I'><input type='file' name='csv_file'> <input type='submit' name='import' value='".lang(200)."'></div></fieldset>\n";$p->selectEmailPrint(array_filter($rb,'strlen'));echo"</form>\n";}}}elseif(isset($_GET["variables"])){page_header(lang(51));echo"<table cellspacing='0'>\n";$e=$d->query("SHOW VARIABLES");while($a=$e->fetch_assoc()){echo"<tr>"."<th><code class='jush-sqlset'>".h($a["Variable_name"])."</code>";echo"<td>".(strlen(trim($a["Value"]))?h($a["Value"]):"&nbsp;");}$e->free();echo"</table>\n";}else{$Db=array_merge((array)$_POST["tables"],(array)$_POST["views"]);if($Db&&!$m){$e=true;$ea="";if(count($_POST["tables"])>1){queries("SET foreign_key_checks = 0");}if(isset($_POST["truncate"])){if($_POST["tables"]){foreach($_POST["tables"]as$o){if(!queries("TRUNCATE ".idf_escape($o))){$e=false;break;}}$ea=lang(201);}}elseif(isset($_POST["move"])){$rc=array();foreach($Db
as$o){$rc[]=idf_escape($o)." TO ".idf_escape($_POST["target"]).".".idf_escape($o);}$e=queries("RENAME TABLE ".implode(", ",$rc));$ea=lang(202);}elseif((!isset($_POST["drop"])||!$_POST["views"]||queries("DROP VIEW ".implode(", ",array_map('idf_escape',$_POST["views"]))))&&(!$_POST["tables"]||($e=queries((isset($_POST["optimize"])?"OPTIMIZE":(isset($_POST["check"])?"CHECK":(isset($_POST["repair"])?"REPAIR":(isset($_POST["drop"])?"DROP":"ANALYZE"))))." TABLE ".implode(", ",array_map('idf_escape',$_POST["tables"])))))){if(isset($_POST["drop"])){$ea=lang(203);}else{while($a=$e->fetch_assoc()){$ea.=h("$a[Table]: $a[Msg_text]")."<br>";}}}query_redirect(queries(),substr(ME,0,-1),$ea,$e,false,!$e);}page_header(lang(45).": ".h($_GET["db"]),$m,false);echo'<p><a href="'.h(ME).'database=">'.lang(134)."</a>\n".'<p><a href="'.h(ME).'schema=">'.lang(88)."</a>\n";echo"<h3>".lang(204)."</h3>\n";$ya=table_status();if(!$ya){echo"<p class='message'>".lang(29)."\n";}else{echo"<form action='' method='post'>\n"."<table cellspacing='0' class='nowrap'>\n";echo'<thead><tr class="wrap"><td><input id="check-all" type="checkbox" onclick="form_check(this, /^(tables|views)\[/);"><th>'.lang(76).'<td>'.lang(205).'<td>'.lang(206).'<td>'.lang(207).'<td>'.lang(208).'<td>'.lang(209).'<td>'.lang(63).'<td>'.lang(210).'<td>'.lang(64)."</thead>\n";foreach($ya
as$a){$h=$a["Name"];table_comment($a);echo'<tr'.odd().'><td><input type="checkbox" name="'.(isset($a["Rows"])?'tables':'views').'[]" value="'.h($h).'"'.(in_array($h,$Db,true)?' checked':'').' onclick="form_uncheck(\'check-all\');">'.'<th><a href="'.h(ME).'table='.urlencode($h).'">'.h($h).'</a>';if(isset($a["Rows"])){echo"<td>$a[Engine]<td>$a[Collation]";foreach(array("Data_length"=>"create","Index_length"=>"indexes","Data_free"=>"edit","Auto_increment"=>"create","Rows"=>"select")as$f=>$v){$b=number_format($a[$f],0,'.',lang(211));echo'<td align="right">'.(strlen($a[$f])?'<a href="'.h(ME."$v=").urlencode($h).'">'.str_replace(" ","&nbsp;",($f=="Rows"&&$a["Engine"]=="InnoDB"&&$b?lang(94,$b):$b)).'</a>':'&nbsp;');}echo"<td>".(strlen(trim($a["Comment"]))?h($a["Comment"]):"&nbsp;");}else{echo'<td colspan="8"><a href="'.h(ME)."select=".urlencode($h).'">'.lang(75).'</a>';}}echo"</table>\n"."<p><input type='hidden' name='token' value='$I'><input type='submit' value='".lang(212)."'> <input type='submit' name='optimize' value='".lang(213)."'> <input type='submit' name='check' value='".lang(214)."'> <input type='submit' name='repair' value='".lang(215)."'> <input type='submit' name='truncate' value='".lang(216)."'$sa> <input type='submit' name='drop' value='".lang(136)."'$sa>\n";$Ha=get_databases();if(count($Ha)!=1){$B=(isset($_POST["target"])?$_POST["target"]:$_GET["db"]);echo"<p>".lang(217).($Ha?": <select name='target'>".optionlist($Ha,$B)."</select>":': <input name="target" value="'.h($B).'">')." <input type='submit' name='move' value='".lang(218)."'>\n";}echo"</form>\n";}if($d->server_info>=5){echo'<p><a href="'.h(ME).'view=">'.lang(154)."</a>\n"."<h3>".lang(219)."</h3>\n";$e=$d->query("SELECT * FROM information_schema.ROUTINES WHERE ROUTINE_SCHEMA = ".$d->quote($_GET["db"]));if($e->num_rows){echo"<table cellspacing='0'>\n";while($a=$e->fetch_assoc()){echo"<tr>"."<td>".h($a["ROUTINE_TYPE"]);echo'<th><a href="'.h(ME).($a["ROUTINE_TYPE"]=="FUNCTION"?'callf=':'call=').urlencode($a["ROUTINE_NAME"]).'">'.h($a["ROUTINE_NAME"]).'</a>'.'<td><a href="'.h(ME).($a["ROUTINE_TYPE"]=="FUNCTION"?'function=':'procedure=').urlencode($a["ROUTINE_NAME"]).'">'.lang(84)."</a>";}echo"</table>\n";}$e->free();echo'<p><a href="'.h(ME).'procedure=">'.lang(172).'</a> <a href="'.h(ME).'function=">'.lang(171)."</a>\n";}if($d->server_info>=5.1&&($e=$d->query("SHOW EVENTS"))){echo"<h3>".lang(220)."</h3>\n";if($e->num_rows){echo"<table cellspacing='0'>\n"."<thead><tr><th>".lang(155)."<td>".lang(221)."<td>".lang(161)."<td>".lang(162)."</thead>\n";while($a=$e->fetch_assoc()){echo"<tr>".'<th><a href="'.h(ME).'event='.urlencode($a["Name"]).'">'.h($a["Name"])."</a>";echo"<td>".($a["Execute at"]?lang(222)."<td>".$a["Execute at"]:lang(163)." ".$a["Interval value"]." ".$a["Interval field"]."<td>$a[Starts]")."<td>$a[Ends]";}echo"</table>\n";}$e->free();echo'<p><a href="'.h(ME).'event=">'.lang(160)."</a>\n";}}}page_footer();