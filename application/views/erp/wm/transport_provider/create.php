<div style="margin: 15px;">
    <?php echo form_open('', array('class' => 'layui-form')); ?>
    <div class="layui-form-item">
        <label class="layui-form-label">名称</label>
        <div class="layui-input-block">
            <input type="text" name="provider_name" placeholder="请输入物流服务商名称" autocomplete="off" class="layui-input"
                   lay-verify="required" minlength="3" maxlength="45">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">官网</label>
        <div class="layui-input-block">
            <input type="text" name="provider_website" placeholder="请输入物流服务商官网" autocomplete="off"
                   class="layui-input" lay-verify="required" minlength="10" maxlength="255">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">联系人</label>
        <div class="layui-input-block">
            <input type="text" name="provider_contact" placeholder="请输入物流服务商联系人" autocomplete="off"
                   class="layui-input" lay-verify="required" minlength="2" maxlength="45">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">地址</label>
        <div class="layui-input-block">
            <textarea name="provider_address" style="width: 100%;height: 50px;" placeholder="请填入物流服务商地址"></textarea>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">邮政编码</label>
        <div class="layui-input-block">
            <input type="text" name="provider_zipcode" placeholder="请输入邮政编码" autocomplete="off"
                   class="layui-input" lay-verify="required" minlength="5" maxlength="45">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">状态</label>
        <div class="layui-input-block">
            <input type="checkbox" name="provider_status" checked="" lay-skin="switch"/>
        </div>
    </div>
    <button lay-filter="edit" lay-submit style="display: none;"></button>
    </form>
</div>