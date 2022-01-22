<div style="margin: 15px;">
    <?php echo form_open('', array('class' => 'layui-form')); ?>
    <input type="hidden" name="value_id" value="<?= $info['value_id'] ?>">
    <div class="layui-form-item" id="keyword">
        <label class="layui-form-label">规格</label>
        <div class="layui-input-block">
            <select name="feature_id" lay-verify="required" lay-search="">
                <option value="">请选择</option>
                <?php
                foreach ($feature_list as $feature) {
                    $selected = $info['feature_id'] === $feature['feature_id'] ? 'selected' : '';
                    echo "<option value='{$feature['feature_id']}' {$selected}>{$feature['feature_name']}</option>";
                }
                ?>
            </select>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">规格值</label>
        <div class="layui-input-block">
            <input type="text" name="value_name" value="<?= $info['value_name'] ?>" autocomplete="off"
                   class="layui-input"
                   lay-verify="required" maxlength="45">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">规格值编码</label>
        <div class="layui-input-block">
            <input type="text" name="value_code" value="<?= $info['value_code'] ?>" autocomplete="off"
                   class="layui-input"
                   lay-verify="required" maxlength="45">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">状态</label>
        <div class="layui-input-block">
            <input type="checkbox" name="value_status" <?= $info['value_status'] ? 'checked' : '' ?> lay-skin="switch"/>
        </div>
    </div>
    <button lay-filter="edit" lay-submit style="display: none;"></button>
    </form>
</div>