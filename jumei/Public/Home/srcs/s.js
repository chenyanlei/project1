﻿(function(){var cT=navigator.userAgent.toLowerCase()||'';if(cT.indexOf('spider')> -1||cT.indexOf('msnbot')> -1||cT.indexOf('networkbench')> -1)return false;var cD="3.1.0.8";var H=document;var O=window;var bF=navigator;var bm=Image;var bk=Array;var k=encodeURIComponent;var f=decodeURIComponent;var aC="cookie";var r="length";var V="indexOf";var aA="substring";var t="split";var aG="location";var cd="protocol";var bv="replace";var ad="zpclkid";var cF="zpdl";var bZ="";var v="__zp_smartpixel_list";var bX='';var aK;function _getZID(cA){function _zpJsLoad(cP){var aD=document.createElement('script');if(typeof cP.id!='undefined')aD.id=cP.id;aD.setAttribute('type','text/javascript');aD.setAttribute('src',cP.url);aD.setAttribute('charset','utf-8');document.getElementsByTagName('head')[0].appendChild(aD);function _over(){aD.onreadystatechange=aD.onload=null;};function _call(){_over();cP.cy&&cP.cy.apply(cP);};aD.onreadystatechange=function(){if(this.readyState=='loaded'||this.readyState=='complete'){_call();}};aD.onload=aD.onerror=_call;};function _runFunList(){B['zid']=B['zid']||'';while(B['funList'][0]){var cR=B['funList'].shift();cR&&cR(B['zid']);}};var B=window['__zpCMSDCB'];if(!B){B=window['__zpCMSDCB']=function(cC){if(B['zid']||B['bw'])return;B['bw']=B['zid']=B['zid']||B['bw']||(cC&&cC.data)||'';}}B['funList']=B['cE']=B['funList']||B['cE']||[];B['bw']=B['zid']=B['zid']||B['bw']||cA.bc;B['funList'].push(cA.cX);if(B['isGet']||B['ds']||B['zid']){_runFunList();}if(!B['zid']&& !B['isTouch']&& !B['dj']){B['isTouch']=1;B['dj']=1;_zpJsLoad({url:L('//cms.gtags.net/g?z=__zpCMSDCB'),cy:function(){B['isGet']=1;B['ds']=1;_runFunList();}});}};function _isIE678(){var by=navigator.userAgent||'';if(by.indexOf('MSIE 8.0')> -1||by.indexOf('MSIE 7.0')> -1||by.indexOf('MSIE 6.0')> -1)return true;else return false;};function _isEmpty(cC){for(var i in cC){return false;}return true;};var aZ=function(name){var cl=k(name)+"=";var bq=H[aC][V](cl);var bR="";if(bq> -1){var bK=H[aC][V](";",bq);if(bK== -1){bK=H[aC][r];}bR=f(H[aC][aA](bq+cl[r],bK));}return bR;};var ba=function(name,value,expires,ct,domain,ci){var aV=k(name)+"="+k(value);if(expires instanceof Date){aV+="; expires="+expires.toGMTString();}if(ct){aV+="; path="+ct;}if(domain){aV+="; domain="+domain;}if(ci){aV+="; secure";}H[aC]=aV;};var cB=function(name,ct,domain,ci){ba(name,"",new Date(0),ct,domain,ci);};var ae=function(URL){var A=new Object();if(URL[V]("?")>0){var bu=URL[aA](URL[V]("?")+1);if(bu[V]("#")>0){bu=bu[aA](0,bu[V]("#"));}var aO=bu[t]("&");for(var i=0;i<aO[r];i++){A[aO[i][t]("=")[0]]=aO[i][t]("=")[1];}}return A;};var cv=function(av,aB,aU){if(av.addEventListener){av.addEventListener(aB,aU,false);}else if(av.attachEvent){av.attachEvent("on"+aB,aU);}else{av["on"+aB]=aU;}};var cq=function(av,aB,aU){if(av.removeEventListener){av.removeEventListener(aB,aU,false);}else if(av.detachEvent){av.detachEvent("on"+aB,aU);}else{av["on"+aB]=null;}};var bs=function(){var bj=O.screen;return bj.width+"x"+bj.height;};var bf=function(){return H.characterSet||H.charset;};var bx=function(){return bF.language||bF.userLanguage;};var bO=function(){return H.title;};var L=function(cL){var bC="";try{bC="https:"==H[aG][cd]?"https:":"http:";}catch(e){}return bC+cL;};var aM=function(){var cI=O[aG].href;if(cI&&cI!=""){return cI[bv](/\s/g," ");}return "";};var bw=function(){var cw="";try{cw=H.referrer;}catch(ex){}if(cw==""){try{if(opener&&opener[aG]){cw=opener[aG].href;}}catch(ex){}}if(cw&&cw!=""){return cw[bv](/\s/g," ");}return cw;};var bE=function(bT){if(bT)return bT;var cI=aM();var aX=/[\w-]+\.(com|net|org|gov|cc|biz|info|cn|cc|tv|hk|biz|asia|me|mobi|name|info|so|co|in|la)(\.(cn|hk))*/;var be=cI.match(aX);if(be&&be.length>0){return be[0];}return null;};var bb=function(){var cx=String(Date.parse(new Date()));return cx.substr(0,cx.length-3);};var K=function(bV){if(bV){bV=bV.replace(/[\s#,|]/g," ");}return bV;};var J=function(bV){if(bV&&typeof bV=="string"){bV=bV.replace(/^(\s|\u00A0)+/,'').replace(/(\s|\u00A0)+$/,'');}return bV;};var ab=[["m.baidu","word"],["wap.baidu","word"],["opendata.baidu","wd"],["baidu","word"],["baidu","wd"],["baidu","q1"],["baidu","kw"],["google","q"],["soso","w"],["sogou","query"],["youdao","q"],["bing","q"],["yahoo","p"],["so.360.cn","q"],["360so","q"],["360sou","q"],["so.com","q"],["ask","q"],["3721","name"],["vent","kw"],["ucweb","keyword"],["ucweb","word"],["114so","kw"],["haosou","q"],["chinaso","q"],["zhongsou","w"],["etao.com","q"],[".sm.cn","q"]];var as=function(bp){var aX=/^https?:\/\/(.*?)($|\/.*)/;var be=aX.exec(bp);if(be!=null){var result="";result=be[1];var A=ae(bp);for(var i=0;i<ab.length;i++){if(result[V](ab[i][0])>=0){if(typeof A[ab[i][1]]!="undefined"){return[2,K(result),"","",K(A[ab[i][1]]),""];}}}return[3,K(result),"","","",""];}else{return[3,K(bp),"","","",""];}};var co=function(){var ag=false;var aP=false;var aq=null;var cM=null;var ai=0;var aW=0;var at=0;var T=0;var am=4;var aa="";var Y="";var U="";var ac="";var ak="";var az=0;var aT=0;var R="";var X="";var Z="";var bA="//dat.gtags.net/";var bW="//cms.gtags.net/";var F="w";var bi="//ut.gtags.net/imp/material";var aE="//ut.gtags.net/imp/conv";var aL=function(w){if(w instanceof bk&&w[r]==2)return w[1];return "";};var cp=function(w){if(w instanceof bk&&w.length==2){if(w[1]=="p"){F="p";}else if(w[1]==""){F="";}}};var bS=function(w){if(w instanceof bk&&w.length==3)ab.push([w[1],w[2]]);};var D="";var bU=function(w){D=aL(w);};var aN=bE();var ck=function(w){aN=aL(w);};var ar="";var ce=function(w){ar=aL(w);};var o="";var cj=function(w){o=aL(w);};var aw="";var bG=function(w){aw=aL(w);};var bg="";var cf=function(w){bg=aL(w);};var l="";var cc=function(w){if(w instanceof bk){var j=w[r];if(j>16){j=16;}var i=1;var cg=[];while(i<j){cg.push(k(J(w[i])));i++;}l=cg.join(",");}};var bY="",bn={};var bB={"_addOrganic":bS,"_setAccount":bU,"_setDomain":ck,"_setPageID":cj,"_setPageType":bG,"_setParams":cc,"_setUserID":ce,"_setMType":cp,"_setSiteID":cf};var an="";var bM="";var bL="";var aJ="";var ay="";function processZamplusTagParams(c){c=aK||c;an="";if(typeof c=="object"){for(var i in c){if(c.hasOwnProperty(i)){var cr=J(i);var value=c[i];if(cr=="p_zp_type"){if(typeof value=="string"||typeof value=="number"){bM=k(J(value))};}else if(cr=="p_zp_uuid"){if(typeof value=="string"||typeof value=="number"){bL=k(J(value))};}else if(cr=="p_zp_conversion"){if(typeof value=="string"||typeof value=="number"){aJ=k(J(value))};}else if(cr=="p_zp_convinfo"){if(typeof value=="string"||typeof value=="number"){ay=k(J(value))};}else if(cr=="p_zp_prodstype"){if(typeof value=="string"||typeof value=="number"){bY=k(J(value))};}else if(cr=="p_zp_prods"){if(typeof value=="object"&&(!(value instanceof Array))&& !_isEmpty(value)){for(var m in value){if(value[m]!='')bn[m]=value[m];}}}else{if(value instanceof bk){for(var j in value){if(value.hasOwnProperty(j)){value[j]=k(J(value[j]));}}an+=k(cr)+"="+value.join(",")+";";}else if(typeof value=="string"||typeof value=="number"||typeof value=="boolean"){an+=k(cr)+"="+k(J(value))+";";}}}}}if(an!=""){return an[aA](0,an[r]-1);}return an;};var bQ=function(){if(F==""){return;}if(O[v][F+'_'+D]){return;}var cn=bW+F;var ap=L(cn)+"?a="+D;ap+="&zid="+bX;if(ar!=""){ap+="&xid="+ar;}if(F=="w"){O[v][F+'_'+D]=true;var aj=H.createElement('iframe');aj.setAttribute('scrolling','no');aj.frameBorder='0';aj.src=ap;aj.style.cssText='width:1px;height:1px;position:fixed;_position:absolute;left:0px;top:0px;margin:0px;padding:0px;z-index:2147483648';setTimeout(function(){try{H.body&&H.body.insertBefore(aj,H.body.firstChild);return;}catch(e){setTimeout(arguments.callee,13);}},13);setTimeout(function(){try{aj.parentNode.removeChild(aj);}catch(e){}},10000);}else if(F=="p"){var cz=new bm();cz.src=ap;O[v][F+'_'+D]=cz;}};var cU=function(P,G){var ap="";if(!(L()[V]("https")==0||F=="")){var cn=bW+F;ap=L(cn)+"?a="+D;ap+="&zid="+bX;if(ar!=""){ap+="&xid="+ar;}}if(O[v][F+'_'+D]){ap="";}if(ap&&(F=="w"||F=="")&& !(L()[V]("https")==0)){O[v][F+'_'+D]=true;var aj=H.createElement('iframe');aj.setAttribute('scrolling','no');aj.frameBorder='0';aj.src=G.replace('{{cm}}','&url='+encodeURIComponent(ap));aj.style.cssText='width:1px;height:1px;position:fixed;_position:absolute;left:0px;top:0px;margin:0px;padding:0px;z-index:2147483648';var aR=H.createElement('iframe');aR.setAttribute('scrolling','no');aR.frameBorder='0';aR.src='about:blank';aR.style.cssText='width:1px;height:1px;position:fixed;_position:absolute;left:0px;top:0px;margin:0px;padding:0px;z-index:2147483648';setTimeout(function(){try{H.body&&H.body.insertBefore(aj,H.body.firstChild);H.body&&H.body.insertBefore(aR,H.body.firstChild);return;}catch(e){setTimeout(arguments.callee,13);}},13);setTimeout(function(){try{aj.parentNode.removeChild(aj);aR.parentNode.removeChild(aR);}catch(e){}},10000);}else{O[v][F+'_'+D]=true;aq=new bm();if(!O[v][P]){O[v][P]=[];}O[v][P].push(aq);aq.src=G.replace('{{cm}}',ap?'&url='+encodeURIComponent(ap):'');}};var bt=function(type){var P="";var n='a='+D;n+='&zid='+bX;if(Z!=""){n=n+'&rid='+k(Z);}if(ar!=""){n=n+'&uid='+k(ar);}if(type==2){P="imp/dasp";if(o!=""){n=n+'&pi='+o;}if(aw!=""){n=n+'&pt='+aw;}if(l!=""){n=n+"&args="+l;}}else if(type==3){P="imp/dasp3";if(!O.zamplus_tag_params){O.zamplus_tag_params={};}n=n+"&ext_args="+k(processZamplusTagParams(O.zamplus_tag_params));}if(bM!=""){n=n+'&type='+bM;}if(bL!=""){n=n+'&uuid='+bL;}if(bg!=""){n=n+'&siteid='+k(bg);}n=n+'&vc='+ai+'&vt='+aW+'&vpc='+T+'&rvt='+at+'&fr='+az+'&vrt='+aT+'&ot='+am;if(aa!=""){n=n+'&os='+k(aa);}if(Y!=""){n=n+'&om='+k(Y);}if(U!=""){n=n+'&oc='+k(U);}if(ac!=""){n=n+'&ok='+k(ac);}if(ak!=""){n=n+'&oa='+k(ak);}if(X!=""){n=n+'&u='+k(X);}n=n+'&sc='+k(bs())+'&ch='+k(bf())+'&la='+k(bx())+'&ti='+k(bO())+'&v='+cD;if(R!=""){n=n+'&ru='+k(R);}n=n+'&t=1&r='+Math.random();var G=L(bA+P)+"?"+n;if(G.length>2084&&_isIE678()){n=n.replace('&u='+k(X),'');G=(L(bA+P)+"?argserror=true&"+n).substring(0,2084);}return[P,G];};var cu=function(){var P="";var G="";var bd="";if(ag){bd=bt(3);}else if(aP){bd=cG();}P=bd[0];G=bd[1];aq=new bm();if(!O[v][P]){O[v][P]=[];}O[v][P].push(aq);aq.src=G;bQ();az=0;};function _invokeZpdl(bN,cW){var cH='rid='+cW+'&zid='+bX;if(bN.indexOf('?')>=0){bN+='&'+cH;}else{bN+='?'+cH;}var aY=document.createElement('iframe');aY.setAttribute('scrolling','no');aY.frameBorder='0';aY.src=bN;aY.style.cssText='width:1px;height:1px;position:fixed;_position:absolute;left:0px;top:0px;margin:0px;padding:0px;z-index:2147483648';setTimeout(function(){try{document.body&&document.body.insertBefore(aY,document.body.firstChild);return;}catch(e){setTimeout(arguments.callee,13);}},13);setTimeout(function(){try{aY.parentNode.removeChild(aY);}catch(e){}},10000);};var cs=function(){var n='a='+D+'&t='+bY;for(var i in bn){n+='&'+i+'='+k(J(bn[i]));}n+='&_='+(Math.random()+'').substr(2);var G=L(bi)+"?"+n;if(!(G.length>2084&&_isIE678())){var bH=new bm();O[v][bi]=bH;bH.src=G;}};var cb=function(){var n="a="+D+"&c="+aJ+'&zid='+bX+'&allow=0&type=23';if(Z!=""){n=n+'&i='+k(Z);}if(ay!=""){n=n+"&info="+ay;}if(X!=""){n=n+'&u='+k(X);}if(R!=""){n=n+'&ru='+k(R);}n+="&r="+Math.random();var G=L(aE)+"?"+n;if(G.length>2084&&_isIE678()){n=n.replace('&u='+k(X),'');G=(L(aE)+"?argserror=true&"+n).substring(0,2084);}var bH=new bm();O[v][aE+'_'+D]=bH;bH.src=G;};var bD=function(M,C){try{if(C.length>=6){am=C[0];aa=C[1];Y=C[2];U=C[3];ac=C[4];ak=C[5];}}catch(cY){}var al=[];var A=ae(X);if(typeof A[ad]!="undefined"||(typeof A["utm_source"]!="undefined"&&typeof A["utm_campaign"]!="undefined"&&typeof A["utm_medium"]!="undefined")){if(typeof A[ad]!="undefined"){aa="zampda";Y="zampda";U=K(A[ad]);ac=as(R)[4];ak="";}else{aa=K(A["utm_source"]);Y=K(A["utm_medium"]);U=K(A["utm_campaign"]);if(typeof A["utm_term"]!="undefined"){ac=K(A["utm_term"]);}else{ac=as(R)[4];}if(typeof A["utm_content"]!="undefined"){ak=K(A["utm_content"]);}else{ak="";}}am=1;return[true,[am,aa,Y,U,ac,ak].join("|")];}else if(!(R==""||R==null||R=="undefined")){var ca=new RegExp("^https?:\/\/[\\w\\.]*?"+aN+"($|\/.*|:.*)");if(!ca.test(R)){al=as(R);if(al[0]==2||(al[0]==3&&M)){am=al[0];aa=al[1];ac=al[4];Y=U=ak="";return[true,al.join("|")];}else{return[false,C.join("|")];}}}if(M&&C.length==0){am=4;aa=Y=U=ac=ak="";return[true,[am,"","","","",""].join("|")];}return[false,C.join("|")];};var bJ=function(url){var A=ae(X);if(typeof A[ad]!="undefined"){return A[ad];}return "";};var bP=function(){var aF=new Date();aF.setTime(aF.getTime()+2*365*24*60*60*1000);ai=0;aW=0;var af=0;at=0;var Q=0;T=0;var I=bb();var aH="";var aS=bJ(X);var bz="";var ao=aZ("__xsptplus"+D).split("#");var M=false;var C=[];var ax=0;if(!ao||ao.length<5){M=true;}else{aH=ao[2];bz=ao[4];var ah=ao[0].split(".");C=ao[1].split("|");if(ah.length!=5||C.length!=6){M=true;}else{ai=ah[1];af=ah[2];Q=ah[3];T=ah[4];try{ax=(new Date(parseInt(Q+"000"))).getDate();}catch(cY){}if(I-Q>=30*60){M=true;}if(ax!=(new Date(parseInt(I+"000"))).getDate()){M=true;}}}var aQ=[true,""];if(Q>0){aT=parseInt((I-Q)/86400);}if(M){ai++;az=1;Z=aS;T=0;af=I;aQ=bD(M,C);}else{aQ=bD(M,C);M=aQ[0];if(M){ai++;az=1;Z=aS;T=0;af=I;}else{Z=aH;aW=I-af;at=I-Q;}}var au=ae(X);if(au[ad]&&(au[cF]&&decodeURIComponent(au[cF]))&&bz!=au[ad]){bz=au[ad];bZ=decodeURIComponent(au[cF]);}T++;var cJ=D+"."+ai+"."+af+"."+I+"."+T+"#"+aQ[1]+"#"+Z+"#"+bX+"#"+bz;ba("__xsptplus"+D,cJ,aF,"/",aN);};var bh=function(query){if(query[r]==0){return false;}for(i in query){if(query.hasOwnProperty(i)){if(bB.hasOwnProperty(query[i][0])){bB[query[i][0]](query[i]);}}}if(D=="")return false;return true;};var cG=function(){var c={};if(o=="240"){c["ptype"]="homepage";}else if(o=="241"){c["ptype"]="regpage";}else if(o=="242"){if(l!=""){c["userid"]=f(l);}c["ptype"]="regSuccPage";}else if(o=="243"){if(l!=""){var g=l[t](",");if(g[r]>=3){c["productId_list"]=f(g[0]);c["totalPrice"]=f(g[1]);c["totalNum"]=f(g[2]);}}c["ptype"]="mycartPage";}else if(o=="244"){if(l!=""){var g=l[t](",");if(g[r]>=3){c["productId_list"]=f(g[0]);c["totalPrice"]=f(g[1]);c["totalNum"]=f(g[2]);}}c["ptype"]="orderInfoPage";}else if(o=="245"){if(l!=""){var g=l[t](",");if(g[r]>=3){c["productId_list"]=f(g[0]);c["totalPrice"]=f(g[1]);c["totalNum"]=f(g[2]);}}c["ptype"]="orderInfoPage";}else if(o=="246"){if(l!=""){var g=l[t](",");if(g[r]>=3){c["productId"]=f(g[0]);c["inStock"]=f(g[1]);c["isWine"]=f(g[2]);}}c["ptype"]="productPage";}else if(o=="247"){if(l!=""){var g=l[t](",");if(g[r]>=4){c["productId_list"]=f(g[0]);c["catname"]=f(g[1]);c["catid"]=f(g[2]);c["orderby"]=f(g[3]);}}c["ptype"]="categoryPage";}else if(o=="248"){if(l!=""){var g=l[t](",");if(g[r]>=3){c["productId_list"]=f(g[0]);c["keyword"]=f(g[1]);c["orderby"]=f(g[2]);}}c["ptype"]="searchPage";}else if(o=="358"){if(l!=""){c["cityid"]=f(l);}c["ptype"]="homepage";}else if(o=="360"){if(l!=""){var g=l[t](",");if(g[r]>=2){c["channelid"]=f(g[0]);c["categoryid"]=f(g[1]);}}c["ptype"]="category";}else if(o=="361"){if(l!=""){c["productid"]=f(l);}c["ptype"]="detailpage";}else if(o=="362"){if(l!=""){c["productid"]=f(l);}c["ptype"]="shoppingcart";}else if(o=="457"){c["ptype"]="orderinfo";}else if(o=="809"){c["ptype"]="homepage";}else if(o=="810"){c["ptype"]="logregpage";if(l!=""){c["action"]=f(l);}}else if(o=="811"){c["ptype"]="regSuccPage";if(l!=""){c["userid"]=f(l);}}else if(o=="812"){c["ptype"]="searchPage";if(l!=""){var g=l[t](",");if(g[r]>=3){c["productId_list"]=f(g[0]);c["keyword"]=f(g[1]);c["orderby"]=f(g[2]);}}}else if(o=="813"){c["ptype"]="categoryPage";if(l!=""){var g=l[t](",");if(g[r]>=4){c["productId_list"]=f(g[0]);c["catname"]=f(g[1]);c["catid"]=f(g[2]);c["orderby"]=f(g[3]);}}}else if(o=="814"){c["ptype"]="topicPage";if(l!=""){var g=l[t](",");if(g[r]>=2){c["productId_list"]=f(g[0]);c["topicName"]=f(g[1]);}}}else if(o=="815"){c["ptype"]="productPage";if(l!=""){var g=l[t](",");if(g[r]>=2){c["productId"]=f(g[0]);c["inStock"]=f(g[1]);}}}else if(o=="816"){c["ptype"]="mycartPage";if(l!=""){var g=l[t](",");if(g[r]>=3){c["productId_list"]=f(g[0]);c["totalPrice"]=f(g[1]);c["totalNum"]=f(g[2]);}}}else if(o=="817"){c["ptype"]="orderInfoPage";if(l!=""){var g=l[t](",");if(g[r]>=3){c["productId_list"]=f(g[0]);c["totalPrice"]=f(g[1]);c["totalNum"]=f(g[2]);}}}else if(o=="818"){c["ptype"]="orderSuccPage";if(l!=""){var g=l[t](",");if(g[r]>=3){c["productId_list"]=f(g[0]);c["totalPrice"]=f(g[1]);c["totalNum"]=f(g[2]);}}}else if(o=="752"){c["ptype"]="homepage";}else if(o=="753"){c["ptype"]="regpage";}else if(o=="754"){c["ptype"]="regSuccPage";}else if(o=="755"){c["ptype"]="familysalesPage";}else if(o=="756"){c["ptype"]="chanelPage";if(l!=""){c["chanelName"]=f(l);}}else if(o=="757"){c["ptype"]="searchPage";if(l!=""){var g=l[t](",");if(g[r]>=3){c["productId_list"]=f(g[0]);c["keyword"]=f(g[1]);c["orderby"]=f(g[2]);}}}else if(o=="758"){c["ptype"]="categoryPage";if(l!=""){var g=l[t](",");if(g[r]>=4){c["productId_list"]=f(g[0]);c["catname"]=f(g[1]);c["brand"]=f(g[2]);c["orderby"]=f(g[3]);}}}else if(o=="759"){c["ptype"]="productPage";if(l!=""){var g=l[t](",");if(g[r]>=4){c["productId"]=f(g[0]);c["inStock"]=f(g[1]);c["inventoryDiv"]=f(g[2]);c["flashBuyTime"]=f(g[3]);}}}else if(o=="760"){c["ptype"]="mycartPage";if(l!=""){var g=l[t](",");if(g[r]>=3){c["productId_list"]=f(g[0]);c["totalPrice"]=f(g[1]);c["totalNum"]=f(g[2]);}}}else if(o=="761"){c["ptype"]="orderInfoPage";if(l!=""){var g=l[t](",");if(g[r]>=3){c["productId_list"]=f(g[0]);c["totalPrice"]=f(g[1]);c["totalNum"]=f(g[2]);}}}else if(o=="762"){c["ptype"]="orderSuccPage";if(l!=""){var g=l[t](",");if(g[r]>=3){c["productId_list"]=f(g[0]);c["totalPrice"]=f(g[1]);c["totalNum"]=f(g[2]);}}}else if(o=="854"){c["ptype"]="homepage";}else if(o=="855"){c["ptype"]="logregpage";if(l!=""){c["action"]=f(l);}}else if(o=="856"){c["ptype"]="regSuccPage";if(l!=""){c["userid"]=f(l);}}else if(o=="857"){c["ptype"]="specialPage";if(l!=""){var g=l[t](",");if(g[r]>=3){c["productId_list"]=f(g[0]);c["keyword"]=f(g[1]);c["orderby"]=f(g[2]);}}}else if(o=="858"){c["ptype"]="promotionsPage";if(l!=""){var g=l[t](",");if(g[r]>=2){c["productId_list"]=f(g[0]);c["orderby"]=f(g[1]);}}}else if(o=="859"){c["ptype"]="topicPage";if(l!=""){var g=l[t](",");if(g[r]>=2){c["productId_list"]=f(g[0]);c["topicName"]=f(g[1]);}}}else if(o=="860"){c["ptype"]="productPage";if(l!=""){var g=l[t](",");if(g[r]>=2){c["productId"]=f(g[0]);c["inStock"]=f(g[1]);}}}else if(o=="861"){c["ptype"]="mycartPage";if(l!=""){var g=l[t](",");if(g[r]>=3){c["productId_list"]=f(g[0]);c["totalPrice"]=f(g[1]);c["totalNum"]=f(g[2]);}}}else if(o=="862"){c["ptype"]="orderInfoPage";if(l!=""){var g=l[t](",");if(g[r]>=3){c["productId_list"]=f(g[0]);c["totalPrice"]=f(g[1]);c["totalNum"]=f(g[2]);}}}else if(o=="863"){c["ptype"]="orderSuccPage";if(l!=""){var g=l[t](",");if(g[r]>=3){c["productId_list"]=f(g[0]);c["totalPrice"]=f(g[1]);c["totalNum"]=f(g[2]);}}}else{c["pagetype"]=aw;if(l!=""){var g=l[t](",");for(var i=0;i<g.length;i++){var cO=aw+"_k"+(i+1);c[cO]=f(g[i]).split(",");}}}O.zamplus_tag_params=c;return bt(3);};this.cN=function(){if(typeof _zpq!="undefined"){aP=bh(_zpq);}if(typeof _zampq!="undefined"){ag=bh(_zampq);}window.__zpSMConfig=window.__zpSMConfig||[];if(!ag&& !aP){while(!ag&&__zpSMConfig.length>0){var cE=__zpSMConfig.shift();if(!cE)continue;var cS=cE.query||[];ag=bh(cS);aK=cE.args;};if(!ag){return;}}if(!O[v]){O[v]={};}if(arguments.length>0){R=X;X=arguments[0];X=X.replace(/\t|\n|\r/g,"");}else{X=aM();R=bw();}_getZID({cX:function(d){bX=d;bP();if(bZ)_invokeZpdl(bZ,bJ(X));cu();if(aJ!=""){cb();}if(bY!=""&& !_isEmpty(bn)){cs();}},bc:aZ("__xsptplus"+D).split("#")[3]});if(aP){_zpq=[];}if(ag){_zampq=[];}}};var bI=new co();bI.cN();})()