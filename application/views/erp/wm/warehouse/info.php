<tr id="section_list">
    <td data-field="" data-content="" colspan="6">
        <div class="layui-tab " id="section_list">
            <ul class="layui-tab-title">
                <li class="layui-this">仓库区域</li>
                <!--<li>仓库库位</li>-->
            </ul>
            <div class="layui-tab-content">
                <div class="layui-tab-item layui-show">
                    <?php
                    if (!empty($section_list)) {
                        ?>
                        <table class="layui-table" border="1px solid red">
                            <tbody>
                            <tr data-index="0" class="">
                                <td data-field="section_code" colspan="2">
                                    <div class="layui-table-cell">仓库区域编码</div>
                                </td>
                                <td data-field="section_name" colspan="2">
                                    <div class="layui-table-cell">仓库区域名称</div>
                                </td>
                                <td data-field="create_time" colspan="2">
                                    <div class="layui-table-cell">创建时间</div>
                                </td>
                            </tr>
                            <?php
                            foreach ($section_list as $section) {
                                echo <<<EOT
                                <tr data-index="1" class="">
                                    <td data-field="section_code" colspan="2">
                                        <div class="layui-table-cell">{$section['section_code']}</div>
                                    </td>
                                    <td data-field="section_name" colspan="2">
                                        <div class="layui-table-cell">{$section['section_name']}</div>
                                    </td>
                                    <td data-field="create_time" colspan="2">
                                        <div class="layui-table-cell">{$section['create_time']}</div>
                                    </td>
                                </tr>
EOT;
                            }
                            ?>
                            </tbody>
                        </table>
                        <?php
                    } else {
                        echo '暂无数据...';
                    }
                    ?>
                </div>
                <!--<div class="layui-tab-item">内容2</div>-->
            </div>
        </div>
    </td>
</tr>
