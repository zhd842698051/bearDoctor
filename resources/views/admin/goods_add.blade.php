<div class="row"><div class="col-md-12"><div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">创建</h3>

                <div class="box-tools">
                    <div class="btn-group pull-right" style="margin-right: 10px">
                        <a href="http://www.shops.com/admin/goods" class="btn btn-sm btn-default"><i class="fa fa-list"></i>&nbsp;列表</a>
                    </div> <div class="btn-group pull-right" style="margin-right: 10px">
                        <a class="btn btn-sm btn-default form-history-back"><i class="fa fa-arrow-left"></i>&nbsp;返回</a>
                    </div>
                </div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="http://www.shops.com/admin/goods/add" method="post" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data" >
                <div class="box-body">
                    {{ csrf_field() }}
                    <div class="fields-group">
                        <div class="form-group 1">

                            <label for="name" class="col-sm-2 control-label">商品名称</label>

                            <div class="col-sm-8">


                                <div class="input-group">

                                    <span class="input-group-addon"><i class="fa fa-pencil"></i></span>

                                    <input type="text" id="name" name="name" value="" class="form-control name" placeholder="输入 商品名称" />


                                </div>


                            </div>
                        </div>
                        <div class="form-group 1">

                            <label for="sell_price" class="col-sm-2 control-label">商品价格</label>

                            <div class="col-sm-8">


                                <div class="input-group">

                                    <span class="input-group-addon">¥</span>

                                    <input style="width: 120px" type="text" id="sell_price" name="sell_price" value="" class="form-control sell_price" placeholder="输入 商品价格" />


                                </div>


                            </div>
                        </div>
                        <div class="form-group 1">

                            <label for="cover" class="col-sm-2 control-label">封面图片</label>

                            <div class="col-sm-8">


                                <input type="file" class="cover" name="cover"  />


                            </div>
                        </div>

                        <div class="form-group 1">

                            <label for="images" class="col-sm-2 control-label">商品图片</label>

                            <div class="col-sm-8">


                                <input type="file" class="images" name="images[]" multiple="1" />


                            </div>
                        </div>

                        <div class="form-group 1">

                            <label for="category_id" class="col-sm-2 control-label">所属分类</label>

                            <div class="col-sm-8">


                                <input type="hidden" name="category_id"/>

                                <select class="form-control category_id" style="width: 100%;" name="category_id"  >
                                    <option value="0">选择分类</option>
                                    @foreach($cate as $k=>$v)
                                        <option value="{{$k}}" >{{$v}}</option>
                                    @endforeach
                                </select>


                            </div>
                        </div>

                        <div class="form-group 1">

                            <label for="brand_id" class="col-sm-2 control-label">所属品牌</label>

                            <div class="col-sm-8">


                                <input type="hidden" name="brand_id"/>

                                <select class="form-control brand_id" style="width: 100%;" name="brand_id"  >
                                    <option value="0">选择品牌</option>
                                    @foreach($brand as $k=>$v)
                                        <option value="{{$k}}" >{{$v}}</option>
                                    @endforeach
                                </select>


                            </div>
                        </div>

                        <div class="form-group 1">

                            <label for="is_hot" class="col-sm-2 control-label">是否热销</label>

                            <div class="col-sm-8">


                                <div class="radio">
                                    <label>
                                        <input type="radio" name="is_hot" value="1" class="minimal is_hot"  />&nbsp;是&nbsp;&nbsp;
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="is_hot" value="0" class="minimal is_hot" checked />&nbsp;否&nbsp;&nbsp;
                                    </label>
                                </div>


                            </div>
                        </div>

                        <div class="form-group 1">

                            <label for="is_son" class="col-sm-2 control-label">是否上架</label>

                            <div class="col-sm-8">


                                <div class="radio">
                                    <label>
                                        <input type="radio" name="is_son" value="1" class="minimal is_son"  />&nbsp;是&nbsp;&nbsp;
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="is_son" value="0" class="minimal is_son" checked />&nbsp;否&nbsp;&nbsp;
                                    </label>
                                </div>


                            </div>
                        </div>

                        <div class="form-group 1">

                            <label for="is_promotion" class="col-sm-2 control-label">是否促销</label>

                            <div class="col-sm-8">


                                <div class="radio">
                                    <label>
                                        <input type="radio" name="is_promotion" value="1" class="minimal is_promotion"  />&nbsp;是&nbsp;&nbsp;
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="is_promotion" value="0" class="minimal is_promotion" checked />&nbsp;否&nbsp;&nbsp;
                                    </label>
                                </div>


                            </div>
                        </div>

                        <div class="form-group 1">

                            <label for="promotion_price" class="col-sm-2 control-label">促销价格</label>

                            <div class="col-sm-8">


                                <div class="input-group">

                                    <span class="input-group-addon">¥</span>

                                    <input style="width: 120px" type="text" id="promotion_price" name="promotion_price" value="" class="form-control promotion_price" placeholder="输入 促销价格" />


                                </div>


                            </div>
                        </div>
                        <div class="form-group 1">

                            <label for="keywords" class="col-sm-2 control-label">关键词</label>

                            <div class="col-sm-8">


                                <div class="input-group">

                                    <span class="input-group-addon"><i class="fa fa-pencil"></i></span>

                                    <input type="text" id="keywords" name="keywords" value="" class="form-control keywords" placeholder="输入 关键词" />


                                </div>

                                <span class="help-block">
    <i class="fa fa-info-circle"></i>&nbsp;多个关键词,隔开
