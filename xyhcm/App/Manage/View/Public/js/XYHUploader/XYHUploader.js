'use strict';
(function($) {

    $.fn.XYHUploader = function(options, callback) {

        var opts = $.extend({}, $.fn.XYHUploader.defaults, options);
        var objContent = [];//{url: "", turl:"", alt: "", size: 0};//创建数组//json对象为{}
        var objTop;
        var _this = $(this);
        if (opts.thide) {
            _this.hide();//隐藏
        }
        var _btnName = '图片'; //按钮名称
        if (opts.sfile == 'file1' || opts.sfile == 'file2' || opts.sfile == 'abc1') {
            _btnName = '文件';
        }
        if (opts.btnName && opts.btnName.length) {
            _btnName = opts.btnName;
        }

        //读取input值，初始化
        var thisText = opts.initflag ? _this.val() : '';
        
        //只一张图
        if (opts.oneflag) {
            thisText = thisText && thisText.length >0 ? thisText.replace(/"/, "") : "";
            var objItem = {url: thisText, turl:"", alt: "", size: 0}; //json数据对象                
            //objContent.push($.parseJSON('{"url":"","alt":"", size:0}'));
            objContent.push(objItem); //添加数组值 
        } else {
            if(thisText.length > 0) {
                var objItem = [];
                try {
                    objItem = $.parseJSON(thisText);
                } catch (err) {
                    objItem = [];
                }
                if (objItem && objItem instanceof Array) {
                    objContent = objItem;
                }
            }
        }
        

        //console.log(objContent);

        
        
        
        

        var objTop = $('<div class="xupload-content">' 
                        + '  <form action="'+ opts.furl +'" method="post" enctype="multipart/form-data">' 
                        + '  <button class="btn btn-primary" style="'+ (opts.showOutLink ? 'display:;' : 'display:none;')+'" type="button" data-name="xupload-out-link"><em class="glyphicon glyphicon-retweet"></em> 添加'+ _btnName +'链接</button>' 
                        + '  <button class="btn btn-primary" type="button" data-name="xupload-brower-picture"><em class="glyphicon glyphicon-plus-sign"></em> 选择站内'+ _btnName +'</button>' 
                        + '  <div class="btn btn-success up-picture-btn">' 
                        + '   <span><em class="glyphicon glyphicon-plus-sign"></em>上传'+ _btnName +'</span>' 
                        + '   <input type="file" name="file">' 
                        + '  </div>'
                        + '  <input type="hidden" name="sfile" value="'+ opts.sfile +'" />'
                        + '  </form>'
                        + '  <div class="xupload-row">'
                        + '    <div class="xupload-tip"></div>'
                        + '    <div class="xupload-show"></div>'
                        + '  </div>'
                        + '</div>');
        _this.after(objTop);


        var actionLayerObj = objTop.children('form'); //容器对象
        var actionInputObj = actionLayerObj.find('input[type=file]');
        var showObj = objTop.find('.xupload-show');
        var tipObj = objTop.find('.xupload-tip');

        LoadIncludeFile("XYHUploader.css");  


        //初始化数据展示列表
        
        _SetInputValue();

        if (!opts.furl || !opts.burl || opts.furl.length == 0 || opts.burl.length == 0) {
            tipObj.text('上传参数配置错误!');
            return;
        }
            
          

        //删除元素
        actionLayerObj.on('change', 'input[type=file]', function(event) {
            event.preventDefault();
            var _fileThis = $(this);
            if (_fileThis.val() == '') {
                console.log('empty file');
            }
            
            
            var btnObj = actionLayerObj.find('.up-picture-btn span');

            actionLayerObj.ajaxSubmit({
                 dataType:  'json',
                 beforeSend: function() {
                     btnObj.html("上传中...");
                 },
                 success: function(data) {
                    if (data.state == 'SUCCESS') {
                        var fileSize = parseFloat(data.info[0].size / 1024).toFixed(2);
                        tipObj.html("" + data.info[0].name + " 上传成功(" + fileSize + "k)");
                        var imgObj = data.info[0];

                        var objItem = {
                            url: imgObj.url,
                            turl: (imgObj.turl ? imgObj.turl : imgObj.url),
                            alt: "",
                            size: fileSize
                        };
                        if (opts.oneflag) {
                            objContent[0] = (objItem);
                        } else {
                            objContent.push(objItem);
                        }

                        if (opts.sinput) {
                            $(opts.sinput).val(fileSize + 'kb');
                        }

                        _SetInputValue();
                    } else {
                        tipObj.html(data.state);
                    }
                    _fileThis.val('');
                    btnObj.html('添加' + _btnName);

                 },
                 error:function(xhr){
                     btnObj.html("上传失败");
                     tipObj.html(xhr);
                     _fileThis.val('');  
                 }
             });

          

        

        });



        //浏览本地文件
        actionLayerObj.on('click', 'button[data-name=xupload-brower-picture]', function(event) {
            event.preventDefault();
            window.xyhUploadFile = {sfile:''};
            layer.open({
             type: 2,
             title: 'XYHCMS',
             shadeClose: true,
             shade: 0.5,
             area: ['670px', '350px'],
             content: opts.burl,
             end: function(){
                    if (window.xyhUploadFile.sfile && window.xyhUploadFile.sfile.length >0) {
                        // console.log(window.xyhUploadFile.sfile); 
                        tipObj.text('选择'+ _btnName +'成功!');  
                        var objItem = {url: window.xyhUploadFile.sfile, turl:window.xyhUploadFile.sfile, alt: "", size: 0};  
                        if (opts.oneflag) {                            
                            objContent[0] = (objItem);
                        } 
                        else {
                            objContent.push(objItem);
                        } 

                         _SetInputValue();

                    }                      
                  
                }  
            });

            //_SetInputValue(); //设置input值 
            

        });
        //添加外网文件链接
        actionLayerObj.on('click', 'button[data-name=xupload-out-link]', function(event) {
            event.preventDefault();

            var _contentBody ='<div class="xupload-add-link-box">'+
                              '      <div class="xupload-row">'+
                              '          <form action="" method="post">'+
                              '              <div class="xupload-row">'+
                              '                  <label for="name">链接地址</label>'+
                              '                  <span>'+
                              '                      <input class="xupload-form-control" type="text" data-name="xupload-out-link-url" placeholder="文件链接地址" value="" required />'+
                              '                  </span>'+
                              '              </div> '+   
                              '              <div class="xupload-row">'+
                              '                  <label for="name">文件说明</label>'+
                              '                  <span>'+
                              '                      <input class="xupload-form-control" type="text" data-name="xupload-out-link-alt" placeholder="文件说明" value="" required />'+
                              '                  </span>'+
                              '              </div> '+    
                              '          </form>'+
                              '      </div>'+
                              '  </div>';

            layer.open({
                  type: 1,
                  shade: false,
                  title: '添加文件链接', //不显示标题
                  content: _contentBody, //捕获的元素
                  area: ['450px', '250px'],
                  btn: ['保存', '取消'],
                  yes: function(index){
                    var _link = $('input[data-name=xupload-out-link-url]').val();
                    var _alt = $('input[data-name=xupload-out-link-alt]').val();
           

                    if (_link.length == 0) {
                        layer.msg('文件链接地址不能为空');
                        return;
                    }
                    if (_alt.length == 0) {
                        layer.msg('文件说明不能为空');
                        return;
                    }                    

                   
                    tipObj.text('添加'+ _btnName +'链接成功!');  
                    var objItem = {url: _link, turl:'', alt: _alt, size: 0};  
                    if (opts.oneflag) {                            
                        objContent[0] = (objItem);
                    } 
                    else {
                        objContent.push(objItem);
                    } 

                     _SetInputValue();                   

                    layer.close(index);
                  }
                });

            
   

                                       
                  
  

            //_SetInputValue(); //设置input值 
            

        });



        showObj.on('mouseenter',".xupload-picture-item",function(){
                $(this).find('.xupload-picture-del').show();
                $(this).find('.xupload-picture-go').show();
            }).on('mouseleave',".xupload-picture-item",function(){
                $(this).find('.xupload-picture-del').hide();
                $(this).find('.xupload-picture-go').hide();
            }
        );

        showObj.on('click','.xupload-picture-go',function () {
            var _parent = $(this).parent();
            var _index = _parent.index();
            if (_index == 0){
            }else{
                var _oneInfo = objContent[_index-1];
                objContent[_index-1] = objContent[_index];
                objContent[_index] = _oneInfo;
                _SetInputValue();               
            } 
            
        });

        showObj.on('click','.xupload-picture-del',function () {
            var _parent = $(this).parent();
            var _index = _parent.index();

            objContent.splice(_index, 1); //删除项
            //_parent.remove();////移除父元素

            _SetInputValue();
                   
        });

        showObj.on('change','.xupload-picture-alt input',function () {
            var _parent = $(this).parent().parent();
            var _index = _parent.index();
        
            var txt = $(this).val();
            objContent[_index].alt = txt;
            _SetInputValue();               
            
            
        });




        // actionLayerObj.on('change', 'input', function(event) {
        //     event.preventDefault();
        //     var parentObj = $(this).parent('div').parent('div'); //父级
        //     var level = parseInt(parentObj.attr('data-level'));
        //     var index = parentObj.index();

        //     switch (level) {
        //         case 1:
        //             objContent[index].title = $(this).val();
        //             break;
        //         case 2:
        //             var topObj = parentObj.parents("div[data-level='1']"); //顶级//$(this).parent('div').parent('div') 
        //             objContent[topObj.index()].child[index].title = $(this).val();

        //             break;
        //         default:

        //     }

        //     _SetInputValue(); //设置input值 
        // });




        /**
         * 设置input值
         */
        function _SetInputValue() {

            // console.log(objContent);

            var tempValue = [];
            var tempTurl = '';//第一张图（缩略图）
            $.each(objContent,function(name,val) {

                var turl = val.url;//
                var talt = val.alt ? val.alt :'';
                if (opts.thumflag) {
                    turl = val.turl && val.turl.length >0 ? val.turl : val.url;//缩略图 
                }                
                var objItemTemp = {url: turl, alt: talt}; 
                if (tempTurl.length == 0 && turl) {
                    tempTurl = turl;//只取一次。第一张
                }
                tempValue.push(objItemTemp);
            });
                

            if (callback && callback != null) {
                if (opts.oneflag) {    
                    callback(objContent[0]);
                } else {
                    callback(objContent);
                }
                callback(objContent);
            } else {
                if (opts.oneflag) {       
                    _this.val(tempTurl);
                } else {
                    _this.val(JSON.stringify(tempValue));
                }
                
            }
            

            showObj.html('');
            if (opts.show && objContent.length > 0) {

                $.each(objContent,function(name,val) {
                    var turl = val.turl && val.turl.length >0 ? val.turl : val.url;//缩略图 
                    var talt = val.alt && val.alt.length ? val.alt : '';
                    if (turl.length >0) {
                        var pictureHtml = GetShowPictureHtml(turl,talt);
                        showObj.append(pictureHtml);
                    }
                });

                
                 
             }
            // alert(_this.val());
        }

        function GetShowPictureHtml(img,alt) {
            if (!img) {
                return '';
            }
            var _alt = alt && alt.length ? alt : '';
            var _html = '';
            var ext = img.substring(img.lastIndexOf('.') ,img.length).toUpperCase();
            if(ext!='.PNG' &&ext!='.GIF' && ext!='.JPG' && ext!='.JPEG'){
                _html = '<div class="xupload-picture-item"><p>'+img+'</p><div class="xupload-picture-del">删除</div><div class="xupload-picture-go">前移</div><div class="xupload-picture-alt"><input type="text" value="'+_alt+'" placeholder="请填写说明" /></div></div>';
            } else {
                _html = '<div class="xupload-picture-item"><img src="'+ img +'" width="120"><div class="xupload-picture-del">删除</div><div class="xupload-picture-go">前移</div><div class="xupload-picture-alt"><input type="text" value="'+_alt+'" placeholder="请填写说明" /></div></div>';
            }

            
            return _html;
        }



        function S4() {
            return (((1 + Math.random()) * 0x10000) | 0).toString(16).substring(1);
        }

        //js获取项目根路径，如： http://localhost:8083/app
        function getJsPath(){
            var js = document.scripts || document.getElementsByTagName("script");
            var jsPath;
            for (var i = js.length; i > 0; i--) {
                if (js[i - 1].src.indexOf("XYHUploader.js") > -1) {
                    jsPath = js[i - 1].src.substring(0, js[i - 1].src.lastIndexOf("/") + 1);
                }
            }
            return jsPath;
        }

        function LoadIncludeFile(file) {        
            var includePath = getJsPath(); 
            var files = typeof file == "string" ? [file]:file;
            for (var i = 0; i < files.length; i++) {
                var name = files[i].replace(/^\s|\s$/g, "");
                var att = name.split('.');
                var ext = att[att.length - 1].toLowerCase();
                var isCSS = ext == "css";
                var tag = isCSS ? "link" : "script";
                var attr = isCSS ? " type='text/css' rel='stylesheet' " : " language='javascript' type='text/javascript' ";
                var link = (isCSS ? "href" : "src") + "='" + includePath + name + "'";

                if ($(tag + "[" + link + "]").length == 0) $("head").prepend("<" + tag + attr + link + "></" + tag + ">");
            }
       }

    };

    $.fn.XYHUploader.defaults = {
        sfile: 'abc1',//文件目录/类型
        sinput: null,//显示filesize大小input
        btnName: null ,//按钮的类型名称，如图片，文件，flash
        show: true,//显示上传图片
        showOutLink: false,//显示文件链接添加
        furl: '', //form url
        burl: '', //browser url
        thide: true,//隐藏文本框自己
        thumflag: true,//缩略图优先
        oneflag: true,//只有一个图片 
        initflag: true//是否初始化this的值 

    }
})(jQuery);