var base_url = 'http://erp.uckendo.com/';
layui.use(['table', 'element', 'form'], function () {
    var table = layui.table;
    var form = layui.form;
    //监听工具条
    table.on('tool(listForm)', function (obj) {
        var data = obj.data;
        if (obj.event === 'edit') {
            saveGoods('update', data.goods_id);
        }
    });
    var $ = layui.$, active = {
        searchData: function () {
            table.reload('goodsListForm', {
                where: {
                    goods_status: $('#goods_status').val()
                },
                page: {curr: 1}
            });
        }, addGoods: function () {
            saveGoods('create');
        }
    };

    $('.toolbar .layui-btn').on('click', function () {
        var type = $(this).data('type');
        active[type] ? active[type].call(this) : '';
    });

    form.on('select(keyword)', function (data) {
        if (data.value > 0) {
            $.get(base_url + 'erp/pm/keyword/get', {key_id: data.value}, function (res) {
                if (res.status) {
                    var content = '<div class="layui-form-item" id="menu_fid_div">';
                    content += '<label class="layui-form-label">词库内容</label>';
                    content += '<div class="layui-input-block">';
                    content += '<select name="goods_keyword" lay-verify="required" lay-search="" multiple>';
                    content += '<option value="">请选择</option>';
                    $.each(res.data, function (i, data) {

                        content += '<option value="' + data + '">' + data + '</option>';
                    });
                    content += '</select>';
                    content += '</div>';
                    content += '</div>';
                    if ($('#keyword_pool').length > 0) {
                        $('#keyword_pool').replace(content);
                    } else {
                        $('#keyword').after(content);
                    }
                    form.render();
                } else {
                    layer.alert(res.message, {icon: 2});
                }
            }, 'JSON');
        }
    });

    /**
     * 货品弹出层
     *
     * @param type
     * @param goods_id
     */
    function saveGoods(type, goods_id) {
        var title = '新增货品';
        if (type == 'update') {
            title = '更新货品';
            type += '?goods_id=' + goods_id;
        }
        $.get(base_url + '/erp/pm/goods/' + type, null, function (result) {
            if (!result.status) {
                layer.alert(result.message, {icon: 2});
            } else {
                layer.open({
                    id: 'Layer',
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
                                url: base_url + '/erp/pm/goods/' + type,
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
                            return false;
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