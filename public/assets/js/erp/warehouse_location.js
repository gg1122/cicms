var base_url = 'http://cicms.com';
layui.use(['table', 'element', 'form', 'tree', 'upload'], function () {
    var table = layui.table;
    var form = layui.form;
    var upload = layui.upload;
    //监听表格复选框选择
    table.on('checkbox(demo)', function (obj) {
        console.log(obj)
    });
    //监听工具条
    table.on('tool(demo)', function (obj) {
        var data = obj.data;
        if (obj.event === 'edit') {
            saveWarehouseLocation('update', data.location_id);
        } else if (obj.event === 'disable') {
            layer.confirm('确认禁用该仓库库位？', function (index) {
                $.getJSON(base_url + '/erp/wm/warehouse_location/disable', {location_id: data.location_id}, function (res) {
                    layer.close(index);
                    if (res.status) {
                        layer.msg(res.message, {icon: 1, time: 2000});
                        obj.del();
                    } else {
                        layer.alert(res.message, {icon: 2});
                    }
                });

            });
        }
    });
    var $ = layui.$, active = {
        getCheckData: function () {
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

        }, addWarehouseLocation: function () {
            var addBoxIndex = -1;
            saveWarehouseLocation('create');
        }, searchData: function () {
            table.reload('warehouseLocationForm', {
                where: {
                    location_status: $('#location_status').val(),
                    warehouse_id: $('#warehouse_id').val(),
                    search_type: $('#search_type').val(),
                    search_value: $('#search_value').val(),
                },
                page: {curr: 1}
            });
        }, importLocation: function () {
            $.get(base_url + '/erp/wm/warehouse_location/import', null, function (result) {
                if (!result.status) {
                    layer.alert(result.message, {icon: 2});
                } else {
                    layer.open({
                        type: 1,
                        title: '导入库位',
                        id: 'location_layer',
                        offset: 'auto',
                        content: result.message,
                        btn: '取消',
                        btnAlign: 'c',
                        shade: 0,
                        yes: function () {
                            layer.closeAll();
                        }
                    });
                }
            }, 'JSON')
        }
    };

    //仓库选择，触发仓库区域
    form.on('select(warehouse_select)', function (data) {
        if (data.value != '') {
            $.get(base_url + '/erp/wm/warehouse_section/index', {warehouse_id: data.value, is_page: 0}, function (res) {
                if (res.rel) {
                    var content = '<div class="layui-form-item" id="section_div">';
                    content += '<label class="layui-form-label">仓库区域</label>';
                    content += '<div class="layui-input-inline">';
                    content += '<select name="section_id" lay-verify="required" lay-search="">';
                    content += '<option value="">请选择</option>';
                    $.each(res.data, function (i, info) {
                        content += '<option value="' + info.section_id + '">' + info.section_name + '</option>';
                    });
                    content += '</select>';
                    content += '</div>';
                    content += '</div>';
                    $('#section_div').replaceWith(content);
                    form.render();
                } else {
                    layer.alert(res.message, {icon: 2});
                }
            }, 'JSON');
        }
    });


    $('.demoTable .layui-btn').on('click', function () {
        var type = $(this).data('type');
        active[type] ? active[type].call(this) : '';
    });

    /**
     * 仓库库位弹出层
     *
     * @param type
     * @param section_id
     */
    function saveWarehouseLocation(type, section_id) {
        var title = '新增仓库库位';
        if (type == 'update') {
            title = '更新仓库库位';
            type += '?location_id=' + section_id;
        }
        $.get(base_url + '/erp/wm/warehouse_location/' + type, null, function (result) {
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
                        var form = layui.form;
                        form.render();
                        form.on('submit(edit)', function () {
                            $.ajax({
                                type: 'POST',
                                url: base_url + '/erp/wm/warehouse_location/' + type,
                                data: $("form").serialize(),
                                dataType: 'json',
                                success: function (callback) {
                                    if (callback.status) {
                                        layer.msg(callback.message, {
                                            icon: 1,
                                            time: 2000
                                        }, function () {
                                            layer.close(index);
                                            location.reload();
                                        });
                                    } else {
                                        layer.alert(callback.message, {icon: 2});
                                    }
                                }
                            });
                            return false;
                        });
                    }, end: function () {
                        addBoxIndex = -1;
                    }
                });
            }
        }, 'JSON');
    }
});