var base_url = 'https://cicms.com';
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
        } else if (obj.event === 'edit') {
            saveUser('update', data.user_id);
        }
    });
    var $ = layui.$, active = {
        getCheckData: function () { //获取选中数据
            var checkStatus = table.checkStatus('userListForm')
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
            table.reload('userListForm', {
                where: {
                    search_type: $('#search_type').val(),
                    search_value: $('#search_value').val()
                }
            });
        }, addUser: function (form) {
            var addBoxIndex = -1;
            saveUser('create');
        }
    };

    $('.demoTable .layui-btn').on('click', function () {
        var type = $(this).data('type');
        active[type] ? active[type].call(this) : '';
    });

    /**
     * 保存用户
     *
     * @param type
     * @param userid
     */
    function saveUser(type, userid) {
        var title = '新增用户';
        var url = '';
        if (type != 'create') {
            title = '更新用户';
            url = '?user_id=' + userid
        }
        $.get(base_url + '/sys/user/' + type + url, null, function (form) {
            layer.open({
                type: 1,
                title: title,
                content: form,
                btn: ['保存', '取消'],
                shade: false,
                offset: ['50px', '30%'],
                area: ['450px', '450px'],
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
                        console.log(data.elem); //被执行事件的元素DOM对象，一般为button对象
                        console.log(data.form); //被执行提交的form对象，一般在存在form标签时才会返回
                        console.log(data.field); //当前容器的全部表单字段，名值对形式：{name: value}
                        $.ajax({
                            type: 'POST',
                            url: base_url + '/sys/user/' + type,
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
        })
    }
})
;