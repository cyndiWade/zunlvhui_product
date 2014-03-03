//辅助函数
function Trim(str,is_global)
{
                var result;
                result = str.replace(/(^\s+)|(\s+$)/g,"");
                if(is_global.toLowerCase()=="g") result = result.replace(/\s/g,"");
                return result;
}
            function clearBr(key)
            {
                key = Trim(key,"g");
                key = key.replace(/<\/?.+?>/g,"");
                key = key.replace(/[\r\n]/g, "");
                return key;
            }
            
//获取随机数
function getANumber()
{
     var date = new Date();
     var times1970 = date.getTime();
     var times = date.getDate() + "" + date.getHours() + "" + date.getMinutes() + "" + date.getSeconds();
     var encrypt = times * times1970;
     if(arguments.length == 1){
          return arguments[0] + encrypt;
     }else{
          return encrypt;
     }
                
}         
            //以下是package组包过程：      
            var oldPackageString;//记住package，方便最后进行整体签名时取用
            
            function getPartnerId()
            {
				return '1218014001';  //商户id
            }           
            function getPartnerKey()
            {
				  return "e019916e23423ed8d099000a9678f7f4"; // partnerKey
            } 
function getPackage()
{
                var banktype = "WX";2014/2/13
				var name = document.getElementById('name').value;
				var body = name;
                var fee_type = "1";//费用类型，这里1为默认的人民币
                var input_charset = "GBK";//字符集，这里将统一使用GBK
                var notify_url = "http://yunqiserver.xicp.net/ftp/tjr/wxadmin/wxpay.php";//支付成功后将通知该地址
                var out_trade_no = document.getElementById('order_sn').value; //""+getANumber();//订单号，商户需要保证该字段对于本商户的唯一性
                var partner = getPartnerId();//测试商户号
                var spbill_create_ip = ILData[0] ;//"127.0.0.1";//用户浏览器的ip，这个需要在前端获取。这里使用127.0.0.1测试值
				var total_fee = document.getElementById('order_total').value+'00';//总金额。
                var partnerKey = getPartnerKey();//这个值和以上其他值不一样是：签名需要它，而最后组成的传输字符串不能含有它。这个key是需要商户好好保存的。
                
                //首先第一步：对原串进行签名，注意这里不要对任何字段进行编码。这里是将参数按照key=value进行字典排序后组成下面的字符串,在这个字符串最后拼接上key=XXXX。由于这里的字段固定，因此只需要按照这个顺序进行排序即可。
                var signString = "bank_type="+banktype+"&body="+body+"&fee_type="+fee_type+"&input_charset="+input_charset+"&notify_url="+notify_url+"&out_trade_no="+out_trade_no+"&partner="+partner+"&spbill_create_ip="+spbill_create_ip+"&total_fee="+total_fee+"&key="+partnerKey;
                
                var md5SignValue =  ("" + CryptoJS.MD5(signString)).toUpperCase();
                //然后第二步，对每个参数进行url转码，如果您的程序是用js，那么需要使用encodeURIComponent函数进行编码。
                
                
                banktype = encodeURIComponent(banktype);
                body=encodeURIComponent(body);
                fee_type=encodeURIComponent(fee_type);
                input_charset = encodeURIComponent(input_charset);
                notify_url = encodeURIComponent(notify_url);
                out_trade_no = encodeURIComponent(out_trade_no);
                partner = encodeURIComponent(partner);
                spbill_create_ip = encodeURIComponent(spbill_create_ip);
                total_fee = encodeURIComponent(total_fee);
                
                //然后进行最后一步，这里按照key＝value除了sign外进行字典序排序后组成下列的字符串,最后再串接sign=value
                var completeString = "bank_type="+banktype+"&body="+body+"&fee_type="+fee_type+"&input_charset="+input_charset+"&notify_url="+notify_url+"&out_trade_no="+out_trade_no+"&partner="+partner+"&spbill_create_ip="+spbill_create_ip+"&total_fee="+total_fee;
                completeString = completeString + "&sign="+md5SignValue;
                
                
                oldPackageString = completeString;//记住package，方便最后进行整体签名时取用
                
                return completeString;
}
            
            
            //下面是app进行签名的操作：
            
            var oldTimeStamp ;//记住timestamp，避免签名时的timestamp与传入的timestamp时不一致
            var oldNonceStr ; //记住nonceStr,避免签名时的nonceStr与传入的nonceStr不一致
            
            function getAppId()
            {
				return 'wx06529b330cb53393'; //appid
            }
            
            function getAppKey()
            {
				return "IcsZzIeFhPomzwCf6fWzUk11kGoSKmWekFub0vCH5KkSybRnI5eTD1GfqORWW6ryZGtqVPmelrQDmYglhgZ01UDaZhoF7zsRucwbgaGmlgLt1L72LkX3YRXHSA9KVlTc";
			}
            
            
            
            function getTimeStamp()
            {
                var timestamp=new Date().getTime();
                var timestampstring = timestamp.toString();//一定要转换字符串
                oldTimeStamp = timestampstring;
                return timestampstring;
            }
            
            function getNonceStr()
            {
                var $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
                var maxPos = $chars.length;
                var noceStr = "";
                for (i = 0; i < 32; i++) {
                    noceStr += $chars.charAt(Math.floor(Math.random() * maxPos));
                }
                oldNonceStr = noceStr;
                return noceStr;
            }
            
            function getSignType()
            {
                return "SHA1";
            }
            
            function getSign()
            {
                var app_id = getAppId().toString();
                var app_key = getAppKey().toString();
                var nonce_str = oldNonceStr;
                var package_string = oldPackageString;
                var time_stamp = oldTimeStamp;
                //第一步，对所有需要传入的参数加上appkey作一次key＝value字典序的排序
                var keyvaluestring = "appid="+app_id+"&appkey="+app_key+"&noncestr="+nonce_str+"&package="+package_string+"&timestamp="+time_stamp;
                sign = CryptoJS.SHA1(keyvaluestring).toString();
                return sign;
            }



