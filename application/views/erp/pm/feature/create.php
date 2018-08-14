<div style="margin: 15px;">
    <?php echo form_open('', array('class' => 'layui-form')); ?>
    <div class="layui-form-item">
        <label class="layui-form-label">规格名称</label>
        <div class="layui-input-block">
            <input type="text" name="feature_name" placeholder="请输入规格名称" autocomplete="off" class="layui-input"
                   lay-verify="required">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">状态</label>
        <div class="layui-input-block">
            <input type="checkbox" name="feature_status" checked="" lay-skin="switch"/>
        </div>
    </div>
    <button lay-filter="edit" lay-submit style="display: none;"></button>
    </form>
</div>