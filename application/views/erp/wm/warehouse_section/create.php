<div style="margin: 15px;">
    <?php echo form_open('erp/wm/warehouse_secition/create', array('class' => 'layui-form')); ?>
    <div class="layui-form-item">
        <label class="layui-form-label">区域名称</label>
        <div class="layui-input-block">
            <input type="text" name="section_name" placeholder="请输入区域名称" autocomplete="off" class="layui-input"
                   id="user_name"
                   lay-verify="required" minlength="3" maxlength="45">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">区域编码</label>
        <div class="layui-input-block">
            <input type="text" name="section_code" placeholder="请输入区域编码" autocomplete="off"
                   class="layui-input"
                   id="section_code" lay-verify="required" minlength="2" maxlength="10">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">所属仓库</label>
        <div class="layui-input-block">
            <select name="warehouse_id" lay-filter="warehouse_id" lay-verify="required">
                <option value="">请选择</option>
                <?php
                foreach ($warehouse_list as $warehouse):
                    ?>
                    <option value="<?= $warehouse['warehouse_id'] ?>"><?= $warehouse['warehouse_name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">状态</label>
        <div class="layui-input-block">
            <input type="checkbox" name="section_status" checked="" lay-skin="switch"/>
        </div>
    </div>
    <button lay-filter="edit" lay-submit style="display: none;"></button>
    </form>
</div>