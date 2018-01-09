<ul id="accessList" lay-filter="accessList"></ul>

<script>
    //Demo
    layui.use(['element','tree', 'layer'], function () {
        var layer = layui.layer,element = layui.element,$ = layui.jquery;

        var nodes = <?=json_encode($role_menu_tree)?>;
        layui.tree({
            elem: '#accessList', //指定元素
            target: '_blank', //是否新选项卡打开（比如节点返回href才有效）
            click: function (item) { //点击节点回调
                var menu_status = $('#menu_' + item.menu_right).attr('checked');
                var checked = false;
                if (menu_status == undefined) {
                    checked = true;
                }
                alert(parseInt(item.menu_right) - parseInt(item.menu_left));
                if (parseInt(item.menu_right) - parseInt(item.menu_left) > 1) {
                    for (var i = parseInt(item.menu_left); i <= parseInt(item.menu_right); i++) {
                        $('#menu_' + i).attr('checked', checked);
                        element.render('accessList');
                    }
                }
                console.log(item);
            }, nodes: nodes
        });

    });
</script>

</body>
</html>