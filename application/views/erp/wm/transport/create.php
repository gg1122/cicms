<div style="margin: 15px;">
    <?php echo form_open('erp/warehouse/create', array('class' => 'layui-form')); ?>
    <div class="layui-form-item">
        <label class="layui-form-label">仓库名称</label>
        <div class="layui-input-block">
            <input type="text" name="warehouse_name" placeholder="请输入仓库名称" autocomplete="off" class="layui-input"
                   id="user_name"
                   lay-verify="required" minlength="3" maxlength="45">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">仓库编码</label>
        <div class="layui-input-block">
            <input type="warehouse_code" name="warehouse_code" placeholder="请输入仓库编码" autocomplete="off" class="layui-input"
                   id="user_pass" lay-verify="required" minlength="2" maxlength="10">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">仓库类型</label>
        <div class="layui-input-block">
            <select name="warehouse_type" lay-filter="warehouse_type" lay-verify="required" multiple>
                <?php
                foreach ($type_list as $type_key => $type_name):
                    ?>
                    <option value="<?= $type_key ?>"><?= $type_name ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">状态</label>
        <div class="layui-input-block">
            <input type="checkbox" name="warehouse_status" checked="" lay-skin="switch"/>
        </div>
    </div>
    <button lay-filter="edit" lay-submit style="display: none;"></button>
    </form>
</div>