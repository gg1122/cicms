<div style="margin: 15px;">
    <?php echo form_open('', ['class' => 'layui-form']); ?>
    <div class="layui-form-item">
        <label class="layui-form-label">分类名称</label>
        <div class="layui-input-block">
            <input type="text" name="category_name" placeholder="请输入分类名称" autocomplete="off" class="layui-input"
                   lay-verify="required">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">分类编码</label>
        <div class="layui-input-block">
            <input type="text" name="category_code" placeholder="请输入分类编码" autocomplete="off" class="layui-input"
                   lay-verify="required">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">词库内容</label>
        <div class="layui-input-block">
            <textarea class="layui-textarea" name="key_pool" placeholder="请输入词库内容" lay-verify="required"></textarea>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">状态</label>
        <div class="layui-input-block">
            <input type="checkbox" name="key_status" checked="" lay-skin="switch"/>
        </div>
    </div>
    <button lay-filter="edit" lay-submit style="display: none;"></button>
    </form>
</div>