</span>

                            </div>
                        </div>
                        <div class="form-group 1">

                            <label for="descript" class="col-sm-2 control-label">商品描述</label>

                            <div class="col-sm-8">


                                <textarea name="descript" class="form-control" rows="5" placeholder="输入 商品描述"  ></textarea>


                            </div>
                        </div>
                        <div class="form-group 1">

                            <label for="is_attr" class="col-sm-2 control-label">是否有属性</label>

                            <div class="col-sm-8">


                                <div class="radio">
                                    <label>
                                        <input type="radio" name="is_attr" value="1" class="minimal is_attr"  />&nbsp;是&nbsp;&nbsp;
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="is_attr" value="0" class="minimal is_attr" checked />&nbsp;否&nbsp;&nbsp;
                                    </label>
                                </div>


                            </div>
                        </div>

                        <div class="form-group 1">

                            <label for="attr" class="col-sm-2 control-label">属性</label>

                            <div class="col-sm-8">


                                <select class="form-control attr" style="width: 100%;" name="attr[]" multiple="multiple" data-placeholder="输入 属性"  >
                                    <option value="0">请先选择分类</option>
                                </select>
                                <input type="hidden" name="attr[]" />


                            </div>
                        </div>

                        <div class="form-group 1">

                            <label for="attribute" class="col-sm-2 control-label">属性值</label>

                            <div class="col-sm-8"  id="create-product">


                                <select class="form-control attribute" style="width: 100%;" name="attribute[]" multiple="multiple" data-placeholder="输入 属性值"  >
                                    <option value="0">请先选择属性</option>
                                </select>
                                <input type="hidden" name="attribute[]" />


                            </div>

                        </div>
                        <center><span id="create-pro" class="btn btn-warning">生成</span></center>
                        <div id="attr-show"></div>
                        <div class="form-group 1">

                            <label for="num" class="col-sm-2 control-label">库存</label>

                            <div class="col-sm-8">


                                <div class="input-group">


                                    <input style="width: 100px" type="text" id="num" name="num" value="0" class="form-control num" placeholder="输入 库存" />


                                </div>


                            </div>
                        </div>

                        <div id="attr-show"></div>
                    </div>

                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="col-sm-2">

                    </div>
                    <div class="col-sm-8">

                        <div class="btn-group pull-right">
                            <button type="submit" class="btn btn-info pull-right" data-loading-text="<i class='fa fa-spinner fa-spin '></i> 提交">提交</button>
                        </div>

                        <div class="btn-group pull-left">
                            <button type="reset" class="btn btn-warning">撤销</button>
                        </div>

                    </div>

                </div>


                <!-- /.box-footer -->
            </form>
        </div>

    </div></div>

