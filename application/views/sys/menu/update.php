<div style="margin: 15px;">
    <?php validation_errors(); ?>
    <?php echo form_open('sys/menu/update', array('class' => 'layui-form')); ?>
    <input type="hidden" name="menu_id" value="<?= $menuObj['menu_id'] ?>"/>
    <div class="layui-form-item" id="menu_type_div">
        <label class="layui-form-label">菜单类型</label>
        <div class="layui-input-block">
            <select name="menu_type" lay-filter="menu_type" lay-verify="required">
                <option value="1" <?= $menuObj['menu_type'] == 1 ? 'selected' : '' ?> disabled>顶部菜单</option>
                <option value="2" <?= $menuObj['menu_type'] == 2 ? 'selected' : '' ?> disabled>左部菜单</option>
                <option value="3" <?= $menuObj['menu_type'] == 3 ? 'selected' : '' ?> disabled>左部子菜单</option>
                <option value="4" <?= $menuObj['menu_type'] == 4 ? 'selected' : '' ?> disabled>模块功能</option>
            </select>
        </div>
    </div>
    <?php
        if($menuObj['menu_type'] > 0):
    ?>
    <div class="layui-form-item">
        <label class="layui-form-label">上级菜单</label>
        <div class="layui-input-block">
            <select name="menu_fid" lay-verify="required">
                <option value="0" disabled>顶级菜单</option>
                <?php
                foreach ($menuList as $item) {
                    $selected = $menuObj['menu_fid'] == $item['menu_id'] ? 'selected' : '';
                    echo "<option value='{$item['menu_id']}' {$selected} disabled>{$item['menu_name']}</option>";
                }
                ?>
            </select>
        </div>
    </div>
    <?php
        endif;
    ?>
    <div class="layui-form-item">
        <label class="layui-form-label">菜单名称</label>
        <div class="layui-input-block">
            <input type="text" name="menu_name" value="<?= $menuObj['menu_name'] ?>" placeholder="请输入"
                   autocomplete="off" class="layui-input"
                   lay-verify="required">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">菜单URI</label>
        <div class="layui-input-block">
            <input type="text" name="menu_uri" value="<?= $menuObj['menu_uri'] ?>" placeholder="请输入" autocomplete="off"
                   class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">菜单图标</label>
        <div class="layui-input-block">
            <input type="text" name="menu_icon" value="<?= $menuObj['menu_icon'] ?>" placeholder="请输入"
                   autocomplete="off" class="layui-input"
                   lay-verify="required">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">菜单排序</label>
        <div class="layui-input-block">
            <input type="text" name="menu_sort" value="<?= $menuObj['menu_sort'] ?>" placeholder="请输入"
                   autocomplete="off" class="layui-input"
                   lay-verify="required">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">菜单状态</label>
        <div class="layui-input-block">
            <input type="checkbox" name="menu_status" lay-skin="switch"
                   lay-verify="required" <?= $menuObj['menu_status'] == 1 ? 'checked' : '' ?>/>
        </div>
    </div>
    <div class="layui-form-item layui-form-text">
        <label class="layui-form-label">菜单描述</label>
        <div class="layui-input-block">
            <textarea name="menu_desc" placeholder="请输入内容"
                      class="layui-textarea"><?= $menuObj['menu_desc'] ?></textarea>
        </div>
    </div>
    <button lay-filter="edit" lay-submit style="display: none;"></button>
    </form>
</div>
