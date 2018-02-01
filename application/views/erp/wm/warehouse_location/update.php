<div style="margin: 15px;">
    <?php echo form_open('erp/wm/warehouse_location/create', array('class' => 'layui-form')); ?>
    <input type="hidden" name="location_id" value="<?= $location['location_id'] ?>">
    <div class="layui-form-item">
        <label class="layui-form-label">库位编码</label>
        <div class="layui-input-inline">
            <input type="text" name="location_code" value="<?= $location['location_code'] ?>" autocomplete="off"
                   class="layui-input"
                   id="location_code"
                   lay-verify="required" minlength="3" maxlength="45">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">所属仓库</label>
        <div class="layui-input-inline">
            <select name="warehouse_id" lay-filter="warehouse_select" lay-verify="required">
                <option value="">请选择</option>
                <?php
                foreach ($warehouse_list as $warehouse):
                    ?>
                    <option value="<?= $warehouse['warehouse_id'] ?>" <?= $location['warehouse_id'] === $warehouse['warehouse_id'] ? 'selected' : '' ?>><?= $warehouse['warehouse_name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div class="layui-form-item" id="section_div">
        <label class="layui-form-label">仓库区域</label>
        <div class="layui-input-inline">
            <select name="section_id"  lay-verify="required">
                <option value="">请选择</option>
                <?php
                foreach ($section_list as $section):
                    ?>
                    <option value="<?= $section['section_id'] ?>" <?= $section['section_id'] === $location['section_id'] ? 'selected' : '' ?>><?= $section['section_name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">排序</label>
        <div class="layui-input-inline">
            <input type="number" class="layui-input" name="location_sort" value="0" step="1"/>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">状态</label>
        <div class="layui-input-block">
            <input type="checkbox" name="location_status" checked="" lay-skin="switch"/>
        </div>
    </div>
    <button lay-filter="edit" lay-submit style="display: none;"></button>
    </form>
</div>