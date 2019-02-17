/*
* update: 2011-09-28
* author: Storm
*/

/*全选、反选、全不选*/
function alls(e){
  var sum = document.getElementsByName(e);
  for(var i=0;i<sum.length;i++){
    if(sum[i].type=="checkbox"){
      sum[i].checked = true ;
    }
  }
}
function unalls(e){
  var sum = document.getElementsByName(e);
  for(var i=0;i<sum.length;i++){
    if(sum[i].type=="checkbox"){
      sum[i].checked = false ;
    }
  }
}
function resets(e){
  var sum = document.getElementsByName(e);
  for(var i=0;i<sum.length;i++){
    if(sum[i].type=="checkbox"){
     sum[i].checked= !sum[i].checked;
    }
  }
}

/*
 * 时间日期，全兼容
 * 直接调用tick()
 */
function showLocale(objD){
  var str,colorhead,colorfoot;
  var yy = objD.getYear();
  var warr=['星期日','星期一','星期二','星期三','星期四','星期五','星期六'];
  if(yy<1900) yy = yy+1900;
  var MM = objD.getMonth()+1;
  if(MM<10) MM = '0' + MM;
  var dd = objD.getDate();
  if(dd<10) dd = '0' + dd;
  var hh = objD.getHours();
  if(hh<10) hh = '0' + hh;
  var mm = objD.getMinutes();
  if(mm<10) mm = '0' + mm;
  var ss = objD.getSeconds();
  if(ss<10) ss = '0' + ss;
  var ww = objD.getDay();
  if  ( ww==0 || ww==6 ) {
    color='#FF0000';
  }
  if  ( ww > 0 && ww < 6 ){
    color='#000000';
  }
  var  colorhead='<font color="'+color+'">';
  var  colorfoot='</font>';

  str ='现在时间是：'+ colorhead + yy + "-" + MM + "-" + dd + " " + hh + ":" + mm + ":" + ss + "  " + warr[ww] + colorfoot;
  return str;
}
function tick(){
  var today;
  today = new Date();
  document.getElementById("localtime").innerHTML = showLocale(today);
  setTimeout(tick, 1000);
}

function addrecclass(e){
  var ipDiv=document.getElementById(e);
  ipDiv.style.display='block';
}
function closeDiv(e){
  var ipDiv=document.getElementById(e);
  ipDiv.style.display='none';
}