$(function(){

		//快捷菜单
		//bindQuickMenu();

		//菜单切换(测试)
		bindAdminMenu();
		ChangeNav("left_menu_0");

		//菜单开关
		LeftMenuToggle();

		//全部功能开关
		//AllMenuToggle();

		//取消菜单链接虚线
		$(".head").find("a").click(function(){$(this).blur()});
		$(".menu").find("a").click(function(){$(this).blur()});
		get_cate();	

		getStatus();


	}).keydown(function(event){//快捷键
		if(event.keyCode ==116 ){
			url = $("#main").attr("src");
			main.location.href = url;
			return false;
		}
		if(event.keyCode ==27 ){
			$("#qucikmenu").slideToggle("fast")
		}
	});


	
	function get_cate() {
    var url = $('#menu').attr('data-url');
    var listUl = $('#menu').find('dl[data-cid=6] ul');
    if (listUl.length > 0) {
        $.get(url, {
                'pid': 0,
                'rnd': Math.floor(111 + Math.random() * 100000)
            },
            function (data) {
                if (!isNaN(data.count) && data.count > 0) {
                    listUl.text('');
                }
                if (data.list && (typeof data.list == 'object')) {
                    $.each(data.list, function (i, v) {
                        var html = '<li><a href="' + v.url + '" target="main">' + v.name + '</a></li>';
                        listUl.append(html);
                    });
                }

            }, 'json');
    }

  }
		

	function bindQuickMenu(){//快捷菜单
		$("#ac_qucikmenu").bind("mouseenter",function(){
			$("#qucikmenu").slideDown("fast");
		}).dblclick(function(){
			$("#qucikmenu").slideToggle("fast");
		}).bind("mouseleave",function(){
			hidequcikmenu=setTimeout('$("#qucikmenu").slideUp("fast");',700);
			$(this).bind("mouseenter",function(){clearTimeout(hidequcikmenu);});
		});
		$("#qucikmenu").bind("mouseleave",function(){
			hidequcikmenu=setTimeout('$("#qucikmenu").slideUp("fast");',700);
			$(this).bind("mouseenter",function(){clearTimeout(hidequcikmenu);});
		}).find("a").click(function(){
			$(this).blur();
			$("#qucikmenu").slideUp("fast");
			$("#ac_qucikmenu").text($(this).text());
		});
	}


	function bindAdminMenu(){
		$("#nav").find("a").click(function(){
			ChangeNav($(this).attr("_for"));
			//$('#main').get(0).src = $(this).attr("href");
		});

		$("#menu").find("dt").click(function(){
			dt = $(this);
			dd = $(this).next("dd");
			if(dd.css("display")=="none"){
				dd.slideDown("fast");
				dt.css("background-position","right 10px");
			}else{
				dd.slideUp("fast");
				dt.css("background-position","right -35px");
			}
		});

		//动态元素添加的也能触发
		$('#menu dd ul').on('click',"li a",function(){
			$(this).addClass("thisclass").blur().parents("#menu").find("ul li a").not($(this)).removeClass("thisclass");
		}); 

	}

	function ChangeNav(nav){//菜单跳转
		$("#nav").find("a").removeClass("thisclass");
		$("#nav").find("a[_for='"+nav+"']").addClass("thisclass");//.blur();
		$("body").attr("class","showmenu");
		$("#menu").find("div[id^=items]").hide();
		$("#menu").find("#items_"+nav).show().find("dl dd").show().find("ul li a").removeClass("thisclass");//.blur();
	}

	function LeftMenuToggle(){
		$("#togglemenu").click(function(){
			if($("body").attr("class")=="showmenu"){
				$("body").attr("class","hidemenu");
				$(this).html("显示菜单");
			}else{
				$("body").attr("class","showmenu");
				$(this).html("隐藏菜单");
			}
		});
	}


	function AllMenuToggle(){
		mask = $(".pagemask,.iframemask,.allmenu");
		$("#allmenu").click(function(){
				mask.show();
		});
		//mask.mousedown(function(){alert("123");});
		mask.click(function(){mask.hide();});
	}

	function getStatus() {
      var url = $('body').attr('data-get-url');
      if (!url || url.length <5) {
        return;
      }
      $.ajax({
          url: url,
          type: 'GET',
          dataType: 'json'
      })
      .done(function(data) {

          if (data.code) {
            //消息提示 
              setTimeout(function(){getStatus();},180000);                    
          } else {
            //登录失效
              layer.alert(data.msg, {closeBtn: 0}, function(){
                window.location.href = data.url;
              });              
          }

      })
      .fail(function(jqXHR, textStatus, errorThrown) {
          console.log("error："+textStatus);
          setTimeout(function(){getStatus();},180000);
      });
    }
