var base_url = 'http://erp.uckendo.com';
layui.use(['table', 'element', 'form'], function () {
    var table = layui.table;
    var form = layui.form;
    //监听工具条
    table.on('tool(demo)', function (obj) {
        var data = obj.data;
        if (obj.event === 'edit') {
            saveTransport('update', data.transport_id);
        }
    });
    var $ = layui.$, active = {
        addTransport: function (form) {
            var addBoxIndex = -1;
            saveTransport('create');
        }, searchData: function () {
            table.reload('transportListForm', {
                where: {
                    transport_status: $('#transport_status').val(),
                },
                page: {curr: 1}
            });
        },
    };

    $('.demoTable .layui-btn').on('click', function () {
        var type = $(this).data('type');
        active[type] ? active[type].call(this) : '';
    });

    /**
     * 物流弹出层
     *
     * @param type
     * @param transport_id
     */
    function saveTransport(type, transport_id) {
        var title = '新增物流';
        if (type == 'update') {
            title = '更新物流';
            type += '?transport_id=' + transport_id;
        }
        $.get(base_url + '/erp/wm/transport/' + type, null, function (result) {
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
                                url: base_url + '/erp/wm/transport/' + type,
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