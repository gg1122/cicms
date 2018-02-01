<?php
if (empty($type) || empty($upload)) {
    throw new Exception('上传类型/上传地址缺失!');
}
?>
<?php if (!empty($template)): ?>
    <a href="<?= $template ?>" target="downloadIframe">
        <button type="button" class="layui-btn">
            <i class="layui-icon">&#xe705;</i>模版文件
        </button>
    </a>
    <iframe src="#" style="display: none" name="downloadIframe"></iframe>
<?php endif; ?>
<?php if ($type === 'upload_picture_one'): ?>
    <fieldset class="layui-elem-field layui-field-title" style="margin-top: 30px;">
        <legend>常规使用：普通图片上传</legend>
    </fieldset>
    <div class="layui-upload">
        <button type="button" class="layui-btn" id="upload_picture_one">上传图片</button>
        <div class="layui-upload-list">
            <img class="layui-upload-img" id="demo1">
            <p id="demoText"></p>
        </div>
    </div>
<?php elseif ($type === 'upload_picture_more'): ?>
    <fieldset class="layui-elem-field layui-field-title" style="margin-top: 30px;">
        <legend>上传多张图片</legend>
    </fieldset>
    <div class="layui-upload">
        <button type="button" class="layui-btn" id="upload_picture_more">多图片上传</button>
        <blockquote class="layui-elem-quote layui-quote-nm" style="margin-top: 10px;">
            预览图：
            <div class="layui-upload-list" id="demo2"></div>
        </blockquote>
    </div>
<?php elseif ($type === 'upload_common'): ?>
    <button type="button" class="layui-btn" id="upload_common">
        <i class="layui-icon">&#xe67c;</i>上传文件
    </button>
<?php elseif ($type === 'upload_excel'): ?>
    <button type="button" class="layui-btn" id="upload_excel">
        <i class="layui-icon">&#xe67c;</i>请选择EXCEL
    </button>
<?php elseif ($type === 'upload_csv'): ?>
    <button type="button" class="layui-btn" id="upload_csv">
        <i class="layui-icon">&#xe67c;</i>上传CSV
    </button>
<?php elseif ($type === 'upload_zip'): ?>
    <button type="button" class="layui-btn layui-btn-primary" id="upload_zip">
        <i class="layui-icon">&#xe67c;</i>只允许压缩文件
    </button>
<?php elseif ($type === 'upload_video'): ?>
    <button type="button" class="layui-btn" id="upload_video">
        <i class="layui-icon">&#xe67c;</i>上传视频
    </button>
<?php elseif ($type === 'upload_audio'): ?>
    <button type="button" class="layui-btn" id="upload_audio">
        <i class="layui-icon">&#xe67c;</i>上传音频
    </button>
<?php elseif ($type === 'upload_diff'): ?>
    <button class="layui-btn demoMore" lay-data="{url: '/a/'}">上传A</button>
    <button class="layui-btn demoMore" lay-data="{url: '/b/', size:5}">上传B</button>
    <button class="layui-btn demoMore" lay-data="{url: '/c/', accept: 'file',size:10}">上传C</button>
<?php elseif ($type === 'upload_list'): ?>
    <fieldset class="layui-elem-field layui-field-title" style="margin-top: 30px;">
        <legend>高级应用：制作一个多文件列表</legend>
    </fieldset>
    <div class="layui-upload">
        <button type="button" class="layui-btn layui-btn-normal" id="testList">选择多文件</button>
        <div class="layui-upload-list">
            <table class="layui-table">
                <thead>
                <tr>
                    <th>文件名</th>
                    <th>大小</th>
                    <th>状态</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody id="demoList"></tbody>
            </table>
        </div>
        <button type="button" class="layui-btn" id="testListAction">开始上传</button>
    </div>
<?php elseif ($type === 'upload_origin'): ?>
    <fieldset class="layui-elem-field layui-field-title" style="margin-top: 30px;">
        <legend>绑定原始文件域</legend>
    </fieldset>
