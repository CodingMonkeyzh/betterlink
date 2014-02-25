$(function(){
    $('#main_menu li a').click(function(){
        $('#main_menu li.active').removeClass('active');
        $(this).parent().addClass('active');
        var tagUrl = $(this).attr('href');
        getPage(tagUrl);
        return false;
    });

    $('#main_menu li.active a').trigger( "click" );

    $(document).on('click','.sidebar a', function(){
        var tagUrl = $(this).attr('href');
        getPage(tagUrl);
        return false;
    });

    $(document).on('click','#btn_addPic', addPic);

    //修改企业简介
    $(document).on('click', '#intro_edit', function(){
        $('.sidebar ul li:eq(1)').children().click();
    });

    //修改轮播图片
    $(document).on('click', '.mdfPic', function(){
        $(this).siblings('input[type="file"]').click();
    });
    $(document).on('change', '.pic input[type="file"]', function(){
        $(this).siblings('input[type="text"]').val($(this).val());
    });

    //企业简介修改提交
    $(document).on('click', '#bt_sb_intro', function(){
        var content = new Array();
        var reg_quot = new RegExp('"', 'g');
        content['content'] = editor.html().replace(reg_quot, "&quot;");//去除内容中的双引号
        content['content'] = escape(editor.html());
        content['type'] = 'intro';
        content['opt'] = 1; //修改简介
        ct_submit('/admin.php/Index/pageSubmit', content, '/admin.php/Company/cpy_intro');
    });

    function addPic(){
        var numCur = $('.right_content').children().length - 1;
        var strHtml = '<div class="form"><div class="form_row pic"><label>图片'+ numCur +':</label><input type="text" class="form_input pic_input" name="" /><input type="file" style="display:none"/><a href="#" class="optPic mdfPic">修改</a><a href="#" class="optPic delPic">删除</a></div><div class="clear"></div></div>';
        $('.form').last().after(strHtml);
    };

    //获取页面
    function getPage(url, params){
        $.get(url, {params:params}, function(d){
            $('#cct').html(d);
            //页面加载完毕后判断是否需要加载编辑器
            if($('#editor_id').length > 0){
                loadEditor();
            }
        });
    }

    function ct_submit(submit_url, submit_content, back_url){
    /*    post提交内容
        @param submit_url: 要提交的URL
        @param submit_content: 要提交的内容(array)
        @param back_url: 成功后跳转页面
        @return bool
    */
        var length = Object.keys(submit_content).length;
        var content = '{';
        for(var key in submit_content){
            content += '"' + key + '":"' + submit_content[key] + '"';
            if(length > 1){
                content += ',';
                length--;
            }
        }
        content += '}';
        if(submit_url){
            $.post(submit_url, {content:content}, function(back_data){
               alert(back_data);
               getPage(back_url);
            });
        }
    }
});
