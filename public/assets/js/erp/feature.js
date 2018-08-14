var base_url = 'http://erp.uckendo.com/';
layui.use(['table', 'element', 'form', 'tree'], function () {
    var table = layui.table;
    //监听工具条
    table.on('tool(listForm)', function (obj) {
        var data = obj.data;
        if (obj.event === 'edit') {
            saveFeature('update', data.feature_id);
        }
    });
    var $ = layui.$, active = {
        searchData: function () {
            table.reload('featureListForm', {
                where: {
                    feature_status: $('#feature_status').val(),
                    feature_name: $('#feature_name').val()
                },
                page: {curr: 1}
            });
        }, addFeature: function () {
            saveFeature('create');
        }
    };

    $('.toolbar .layui-btn').on('click', function () {
        var type = $(this).data('type');
        active[type] ? active[type].call(this) : '';
    });

    /**
     * 规格弹出层
     * @param type
     * @param feature_id
     */
    function saveFeature(type, feature_id) {
        var title = '新增规格';
        if (type == 'update') {
            title = '更新规格';
            type += '?feature_id=' + feature_id;
        }
        $.get(base_url + '/erp/pm/feature/' + type, null, function (result) {
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
                    area: ['400px', '250px'],
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
                        var form = layui.form;
                        form.render();
                        form.on('submit(edit)', function () {
                            $.ajax({
                                type: 'POST',
                                url: base_url + '/erp/pm/feature/' + type,
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
                    },
                    end: function () {
                        addBoxIndex = -1;
                    }
                });
            }
        }, 'JSON');
    }
});