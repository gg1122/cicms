<div style="margin: 15px;">
    <?php echo form_open('', array('class' => 'layui-form')); ?>

    <div class="layui-form-item">
        <label class="layui-form-label">名称</label>
        <div class="layui-input-block">
            <textarea name="goods_name" placeholder="请输入货品名称" autocomplete="off" lay-verify="required" maxlength="255"
                      class="layui-textarea"></textarea>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">简称</label>
        <div class="layui-input-block">
            <input type="text" name="goods_short_name" lay-verify="required" maxlength="125" class="layui-input"/>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">基价</label>
        <div class="layui-input-block">
            <input type="number" name="basic_price" lay-verify="required" class="layui-input"/>
        </div>
    </div>
    <div class="layui-form-item" id="keyword">
        <label class="layui-form-label">词库</label>
        <div class="layui-input-block">
            <select lay-filter="keyword" lay-verify="required" lay-search="">
                <option value="">请选择</option>
                <?php
                foreach ($keyword_list as $keyword) {
                    echo "<option value='{$keyword['key_id']}'>{$keyword['key_name']}</option>";
                }
                ?>
            </select>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">品牌</label>
        <div class="layui-input-block">
            <select name="brand_id" lay-verify="required" lay-search="">
                <option value="">请选择</option>
                <?php
                foreach ($brand_list as $brand) {
                    echo "<option value='{$brand['brand_id']}'>{$brand['brand_name']}</option>";
                }
                ?>
            </select>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">分类</label>
        <div class="layui-input-block">
            <select name="category_ids" lay-verify="required" lay-search="" multiple>
                <option value="">请选择</option>
                <?php
                foreach ($category_list as $category) {
                    echo "<option value='{$category['category_id']}'>{$category['category_name']}</option>";
                }
                ?>
            </select>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">规格/特性</label>
        <div class="layui-input-block">
            <select name="feature_ids" lay-verify="required" lay-search="" multiple>
                <option value="">请选择</option>
                <?php
                foreach ($feature_list as $feature) {
                    echo "<option value='{$feature['feature_id']}'>{$feature['feature_name']}</option>";
                }
                ?>
            </select>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">状态</label>
        <div class="layui-input-block">
            <input type="checkbox" name="goods_status" checked="" lay-skin="switch"/>
        </div>
    </div>
    <button lay-filter="edit" lay-submit style="display: none;"></button>
    </form>
</div>