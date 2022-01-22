<div style="margin: 15px;">
    <?php echo form_open('', array('class' => 'layui-form')); ?>
    <div class="layui-form-item">
        <label class="layui-form-label">物流名称</label>
        <div class="layui-input-block">
            <input type="text" name="transport_name" placeholder="请输入物流名称" autocomplete="off" class="layui-input"
                   lay-verify="required" minlength="3" maxlength="45">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">物流编码</label>
        <div class="layui-input-block">
            <input type="text" name="transport_code" placeholder="请输入物流编码" autocomplete="off"
                   class="layui-input" lay-verify="required" minlength="2" maxlength="10">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">服务商</label>
        <div class="layui-input-block">
            <select name="provider_id" lay-verify="required" lay-search="">
                <option value="">请选择</option>
                <?php
                foreach ($provider_list as $provider):
                    ?>
                    <option value="<?= $provider['provider_id'] ?>"><?= $provider['provider_name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">物流描述</label>
        <div class="layui-input-block">
            <textarea name="transport_desc" style="width: 100%" placeholder="请填入物流描述"></textarea>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">状态</label>
        <div class="layui-input-block">
            <input type="checkbox" name="transport_status" checked="" lay-skin="switch"/>
        </div>
    </div>
    <button lay-filter="edit" lay-submit style="display: none;"></button>
    </form>
</div>