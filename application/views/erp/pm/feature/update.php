<div style="margin: 15px;">
    <?php echo form_open('', array('class' => 'layui-form')); ?>
    <input type="hidden" name="feature_id" value="<?=$info['feature_id']?>">
    <div class="layui-form-item">
        <label class="layui-form-label">规格名称</label>
        <div class="layui-input-block">
            <input type="text" name="feature_name" autocomplete="off" class="layui-input"
                   lay-verify="required" value="<?=$info['feature_name']?>">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">状态</label>
        <div class="layui-input-block">
            <input type="checkbox" name="feature_status" <?=$info['feature_status']?'checked':''?> lay-skin="switch"/>
        </div>
    </div>
    <button lay-filter="edit" lay-submit style="display: none;"></button>
    </form>
</div>