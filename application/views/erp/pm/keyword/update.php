<div style="margin: 15px;">
    <?php echo form_open('', array('class' => 'layui-form')); ?>
    <input type="hidden" name="key_id" value="<?= $keyword['key_id'] ?>"/>
    <div class="layui-form-item">
        <label class="layui-form-label">词库名称</label>
        <div class="layui-input-block">
            <input type="text" name="keyword_name" value="<?= $keyword['key_name'] ?>" autocomplete="off"
                   class="layui-input"
                   lay-verify="required" disabled>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">词库内容</label>
        <div class="layui-input-block">
            <textarea class="layui-textarea" name="key_pool"
                      lay-verify="required"><?= join('|', json_decode($keyword['key_pool'])) ?></textarea>
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