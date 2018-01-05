<div style="margin: 15px;">
    <?php validation_errors(); ?>
    <?php echo form_open('sys/menu/update', array('class' => 'layui-form')); ?>
    <input type="hidden" name="role_id" value="<?= $role['role_id'] ?>"/>
    <div class="layui-form-item">
        <label class="layui-form-label">角色名称</label>
        <div class="layui-input-block">
            <input type="text" name="role_name" value="<?= $role['role_name'] ?>" placeholder="请输入"
                   autocomplete="off" class="layui-input"
                   lay-verify="required">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">角色描述</label>
        <div class="layui-input-block">
            <input type="text" name="role_desc" value="<?= $role['role_desc'] ?>" placeholder="请输入" autocomplete="off"
                   class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">角色状态</label>
        <div class="layui-input-block">
            <input type="checkbox" name="role_status" lay-skin="switch"
                   lay-verify="required" <?= $role['role_status'] == 1 ? 'checked' : '' ?>/>
        </div>
    </div>
    <button lay-filter="edit" lay-submit style="display: none;"></button>
    </form>
</div>
