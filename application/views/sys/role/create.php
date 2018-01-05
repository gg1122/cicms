<div style="margin: 15px;">
    <?php echo validation_errors(); ?>
    <?php echo form_open('sys/role/create', array('class' => 'layui-form')); ?>
    <div class="layui-form-item">
        <label class="layui-form-label">角色名称</label>
        <div class="layui-input-block">
            <input type="text" name="role_name" placeholder="请输入" autocomplete="off" class="layui-input" id="role_name"
                   lay-verify="required">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">角色描述</label>
        <div class="layui-input-block">
            <input type="text" name="role_desc" placeholder="请输入" autocomplete="off" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">角色状态</label>
        <div class="layui-input-block">
            <input type="checkbox" name="role_status" checked="" lay-skin="switch" lay-verify="required"/>
        </div>
    </div>
    <button lay-filter="edit" lay-submit style="display: none;"></button>
    </form>
</div>