function auto_remove(img){
                div=img.parentNode.parentNode;div.parentNode.removeChild(div);
                img.onerror="";
                return true;
            }
            
            function changefont(fontsize){
                if(fontsize < 1 || fontsize > 4)return;
                $('#content').removeClass().addClass('fontSize' + fontsize);
            }
            
            function setdata($str) {
			var signkey = document.getElementById('signkey');
			signkey.innerHTML = $str;
			
			}
            
            
            // 当微信内置浏览器完成内部初始化后会触发WeixinJSBridgeReady事件。
            document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {
                                      //公众号支付
                                      jQuery('a#getBrandWCPayRequest').click(function(e){
									
											//setdata(getSign());
                                            WeixinJSBridge.invoke('getBrandWCPayRequest',{
                                                  "appId" : getAppId(), //公众号名称，由商户传入
                                                  "timeStamp" : getTimeStamp(), //时间戳
                                                  "nonceStr" : getNonceStr(), //随机串
                                                  "package" : getPackage(),//扩展包
                                                  "signType" : getSignType(), //微信签名方式:1.sha1
                                                  "paySign" : getSign() //微信签名
                                                   },function(res){
                                                     if(res.err_msg == "get_brand_wcpay_request:ok" ) {}
                                                        
														 // 使用以上方式判断前端返回,微信团队郑重提示：res.err_msg将在用户支付成功后返回ok，但并不保证它绝对可靠。
                                                         //因此微信团队建议，当收到ok返回时，向商户后台询问是否收到交易成功的通知，若收到通知，前端展示交易成功的界面；若此时未收到通知，商户后台主动调用查询订单接口，查询订单的当前状态，并反馈给前端展示相应的界面。
                                                    }); 
                                                                             
                                             });
                                      
                                      
                                      
                                      WeixinJSBridge.log('yo~ ready.');
                                      
                                      }, false)
            
            if(jQuery){
                jQuery(function(){
                       
                       var width = jQuery('body').width() * 0.87;
                       jQuery('img').error(function(){
                                           var self = jQuery(this);
                                           var org = self.attr('data-original1');
                                           self.attr("src", org);
                                           self.error(function(){
                                                      auto_remove(this);
                                                      });
                                           });
                       jQuery('img').each(function(){
                                          var self = jQuery(this);
                                          var w = self.css('width');
                                          var h = self.css('height');
                                          w = w.replace('px', '');
                                          h = h.replace('px', '');
                                          if(w <= width){
                                          return;
                                          }
                                          var new_w = width;
                                          var new_h = Math.round(h * width / w);
                                          self.css({'width' : new_w + 'px', 'height' : new_h + 'px'});
                                          self.parents('div.pic').css({'width' : new_w + 'px', 'height' : new_h + 'px'});
                                          });
                       });
            }