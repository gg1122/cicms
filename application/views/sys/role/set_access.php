<?php echo form_open('sys/role/set_access', array('class' => 'accessList')); ?>
<input type="hidden" name="role_id" value="<?= $role['role_id'] ?>"/>
<ul id="accessList" lay-filter="accessList"></ul>
<button lay-filter="edit" lay-submit style="display: none;"></button>
</form>
<script>
    //Demo
    layui.use(['tree', 'layer', 'form'], function () {
        var layer = layui.layer, form = layui.form, $ = layui.jquery;
        layui.tree({
            elem: '#accessList', //指定元素
            target: '_blank', //是否新选项卡打开（比如节点返回href才有效）
            click: function (item) { //点击节点回调
                var menu_status = $('#menu_' + item.menu_right).attr('checked');
                var status = false;
                if (menu_status == undefined || menu_status == false) {
                    status = true;
                }
                if (parseInt(item.menu_right) - parseInt(item.menu_left) > 1) {
                    for (var i = parseInt(item.menu_left); i <= parseInt(item.menu_right); i++) {
                        var menuObj = $('#menu_' + i);
                        if (menuObj != undefined) {
                            menuObj.attr('checked', status);
                        }
                    }
                    form.render('checkbox');
                }
            }, nodes: <?=json_encode($role_menu_tree)?>
        });
    });
</script>