</section>
<script>
    $(function(){
        //根据分类修改属性
        $(".category_id").change(function () {
            var cate_id = $(this).val()
            if(cate_id==0){
                $(".attr").html('<option value="0">请先选择分类</option>');
                return false;
            }
            var str=''
            $.ajax({
                url:'http://www.shops.com/admin/goods/getAttr',
                data:{id:cate_id},
                dataType:'json',
                success:function (msg) {
                    $.each(msg,function(k,v){
                        str+='<option value="'+v.id+'">'+v.name+'</option>';
                    })
                    $(".attr").html(str)
                }
            })
        })
        //根据属性修改属性值
        $(".attr").change(function () {
            var attr_id = $(this).val();
            if(attr_id==0){
                $(".attribute").html('<option value="0">请先选择属性</option>');
                return false;
            }
            var str=''
            $.ajax({
                url:'http://www.shops.com/admin/goods/getAttribute',
                data:{id:attr_id},
                dataType:'json',
                success:function (msg) {
                    $.each(msg,function(k,v){
                        str+='<option value="'+v.attr_id+'-'+v.id+'-'+v.value+'">'+v.value+'</option>';
                    })
                    $(".attribute").html(str)
                }
            })
        })
        $("#create-pro").click(function () {
            var attribute_id = $(".attribute").val()
            if(!attribute_id){
                alert("请先选择属性")
                return false;
            }
            /*$.ajax({
                url:'http://www.shops.com/admin/goods/ajaxGetAttr',
                data:{id:attribute_id},
                dataType:'json',
                success:function (msg) {

                 console.log(msg)
                }
            })
            return false;
            var arr = new Array();
            $.each(attribute_id,function(k,v){
                arr.push(v.split('-'))
            })
            var attr = new Array();
            $.each(arr,function(k,v){
                attr[v[0]]=[];
            })
            $.each(arr,function(k,v){
                attr[v[0]][k]=[v[1],v[2]];
            })
            var str = ""
            var num='s'
            $.each(attr,function(k,v){
                $.each(v,function(kk,vv){
                    if(num!=k){
                        str += vv[1];
                    }
                })
                str+='-'
                num=k
            })*/
            var str='';
            $.ajax({
                url:'http://www.shops.com/admin/goods/ajaxGetAttr',
                type:'get',
                data:{id:attribute_id},
                dataType:'json',
                success:function (msg) {
                    $.each(msg,function(k,v){
                       str+='<div class="form-group 1"><label for="promotion_price" class="col-sm-2 control-label">'+v+'</label><div class="col-sm-8"><div class="input-group"><span class="input-group-addon">¥</span><input style="width: 120px" type="text" id="promotion_price" name="aprice['+k+']" value="" class="form-control promotion_price" placeholder="输入 价格" /><input style="width: 100px" type="text"  name="anum['+k+']"  class="form-control num" placeholder="输入 库存" />&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="checked" value="'+k+'" class="minimal aa"  />&nbsp;设为默认&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="del-attr" style="cursor: pointer">X</span> </div></div></div>'
                    })
                   $("#num").parents(".form-group").remove()
                    $("#attr-show").html(str)
                }
            })
        })
        $(document).on("click",".del-attr",function(){
            $(this).parents(".form-group").remove()
        })
    })
</script>
<script data-exec-on-popstate>

    $(function () {
        $('.form-history-back').on('click', function (event) {
            event.preventDefault();
            history.back(1);
        });

        $('.sell_price').inputmask({"alias":"currency","radixPoint":".","prefix":"","removeMaskOnSubmit":true});


        $("input.cover").fileinput({"overwriteInitial":false,"initialPreviewAsData":true,"browseLabel":"\u6d4f\u89c8","showRemove":false,"showUpload":false,"initialCaption":"","deleteExtraData":{"cover":"_file_del_","_file_del_":"","_token":"KcT01ny0TGOoZozACEHQ81nPqz8KbaBg1vpJSgXa","_method":"PUT"},"deleteUrl":"http:\/\/www.shops.com\/admin\/","allowedFileTypes":["image"]});

        $("input.images").fileinput({"overwriteInitial":false,"initialPreviewAsData":true,"browseLabel":"\u6d4f\u89c8","showRemove":false,"showUpload":false,"initialCaption":"","deleteExtraData":{"images":"_file_del_","_file_del_":"","_token":"KcT01ny0TGOoZozACEHQ81nPqz8KbaBg1vpJSgXa","_method":"PUT"},"deleteUrl":"http:\/\/www.shops.com\/admin\/","allowedFileTypes":["image"]});
        $(".category_id").select2({
            allowClear: true,
            placeholder: "所属分类"
        });
        $(".brand_id").select2({
            allowClear: true,
            placeholder: "所属品牌"
        });
        $('.is_hot').iCheck({radioClass:'iradio_minimal-blue'});
        $('.is_son').iCheck({radioClass:'iradio_minimal-blue'});
        $('.is_promotion').iCheck({radioClass:'iradio_minimal-blue'});

        $('.promotion_price').inputmask({"alias":"currency","radixPoint":".","prefix":"","removeMaskOnSubmit":true});

        $('.is_attr').iCheck({radioClass:'iradio_minimal-blue'});
        $(".attr").select2({
            allowClear: true,
            placeholder: "属性"
        });
        $(".attribute").select2({
            allowClear: true,
            placeholder: "属性值"
        });

        $('.num:not(.initialized)')
            .addClass('initialized')
            .bootstrapNumber({"upClass":"success","downClass":"primary","center":true});

    });
</script>
</div>