<?php endif; ?>
<script>
    layui.use('upload', function () {
        var $ = layui.jquery
            , upload = layui.upload;
        //普通图片上传
        var uploadInst = upload.render({
            elem: '#upload_picture_one',
            url: '<?=$upload?>',
            exts: 'jpg|png|gif|bmp|jpeg',
            before: function (obj) {
                //预读本地文件示例，不支持ie8
                obj.preview(function (index, file, result) {
                    $('#demo1').attr('src', result); //图片链接（base64）
                });
            }, done: function (res) {
                //如果上传失败
                if (res.code > 0) {
                    return layer.msg('上传失败');
                }
                //上传成功
            }, error: function () {
                //演示失败状态，并实现重传
                var demoText = $('#demoText');
                demoText.html('<span style="color: #FF5722;">上传失败</span> <a class="layui-btn layui-btn-mini demo-reload">重试</a>');
                demoText.find('.demo-reload').on('click', function () {
                    uploadInst.upload();
                });
            }
        });

        //多图片上传
        upload.render({
            elem: '#upload_picture_more',
            url: '<?=$upload?>',
            multiple: true,
            exts: 'jpg|png|gif|bmp|jpeg',
            before: function (obj) {
                //预读本地文件示例，不支持ie8
                obj.preview(function (index, file, result) {
                    $('#demo2').append('<img src="' + result + '" alt="' + file.name + '" class="layui-upload-img">')
                });
            }, done: function (res) {
                //上传完毕
            }
        });

        //指定允许上传的文件类型
        upload.render({
            elem: '#upload_common',
            url: '<?=$upload?>',
            accept: 'file',
            done: function (res) {
                console.log(res)
            }
        });
        upload.render({ //允许上传的文件后缀
            elem: '#upload_zip',
            url: '<?=$upload?>',
            accept: 'file',     //普通文件
            exts: 'zip|rar|7z', //只允许上传压缩文件
            done: function (res) {
                console.log(res)
            }
        });
        upload.render({ //EXCEL上传
            elem: '#upload_excel',
            url: '<?=$upload?>',
            accept: 'file',
            exts: 'xlsx|xls',
            done: function (res) {
                console.log(res)
            }
        });
        upload.render({ //CSV上传
            elem: '#upload_csv',
            url: '<?=$upload?>',
            accept: 'video',
            done: function (res) {
                console.log(res)
            }
        });
        upload.render({
            elem: '#upload_video',
            url: '<?=$upload?>',
            accept: 'video',
            done: function (res) {
                console.log(res)
            }
        });
        upload.render({
            elem: '#upload_audio',
            url: '<?=$upload?>',
            accept: 'audio',
            done: function (res) {
                console.log(res)
            }
        });

        //设定文件大小限制
        upload.render({
            elem: '#test7',
            url: '<?=$upload?>',
            size: 60, //限制文件大小，单位 KB
            done: function (res) {
                console.log(res)
            }
        });

        //同时绑定多个元素，并将属性设定在元素上
        upload.render({
            elem: '.demoMore',
            before: function () {
                layer.tips('接口地址：' + this.url, this.item, {tips: 1});
            }, done: function (res, index, upload) {
                var item = this.item;
                console.log(item); //获取当前触发上传的元素，layui 2.1.0 新增
            }
        });

        //选完文件后不自动上传
        upload.render({
            elem: '#test8',
            url: '<?=$upload?>',
            auto: false,
            //multiple: true,
            bindAction: '#test9',
            done: function (res) {
                console.log(res)
            }
        });

        //拖拽上传
        upload.render({
            elem: '#test10',
            url: '<?=$upload?>',
            done: function (res) {
                console.log(res)
            }
        });

        //多文件列表示例
        var demoListView = $('#demoList'), uploadListIns = upload.render({
            elem: '#testList',
            url: '<?=$upload?>',
            accept: 'file',
            multiple: true,
            auto: false,
            bindAction: '#testListAction',
            choose: function (obj) {
                var files = this.files = obj.pushFile(); //将每次选择的文件追加到文件队列
                //读取本地文件
                obj.preview(function (index, file, result) {
                    var tr = $(['<tr id="upload-' + index + '">'
                        , '<td>' + file.name + '</td>'
                        , '<td>' + (file.size / 1014).toFixed(1) + 'kb</td>'
                        , '<td>等待上传</td>'
                        , '<td>'
                        , '<button class="layui-btn layui-btn-mini demo-reload layui-hide">重传</button>'
                        , '<button class="layui-btn layui-btn-mini layui-btn-danger demo-delete">删除</button>'
                        , '</td>'
                        , '</tr>'].join(''));

                    //单个重传
                    tr.find('.demo-reload').on('click', function () {
                        obj.upload(index, file);
                    });

                    //删除
                    tr.find('.demo-delete').on('click', function () {
                        delete files[index]; //删除对应的文件
                        tr.remove();
                        uploadListIns.config.elem.next()[0].value = ''; //清空 input file 值，以免删除后出现同名文件不可选
                    });

                    demoListView.append(tr);
                });
            }, done: function (res, index, upload) {
                if (res.code == 0) { //上传成功
                    var tr = demoListView.find('tr#upload-' + index)
                        , tds = tr.children();
                    tds.eq(2).html('<span style="color: #5FB878;">上传成功</span>');
                    tds.eq(3).html(''); //清空操作
                    return delete this.files[index]; //删除文件队列已经上传成功的文件
                }
                this.error(index, upload);
            }, error: function (index, upload) {
                var tr = demoListView.find('tr#upload-' + index)
                    , tds = tr.children();
                tds.eq(2).html('<span style="color: #FF5722;">上传失败</span>');
                tds.eq(3).find('.demo-reload').removeClass('layui-hide'); //显示重传
            }
        });

        //绑定原始文件域
        upload.render({
            elem: '#test20',
            url: '<?=$upload?>',
            done: function (res) {
                console.log(res)
            }
        });

    });
</script>
