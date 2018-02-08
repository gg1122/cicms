<div style="margin: 15px;">
    <?php echo form_open('', array('class' => 'layui-form')); ?>
    <div class="layui-form-item" id="menu_type_div">
        <label class="layui-form-label">菜单类型</label>
        <div class="layui-input-inline">
            <select name="menu_type" lay-filter="menu_type" lay-verify="required">
                <option value="">请选择</option>
                <option value="1">顶部菜单</option>
                <option value="2">左部菜单</option>
                <option value="3">左部子菜单</option>
                <option value="4">子菜单功能</option>
            </select>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">菜单名称</label>
        <div class="layui-input-inline">
            <input type="text" name="menu_name" placeholder="请输入" autocomplete="off" class="layui-input" id="menu_name"
                   lay-verify="required">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">菜单图标</label>
        <div class="layui-input-inline">
            <input type="text" name="menu_icon" placeholder="请输入" autocomplete="off" class="layui-input"
                   lay-verify="required" value='&amp#xe614;'>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">菜单排序</label>
        <div class="layui-input-inline">
            <input type="text" name="menu_sort" placeholder="请输入" autocomplete="off" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">菜单状态</label>
        <div class="layui-input-block">
            <input type="checkbox" name="menu_status" checked="" lay-skin="switch" lay-verify="required"
                   lay-value="1|0"/>
        </div>
    </div>
    <button lay-filter="edit" lay-submit style="display: none;"></button>
    </form>
</div>
<script type="text/javascript" charset="utf-8">
    var menu_list = <?=json_encode($menuList)?>
</script>