var base_url = 'http://cicms.com';
layui.use(['table', 'element', 'form', 'tree'], function () {
    var table = layui.table;
    //监听工具条
    table.on('tool(listForm)', function (obj) {
        var data = obj.data;
        if (obj.event === 'edit') {
            saveKeyword('update', data.key_id);
        }
    });
    var $ = layui.$, active = {
        searchData: function () {
            table.reload('keywordListForm', {
                where: {
                    key_status: $('#key_status').val(),
                    key_pool: $('#key_pool').val()
                },
                page: {curr: 1}
            });
        }, addKeyword: function () {
            saveKeyword('create');
        }
    };

    $('.toolbar .layui-btn').on('click', function () {
        var type = $(this).data('type');
        active[type] ? active[type].call(this) : '';
    });

    /**
     * 词库弹出层
     *
     * @param type
     * @param goods_id
     */
    function saveKeyword(type, key_id) {
        var title = '新增词库';
        if (type == 'update') {
            title = '更新词库';
            type += '?key_id=' + key_id;
        }
        $.get(base_url + '/erp/pm/keyword/' + type, null, function (result) {
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
                        var form = layui.form;
                        form.render();
                        form.on('submit(edit)', function () {
                            $.ajax({
                                type: 'POST',
                                url: base_url + '/erp/pm/keyword/' + type,
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