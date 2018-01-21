<div style="margin: 15px;">
    <?php echo form_open_multipart('sys/user/create', array('class' => 'layui-form')); ?>
    <input type="hidden" name="user_id" value="<?= $user_info['user_id'] ?>">
    <div class="layui-form-item">
        <label class="layui-form-label">登录名</label>
        <div class="layui-input-block">
            <input type="text" name="user_name" value="<?= $user_info['user_name'] ?>" autocomplete="off"
                   class="layui-input" id="user_name"
                   lay-verify="required" minlength="4" disabled>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">登录密码</label>
        <div class="layui-input-block">
            <input type="password" name="user_pass" value="**********" autocomplete="off"
                   class="layui-input"
                   id="user_pass" lay-verify="required" minlength="6" maxlength="20" disabled>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">密码确认</label>
        <div class="layui-input-block">
            <input type="password" name="user_pass_confirm" value="**********" autocomplete="off"
                   class="layui-input"
                   id="user_pass_confirm" lay-verify="required" minlength="6" maxlength="20" disabled>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">展示名</label>
        <div class="layui-input-block">
            <input type="text" name="display_name" value="<?= $user_info['display_name'] ?>" autocomplete="off"
                   class="layui-input"
                   id="display_name" lay-verify="required">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">邮箱</label>
        <div class="layui-input-block">
            <input type="text" name="user_email" value="<?= $user_info['user_email'] ?>" autocomplete="off"
                   class="layui-input"
                   id="user_email" lay-verify="email">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">等级</label>
        <div class="layui-input-block">
            <select name="user_level" lay-filter="user_level" lay-verify="required">
                <?php
                foreach ($user_level as $level => $name):
                    ?>
                    <option value="<?= $level ?>" <?= $user_info['user_level'] == $level ? 'selected' : '' ?>><?= $name ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">角色</label>
        <div class="layui-input-block">
            <select name="user_role" lay-filter="user_role" lay-verify="required" multiple>
                <?php
                foreach ($role_list as $role):
                    ?>
                    <option value="<?= $role['role_id'] ?>" <?= in_array($role['role_id'], $user_role) ? 'selected' : '' ?>><?= $role['role_name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">状态</label>
        <div class="layui-input-block">
            <input type="checkbox" name="user_status" <?= $user_info['user_status'] == 1 ? 'checked' : '' ?>
                   lay-skin="switch" lay-value="1|0"/>
        </div>
    </div>
    <button lay-filter="edit" lay-submit style="display: none;"></button>
    </form>
</div>