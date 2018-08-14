var base_url = 'http://erp.uckendo.com';
layui.use(['table', 'form'], function () {
    var table = layui.table;
    var form = layui.form;
    //监听表格复选框选择
    table.on('checkbox(demo)', function (obj) {
        console.log(obj)
    });
    //监听工具条
    table.on('tool(demo)', function (obj) {
        var data = obj.data;
        if (obj.event === 'detail') {
            layer.msg('ID：' + data.id + ' 的查看操作');
        } else if (obj.event === 'delete') {
            layer.confirm('确认禁用该菜单？', function (index) {
                $.getJSON(base_url + '/menu/disable', {menu_id: data.menu_id}, function (res) {
                    layer.close(index);
                    if (res.status) {
                        layer.msg(res.message, {icon: 1, time: 2000});
                        obj.del();
                    } else {
                        layer.alert(res.message, {icon: 2});
                    }
                });

            });
        } else if (obj.event === 'edit') {
            saveMenu('update', data.menu_id);
        }
    });
    var $ = layui.$, active = {
        getCheckData: function () { //获取选中数据
            var checkStatus = table.checkStatus('menuListForm')
                , data = checkStatus.data;
            layer.open({
                type: 1,
                title: '信息',
                content: JSON.stringify(data),
                btn: '关闭',
                shade: false,
                area: ['600px', '400px'],
                maxmin: true
            });

        }, searchData: function () {
            table.reload('menuListForm', {
                where: {
                    menu_fid: $('#search_value').val(),
                    menu_id: $('#menu_id').val(),
                },
                page: {curr: 1},
            });
        }, addMenu: function (form) {
            var addBoxIndex = -1;
            saveMenu('create');
        }
    };

    $('.demoTable .layui-btn').on('click', function () {
        var type = $(this).data('type');
        active[type] ? active[type].call(this) : '';
    });

    //菜单类型选择，触发菜单模块
    form.on('select(menu_type)', function (data) {
        $('#menu_module_div').remove();
        $('#menu_fid_div').remove();
        $('#menu_uri_div').remove();
        $('#menu_uri_short_div').remove();
        if (data.value > 2) {
            var get_tree = $.get(base_url + '/sys/menu/get_module_tree_used', {menu_type: data.value}, function (res) {
                if (res.status) {
                    var content = '<div class="layui-form-item" id="menu_fid_div">';
                    content += '<label class="layui-form-label">上级菜单</label>';
                    content += '<div class="layui-input-block">';
                    content += '<select name="menu_fid" lay-filter="menu_fid" lay-verify="required" lay-search="">';
                    content += '<option value="">请选择</option>';
                    $.each(res.data, function (i, data) {
                        content += '<option value="' + data.menu_id + '">' + data.menu_name + '</option>';
                    });
                    content += '</select>';
                    content += '</div>';
                    content += '</div>';
                    if ($('#menu_fid_div').length > 0) {
                        $('#menu_fid_div').replace(content);
                    } else {
                        $('#menu_type_div').after(content);
                    }
                    form.render();
                } else {
                    layer.alert(res.message, {icon: 2});
                }
            }, 'JSON');
            get_tree.done(function () {
                if ($('#menu_module_div').length == 0) {
                    $.get(base_url + '/sys/menu/get_module_tree', null, function (res) {
                        if (res.status) {
                            var content = '<div class="layui-form-item" id="menu_module_div">';
                            content += '<label class="layui-form-label">菜单模块</label>';
                            content += '<div class="layui-input-block">';
                            content += '<select name="menu_module" lay-filter="menu_module" lay-verify="required" lay-search="">';
                            content += '<option value="">请选择</option>';
                            $.each(res.data, function (i, value) {
                                content += '<option value="' + i + '">' + value + '</option>';
                            });
                            content += '</select>';
                            content += '</div>';
                            content += '</div>';
                            $('#menu_fid_div').after(content);
                            form.render();
                        } else {
                            layer.alert(res.message, {icon: 2});
                        }
                    }, 'JSON');
                }
            });
        } else {
            $('#menu_name').attr('value', '');
        }
    });

    //菜单模块选择，触发菜单地址
    form.on('select(menu_module)', function (data) {
        $('#menu_uri_div').remove();
        $('#menu_uri_short_div').remove();
        if (data.value != '') {
            $.get(base_url + '/sys/menu/get_module_tree', {module: data.value}, function (res) {
                if (res.status) {
                    var content = '<div class="layui-form-item" id="menu_uri_div">';
                    content += '<label class="layui-form-label">菜单地址</label>';
                    content += '<div class="layui-input-block">';
                    content += '<select name="menu_uri" lay-filter="menu_uri" lay-verify="required" lay-search="">';
                    content += '<option value="">请选择</option>';
                    $.each(res.data, function (i, value) {
                        content += '<option value="' + i + '">' + value + '</option>';
                    });
                    content += '</select>';
                    content += '</div>';
                    content += '</div>';

                    content += '<div class="layui-form-item" id="menu_uri_short_div">';
                    content += '<label class="layui-form-label">菜单短地址</label>';
                    content += '<div class="layui-input-block">';
                    content += '<input type="text" name="menu_uri_short" placeholder="请输入" autocomplete="off" class="layui-input">';
                    content += '</div>';
                    content += '</div>';
                    if ($('#menu_uri_div').length > 0) {
                        $('#menu_uri_div').replace(content);
                    } else {
                        $('#menu_module_div').after(content);
                    }
                    form.render();
                } else {
                    layer.alert(res.message, {icon: 2});
                }
            }, 'JSON');
        }
    });

    //选择菜单地址，触发菜单名称填写
    form.on('select(menu_uri)', function (data) {
        if (data.value != '') {
            var info = data.elem[data.elem.selectedIndex].text.split(':');
            if (info[1] != undefined) {
                $('#menu_name').attr('value', info[1]);
            } else {
                $('#menu_name').attr('value', '');
            }
        }
    });
    /**
     * 菜单弹出层
     *
     * @param type
     * @param menu_id
     */
    function saveMenu(type, menu_id) {
        var title = '新增菜单';
        var url = '';
        if (type == 'update') {
            title = '更新菜单';
            url += '?menu_id=' + menu_id;
        }
        $.get(base_url + '/sys/menu/' + type + url, null, function (result) {
            if (result.status) {
                layer.open({
                    type: 1,
                    title: title,
                    content: result.message,
                    btn: ['保存', '取消'],
                    shade: false,
                    offset: ['50px', '30%'],
                    area: ['400px', '400px'],
                    zIndex: 10,
                    maxmin: true,
                    yes: function () {
                        //触发表单的提交事件
                        $('form.layui-form').find('button[lay-filter=edit]').click();
                    }, full: function (elem) {
                        var win = window.top === window.self ? window : parent.window;
                        $(win).on('resize', function () {
                            var $this = $(this);
                            elem.width($this.width()).height($this.height()).css({
                                top: 0,
                                left: 0
                            });
                            elem.children('div.layui-layer-content').height($this.height() - 95);
                        });
                    }, success: function (layero, index) {
                        //弹出窗口成功后渲染表单
                        var form = layui.form;
                        form.render();
                        form.on('submit(edit)', function (data) {
                            console.log(data.elem); //被执行事件的元素DOM对象，一般为button对象
                            console.log(data.form); //被执行提交的form对象，一般在存在form标签时才会返回
                            console.log(data.field); //当前容器的全部表单字段，名值对形式：{name: value}
                            $.ajax({
                                type: 'POST',
                                url: base_url + '/sys/menu/' + type,
                                data: $("form").serialize(),
                                dataType: 'json',
                                success: function (callback) {
                                    if (callback.status) {
                                        layer.msg(callback.message, {
                                            icon: 1,
                                            time: 2000 //2秒关闭（如果不配置，默认是3秒）
                                        }, function () {
                                            layer.close(index);
                                            location.reload();//刷新
                                        });
                                    } else {
                                        layer.alert(callback.message, {icon: 2});
                                    }
                                }
                            });
                            //这里可以写ajax方法提交表单
                            return false; //阻止表单跳转。如果需要表单跳转，去掉这段即可。
                        });
                    },
                    end: function () {
                        addBoxIndex = -1;
                    }
                });
            } else {
                layer.alert(result.message);
            }

        }, 'JSON');
    }
});