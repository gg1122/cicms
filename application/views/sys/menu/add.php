<div style="margin: 15px;">
    <?php echo validation_errors(); ?>
    <?php echo form_open('sys/menu/add', array('class' => 'layui-form')); ?>
    <div class="layui-form-item" id="menu_type_div">
        <label class="layui-form-label">菜单类型</label>
        <div class="layui-input-block">
            <select name="menu_type" lay-filter="menu_type" lay-verify="required">
                <option value="">请选择</option>
                <option value="1">顶部菜单</option>
                <option value="2">左部菜单</option>
                <option value="3">左部子菜单</option>
                <option value="4">模块功能</option>
            </select>
        </div>
    </div>
    <div class="layui-form-item" id="menu_fid_div" style="display: none;">
        <label class="layui-form-label">上级菜单</label>
        <div class="layui-input-block">
            <select name="menu_fid" id="menu_fid" lay-verify="required">
                <option value="" selected>请选择</option>
                <option value="0" >顶级菜单</option>
                <?php
                foreach ($menuList as $item) {
                    echo "<option value='{$item['menu_id']}' data-menu_type='{$item['menu_type']}'>{$item['menu_name']}</option>";
                }
                ?>
            </select>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">菜单名称</label>
        <div class="layui-input-block">
            <input type="text" name="menu_name" placeholder="请输入" autocomplete="off" class="layui-input"
                   lay-verify="required">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">菜单URI</label>
        <div class="layui-input-block">
            <input type="text" name="menu_uri" placeholder="请输入" autocomplete="off" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">菜单图标</label>
        <div class="layui-input-block">
            <input type="text" name="menu_icon" placeholder="请输入" autocomplete="off" class="layui-input"
                   lay-verify="required">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">菜单排序</label>
        <div class="layui-input-block">
            <input type="text" name="menu_sort" placeholder="请输入" autocomplete="off" class="layui-input"
                   lay-verify="required">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">菜单状态</label>
        <div class="layui-input-block">
            <input type="checkbox" name="menu_status" lay-skin="switch" lay-verify="required"/>
        </div>
    </div>
    <div class="layui-form-item layui-form-text">
        <label class="layui-form-label">菜单描述</label>
        <div class="layui-input-block">
            <textarea name="menu_desc" placeholder="请输入内容" class="layui-textarea"></textarea>
        </div>
    </div>
    <button lay-filter="edit" lay-submit style="display: none;"></button>
    </form>
</div>
<script type="text/javascript" charset="utf-8">
    var menu_list = <?=json_encode($menuList)?>
</script>