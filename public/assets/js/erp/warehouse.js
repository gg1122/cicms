var base_url = 'http://cicms.com/';
layui.use(['table', 'element', 'layer', 'form'], function () {
    var table = layui.table;
    var form = layui.form;
    var element = layui.element;
    //监听表格复选框选择
    table.on('checkbox(demo)', function (obj) {
        console.log(obj)
    });
    element.on('collapse(test)', function (data) {
        layer.msg('展开状态：' + data.show);
    });
    //监听工具条
    table.on('tool(demo)', function (obj) {
        var data = obj.data;
        if (obj.event === 'edit') {
            saveWarehouse('update', data.warehouse_id);
        } else if (obj.event === 'disable') {
            layer.confirm('确认更改该仓库状态？', function (index) {
                $.getJSON(base_url + '/erp/wm/warehouse/disable', {warehouse_id: data.warehouse_id}, function (res) {
                    layer.close(index);
                    if (res.status) {
                        layer.msg(res.message, {icon: 1, time: 2000});
                        obj.del();
                    } else {
                        layer.alert(res.message, {icon: 2});
                    }
                });

            });
        } else if (obj.event === 'delete') {
            layer.confirm('确认更改该仓库状态？', function (index) {
                $.getJSON(base_url + 'erp/wm/warehouse/disable', {warehouse_id: data.warehouse_id}, function (res) {
                    layer.close(index);
                    if (res.status) {
                        layer.msg(res.message, {icon: 1, time: 2000});
                        obj.del();
                    } else {
                        layer.alert(res.message, {icon: 2});
                    }
                });

            });
        } else if (obj.event === 'dropDown') {
            var self = $(this);
            $('.layui-collapse').attr('lay-event', 'dropDown');
            $('.layui-collapse').html('<i class="layui-icon">&#xe61a;</i>');
            $.getJSON(base_url + 'erp/wm/warehouse/info', {warehouse_id: data.warehouse_id}, function (result) {
                $('#section_list').remove();
                if (result.status) {
                    self.attr('lay-event', 'packUp');
                    self.html('<i class="layui-icon">&#xe619;</i>');
                    obj.tr.after(result.message);
                } else {
                    layer.alert(result.message, {icon: 2});
                }
            })
        } else if (obj.event === 'packUp') {
            $(this).attr('lay-event', 'dropDown');
            $(this).html('<i class="layui-icon">&#xe61a;</i>');
            $('#section_list').remove();
        }
    });
    var $ = layui.$, active = {
        getCheckData: function () { //获取选中数据
            var checkStatus = table.checkStatus('roleListForm')
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

        }, addWarehouse: function (form) {
            var addBoxIndex = -1;
            saveWarehouse('create');
        }, searchData: function () {
            table.reload('warehouseListForm', {
                where: {
                    warehouse_status: $('#warehouse_status').val()
                },
                page: {curr: 1},
            });
        }
    };

    $('.demoTable .layui-btn').on('click', function () {
        var type = $(this).data('type');
        active[type] ? active[type].call(this) : '';
    });

    /**
     * 仓库弹出层
     *
     * @param type
     * @param warehouse_id
     */
    function saveWarehouse(type, warehouse_id) {
        var title = '新增仓库';
        var url = '';
        if (type == 'update') {
            title = '更新仓库';
            url += '?warehouse_id=' + warehouse_id;
        }
        $.get(base_url + '/erp/wm/warehouse/' + type + url, null, function (result) {
            if (!result.status) {
                layer.alert(result.message, {icon: 2});
            } else {
                layer.open({
                    type: 1,
                    title: title,
                    content: result.message,
                    btn: ['保存', '取消'],
                    shade: false,
                    offset: ['50px', '30%'],
                    area: ['400px', '350px'],
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
                            $.ajax({
                                type: 'POST',
                                url: base_url + '/erp/wm/warehouse/' + type,
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
            }
        }, 'JSON');
    }
});